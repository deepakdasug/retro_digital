<?php

namespace Database\Seeders;

use App\Models\TechDevelopment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechDevelopmentSeeder extends Seeder
{
    /**
     * Seed the eight service pages from tech_development_extracted_content.txt.
     * Section content is structured JSON so one Blade template can render each type.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Web Development', 'slug' => 'web-development',
                'short_description' => 'Responsive, user-friendly and SEO-optimized websites built for performance and growth.',
                'description' => 'Retrotech provides cutting-edge Web Development services that combine creativity, functionality, and performance. We design and develop responsive, user-friendly, and SEO-optimized websites that help businesses establish a strong online presence. Our expert developers focus on speed, security, and scalability—ensuring your website not only looks great but also delivers measurable results that drive business growth.',
                'hero_title' => 'Innovative & High-Performance Web Development Solutions',
                'hero_description' => 'Responsive, secure and search-friendly websites designed around your brand, customers and business goals.',
                'meta_title' => 'Web Development Services | Retrotech Digital',
                'meta_description' => 'Build responsive, SEO-optimized websites, e-commerce stores and CMS platforms with Retrotech Digital.',
                'differentiator' => 'Focuses on browser-based digital presence, mobile-first responsive interfaces, search engine indexing (SEO), web accessibility, and high-conversion client touchpoints accessible via standard URLs across all devices.',
                'capabilities' => [
                    ['title'=>'Custom Design','description'=>'Tailor-made websites that reflect your unique brand identity.','impact'=>'Enhances user experience, strengthens brand image, and improves engagement across all devices.'],
                    ['title'=>'Responsive Development','description'=>'Websites optimized for mobile, tablet, and desktop performance.','impact'=>'Expands reach, improves accessibility, and boosts user satisfaction and conversions.'],
                    ['title'=>'E-Commerce & CMS Platforms','description'=>'Custom online stores and content management setups, including Shopify, WordPress, and custom headless stores.','impact'=>'Simplifies product updates, inventory management, and secures high-speed checkout flows.'],
                    ['title'=>'Speed & SEO Optimization','description'=>'Semantic HTML, clean code, Core Web Vitals optimization, and fast server responses.','impact'=>'Supports search visibility, lowers bounce rates, and accelerates organic customer acquisition.'],
                ],
            ],
            [
                'name' => 'Mobile App Development', 'slug' => 'mobile-app-development',
                'short_description' => 'Feature-rich iOS, Android and cross-platform applications with intuitive experiences.',
                'description' => 'Retrotech offers innovative Mobile App Development services to help businesses go digital and connect with customers effortlessly. We build feature-rich, scalable, and intuitive mobile applications that combine modern design with powerful functionality. Whether Android, iOS, or hybrid platforms, our expert team ensures your app delivers seamless performance, strong security, and outstanding user engagement.',
                'hero_title' => 'Innovative & Scalable Mobile App Development Solutions',
                'hero_description' => 'Build intuitive mobile experiences for iOS and Android with secure, scalable and reliable functionality.',
                'meta_title' => 'Mobile App Development Services | Retrotech Digital',
                'meta_description' => 'Develop secure native iOS, Android, Flutter and React Native applications with Retrotech Digital.',
                'differentiator' => 'Specifically engineered for handheld mobile hardware (iOS and Android), taking advantage of native device features like biometric authentication, push notifications, offline caching, GPS location services, and camera integration distributed via Apple App Store and Google Play Store.',
                'capabilities' => [
                    ['title'=>'User-Centric Design','description'=>'Intuitive navigation, tactile micro-animations, and attractive interfaces.','impact'=>'Enhances usability, increases session retention, and delivers an engaging app experience.'],
                    ['title'=>'Scalable Architecture','description'=>'Architecture designed to grow with business needs, user base, and traffic.','impact'=>'Supports expansion, improves stability, and can reduce long-term refactoring costs.'],
                    ['title'=>'Native iOS & Android Engineering','description'=>'Purpose-built Swift for iOS and Kotlin for Android.','impact'=>'Unlocks device capabilities and supports platform-specific performance and store guidelines.'],
                    ['title'=>'Cross-Platform Flutter & React Native','description'=>'A shared codebase that can deploy to both major app marketplaces.','impact'=>'Can reduce development effort and time to market while maintaining a near-native experience.'],
                ],
            ],
            [
                'name' => 'Custom Application', 'slug' => 'custom-application',
                'short_description' => 'Tailor-made business applications aligned with proprietary workflows and operational requirements.',
                'description' => 'At Retrotech, we specialize in building powerful, tailor-made software solutions that align with your business objectives. Our Custom Application Development services are designed to streamline your operations, enhance productivity, and drive digital transformation. Whether web-based, enterprise-grade, or cloud-powered applications, we craft solutions that are reliable, secure, and future-ready.',
                'hero_title' => 'Custom Application Development Tailored to Your Business Needs',
                'hero_description' => 'Purpose-built applications that fit your business processes, security requirements and long-term goals.',
                'meta_title' => 'Custom Application Development | Retrotech Digital',
                'meta_description' => 'Create secure, workflow-focused custom business applications with Retrotech Digital.',
                'differentiator' => 'Unlike off-the-shelf software with rigid subscription fees and unwanted features, custom applications are built around proprietary business workflows, internal compliance requirements, role-based security policies, and specialized operating protocols.',
                'capabilities' => [
                    ['title'=>'Tailor-Made Solutions','description'=>'Applications crafted to fit exact business processes and goals.','impact'=>'Eliminates unnecessary features and aligns the application with team workflows.'],
                    ['title'=>'Robust Security Framework','description'=>'Encryption, granular role-based permissions, and robust authentication.','impact'=>'Helps safeguard confidential business information and support compliance requirements.'],
                    ['title'=>'Enterprise Workflow Automation','description'=>'Connect internal departments through unified approval chains and task queues.','impact'=>'Reduces manual errors and processing delays while improving operational oversight.'],
                    ['title'=>'Legacy System Modernization','description'=>'Upgrade legacy desktop and database applications to modern, cloud-accessible architectures.','impact'=>'Preserves mission-critical historical data while providing a modern interface.'],
                ],
            ],
            [
                'name' => 'Salesforce & ERPNext Services', 'slug' => 'crm-development',
                'short_description' => 'CRM and ERP solutions that connect customer relationships, sales, finance and operations.',
                'description' => 'Retrotech delivers powerful and customizable CRM and ERP solutions designed to strengthen customer relationships, streamline sales, and boost business productivity. Our CRM systems are built to automate workflows, track performance, and provide real-time insights—enabling your team to make smarter, data-driven decisions.',
                'hero_title' => 'Intelligent & Scalable CRM & ERPNext Development Solutions',
                'hero_description' => 'Connect customer management, sales automation and business operations with Salesforce and ERPNext solutions.',
                'meta_title' => 'Salesforce & ERPNext Services | Retrotech Digital',
                'meta_description' => 'Customize Salesforce CRM and implement ERPNext workflows with Retrotech Digital.',
                'differentiator' => 'Focuses on the revenue and operational heart of an enterprise: leads, opportunities, client interactions, contracts, accounting, inventory, and cross-departmental operations using Salesforce, ERPNext/Frappe, and bespoke CRM architectures.',
                'capabilities' => [
                    ['title'=>'Centralized Customer Management','description'=>'Manage customer contact history, proposals, and logs from one secure dashboard.','impact'=>'Improves communication and customer experience while helping prevent duplicate data.'],
                    ['title'=>'Sales & Marketing Automation','description'=>'Automate lead tracking, quotation follow-ups, and email or WhatsApp campaigns.','impact'=>'Reduces repetitive sales work and supports consistent follow-up.'],
                    ['title'=>'Salesforce Customization & Apex','description'=>'Customize Sales Cloud, Service Cloud, custom objects, Apex triggers, and Lightning web components.','impact'=>"Adapts Salesforce capabilities to your organization's workflows."],
                    ['title'=>'ERPNext & Frappe Implementation','description'=>'Implement accounting, payroll, procurement, manufacturing, and inventory workflows.','impact'=>'Connects key business operations through a modular ERP platform.'],
                ],
            ],
            [
                'name' => 'SaaS Application', 'slug' => 'saas-application',
                'short_description' => 'Cloud-based software platforms with tenant management, subscription billing and analytics.',
                'description' => 'Retrotech specializes in SaaS Application Development that helps businesses deliver powerful, scalable, and user-friendly cloud-based solutions. We design and build secure SaaS platforms that streamline operations, improve collaboration, and support recurring revenue. Our team focuses on performance, flexibility, and seamless integration to help businesses innovate and grow.',
                'hero_title' => 'Scalable & Secure SaaS Application Development',
                'hero_description' => 'Launch cloud software with scalable architecture, subscription management and tenant-level administration.',
                'meta_title' => 'SaaS Application Development | Retrotech Digital',
                'meta_description' => 'Build scalable SaaS platforms with cloud hosting, subscription billing and tenant management.',
                'differentiator' => 'Designed for product businesses and software creators selling access through recurring subscriptions, with multi-tenant data isolation, automated onboarding, subscription tiers, usage metering, and cloud infrastructure.',
                'capabilities' => [
                    ['title'=>'Scalable Multi-Tenant Architecture','description'=>'Separate customer data while sharing infrastructure efficiently.','impact'=>'Supports growth and helps manage infrastructure costs.'],
                    ['title'=>'Cloud Hosting & DevOps Automation','description'=>'Cloud deployment using containerization and automated scaling where appropriate.','impact'=>'Supports availability, backups, monitoring, and controlled releases.'],
                    ['title'=>'Subscription Billing & Tier Management','description'=>'Subscription flows for recurring invoices, payment methods, trials, and plan changes.','impact'=>'Automates billing tasks and enables self-service subscription management.'],
                    ['title'=>'Analytics & Tenant Administration','description'=>'Administrative dashboards for recurring revenue, churn, active users, and feature controls.','impact'=>'Gives product teams visibility into adoption, platform health, and revenue.'],
                ],
            ],
            [
                'name' => 'API Development', 'slug' => 'api-development',
                'short_description' => 'Secure, high-performance APIs connecting applications, platforms and third-party systems.',
                'description' => 'Retrotech delivers robust API Development services that enable seamless connectivity between applications, platforms, and systems. We design secure, high-performance APIs that enhance functionality, streamline data exchange, and improve software scalability. Our team ensures smooth integration, optimized performance, and reliable communication—helping businesses build connected digital ecosystems.',
                'hero_title' => 'Secure & High-Performance API Development & Integration',
                'hero_description' => 'Connect web apps, mobile apps, CRM systems, payment gateways and partners through reliable APIs.',
                'meta_title' => 'API Development & Integration | Retrotech Digital',
                'meta_description' => 'Build secure REST, GraphQL and gRPC APIs and integrate third-party services with Retrotech Digital.',
                'differentiator' => 'Focuses on headless backend communication and machine-to-machine data exchange. APIs provide secure data pathways for web apps, mobile apps, CRM systems, payment gateways, and third-party partners.',
                'capabilities' => [
                    ['title'=>'Custom API Design','description'=>'RESTful, GraphQL, and gRPC endpoints tailored to business logic.','impact'=>'Improves system flexibility and standardizes data exchange across platforms.'],
                    ['title'=>'Secure Integration & Authentication','description'=>'OAuth 2.0, API key management, JWT tokens, rate limiting, and payload encryption as appropriate.','impact'=>'Helps protect sensitive data and control unauthorized or abusive access.'],
                    ['title'=>'Third-Party Connector Integrations','description'=>'Integrate payment gateways such as Stripe or Razorpay, logistics trackers, SMS providers, and external APIs.','impact'=>'Adds established external capabilities without building every integration from scratch.'],
                    ['title'=>'OpenAPI / Swagger Documentation','description'=>'Interactive API documentation, mock servers, and explicit endpoint specifications.','impact'=>'Helps frontend teams and external developers integrate consistently.'],
                ],
            ],
            [
                'name' => 'Software Development', 'slug' => 'software-development',
                'short_description' => 'Custom software engineering spanning architecture, development, testing, deployment and support.',
                'description' => 'Retrotech provides comprehensive Software Development services that turn ideas into powerful digital solutions. We specialize in building custom, secure, and scalable software tailored to diverse business needs. From planning to deployment, our developers use modern technologies to deliver functionality, performance, and long-term value.',
                'hero_title' => 'Custom & Scalable Software Development Solutions',
                'hero_description' => 'Turn business ideas into secure, maintainable software with full-lifecycle engineering and support.',
                'meta_title' => 'Software Development Services | Retrotech Digital',
                'meta_description' => 'Plan, build, test and maintain custom scalable software with Retrotech Digital.',
                'differentiator' => 'Covers the full lifecycle of engineering: architecture consulting, technical feasibility, UI/UX prototyping, full-stack programming, automated QA, production deployment, and ongoing service-level maintenance across digital platforms.',
                'capabilities' => [
                    ['title'=>'Custom Software Solutions','description'=>'Software tailored to operational goals, data models, and team workflows.','impact'=>'Improves productivity and addresses systemic inefficiencies.'],
                    ['title'=>'Advanced Technology Stack','description'=>'Modern frameworks and maintainable architectures, including microservices when suitable.','impact'=>'Supports reliability, scaling, and adaptation as requirements change.'],
                    ['title'=>'Agile Sprint Delivery Lifecycle','description'=>'Planned sprints, staging builds, progress demonstrations, and continuous feedback.','impact'=>'Makes progress visible and helps surface changes earlier.'],
                    ['title'=>'Dedicated QA & Post-Launch Support','description'=>'Automated unit tests, manual edge-case testing, security scans, and monitoring.','impact'=>'Helps maintain software quality and resolve issues throughout the product lifecycle.'],
                ],
            ],
            [
                'name' => 'WhatsApp Integration', 'slug' => 'whatsapp-integration',
                'short_description' => 'WhatsApp Business API integration for customer support, notifications and opted-in messaging.',
                'description' => 'Retrotech connects WhatsApp with business systems through official WhatsApp Business Cloud API integrations. We implement conversational flows, order notifications, customer support connections, and enterprise messaging to help sales, support, and marketing teams manage customer interactions.',
                'hero_title' => 'Intelligent WhatsApp Business Integration & Automation',
                'hero_description' => 'Connect WhatsApp Business messaging with your website, CRM and backend workflows.',
                'meta_title' => 'WhatsApp Business Integration | Retrotech Digital',
                'meta_description' => 'Integrate WhatsApp Business Cloud API for support flows, notifications and customer messaging.',
                'differentiator' => 'Focuses on conversational commerce and customer communication over WhatsApp, connecting Meta’s official WhatsApp Business Cloud API with websites, CRM systems, and backends to automate notifications, lead qualification, and support.',
                'capabilities' => [
                    ['title'=>'Automated 24/7 Chatbots','description'=>'Conversational flows that answer common questions, qualify prospects, and route complex requests.','impact'=>'Can reduce wait times and help capture enquiries outside business hours.'],
                    ['title'=>'CRM & Website Webhook Sync','description'=>'Integrations with Salesforce, ERPNext, HubSpot, Shopify, or custom databases.','impact'=>'Keeps relevant conversation records connected to customer records and business events.'],
                    ['title'=>'Transactional Alerts & Notifications','description'=>'Automated invoices, OTPs, shipping updates, and appointment reminders.','impact'=>'Delivers useful, timely updates through a familiar messaging channel.'],
                    ['title'=>'Targeted Marketing Broadcasts','description'=>'Meta-approved message templates sent to opted-in audiences, with interactive replies where supported.','impact'=>'Supports permission-based campaigns and customer engagement.'],
                ],
            ],
        ];

        $process = [
            ['title'=>'Requirement Gathering & Analysis','description'=>'Understand project goals, target users, and technical constraints to define functional requirements and architecture specifications.'],
            ['title'=>'Planning & Architecture Design','description'=>'Map technical blueprints, database schemas, and user flows for reliable system interaction.'],
            ['title'=>'Wireframing & UI/UX Prototyping','description'=>'Create interactive mockups and design systems to visualize workflows and validate usability early.'],
            ['title'=>'Agile Sprint Development','description'=>'Translate approved designs into clean, modular code using suitable frameworks and secure integrations.'],
            ['title'=>'Rigorous QA & Security Testing','description'=>'Test responsiveness, load capacity, cross-browser compatibility, and security using appropriate automated and manual checks.'],
            ['title'=>'Deployment & Cloud Setup','description'=>'Deploy to the agreed production environment with appropriate SSL, monitoring, and release procedures.'],
            ['title'=>'Continuous Maintenance & Growth','description'=>'Provide maintenance, patches, performance monitoring, and iterative feature improvements.'],
        ];

        $reasons = [
            ['title'=>'Experienced IT Professionals','description'=>'Developers, designers, and technology specialists use established engineering practices and modern design standards.'],
            ['title'=>'Customised Business Solutions','description'=>'Solutions are tailored to business processes, customer needs, and operational goals.'],
            ['title'=>'On-Time Project Delivery','description'=>'Structured milestones and agile planning make delivery progress easier to track.'],
            ['title'=>'Transparent Communication','description'=>'Clear communication, sprint updates, demonstrations, and stakeholder feedback throughout delivery.'],
            ['title'=>'Scalable & Secure Technologies','description'=>'Architecture, development, and testing consider security and future growth.'],
            ['title'=>'Dedicated Post-Launch Support','description'=>'Maintenance, technical updates, performance monitoring, bug fixes, and support options after launch.'],
        ];

        $faqs = [
            ['question'=>'What IT services does Retrotech Digital provide?','answer'=>'Services include website development, iOS and Android apps, custom enterprise applications, Salesforce CRM and ERPNext, SaaS platforms, API integration, and WhatsApp Business automation.'],
            ['question'=>'Do you provide customized solutions for businesses?','answer'=>'Yes. Solutions can be tailored to business requirements, target audiences, workflows, security requirements, and scalability goals.'],
            ['question'=>'How long does it take to complete an IT project?','answer'=>'Timelines depend on scope, features, and complexity. The source content estimates 2–4 weeks for typical websites and 6–12 weeks for more complex applications, mobile apps, or CRM setups. A project-specific roadmap should confirm the actual schedule.'],
            ['question'=>'Do you provide support after the project is completed?','answer'=>'Yes. Support options can include maintenance, security patches, server monitoring, performance tuning, bug fixes, and feature enhancements under an agreed support package.'],
        ];

        DB::transaction(function () use ($services, $process, $reasons, $faqs): void {
            foreach ($services as $service) {
                $capabilities = $service['capabilities'];
                unset($service['capabilities']);
                $differentiator = $service['differentiator'];
                unset($service['differentiator']);

                $page = TechDevelopment::updateOrCreate(
                    ['slug' => $service['slug']],
                    array_merge($service, [
                        'hero_image' => 'assets/images/tech-development/' . $service['slug'] . '.jpg',
                        'is_published' => true
                    ])
                );

                // This seeder is the source of truth for these page sections.
                $page->sections()->delete();
                $sections = [
                    ['section_type'=>'differentiator','title'=>'How This Service Differentiates','description'=>$differentiator,'content'=>['text'=>$differentiator]],
                    ['section_type'=>'capabilities','title'=>'Key Capabilities & Value Pillars','description'=>'Capabilities selected for this service and the business value they support.','content'=>['items'=>$capabilities]],
                    ['section_type'=>'process','title'=>'Our Proven 7-Step Delivery Process','description'=>'A structured, transparent engineering process to deliver solutions against agreed scope and milestones.','content'=>['items'=>$process]],
                    ['section_type'=>'reasons','title'=>'Top Six Reasons to Trust Our IT Expertise','description'=>'Reliable, secure, and scalable technology solutions tailored to business goals.','content'=>['items'=>$reasons]],
                    ['section_type'=>'metrics','title'=>'Real Metrics from Successful Engagements','description'=>'The extracted source lists these headline figures; validate them internally before publishing as verified claims.','content'=>['items'=>[
                        ['value'=>'726+','label'=>'Digital Projects Shipped'],
                        ['value'=>'1,026+','label'=>'Optimized Workflows'],
                        ['value'=>'488%','label'=>'Average Client ROI Growth'],
                    ]]],
                    ['section_type'=>'faq','title'=>'Frequently Asked Questions','description'=>'Answers to common questions about planning a technology project.','content'=>['items'=>$faqs]],
                    ['section_type'=>'cta','title'=>'Ready to Build Your '.$page->name.' Solution?','description'=>'Connect with Retrotech Digital’s team to discuss your technical requirements and request a scoping consultation.','content'=>[
                        'phone'=>'+91 99108 36538',
                        'email'=>'info@retrotechdigital.com',
                        'website_label'=>'Official Website',
                        'office'=>'O-126, O-145, O-146 The Shopping Mall, Arjun Marg, DLF Phase 1, Gurugram, Haryana, India, 122002',
                    ]],
                ];

                foreach ($sections as $index => $section) {
                    $page->sections()->create([
                        'section_type' => $section['section_type'],
                        'title' => $section['title'],
                        'description' => $section['description'],
                        'content' => $section['content'],
                        'sort_order' => $index + 1,
                        'is_visible' => true,
                    ]);
                }
            }
        });
    }
}
