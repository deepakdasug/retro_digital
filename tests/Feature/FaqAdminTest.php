<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqAdminTest extends TestCase
{
    use RefreshDatabase;

    private function createAdminUser(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }

    public function test_admin_can_manage_faqs(): void
    {
        $admin = $this->createAdminUser();
        $faq = Faq::create([
            'question' => 'How does delivery work?',
            'answer' => 'We arrange delivery with you.',
            'category' => 'Orders',
            'sort_order' => 1,
            'is_published' => true,
        ]);

        $index = $this->actingAs($admin)->get(route('admin.faqs.index'));
        $index->assertOk();
        $index->assertSee('Add FAQ');
        $index->assertSee('How does delivery work?');
        $index->assertSee('data-admin-tab="faqs"', false);

        $this->get(route('admin.faqs.create'))
            ->assertOk()
            ->assertSee('Save FAQ');
        $this->get(route('admin.faqs.edit', $faq))
            ->assertOk()
            ->assertSee('How does delivery work?');

        $this->post(route('admin.faqs.store'), [
            'question' => 'Can I change my order?',
            'answer' => 'Contact us to update your order.',
            'category' => 'Orders',
            'sort_order' => 3,
            'is_published' => 1,
        ])->assertRedirect(route('admin.faqs.index'));

        $this->assertDatabaseHas('faqs', [
            'question' => 'Can I change my order?',
            'created_by' => $admin->id,
            'is_published' => true,
        ]);

        $this->put(route('admin.faqs.update', $faq), [
            'question' => 'How are orders delivered?',
            'answer' => 'We coordinate delivery with you.',
            'category' => 'Orders',
            'sort_order' => 2,
            'is_published' => 1,
        ])->assertRedirect(route('admin.faqs.index'));

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question' => 'How are orders delivered?',
            'sort_order' => 2,
            'is_published' => true,
            'updated_by' => $admin->id,
        ]);

        $this->delete(route('admin.faqs.destroy', $faq))
            ->assertRedirect(route('admin.faqs.edit', $faq));

        $this->assertSoftDeleted('faqs', ['id' => $faq->id]);
    }

    public function test_dashboard_has_an_faq_section_and_add_action(): void
    {
        $admin = $this->createAdminUser();
        Faq::create([
            'question' => 'Where can I get support?',
            'answer' => 'Contact our support team.',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertOk();
        $response->assertSee('id="section-faqs"', false);
        $response->assertSee('Add FAQ');
        $response->assertSee('Where can I get support?');
    }

    public function test_public_faqs_page_renders_dynamic_database_content(): void
    {
        $published = Faq::create([
            'question' => 'What is the dynamic database question?',
            'answer' => 'This answer comes straight from the MySQL database.',
            'category' => 'Database Testing',
            'sort_order' => 1,
            'is_published' => true,
        ]);

        $draft = Faq::create([
            'question' => 'Hidden draft question?',
            'answer' => 'This should not appear publicly.',
            'category' => 'Database Testing',
            'sort_order' => 2,
            'is_published' => false,
        ]);

        $response = $this->get(route('faqs'));

        $response->assertOk();
        $response->assertSee('What is the dynamic database question?');
        $response->assertSee('This answer comes straight from the MySQL database.');
        $response->assertSee('Database Testing');
        $response->assertDontSee('Hidden draft question?');
        $response->assertDontSee('This should not appear publicly.');
    }
}
