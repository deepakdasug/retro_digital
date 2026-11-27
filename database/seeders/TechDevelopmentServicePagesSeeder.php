<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class TechDevelopmentServicePagesSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->pages() as [$attributes, $sections]) {
            $service = Service::firstOrCreate(['slug' => $attributes['slug']], $attributes);
            if ($service->sections()->exists()) {
                continue;
            }

            $this->writeSections($service, $sections);
        }
    }

    public function redesign(): void
    {
        foreach ($this->pages() as [$attributes, $sections]) {
            $service = Service::firstOrCreate(['slug' => $attributes['slug']], $attributes);
            $service->update($attributes);
            $service->sections()->delete();
            $this->writeSections($service, $sections);
        }
    }

    private function writeSections(Service $service, array $sections): void
    {
        foreach ($sections as $sortOrder => [$type, $content]) {
            $service->sections()->create([
                'section_type' => $type,
                'content' => $content,
                'sort_order' => $sortOrder,
                'is_active' => true,
            ]);
        }
    }

    private function pages(): array
    {
        return [
            $this->buildPage([
                'slug' => 'web-development',
                'name' => 'Web Development',
                'headline' => 'Fast. Sharp. Built to Convert.',
                'intro' => 'Websites that look great, load fast, and earn their keep.',
                'short' => 'Conversion-focused websites and web apps built for speed, clarity and easy content control.',
                'description' => 'Web strategy, UX, front-end engineering, CMS builds and performance optimisation delivered as one connected website program.',
                'meta_title' => 'Web Development Services | Fast, Conversion-Focused Websites',
                'meta_description' => 'Build a website that loads fast, explains your offer clearly and turns the right visitors into enquiries, with UX, engineering and CMS expertise.',
                'keywords' => 'web development, website design, front-end development, CMS development, conversion optimisation',
                'image' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Web design and development team reviewing a website',
                'service_images' => [
                    'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '0.9s', 'label' => 'target first paint'],
                    ['value' => '98/100', 'label' => 'accessibility score'],
                    ['value' => '+42%', 'label' => 'demo requests'],
                ],
                'proof' => [
                    'heading' => 'Pretty is table stakes. Performance pays the bills.',
                    'items' => [
                        ['value' => 'Conversion-first', 'label' => 'Every layout earns its place in the journey'],
                        ['value' => 'Core Web Vitals', 'label' => 'Speed measured on real devices and networks'],
                        ['value' => 'CMS freedom', 'label' => 'Your team can publish without calling a developer'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Built on solid foundations',
                    'heading' => 'Fast, accessible and ready to grow.',
                    'body' => 'A beautiful site still needs engineering discipline behind it. We build components and content structures that stay fast as you add pages.',
                    'items' => [
                        ['title' => 'Design systems', 'description' => 'Reusable sections and components that keep every new page on brand.'],
                        ['title' => 'Performance budgets', 'description' => 'Hard limits on weight, scripts and loading behaviour before launch.'],
                        ['title' => 'Accessible components', 'description' => 'Keyboard, contrast and screen-reader behaviour designed in from the start.'],
                        ['title' => 'SEO-ready foundations', 'description' => 'Clean markup, metadata and internal linking baked into the build.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Your website is a salesperson',
                    'heading' => 'Your website is not a brochure. It is your hardest-working salesperson.',
                    'body' => 'We combine brand, UX, content and engineering so the site explains the offer clearly and removes friction from every enquiry. The result feels simple to visitors because the complexity is handled underneath.',
                    'cta_text' => 'Plan a website that converts',
                ],
                'audit' => [
                    'eyebrow' => 'Find the leaks first',
                    'heading' => 'Where websites quietly lose revenue.',
                    'body' => 'Before a redesign, we find the pages, journeys and technical issues costing you enquiries today.',
                    'items' => [
                        ['title' => 'A confusing hero', 'description' => 'Visitors cannot tell what you do or why it matters within five seconds.'],
                        ['title' => 'Slow mobile experience', 'description' => 'Heavy images and scripts punish the majority of your traffic.'],
                        ['title' => 'Broken enquiry paths', 'description' => 'Forms, CTAs and follow-ups fail at the exact moment intent is highest.'],
                        ['title' => 'Uneditable content', 'description' => 'Simple copy changes queue behind developers and go stale.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we build',
                    'heading' => 'One team from first sketch to final deploy.',
                    'body' => 'Choose a focused build or bring strategy, design and engineering together.',
                    'items' => [
                        ['icon' => 'fa-solid fa-pen-ruler', 'title' => 'UX & conversion design', 'description' => 'Journey maps, wireframes and interfaces shaped around action.'],
                        ['icon' => 'fa-solid fa-code', 'title' => 'Front-end engineering', 'description' => 'Fast, accessible interfaces built with maintainable components.'],
                        ['icon' => 'fa-solid fa-layer-group', 'title' => 'CMS builds', 'description' => 'Flexible publishing models your marketing team can actually use.'],
                        ['icon' => 'fa-solid fa-cart-shopping', 'title' => 'Ecommerce experiences', 'description' => 'Product discovery, checkout and merchandising built to sell.'],
                        ['icon' => 'fa-solid fa-gauge-high', 'title' => 'Performance & accessibility', 'description' => 'Measured improvements to speed, usability and search visibility.'],
                        ['icon' => 'fa-solid fa-screwdriver-wrench', 'title' => 'Care & optimisation', 'description' => 'Ongoing experiments, fixes and improvements after launch.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A clear build rhythm',
                    'heading' => 'Diagnose, design, build, improve.',
                    'body' => 'No black boxes. You see the work, the trade-offs and the next decision at every stage.',
                    'items' => [
                        ['title' => 'Diagnose', 'description' => 'Audit the current site, analytics and customer journey.'],
                        ['title' => 'Design', 'description' => 'Prototype the pages and flows that matter most.'],
                        ['title' => 'Build', 'description' => 'Engineer, integrate and test with weekly reviews.'],
                        ['title' => 'Improve', 'description' => 'Launch, measure and iterate on real visitor behaviour.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Outcomes you can see',
                    'heading' => 'A site that earns its place in the funnel.',
                    'body' => 'We agree the baseline and report the numbers that connect the website to business results.',
                    'items' => [
                        ['value' => '+42%', 'label' => 'Increase in demo requests'],
                        ['value' => '0.9s', 'label' => 'Target largest contentful paint'],
                        ['value' => '98', 'label' => 'Accessibility score at launch'],
                        ['value' => '12 wks', 'label' => 'Typical design-to-launch window'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'Website questions',
                    'heading' => 'Web development FAQs',
                    'body' => 'What business teams usually ask before a rebuild.',
                    'items' => [
                        ['title' => 'Do we need a redesign or a rebuild?', 'description' => 'Sometimes the design is fine and the foundations are not. We audit both before recommending the smallest path to the result you need.'],
                        ['title' => 'Which CMS do you use?', 'description' => 'We choose based on your team, content model and integration needs rather than forcing one platform.'],
                        ['title' => 'Who writes the content?', 'description' => 'We can work with your writers, provide structure and editing, or write the pages ourselves.'],
                        ['title' => 'Will the new site be SEO-friendly?', 'description' => 'Yes. Redirects, metadata, semantics, performance and crawlability are part of the launch checklist.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Turn the website into a growth asset',
                    'heading' => 'Build a site your customers trust and your team can run.',
                    'body' => 'Start with a focused audit and a clear plan for the pages, journeys and technology that will move the needle.',
                    'button_text' => 'Plan your website build',
                ],
            ]),

            $this->buildPage([
                'slug' => 'mobile-app-development',
                'name' => 'Mobile App Development',
                'headline' => 'Launch. Engage. Retain. Repeat.',
                'intro' => 'Apps people keep, not apps they delete.',
                'short' => 'Native-feeling iOS and Android apps built around retention, reliability and clean architecture.',
                'description' => 'Mobile product strategy, UX, cross-platform engineering, release management and post-launch growth support.',
                'meta_title' => 'Mobile App Development Services | iOS & Android Apps',
                'meta_description' => 'Build mobile apps with strong onboarding, fast performance and analytics that help you improve retention after launch.',
                'keywords' => 'mobile app development, iOS development, Android development, cross-platform apps, app UX',
                'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Mobile app interface design and testing',
                'service_images' => [
                    'https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1523206489230-c012c64b2b48?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1607252650355-f7fd0460ccdb?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '4.8', 'label' => 'average app rating'],
                    ['value' => '63%', 'label' => '30-day retention'],
                    ['value' => '2.1s', 'label' => 'target cold start'],
                ],
                'proof' => [
                    'heading' => 'Retention is designed, not hoped for.',
                    'items' => [
                        ['value' => 'Thumb-first UX', 'label' => 'Flows built for one hand and real context'],
                        ['value' => 'Offline resilience', 'label' => 'Useful even when the network is not'],
                        ['value' => 'Store-ready', 'label' => 'Release, review and update process handled'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Engineering for real devices',
                    'heading' => 'Fast where it matters, reliable everywhere.',
                    'body' => 'The app has to survive weak networks, old devices and real-world interruptions. We design for those conditions from day one.',
                    'items' => [
                        ['title' => 'Native performance', 'description' => 'Smooth interactions and launch times measured on real devices.'],
                        ['title' => 'Secure authentication', 'description' => 'Biometrics, token handling and privacy-safe session design.'],
                        ['title' => 'Push & deep links', 'description' => 'Notifications and links that land people in the right place.'],
                        ['title' => 'Product analytics', 'description' => 'Events, funnels and retention reporting built into the experience.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'The first session decides the rest',
                    'heading' => 'Your app has one job: be worth opening again.',
                    'body' => 'We treat onboarding, core value and return triggers as the product, not features added later. Every screen earns its place in the routine you want customers to build.',
                    'cta_text' => 'Shape a mobile product people keep',
                ],
                'audit' => [
                    'eyebrow' => 'Why apps get abandoned',
                    'heading' => 'The first five minutes tell the truth.',
                    'body' => 'We review the existing app or concept against the moments where users decide whether to stay.',
                    'items' => [
                        ['title' => 'Slow first launch', 'description' => 'Loading, onboarding and permissions create friction before value.'],
                        ['title' => 'Confusing onboarding', 'description' => 'People cannot see the payoff quickly enough to continue.'],
                        ['title' => 'Battery and data drain', 'description' => 'Background behaviour makes the app expensive to keep.'],
                        ['title' => 'No feedback loop', 'description' => 'The team cannot see where users drop off or why.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we handle',
                    'heading' => 'From concept to store updates.',
                    'body' => 'A complete mobile delivery team, or the specialist support your product needs next.',
                    'items' => [
                        ['icon' => 'fa-solid fa-compass', 'title' => 'Product strategy', 'description' => 'Positioning, feature priorities and a realistic release plan.'],
                        ['icon' => 'fa-solid fa-mobile-screen-button', 'title' => 'UX & UI design', 'description' => 'Flows, prototypes and design systems built for mobile.'],
                        ['icon' => 'fa-solid fa-code', 'title' => 'Cross-platform build', 'description' => 'One codebase where sensible, native where it matters.'],
                        ['icon' => 'fa-solid fa-server', 'title' => 'Backend & APIs', 'description' => 'Reliable data, sync, auth and third-party integrations.'],
                        ['icon' => 'fa-solid fa-vial', 'title' => 'QA & release', 'description' => 'Device testing, store review and staged rollout support.'],
                        ['icon' => 'fa-solid fa-arrow-trend-up', 'title' => 'App growth support', 'description' => 'Analytics, experiments and feature iteration after launch.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A product rhythm that ships',
                    'heading' => 'Shape, prototype, build, learn.',
                    'body' => 'We reduce risk before writing production code, then release in visible increments.',
                    'items' => [
                        ['title' => 'Shape', 'description' => 'Define the audience, core loop and success metrics.'],
                        ['title' => 'Prototype', 'description' => 'Test the key flows before committing to the build.'],
                        ['title' => 'Build', 'description' => 'Engineer, integrate and test on real devices.'],
                        ['title' => 'Learn', 'description' => 'Launch, measure retention and improve the product.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Mobile outcomes',
                    'heading' => 'Measure the habits, not just the downloads.',
                    'body' => 'We report activation, retention and the product moments that predict long-term use.',
                    'items' => [
                        ['value' => '4.8', 'label' => 'Average store rating'],
                        ['value' => '63%', 'label' => '30-day retention target'],
                        ['value' => '2.1s', 'label' => 'Cold start target'],
                        ['value' => '38%', 'label' => 'Increase in activation'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'Mobile app questions',
                    'heading' => 'Mobile app development FAQs',
                    'body' => 'What teams ask before committing to an app build.',
                    'items' => [
                        ['title' => 'Native or cross-platform?', 'description' => 'We recommend based on performance needs, team skills, budget and how much platform-specific behaviour matters.'],
                        ['title' => 'How long does an app take?', 'description' => 'A focused MVP can move quickly; complex integrations and store review add time. We scope milestones before starting.'],
                        ['title' => 'Who owns the code?', 'description' => 'You do. We set up the repositories and documentation so your team or a future partner can continue.'],
                        ['title' => 'Do you support the app after launch?', 'description' => 'Yes. We offer release support, monitoring, experiments and ongoing feature development.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Build something worth opening',
                    'heading' => 'Turn your app idea into a product people use.',
                    'body' => 'Bring the concept, the existing app or the retention problem. We will map the smallest valuable next release.',
                    'button_text' => 'Plan your app build',
                ],
            ]),

            $this->buildPage([
                'slug' => 'custom-application',
                'name' => 'Custom Application',
                'headline' => 'Build. Fit. Scale. Grow.',
                'intro' => 'Software shaped around the way your business actually works.',
                'short' => 'Custom business applications that replace spreadsheets, manual handoffs and disconnected tools.',
                'description' => 'Workflow discovery, application design, full-stack development and integrations built around how your business really operates.',
                'meta_title' => 'Custom Application Development | Business Software',
                'meta_description' => 'Replace manual workflows with custom applications designed around your operations, integrations and reporting needs.',
                'keywords' => 'custom application development, business software, workflow automation, internal tools',
                'image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Custom application development workspace',
                'service_images' => [
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '18 hrs', 'label' => 'saved each week'],
                    ['value' => '4 tools', 'label' => 'replaced by one app'],
                    ['value' => '99.9%', 'label' => 'uptime target'],
                ],
                'proof' => [
                    'heading' => 'Built around the work, not a template.',
                    'items' => [
                        ['value' => 'Workflow-first', 'label' => 'Designed with the people doing the work'],
                        ['value' => 'Integration-ready', 'label' => 'Connected to the systems you already trust'],
                        ['value' => 'Owned by you', 'label' => 'Code, data and documentation stay yours'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Built to be trusted',
                    'heading' => 'The boring foundations that keep operations calm.',
                    'body' => 'Custom software becomes business-critical fast. Access, auditability and data integrity have to be designed in.',
                    'items' => [
                        ['title' => 'Role-based access', 'description' => 'The right people see the right records and actions.'],
                        ['title' => 'Audit trails', 'description' => 'Every important change is traceable and explainable.'],
                        ['title' => 'API integrations', 'description' => 'Connect finance, CRM, support and operational tools.'],
                        ['title' => 'Scalable data model', 'description' => 'Structure that supports reporting and future growth.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Remove work, not add screens',
                    'heading' => 'The best custom software removes work instead of adding another login.',
                    'body' => 'We map the real process, find the repeated manual steps and design an application that makes the next action obvious. Fewer tabs, fewer emails, fewer places for work to disappear.',
                    'cta_text' => 'Map your custom application',
                ],
                'audit' => [
                    'eyebrow' => 'Where spreadsheets become risk',
                    'heading' => 'Find the hidden cost of manual processes.',
                    'body' => 'We audit how work actually moves through your team, then identify the highest-value places to replace manual effort.',
                    'items' => [
                        ['title' => 'Manual re-entry', 'description' => 'The same data copied between tools, inboxes and spreadsheets.'],
                        ['title' => 'Invisible status', 'description' => 'Nobody can see what is waiting, blocked or overdue.'],
                        ['title' => 'Approval bottlenecks', 'description' => 'Decisions get stuck because the process lives in someone\'s head.'],
                        ['title' => 'Reporting guesswork', 'description' => 'Numbers are rebuilt by hand and never quite agree.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we deliver',
                    'heading' => 'A focused application, not an endless platform.',
                    'body' => 'Start with the workflow that hurts most, then extend once the value is proven.',
                    'items' => [
                        ['icon' => 'fa-solid fa-diagram-project', 'title' => 'Workflow discovery', 'description' => 'Map the process, exceptions and real user needs.'],
                        ['icon' => 'fa-solid fa-object-group', 'title' => 'Application design', 'description' => 'Interfaces and flows that reduce training and mistakes.'],
                        ['icon' => 'fa-solid fa-code', 'title' => 'Full-stack development', 'description' => 'Secure, maintainable software built for the long term.'],
                        ['icon' => 'fa-solid fa-plug', 'title' => 'Integrations', 'description' => 'Connect the tools that hold your business data.'],
                        ['icon' => 'fa-solid fa-right-left', 'title' => 'Migration', 'description' => 'Move records safely with validation and rollback plans.'],
                        ['icon' => 'fa-solid fa-screwdriver-wrench', 'title' => 'Support & iteration', 'description' => 'Improve the app as the team learns what works.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'From process to product',
                    'heading' => 'Map, prototype, build, roll out.',
                    'body' => 'We earn adoption by involving users early and launching something usable quickly.',
                    'items' => [
                        ['title' => 'Map', 'description' => 'Observe the current workflow and agree the target outcome.'],
                        ['title' => 'Prototype', 'description' => 'Test the critical screens with the people who will use them.'],
                        ['title' => 'Build', 'description' => 'Ship in milestones with data migration and testing.'],
                        ['title' => 'Roll out', 'description' => 'Train users, monitor adoption and improve the workflow.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Operational outcomes',
                    'heading' => 'Less admin. More visibility. Better decisions.',
                    'body' => 'We define the baseline before build: time lost, error rates, tool costs and reporting delays.',
                    'items' => [
                        ['value' => '18 hrs', 'label' => 'Team time saved each week'],
                        ['value' => '4', 'label' => 'Disconnected tools replaced'],
                        ['value' => '99.9%', 'label' => 'Uptime target for critical workflows'],
                        ['value' => '6 wks', 'label' => 'Typical first usable release'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'Custom app questions',
                    'heading' => 'Custom application FAQs',
                    'body' => 'How to decide whether custom software is the right move.',
                    'items' => [
                        ['title' => 'When does custom make sense?', 'description' => 'When the workflow is core to your advantage, no tool fits, or the cost of manual work keeps growing.'],
                        ['title' => 'How do you avoid overbuilding?', 'description' => 'We start with the smallest workflow that proves value, then expand only after adoption and evidence.'],
                        ['title' => 'Can it connect to our current tools?', 'description' => 'Yes, where APIs or data access exist. Integrations are scoped early so surprises do not appear late.'],
                        ['title' => 'What happens after launch?', 'description' => 'We support rollout, monitor usage and keep improving the application with a clear change process.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Fix the workflow, not the symptom',
                    'heading' => 'Replace the spreadsheet with something your team trusts.',
                    'body' => 'Show us the process that creates the most manual work. We will map a practical first release.',
                    'button_text' => 'Discuss a custom application',
                ],
            ]),

            $this->buildPage([
                'slug' => 'salesforce-erpnext-services',
                'name' => 'Salesforce & ERPNext Services',
                'headline' => 'Connect. Align. Operate. Grow.',
                'intro' => 'Salesforce and ERPNext working as one team.',
                'short' => 'Salesforce and ERPNext implementation, integration and optimisation built around clean processes and adoption.',
                'description' => 'CRM and ERP consulting, migration, integration, automation and managed support for growing businesses.',
                'meta_title' => 'Salesforce & ERPNext Services | Implementation & Integration',
                'meta_description' => 'Get Salesforce and ERPNext working together with clean data, practical automation and adoption-focused delivery.',
                'keywords' => 'Salesforce services, ERPNext implementation, CRM integration, ERP migration, business automation',
                'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Business systems and CRM implementation review',
                'service_images' => [
                    'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '40%', 'label' => 'faster quote-to-cash'],
                    ['value' => '92%', 'label' => 'data accuracy'],
                    ['value' => '3 wks', 'label' => 'faster monthly close'],
                ],
                'proof' => [
                    'heading' => 'Platforms do not fix broken processes.',
                    'items' => [
                        ['value' => 'Process-led', 'label' => 'Configuration follows how the business runs'],
                        ['value' => 'Clean data', 'label' => 'Migration and deduplication treated seriously'],
                        ['value' => 'Adoption-focused', 'label' => 'Training and workflows people actually use'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Architecture that holds up',
                    'heading' => 'Connect the systems without creating more silos.',
                    'body' => 'Salesforce and ERPNext only create value when data moves cleanly and the right people can trust it.',
                    'items' => [
                        ['title' => 'Integration architecture', 'description' => 'Clear ownership of records between CRM, ERP and finance.'],
                        ['title' => 'Data quality', 'description' => 'Validation, deduplication and migration rules that stick.'],
                        ['title' => 'Permissions', 'description' => 'Roles and access designed around real responsibilities.'],
                        ['title' => 'Reporting', 'description' => 'Dashboards that answer the questions leaders actually ask.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Systems only work when people use them',
                    'heading' => 'Enterprise projects fail when the process is an afterthought.',
                    'body' => 'We start with how quotes, orders, stock and invoices actually move. Then we configure the platforms around that flow and train the team on a version of the system they recognise.',
                    'cta_text' => 'Review your Salesforce or ERPNext setup',
                ],
                'audit' => [
                    'eyebrow' => 'Find where the system stalls',
                    'heading' => 'The five places enterprise systems lose trust.',
                    'body' => 'We inspect data, workflows, integrations and adoption before recommending another expensive change.',
                    'items' => [
                        ['title' => 'Dirty data', 'description' => 'Duplicates, missing fields and conflicting records make reports unusable.'],
                        ['title' => 'Duplicate records', 'description' => 'The same customer or order exists in multiple places.'],
                        ['title' => 'Custom code debt', 'description' => 'Old changes block upgrades and create silent failures.'],
                        ['title' => 'Low adoption', 'description' => 'Teams work around the system because it does not match their job.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we handle',
                    'heading' => 'Implementation, integration and the work after go-live.',
                    'body' => 'A practical partner for the whole lifecycle, not just the launch date.',
                    'items' => [
                        ['icon' => 'fa-brands fa-salesforce', 'title' => 'Salesforce implementation', 'description' => 'Objects, flows, permissions and reports shaped around sales.'],
                        ['icon' => 'fa-solid fa-industry', 'title' => 'ERPNext setup', 'description' => 'Core operations configured for how your business actually runs.'],
                        ['icon' => 'fa-solid fa-plug', 'title' => 'Integration', 'description' => 'Reliable data movement between CRM and ERP.'],
                        ['icon' => 'fa-solid fa-right-left', 'title' => 'Migration', 'description' => 'Safe transfer of accounts, orders and history.'],
                        ['icon' => 'fa-solid fa-wand-magic-sparkles', 'title' => 'Automation', 'description' => 'Remove repetitive updates, approvals and handoffs.'],
                        ['icon' => 'fa-solid fa-headset', 'title' => 'Managed support', 'description' => 'Ongoing admin, fixes and improvements after launch.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A calmer implementation',
                    'heading' => 'Align, design, migrate, optimise.',
                    'body' => 'We sequence the risky work early and keep the business running throughout.',
                    'items' => [
                        ['title' => 'Align', 'description' => 'Agree the process, data ownership and success measures.'],
                        ['title' => 'Design', 'description' => 'Configure the system and integration architecture.'],
                        ['title' => 'Migrate', 'description' => 'Clean, validate and move data with rollback plans.'],
                        ['title' => 'Optimise', 'description' => 'Train users, monitor adoption and refine workflows.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Business-system outcomes',
                    'heading' => 'One version of the truth, visible to the right people.',
                    'body' => 'We report process speed, data quality and adoption, not just whether the deployment went live.',
                    'items' => [
                        ['value' => '40%', 'label' => 'Faster quote-to-cash cycle'],
                        ['value' => '92%', 'label' => 'Record accuracy after migration'],
                        ['value' => '3 wks', 'label' => 'Faster monthly reporting close'],
                        ['value' => '1', 'label' => 'Shared source of truth'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'Salesforce & ERPNext questions',
                    'heading' => 'CRM and ERP FAQs',
                    'body' => 'What to consider before another implementation project.',
                    'items' => [
                        ['title' => 'Can you fix an existing implementation?', 'description' => 'Yes. We audit the current setup, data and customisations, then prioritise the changes that restore trust.'],
                        ['title' => 'How do you keep the business running during migration?', 'description' => 'We migrate in stages, validate against the old data and keep a rollback path until the new process is proven.'],
                        ['title' => 'Do you train our team?', 'description' => 'Yes. Adoption is part of the delivery, with role-based training and practical documentation.'],
                        ['title' => 'Which system should own which data?', 'description' => 'We define ownership early so quotes, orders, stock and finance do not conflict across platforms.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Make the systems earn their licence fee',
                    'heading' => 'Get Salesforce and ERPNext working as one.',
                    'body' => 'Start with an audit of process, data and adoption. We will show you the highest-impact fixes first.',
                    'button_text' => 'Book a systems audit',
                ],
            ]),

            $this->buildPage([
                'slug' => 'saas-application',
                'name' => 'SaaS Application',
                'headline' => 'Launch. Scale. Retain. Repeat.',
                'intro' => 'SaaS products built to survive success.',
                'short' => 'SaaS product strategy, multi-tenant engineering, billing and reliability built for growth.',
                'description' => 'We help SaaS teams ship faster, onboard better and keep the platform stable as usage and customer expectations grow.',
                'meta_title' => 'SaaS Application Development | MVP to Scale',
                'meta_description' => 'Build and scale SaaS products with multi-tenant architecture, subscription billing, analytics and reliability built in.',
                'keywords' => 'SaaS development, multi-tenant applications, subscription billing, SaaS product engineering',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'SaaS product analytics and growth dashboard',
                'service_images' => [
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1533750516457-a7f992034fec?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '99.95%', 'label' => 'uptime target'],
                    ['value' => '18%', 'label' => 'trial-to-paid lift'],
                    ['value' => '3x', 'label' => 'faster onboarding'],
                ],
                'proof' => [
                    'heading' => 'A great demo is easy. A great SaaS business is engineered.',
                    'items' => [
                        ['value' => 'Multi-tenant ready', 'label' => 'Isolation, permissions and scale designed in'],
                        ['value' => 'Observable by default', 'label' => 'Know what is slow or failing before customers do'],
                        ['value' => 'Billing built in', 'label' => 'Plans, metering and lifecycle events connected'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Architecture for the next 10x',
                    'heading' => 'Reliability is a product feature.',
                    'body' => 'SaaS products break at the edges: noisy tenants, unclear limits, billing mismatches and support overload. We design for those edges.',
                    'items' => [
                        ['title' => 'Tenant isolation', 'description' => 'Data, permissions and usage boundaries that stay clean.'],
                        ['title' => 'Usage metering', 'description' => 'Events and limits tracked accurately for plans and billing.'],
                        ['title' => 'Billing & auth', 'description' => 'Subscriptions, trials and access tied to one reliable source.'],
                        ['title' => 'Observability', 'description' => 'Metrics, logs and alerts that explain product health.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Onboarding is the product',
                    'heading' => 'The fastest path to value wins the renewal.',
                    'body' => 'We design activation around the first meaningful outcome, not a tour of every feature. Then we instrument the journey so product decisions are based on evidence.',
                    'cta_text' => 'Plan your SaaS product',
                ],
                'audit' => [
                    'eyebrow' => 'What breaks when SaaS grows',
                    'heading' => 'Find the limits before customers do.',
                    'body' => 'We review architecture, onboarding, pricing and support signals to find the constraints that will slow growth.',
                    'items' => [
                        ['title' => 'Noisy tenants', 'description' => 'One customer consumes shared resources and affects everyone.'],
                        ['title' => 'Unclear packaging', 'description' => 'Plans and limits confuse buyers and create support work.'],
                        ['title' => 'Support overload', 'description' => 'Repeated questions reveal product gaps hidden by manual help.'],
                        ['title' => 'Fragile onboarding', 'description' => 'Users reach the dashboard but never reach the first win.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we build',
                    'heading' => 'From first release to dependable platform.',
                    'body' => 'A product team that can ship the MVP without creating a rewrite later.',
                    'items' => [
                        ['icon' => 'fa-solid fa-lightbulb', 'title' => 'Product strategy', 'description' => 'Positioning, pricing and the shortest path to value.'],
                        ['icon' => 'fa-solid fa-rocket', 'title' => 'MVP build', 'description' => 'A focused first release that proves the core workflow.'],
                        ['icon' => 'fa-solid fa-layer-group', 'title' => 'Multi-tenant architecture', 'description' => 'Isolation, permissions and scale designed for growth.'],
                        ['icon' => 'fa-solid fa-credit-card', 'title' => 'Billing & subscriptions', 'description' => 'Plans, trials, metering and payment lifecycle handling.'],
                        ['icon' => 'fa-solid fa-chart-line', 'title' => 'Product analytics', 'description' => 'Activation, retention and feature usage you can act on.'],
                        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Scale & reliability', 'description' => 'Hardening, monitoring and cost-aware infrastructure.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A SaaS delivery rhythm',
                    'heading' => 'Validate, architect, ship, harden.',
                    'body' => 'We move fast on the product while being deliberate about the foundations that are expensive to change later.',
                    'items' => [
                        ['title' => 'Validate', 'description' => 'Agree the core user, workflow and commercial model.'],
                        ['title' => 'Architect', 'description' => 'Design tenancy, billing and data boundaries.'],
                        ['title' => 'Ship', 'description' => 'Release the smallest valuable product with analytics.'],
                        ['title' => 'Harden', 'description' => 'Improve reliability, onboarding and retention.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'SaaS outcomes',
                    'heading' => 'Measure activation, reliability and retention.',
                    'body' => 'A SaaS product is a business system. We report the metrics that show it is becoming one.',
                    'items' => [
                        ['value' => '99.95%', 'label' => 'Uptime target'],
                        ['value' => '18%', 'label' => 'Trial-to-paid improvement'],
                        ['value' => '3x', 'label' => 'Faster time to first value'],
                        ['value' => '100%', 'label' => 'Billing events observable'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'SaaS questions',
                    'heading' => 'SaaS application FAQs',
                    'body' => 'What founders and product teams ask before building.',
                    'items' => [
                        ['title' => 'Can you build just the MVP?', 'description' => 'Yes. We scope a focused release that proves the core workflow while leaving room for a clean next phase.'],
                        ['title' => 'How do you handle multi-tenancy?', 'description' => 'We choose the model based on security, cost and reporting needs, then enforce isolation through architecture and tests.'],
                        ['title' => 'Can you integrate billing?', 'description' => 'Yes. We work with common subscription platforms and connect plans, trials, metering and access control.'],
                        ['title' => 'What about security and compliance?', 'description' => 'We build practical controls around access, auditability and data handling, and can prepare for formal reviews.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Build a product that can scale',
                    'heading' => 'Ship the SaaS product without building a future rewrite.',
                    'body' => 'Bring the product idea or the growing platform. We will identify the next release that creates real customer value.',
                    'button_text' => 'Plan your SaaS build',
                ],
            ]),

            $this->buildPage([
                'slug' => 'api-development',
                'name' => 'API Development',
                'headline' => 'Connect. Secure. Scale. Repeat.',
                'intro' => 'APIs that connect systems without the chaos.',
                'short' => 'Reliable API design and development for integrations, products and partner ecosystems.',
                'description' => 'API strategy, contract design, secure implementation, documentation and monitoring for systems that need to talk.',
                'meta_title' => 'API Development Services | Secure, Documented APIs',
                'meta_description' => 'Build reliable REST and GraphQL APIs with clear contracts, security, documentation and monitoring for partners and internal teams.',
                'keywords' => 'API development, REST APIs, GraphQL, API integration, API security',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'API development code on a screen',
                'service_images' => [
                    'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1516259762381-22954d7d3ad2?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '99.99%', 'label' => 'successful requests'],
                    ['value' => '-70%', 'label' => 'integration time'],
                    ['value' => '<200ms', 'label' => 'p95 response target'],
                ],
                'proof' => [
                    'heading' => 'An API is a product. Treat it like one.',
                    'items' => [
                        ['value' => 'Contract-first', 'label' => 'Clear expectations before code is written'],
                        ['value' => 'Secure by default', 'label' => 'Auth, validation and rate limits designed in'],
                        ['value' => 'Partner-friendly', 'label' => 'Documentation and errors humans can understand'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Built for real integration',
                    'heading' => 'Stable contracts, observable behaviour.',
                    'body' => 'An integration fails when nobody can tell what changed, why it broke, or who is calling it. We make those answers obvious.',
                    'items' => [
                        ['title' => 'Versioning', 'description' => 'A deprecation path that does not break existing consumers.'],
                        ['title' => 'Rate limiting', 'description' => 'Fair usage and protection against accidental overload.'],
                        ['title' => 'Observability', 'description' => 'Logs, traces and alerts around latency and failures.'],
                        ['title' => 'Documentation', 'description' => 'Examples, schemas and errors written for developers.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Connections that stay connected',
                    'heading' => 'Every integration is a promise. We help you keep it.',
                    'body' => 'Good APIs reduce coordination cost. We design around the consumers first, then build a contract that internal teams and partners can rely on without guesswork.',
                    'cta_text' => 'Design a better API',
                ],
                'audit' => [
                    'eyebrow' => 'Where integrations rot',
                    'heading' => 'Find the API problems before they page you at midnight.',
                    'body' => 'We review the contract, security and operational behaviour of existing APIs and integrations.',
                    'items' => [
                        ['title' => 'Undocumented endpoints', 'description' => 'Consumers guess behaviour and break in production.'],
                        ['title' => 'Breaking changes', 'description' => 'Updates ship without versioning or a migration path.'],
                        ['title' => 'Inconsistent errors', 'description' => 'Failures are hard to diagnose and impossible to automate.'],
                        ['title' => 'Invisible failures', 'description' => 'Nobody knows an integration is down until a customer reports it.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we deliver',
                    'heading' => 'From first contract to production monitoring.',
                    'body' => 'Build a new API or make an existing integration dependable.',
                    'items' => [
                        ['icon' => 'fa-solid fa-compass-drafting', 'title' => 'API strategy', 'description' => 'Consumers, contracts and success criteria defined first.'],
                        ['icon' => 'fa-solid fa-code', 'title' => 'REST & GraphQL', 'description' => 'The right interface for the product and partner needs.'],
                        ['icon' => 'fa-solid fa-plug', 'title' => 'Third-party integrations', 'description' => 'Connect payment, CRM, data and operational systems.'],
                        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Auth & security', 'description' => 'Tokens, scopes, validation and abuse protection.'],
                        ['icon' => 'fa-solid fa-book', 'title' => 'Developer docs', 'description' => 'Examples and sandbox guidance that reduce support.'],
                        ['icon' => 'fa-solid fa-chart-line', 'title' => 'Monitoring', 'description' => 'Latency, errors and usage reported in one place.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A contract-first process',
                    'heading' => 'Define, design, deliver, monitor.',
                    'body' => 'We agree what consumers need before implementation, so integration work is predictable.',
                    'items' => [
                        ['title' => 'Define', 'description' => 'Map consumers, use cases and data ownership.'],
                        ['title' => 'Design', 'description' => 'Agree the contract, auth model and error behaviour.'],
                        ['title' => 'Deliver', 'description' => 'Build, test and document against real consumer scenarios.'],
                        ['title' => 'Monitor', 'description' => 'Track usage, latency and failures after release.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Integration outcomes',
                    'heading' => 'Fewer broken handoffs. Faster partner onboarding.',
                    'body' => 'We measure the API as an operational system, not just a code deliverable.',
                    'items' => [
                        ['value' => '99.99%', 'label' => 'Successful request target'],
                        ['value' => '-70%', 'label' => 'Time to onboard a new consumer'],
                        ['value' => '100%', 'label' => 'Endpoints documented'],
                        ['value' => '<200ms', 'label' => 'Target p95 response time'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'API questions',
                    'heading' => 'API development FAQs',
                    'body' => 'What to settle before exposing or consuming an API.',
                    'items' => [
                        ['title' => 'Should we use REST or GraphQL?', 'description' => 'It depends on consumers and query patterns. We recommend based on usage, caching and team familiarity.'],
                        ['title' => 'How do you protect an API?', 'description' => 'Authentication, authorisation, input validation, rate limits and monitoring are designed together.'],
                        ['title' => 'Can you document an existing API?', 'description' => 'Yes. We can map current behaviour, add schemas and examples, and highlight inconsistencies for fixes.'],
                        ['title' => 'How do you handle versioning?', 'description' => 'We agree a versioning policy and deprecation path before breaking changes are needed.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Make integrations dependable',
                    'heading' => 'Build an API your team and partners can trust.',
                    'body' => 'Bring the integration problem or the existing contract. We will map the cleanest path forward.',
                    'button_text' => 'Discuss your API',
                ],
            ]),

            $this->buildPage([
                'slug' => 'software-development',
                'name' => 'Software Development',
                'headline' => 'Plan. Build. Ship. Maintain.',
                'intro' => 'Custom software without the custom chaos.',
                'short' => 'Custom software delivery with clear scope, testing, DevOps and documentation built in.',
                'description' => 'Technical discovery, architecture, product engineering, QA and ongoing maintenance for teams that need software to last.',
                'meta_title' => 'Software Development Services | Custom Software Delivery',
                'meta_description' => 'Deliver custom software with clear scope, senior engineering, automated testing and documentation that supports the long term.',
                'keywords' => 'software development, custom software, product engineering, DevOps, QA automation',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Software development team planning a release',
                'service_images' => [
                    'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1516259762381-22954d7d3ad2?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '94%', 'label' => 'on-time releases'],
                    ['value' => '2.4x', 'label' => 'faster feedback'],
                    ['value' => '-65%', 'label' => 'production bugs'],
                ],
                'proof' => [
                    'heading' => 'Delivery discipline is a competitive advantage.',
                    'items' => [
                        ['value' => 'Senior-led', 'label' => 'Experienced engineers in the important decisions'],
                        ['value' => 'Predictable delivery', 'label' => 'Milestones, demos and no silent surprises'],
                        ['value' => 'Maintainable code', 'label' => 'Tests, docs and handover from the start'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Engineering that stays healthy',
                    'heading' => 'Code you can change without fear.',
                    'body' => 'We build with the maintenance phase in mind, because that is where most software cost lives.',
                    'items' => [
                        ['title' => 'Test coverage', 'description' => 'Automated checks around the workflows that must not break.'],
                        ['title' => 'CI/CD', 'description' => 'Repeatable releases with safe rollback paths.'],
                        ['title' => 'Security reviews', 'description' => 'Dependencies, access and data handling reviewed regularly.'],
                        ['title' => 'Clear handoffs', 'description' => 'Documentation and walkthroughs your team can use.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Own the gaps',
                    'heading' => 'Software projects fail in the gaps: scope, decisions and handoffs.',
                    'body' => 'We make the important decisions visible, agree what is in and out, and leave behind documentation that lets someone else continue without archaeology.',
                    'cta_text' => 'Plan a software delivery',
                ],
                'audit' => [
                    'eyebrow' => 'Where delivery slips',
                    'heading' => 'Find the causes before adding more engineers.',
                    'body' => 'We review code, process and release history to see where delivery is really getting stuck.',
                    'items' => [
                        ['title' => 'Scope creep', 'description' => 'Priorities change without trade-offs, so dates lose meaning.'],
                        ['title' => 'Fragile code', 'description' => 'Small changes create large, unpredictable failures.'],
                        ['title' => 'Manual releases', 'description' => 'Deployments depend on one person and a long checklist.'],
                        ['title' => 'Knowledge silos', 'description' => 'Only one engineer understands the critical system.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we deliver',
                    'heading' => 'A delivery team for the whole lifecycle.',
                    'body' => 'Start with discovery or bring us into an existing product.',
                    'items' => [
                        ['icon' => 'fa-solid fa-magnifying-glass', 'title' => 'Technical discovery', 'description' => 'Scope, risks and architecture before the build.'],
                        ['icon' => 'fa-solid fa-drafting-compass', 'title' => 'Architecture', 'description' => 'Systems designed for the next phase, not just today.'],
                        ['icon' => 'fa-solid fa-code', 'title' => 'Product engineering', 'description' => 'Senior developers shipping working software weekly.'],
                        ['icon' => 'fa-solid fa-vial', 'title' => 'QA automation', 'description' => 'Regression protection around critical workflows.'],
                        ['icon' => 'fa-solid fa-gears', 'title' => 'DevOps', 'description' => 'CI/CD, environments and monitoring built in.'],
                        ['icon' => 'fa-solid fa-screwdriver-wrench', 'title' => 'Maintenance', 'description' => 'Ongoing fixes and improvements after launch.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A delivery rhythm you can see',
                    'heading' => 'Scope, sprint, review, release.',
                    'body' => 'Short feedback loops make progress visible and decisions reversible.',
                    'items' => [
                        ['title' => 'Scope', 'description' => 'Agree the outcome, constraints and first milestone.'],
                        ['title' => 'Sprint', 'description' => 'Build in visible increments with weekly demos.'],
                        ['title' => 'Review', 'description' => 'Test quality, security and readiness together.'],
                        ['title' => 'Release', 'description' => 'Deploy, monitor and plan the next improvement.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Delivery outcomes',
                    'heading' => 'Predictable releases. Fewer emergencies.',
                    'body' => 'We create evidence around delivery speed, quality and operational stability.',
                    'items' => [
                        ['value' => '94%', 'label' => 'Releases delivered on agreed date'],
                        ['value' => '2.4x', 'label' => 'Faster feedback cycle for teams'],
                        ['value' => '-65%', 'label' => 'Reduction in production bugs'],
                        ['value' => '100%', 'label' => 'Critical systems documented'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'Software delivery questions',
                    'heading' => 'Software development FAQs',
                    'body' => 'What teams ask before starting or rescuing a build.',
                    'items' => [
                        ['title' => 'Can you take over an existing codebase?', 'description' => 'Yes. We start with a technical review, stabilise the riskiest areas, then agree an improvement plan.'],
                        ['title' => 'How do you keep scope under control?', 'description' => 'We make trade-offs explicit, work in small milestones and review priorities before each phase.'],
                        ['title' => 'Do we get documentation?', 'description' => 'Yes. Architecture decisions, setup, deployment and key workflows are documented as part of delivery.'],
                        ['title' => 'What happens after launch?', 'description' => 'We can support monitoring and iteration, or hand over cleanly to your internal team.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Get the delivery back on track',
                    'heading' => 'Build software with fewer surprises.',
                    'body' => 'Start with a discovery or code review. We will show you the risks and the shortest path to a stable release.',
                    'button_text' => 'Talk about software delivery',
                ],
            ]),

            $this->buildPage([
                'slug' => 'whatsapp-integration',
                'name' => 'WhatsApp Integration',
                'headline' => 'Chat. Automate. Convert. Repeat.',
                'intro' => 'WhatsApp flows that turn conversations into revenue.',
                'short' => 'WhatsApp Business API integration, automation, CRM connection and compliant campaign journeys.',
                'description' => 'We help teams use WhatsApp for support, sales and retention without losing the human tone customers expect.',
                'meta_title' => 'WhatsApp Integration Services | Business API & Automation',
                'meta_description' => 'Connect WhatsApp to your CRM, automate useful conversations and run compliant campaign journeys that customers actually welcome.',
                'keywords' => 'WhatsApp integration, WhatsApp Business API, chat automation, WhatsApp CRM, conversational commerce',
                'image' => 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'WhatsApp business messaging on a phone',
                'service_images' => [
                    'https://images.unsplash.com/photo-1611926653458-09294b3142bf?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1611606063065-ee7946f0787a?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1633265486064-086b219458ec?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1618477388954-7852f32655ec?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=900&q=80',
                ],
                'audit_images' => [
                    'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80',
                ],
                'metrics' => [
                    ['value' => '82%', 'label' => 'average open rate'],
                    ['value' => '-45%', 'label' => 'response time'],
                    ['value' => '3.4x', 'label' => 'reorder rate'],
                ],
                'proof' => [
                    'heading' => 'Conversations, not another notification channel.',
                    'items' => [
                        ['value' => 'Conversation-first', 'label' => 'Messages designed for a useful reply'],
                        ['value' => 'Template compliant', 'label' => 'Approval and opt-in handled properly'],
                        ['value' => 'CRM-connected', 'label' => 'Every conversation attached to the customer'],
                    ],
                ],
                'technical' => [
                    'eyebrow' => 'Built for trust and compliance',
                    'heading' => 'The infrastructure behind a simple message.',
                    'body' => 'WhatsApp rewards relevance and punishes spam. We set up the plumbing so the right message reaches the right person with a clean audit trail.',
                    'items' => [
                        ['title' => 'Cloud API setup', 'description' => 'Business profile, numbers and messaging infrastructure configured.'],
                        ['title' => 'Template approval', 'description' => 'Message templates written and managed through approval.'],
                        ['title' => 'Webhooks', 'description' => 'Real-time events connected to your CRM and support tools.'],
                        ['title' => 'Handoff & analytics', 'description' => 'Human takeover and outcome tracking where it matters.'],
                    ],
                ],
                'story' => [
                    'eyebrow' => 'Meet customers where they already are',
                    'heading' => 'Customers do not want another app. They want an answer where they already chat.',
                    'body' => 'We design journeys around real moments: order updates, support questions, reorder reminders and high-intent conversations. Automation handles the routine; people handle the nuance.',
                    'cta_text' => 'Plan your WhatsApp journeys',
                ],
                'audit' => [
                    'eyebrow' => 'Why WhatsApp projects stall',
                    'heading' => 'The four reasons messaging programs fail.',
                    'body' => 'We review consent, templates, ownership and data flow before sending a single campaign.',
                    'items' => [
                        ['title' => 'No opt-in', 'description' => 'Contacts are imported without permission and quality drops.'],
                        ['title' => 'Messy handoffs', 'description' => 'Bots and humans cannot tell who owns the conversation.'],
                        ['title' => 'Generic templates', 'description' => 'Every customer gets the same message at the wrong moment.'],
                        ['title' => 'No attribution', 'description' => 'The team cannot connect conversations to revenue.'],
                    ],
                ],
                'services' => [
                    'eyebrow' => 'What we build',
                    'heading' => 'From API setup to always-on conversations.',
                    'body' => 'A complete messaging program, or the integration your CRM is missing.',
                    'items' => [
                        ['icon' => 'fa-brands fa-whatsapp', 'title' => 'API setup', 'description' => 'Business profile, number and Cloud API configuration.'],
                        ['icon' => 'fa-solid fa-route', 'title' => 'Journey design', 'description' => 'Opt-in, welcome, support and reorder flows that fit.'],
                        ['icon' => 'fa-solid fa-robot', 'title' => 'Chatbots & agents', 'description' => 'Automation for routine questions with human handoff.'],
                        ['icon' => 'fa-solid fa-bag-shopping', 'title' => 'Commerce flows', 'description' => 'Catalog, order updates and reorder journeys.'],
                        ['icon' => 'fa-solid fa-plug', 'title' => 'CRM integration', 'description' => 'Conversations connected to support, sales and data.'],
                        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Compliance & reporting', 'description' => 'Opt-in, template quality and outcome reporting.'],
                    ],
                ],
                'process' => [
                    'eyebrow' => 'A compliant launch rhythm',
                    'heading' => 'Audit, design, launch, optimise.',
                    'body' => 'We protect your number quality while proving the channel works.',
                    'items' => [
                        ['title' => 'Audit', 'description' => 'Review consent, current conversations and tooling.'],
                        ['title' => 'Design', 'description' => 'Map journeys, templates and human handoff points.'],
                        ['title' => 'Launch', 'description' => 'Connect the API, test templates and start small.'],
                        ['title' => 'Optimise', 'description' => 'Measure replies, resolution and revenue per journey.'],
                    ],
                ],
                'results' => [
                    'eyebrow' => 'Conversation outcomes',
                    'heading' => 'Measure replies, resolution and revenue.',
                    'body' => 'We track the channel as a business system, not just a message log.',
                    'items' => [
                        ['value' => '82%', 'label' => 'Average message open rate'],
                        ['value' => '-45%', 'label' => 'Reduction in response time'],
                        ['value' => '3.4x', 'label' => 'Lift in reorder conversations'],
                        ['value' => '100%', 'label' => 'Opt-in compliance tracked'],
                    ],
                ],
                'faq' => [
                    'eyebrow' => 'WhatsApp questions',
                    'heading' => 'WhatsApp integration FAQs',
                    'body' => 'What to settle before launching a business messaging channel.',
                    'items' => [
                        ['title' => 'Do we need the WhatsApp Business API?', 'description' => 'For automation, multiple agents and CRM integration, yes. We confirm the right setup based on volume and use case.'],
                        ['title' => 'How do you handle consent?', 'description' => 'Opt-in is designed into every entry point, and templates are matched to the relationship and message purpose.'],
                        ['title' => 'Can it work with our CRM?', 'description' => 'Yes. We connect conversations, contact records and outcomes where the tools expose the right APIs.'],
                        ['title' => 'Will customers feel spammed?', 'description' => 'Only if the messaging is irrelevant. We focus on useful triggers, clear value and an easy way to opt out.'],
                    ],
                ],
                'cta' => [
                    'eyebrow' => 'Start a useful conversation',
                    'heading' => 'Make WhatsApp a channel customers value.',
                    'body' => 'Start with an audit of consent, journeys and the systems that need to connect.',
                    'button_text' => 'Plan your WhatsApp integration',
                ],
            ]),
        ];
    }

    private function buildPage(array $page): array
    {
        $pageTitle = str_ends_with($page['name'], 'Services') ? $page['name'] : $page['name'] . ' Services';

        $attributes = [
            'page_section' => 'services',
            'slug' => $page['slug'],
            'title' => $pageTitle,
            'short_description' => $page['short'],
            'description' => $page['description'],
            'meta_title' => $page['meta_title'],
            'meta_description' => $page['meta_description'],
            'meta_keywords' => $page['keywords'],
            'og_image' => $page['image'],
        ];

        $audit = $page['audit'];
        foreach ($audit['items'] as $index => &$item) {
            if (!empty($page['audit_images'][$index] ?? null)) {
                $item['image'] = $page['audit_images'][$index];
            }
        }
        unset($item);

        $services = $page['services'];
        foreach ($services['items'] as $index => &$item) {
            if (!empty($page['service_images'][$index] ?? null)) {
                $item['image'] = $page['service_images'][$index];
            }
        }
        unset($item);

        $sections = [
            ['seo_hero', [
                'eyebrow' => strtoupper($page['name']),
                'heading' => $page['headline'],
                'body' => $page['intro'],
                'hero_image' => $page['image'],
                'hero_image_alt' => $page['image_alt'],
                'button_text' => 'Plan your project',
                'button_link' => '/contact#contact',
                'items' => $page['metrics'],
            ]],
            ['seo_proof', $page['proof']],
            ['seo_technical', $page['technical']],
            ['image_text', array_merge($page['story'], [
                'image' => $page['image'],
                'image_alt' => $page['image_alt'],
                'image_position' => 'right',
                'cta_link' => '/contact#contact',
            ])],
            ['seo_audit', $audit],
            ['seo_services', $services],
            ['seo_process', $page['process']],
            ['seo_results', $page['results']],
            ['seo_faq', $page['faq']],
            ['seo_cta', array_merge($page['cta'], [
                'button_link' => '/contact#contact',
            ])],
        ];

        return [$attributes, $sections];
    }
}
