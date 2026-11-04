<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;
    public function test_contact_form_submits_successfully_with_new_fields(): void
    {
        $payload = [
            'name'            => 'John Doe',
            'phone'           => '+91 9876543210',
            'email'           => 'john@example.com',
            'company_name'    => 'Acme Digital Solutions',
            'company_address' => '123 Innovation Park, Cyber Hub',
            'website_url'     => 'https://example.com',
            'referral_source' => 'Google Search',
            'service'         => 'IT Data Destruction',
            'message'         => 'Looking for website audit and SEO services.',
            'agree'           => '1',
        ];

        $response = $this->post(route('contact.submit'), $payload);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contacts', [
            'name'            => 'John Doe',
            'email'           => 'john@example.com',
            'phone'           => '+91 9876543210',
            'company_name'    => 'Acme Digital Solutions',
            'website_url'     => 'https://example.com',
            'referral_source' => 'Google Search',
        ]);
    }
}
