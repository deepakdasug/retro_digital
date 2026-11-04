<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TenBlogPostsSeeder extends Seeder
{
    public function run(): void
    {
        $storageDir = storage_path('app/public/blog_images');
        if (!File::isDirectory($storageDir)) {
            File::makeDirectory($storageDir, 0755, true);
        }

        $blogsData = [
            [
                'title' => 'The Complete Guide to Enterprise IT Asset Disposition (ITAD) in 2026',
                'slug' => 'complete-guide-enterprise-itad-2026',
                'source_image' => public_path('assets/images/it-asset-management.jpg'),
                'image_name' => 'it-asset-management.jpg',
                'category' => 'ITAD Strategy',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'Learn how modern enterprises navigate hardware refresh cycles, safeguard corporate data, and recoup maximum asset value through structured ITAD.',
                'content' => '<h2>Navigating Modern IT Asset Disposition</h2><p>IT Asset Disposition (ITAD) has evolved from a back-office logistics task into a boardroom strategic priority. With enterprise hardware lifecycles averaging three to four years, corporate technology officers face dual imperatives: preventing catastrophic data breaches while fulfilling environmental sustainability commitments.</p><h3>Key Pillars of a World-Class ITAD Program</h3><ul><li><strong>Audited Chain of Custody:</strong> GPS-tracked sealed transport and barcoded bin scanning from office pickup to destruction facility.</li><li><strong>Certified Data Sanitization:</strong> Adherence to NIST Special Publication 800-88 Revision 1 guidelines for magnetic and flash media.</li><li><strong>Component Value Recovery:</strong> Testing and harvesting functional enterprise CPUs, high-density ECC RAM, and enterprise NVMe drives for secondary remarketing.</li></ul><p>By implementing a proactive ITAD framework, organizations routinely recover between 15% and 35% of original hardware acquisition costs while maintaining bulletproof compliance audits.</p>',
                'tags' => ['ITAD', 'Enterprise IT', 'Asset Management', 'Hardware Lifecycle'],
                'meta_title' => 'Complete Enterprise ITAD Guide 2026 | Retrotech Insights',
                'meta_description' => 'A comprehensive blueprint for enterprise IT asset disposition, covering chain of custody, data wiping, and hardware remarketing.',
                'focus_keyword' => 'enterprise itad',
                'reading_time' => 5,
                'days_ago' => 9,
                'faqs' => [
                    [
                        'question' => 'What are the main phases of an enterprise ITAD program?',
                        'answer' => 'A comprehensive ITAD program encompasses inventory discovery, secure chain of custody logistics, verified data sanitization, asset remarketing, and certified zero-landfill recycling.',
                    ],
                    [
                        'question' => 'How does ITAD help maximize return on investment?',
                        'answer' => 'Through secondary-market component remarketing and parts harvesting, turning legacy hardware into recoverable working capital.',
                    ],
                    [
                        'question' => 'Are ITAD services covered under insurance and liability protections?',
                        'answer' => 'Yes, enterprise ITAD partners provide comprehensive environmental liability indemnification and serialized certificates of destruction.',
                    ],
                ],
            ],
            [
                'title' => 'NIST 800-88 vs. DoD 5220.22-M: Which Data Destruction Standard Do You Need?',
                'slug' => 'nist-800-88-vs-dod-5220-data-destruction-standards',
                'source_image' => public_path('assets/images/it-data-destruction.jpg'),
                'image_name' => 'it-data-destruction.jpg',
                'category' => 'Data Security',
                'author_name' => 'Himanshu Singh',
                'author_designation' => 'Chief Information Security Officer',
                'excerpt' => 'A deep dive into media sanitization protocols, comparing physical degaussing, mechanical shredding, and multi-pass cryptographic erasure.',
                'content' => '<h2>Understanding Media Sanitization in the Flash Era</h2><p>For decades, the United States Department of Defense standard (DoD 5220.22-M) was the de facto requirement for magnetic disk sanitization. However, the rise of solid-state drives (SSDs), NVMe media, and wear-leveling NAND controllers has made traditional multi-pass overwriting obsolete and potentially dangerous.</p><h3>Why NIST 800-88 Rev 1 is the Gold Standard</h3><p>The National Institute of Standards and Technology (NIST) 800-88 framework introduces three explicit sanitization tiers:</p><ol><li><strong>Clear:</strong> Logical sanitization using standard user-accessible commands across all writeable storage locations.</li><li><strong>Purge:</strong> Executes controller-level Cryptographic Erase or physical block-level firmware wiping, making target recovery infeasible even using laboratory equipment.</li><li><strong>Destroy:</strong> Mechanical shredding, disintegration, or incineration reducing the physical medium to sub-millimeter particles.</li></ol>',
                'tags' => ['Data Security', 'NIST 800-88', 'DoD Standards', 'Compliance'],
                'meta_title' => 'NIST 800-88 vs DoD 5220.22-M Data Destruction Comparison',
                'meta_description' => 'Detailed technical comparison of NIST 800-88 and DoD data erasure protocols for SSDs and HDDs.',
                'focus_keyword' => 'NIST 800-88 data destruction',
                'reading_time' => 6,
                'days_ago' => 8,
                'faqs' => [
                    [
                        'question' => 'Why is NIST 800-88 preferred over older DoD standards?',
                        'answer' => 'NIST 800-88 accounts for modern SSDs and NVMe flash memory where traditional magnetic overwriting is ineffective due to wear-leveling algorithms.',
                    ],
                    [
                        'question' => 'Does Retrotech provide serialized certificates of destruction?',
                        'answer' => 'Yes, every sanitized drive or shredded device receives an audited serialized Certificate of Destruction complete with drive serial numbers and timestamps.',
                    ],
                ],
            ],
            [
                'title' => 'Best Practices for Seamless Data Center Decommissioning',
                'slug' => 'best-practices-data-center-decommissioning',
                'source_image' => public_path('assets/images/data-center-decommissioning.jpg'),
                'image_name' => 'data-center-decommissioning.jpg',
                'category' => 'Infrastructure',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'Retiring rack servers and SAN storage requires strict chain-of-custody tracking, minimal downtime, and zero data leakage.',
                'content' => '<h2>Planning a Cloud Migration or Facility Consolidation</h2><p>Data center decommissioning is among the highest-risk projects in enterprise IT. Beyond moving physical chassis, engineers must orchestrate power phase-downs, cable mapping, cable deracking, and real-time asset reconciliation against Configuration Management Databases (CMDB).</p><h3>Crucial Phases for Risk-Free Decommissioning</h3><ul><li><strong>Discovery & Asset Audit:</strong> Pre-project barcode labeling and live-to-staged asset validation.</li><li><strong>Secure Network Isolation:</strong> Severing VLANs and verifying that backup clusters have resumed all active workloads.</li><li><strong>On-Site Data Erase or Degaussing:</strong> Wiping storage arrays prior to hardware leaving facility perimeters.</li><li><strong>Logistical Extraction:</strong> Custom anti-static crating, specialized server lifts, and bonded freight transit.</li></ul>',
                'tags' => ['Data Center', 'Decommissioning', 'Servers', 'SAN Storage'],
                'meta_title' => 'Data Center Decommissioning Best Practices | Retrotech',
                'meta_description' => 'Step-by-step checklist for retiring enterprise data center racks and SAN storage safely and sustainably.',
                'focus_keyword' => 'data center decommissioning',
                'reading_time' => 7,
                'days_ago' => 7,
                'faqs' => [
                    [
                        'question' => 'How long does a data center decommissioning project take?',
                        'answer' => 'Depending on rack count and location, timelines range from a single weekend maintenance window to 3-4 weeks with phased facility extraction.',
                    ],
                    [
                        'question' => 'Can active systems continue running during partial decommissioning?',
                        'answer' => 'Yes, our engineers isolate retired rack rows and power distribution units (PDUs) without interrupting active production clusters.',
                    ],
                ],
            ],
            [
                'title' => 'Hard Drive Shredding vs. Degaussing: Choosing the Right Destruction Method',
                'slug' => 'hard-drive-shredding-vs-degaussing-methods',
                'source_image' => public_path('assets/images/hard-disk-destruction.jpg'),
                'image_name' => 'hard-disk-destruction.jpg',
                'category' => 'Data Security',
                'author_name' => 'Himanshu Singh',
                'author_designation' => 'Chief Information Security Officer',
                'excerpt' => 'Understand when high-coercivity electromagnetic degaussing is required versus industrial dual-shaft mechanical shredding.',
                'content' => '<h2>Physical Media Destruction: Mechanics and Security</h2><p>When high-security regulations (such as HIPAA, GDPR, or defense sector contracts) require total physical elimination of storage media, organizations must decide between electromagnetic degaussing and mechanical shredding.</p><h3>High-Coercivity Degaussing</h3><p>Degaussers generate intense magnetic pulses (often exceeding 10,000 to 20,000 Gauss) that permanently disrupt the magnetic domains on spinning hard disk platters and tape cartridges. This renders magnetic tracks permanently unreadable.</p><h3>Industrial Multi-Shaft Shredding</h3><p>Mechanical shredders utilize counter-rotating hardened steel cutting blades that crush, tear, and fracture storage devices into irregular fragments measuring 20mm or smaller. Shredding is universally applicable across traditional HDDs, solid-state drives, optical media, and smart cards.</p>',
                'tags' => ['Hard Drive Shredding', 'Degaussing', 'Physical Destruction'],
                'meta_title' => 'Hard Drive Shredding vs Degaussing Guide | Retrotech',
                'meta_description' => 'Compare physical drive shredding and degaussing for magnetic and flash storage media.',
                'focus_keyword' => 'hard drive shredding',
                'reading_time' => 4,
                'days_ago' => 6,
                'faqs' => [
                    [
                        'question' => 'Can shredded hard drive platters ever be pieced back together?',
                        'answer' => 'No. Industrial cross-cut shredding fractures the magnetic crystalline structure into minute jagged pieces, making magnetic microscopy reconstruction physically impossible.',
                    ],
                    [
                        'question' => 'Does degaussing work on solid state drives (SSDs)?',
                        'answer' => 'No. Degaussing only affects magnetic storage. SSDs store data using integrated electrical charge traps and must be shredded or cryptographically purged.',
                    ],
                ],
            ],
            [
                'title' => 'Corporate E-Waste Compliance: Navigating Global Environmental Standards',
                'slug' => 'corporate-ewaste-compliance-global-standards',
                'source_image' => public_path('assets/images/process-2.jpg'),
                'image_name' => 'process-2.jpg',
                'category' => 'Sustainability',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'How global companies achieve zero-landfill milestones while adhering to WEEE, RoHS, and local environmental regulations.',
                'content' => '<h2>The Circular Economy and Electronics Waste</h2><p>Over 60 million metric tons of electronic waste are generated globally every year, with less than 22% properly recycled. For corporations, improperly discarded electronics represent both catastrophic regulatory penalties and substantial environmental brand damage.</p><h3>Key International Frameworks</h3><ul><li><strong>WEEE Directive (EU):</strong> Strict extended producer responsibility guidelines demanding verified recycling and recovery quotas.</li><li><strong>RoHS:</strong> Restrictions on hazardous substances such as lead, mercury, and cadmium in electrical equipment.</li><li><strong>R2 (Responsible Recycling) & e-Stewards:</strong> Global third-party certifications ensuring ethical downstream accountability with zero overseas dumping.</li></ul>',
                'tags' => ['E-Waste', 'Sustainability', 'Circular Economy', 'ESG Compliance'],
                'meta_title' => 'Corporate E-Waste Compliance & Environmental Standards',
                'meta_description' => 'A guide for enterprises to achieve zero-landfill IT sustainability and maintain strict regulatory compliance.',
                'focus_keyword' => 'corporate e-waste compliance',
                'reading_time' => 5,
                'days_ago' => 5,
                'faqs' => [
                    [
                        'question' => 'What does zero-landfill electronic recycling mean?',
                        'answer' => 'Zero-landfill means 100% of disassembled device components are either refurbished for reuse or smelted into raw commodity metals and recyclable plastics, leaving zero waste in landfills.',
                    ],
                    [
                        'question' => 'Can Retrotech generate ESG metrics for annual corporate sustainability audits?',
                        'answer' => 'Yes, our portal provides audited environmental impact statements including total gross weight processed, greenhouse gas emissions avoided, and recycled materials breakdown.',
                    ],
                ],
            ],
            [
                'title' => 'Maximizing Residual Value with Enterprise IT Hardware Remarketing',
                'slug' => 'maximizing-residual-value-it-hardware-remarketing',
                'source_image' => public_path('assets/images/it-asset-remarketing.jpg'),
                'image_name' => 'it-asset-remarketing.jpg',
                'category' => 'Asset Recovery',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'Turn decommissioned laptops, enterprise switches, and GPUs into positive cash flow through global B2B secondary channels.',
                'content' => '<h2>Turning Sunken IT Costs into Working Capital</h2><p>When organizations upgrade fleets of thousands of laptops or transition enterprise workloads to hybrid cloud architectures, the retired hardware frequently still possesses considerable operational life. Selling directly to consumer marketplaces is slow and fraught with compliance vulnerabilities.</p><h3>The Multi-Tier Remarketing Workflow</h3><p>Retrotech utilizes a structured diagnostics and multi-channel liquidation pipeline:</p><ol><li><strong>Deep Component Testing:</strong> Comprehensive stress-testing of motherboards, memory channels, battery health, and display panels.</li><li><strong>Cosmetic Reconditioning:</strong> Ultrasonically cleaned, sanitized chassis graded under standardized Grade A/B/C metrics.</li><li><strong>Global B2B Broker Distribution:</strong> Access to enterprise purchasers, university laboratories, and certified refurbishing networks across 40+ countries.</li></ol>',
                'tags' => ['Remarketing', 'Asset Recovery', 'Hardware Resale', 'Cost Optimization'],
                'meta_title' => 'Maximize Enterprise IT Hardware Resale Value | Retrotech',
                'meta_description' => 'Discover how enterprise hardware remarketing recovers valuable capital from retired workstations, servers, and networking gear.',
                'focus_keyword' => 'it hardware remarketing',
                'reading_time' => 5,
                'days_ago' => 4,
                'faqs' => [
                    [
                        'question' => 'Which IT equipment categories command the highest residual value?',
                        'answer' => 'Enterprise GPU accelerators, high-capacity DDR4/DDR5 registered ECC RAM, core 100GbE managed switches, and late-generation business laptops consistently achieve top market resale value.',
                    ],
                    [
                        'question' => 'How does profit sharing work in hardware consignment?',
                        'answer' => 'Retrotech offers transparent revenue share models where clients receive real-time visibility into secondary sales with agreed-upon net liquidation distributions.',
                    ],
                ],
            ],
            [
                'title' => 'Building Secure APIs for Enterprise Systems: Architecture & Governance',
                'slug' => 'building-secure-apis-enterprise-architecture',
                'source_image' => public_path('assets/images/tech-development/api-development.jpg'),
                'image_name' => 'api-development.jpg',
                'category' => 'Enterprise Tech',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'Design scalable microservices, implement OAuth2/mTLS authentication, and maintain granular telemetry for mission-critical workflows.',
                'content' => '<h2>The Foundation of Modern Distributed Architecture</h2><p>APIs are the digital nervous system of the modern enterprise. As companies connect disparate ERPs, supply chain logistics engines, and customer portals, API security posture directly dictates overall system resilience.</p><h3>Core Pillars of Enterprise API Security</h3><ul><li><strong>Mutual TLS (mTLS):</strong> Enforcing two-way cryptographic verification between microservices to prevent man-in-the-middle exploits.</li><li><strong>Rate Limiting & Token Bucket Algorithms:</strong> Defending endpoints against Denial of Service (DoS) and credential stuffing attacks.</li><li><strong>Granular Scope Authorization:</strong> Implementing role-based access control (RBAC) and attribute-based access control (ABAC) embedded in signed JWT assertions.</li></ul>',
                'tags' => ['API Security', 'Microservices', 'OAuth2', 'System Architecture'],
                'meta_title' => 'Enterprise API Architecture & Security Blueprint | Retrotech',
                'meta_description' => 'Architectural guide for engineering resilient, high-throughput enterprise APIs with modern cryptographic protections.',
                'focus_keyword' => 'secure enterprise apis',
                'reading_time' => 6,
                'days_ago' => 3,
                'faqs' => [
                    [
                        'question' => 'What is the recommended authentication scheme for B2B API integrations?',
                        'answer' => 'Mutual TLS (mTLS) combined with OAuth2 Client Credentials grant and strict IP allowlisting provides the most robust zero-trust defense.',
                    ],
                    [
                        'question' => 'How should breaking changes be introduced to production APIs?',
                        'answer' => 'Utilize explicit semantic URI path versioning (e.g., /api/v2) with backwards-compatible response contracts and a minimum 12-month deprecation lifecycle.',
                    ],
                ],
            ],
            [
                'title' => 'Custom CRM vs. Off-The-Shelf SaaS: What Scale-Ups Must Know',
                'slug' => 'custom-crm-vs-off-the-shelf-saas-scaleups',
                'source_image' => public_path('assets/images/tech-development/crm-development.jpg'),
                'image_name' => 'crm-development.jpg',
                'category' => 'Software Engineering',
                'author_name' => 'Himanshu Singh',
                'author_designation' => 'Chief Information Security Officer',
                'excerpt' => 'Comparing licensing overhead, customization bottlenecks, and data ownership when architecting tailored CRM pipelines.',
                'content' => '<h2>The Tipping Point of Enterprise Software</h2><p>Commercial SaaS customer relationship platforms offer rapid onboarding, but rapidly growing businesses frequently encounter the "SaaS license tax" where recurring monthly seat fees skyrocket while custom workflow requirements remain constrained by proprietary platform limitations.</p><h3>Evaluating the Total Cost of Ownership (TCO)</h3><p>When evaluated over a 3-5 year timeline, custom enterprise software built on robust open frameworks offers decisive benefits:</p><ul><li><strong>Complete Data Sovereignty:</strong> No third-party data aggregation; databases reside within your own dedicated VPC infrastructure.</li><li><strong>Zero Per-User Licensing:</strong> Scale from 50 to 5,000 employees without incurring incremental monthly licensing fees.</li><li><strong>Bespoke Automation:</strong> Deep automated integrations directly with warehouse scanners, internal ERPs, and specialized logistics pipelines.</li></ul>',
                'tags' => ['CRM', 'Custom Software', 'SaaS', 'Business Scalability'],
                'meta_title' => 'Custom CRM vs SaaS Comparison for Growing Enterprises',
                'meta_description' => 'Should your company buy or build a CRM? Analyze total cost of ownership, security, and scalability.',
                'focus_keyword' => 'custom crm development',
                'reading_time' => 5,
                'days_ago' => 2,
                'faqs' => [
                    [
                        'question' => 'When does custom CRM development become more cost effective than commercial SaaS?',
                        'answer' => 'Generally when organization headcounts exceed 50-75 seats and the workflows require deep bespoke integrations with proprietary operational databases.',
                    ],
                    [
                        'question' => 'Can a custom CRM integrate seamlessly with legacy ERP platforms?',
                        'answer' => 'Yes, custom applications are purpose-built with tailored webhook receivers and direct SQL or REST connectors for legacy ERP synchronization.',
                    ],
                ],
            ],
            [
                'title' => 'Multi-Tenant SaaS Architecture: Database Isolation Patterns and Scaling',
                'slug' => 'multi-tenant-saas-architecture-database-patterns',
                'source_image' => public_path('assets/images/tech-development/saas-application.jpg'),
                'image_name' => 'saas-application.jpg',
                'category' => 'Cloud Architecture',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'Explore database-per-tenant, schema-per-tenant, and shared-schema designs with row-level security for high-growth SaaS platforms.',
                'content' => '<h2>Architectural Decision-Making for Modern Cloud SaaS</h2><p>Engineering multi-tenant applications requires balancing infrastructure cost efficiency against stringent tenant data isolation requirements. Choosing the wrong data storage pattern early in the product lifecycle can lead to painful, expensive refactoring later.</p><h3>The Three Common Multi-Tenancy Patterns</h3><ol><li><strong>Separate Database per Tenant:</strong> Total physical data segregation. Highest security and compliance isolation, simplified backups, but higher idle infrastructure costs.</li><li><strong>Shared Database, Separate Schemas:</strong> Moderate resource utilization with distinct namespace tables per customer.</li><li><strong>Shared Database, Shared Schema with Tenant ID:</strong> Lowest operating cost. Relies on application-level filtering or database Row-Level Security (RLS) policies.</li></ol>',
                'tags' => ['SaaS', 'Multi-Tenancy', 'Database Design', 'Cloud Architecture'],
                'meta_title' => 'Multi-Tenant SaaS Architecture & Isolation Patterns',
                'meta_description' => 'Comprehensive technical comparison of multi-tenant database designs for enterprise cloud applications.',
                'focus_keyword' => 'multi-tenant saas architecture',
                'reading_time' => 6,
                'days_ago' => 1,
                'faqs' => [
                    [
                        'question' => 'Which multi-tenant architecture pattern offers the strongest regulatory compliance?',
                        'answer' => 'Database-per-tenant provides absolute physical data separation, making it the preferred approach for HIPAA, SOC2 Type II, and banking sector certifications.',
                    ],
                    [
                        'question' => 'How can cross-tenant data leakage be prevented in shared schema environments?',
                        'answer' => 'Utilize PostgreSQL Row-Level Security (RLS) enforced at the database connection pool level combined with automated multi-tenant unit test suites.',
                    ],
                ],
            ],
            [
                'title' => 'Modern Web Development: Why Performance and Core Web Vitals Drive Conversions',
                'slug' => 'modern-web-development-performance-core-web-vitals',
                'source_image' => public_path('assets/images/tech-development/web-development.jpg'),
                'image_name' => 'web-development.jpg',
                'category' => 'Web Development',
                'author_name' => 'Deepak Kumar',
                'author_designation' => 'Lead Infrastructure Architect',
                'excerpt' => 'How optimizing Largest Contentful Paint (LCP) and Cumulative Layout Shift (CLS) directly impacts enterprise user retention and organic SEO.',
                'content' => '<h2>Speed as a Core Business Metric</h2><p>Website performance is no longer an engineering vanity metric—it directly dictates organic search rankings, user retention, and enterprise pipeline conversion rates. Google has made Core Web Vitals an explicit ranking signal in search algorithms.</p><h3>Key Core Web Vitals Explained</h3><ul><li><strong>Largest Contentful Paint (LCP):</strong> Measures perceived loading speed. Marks when the page main content has likely loaded. Target: Under 2.5 seconds.</li><li><strong>Interaction to Next Paint (INP):</strong> Assesses overall page responsiveness to user interactions. Target: Under 200 milliseconds.</li><li><strong>Cumulative Layout Shift (CLS):</strong> Measures visual stability and unexpected layout movement during page render. Target: Under 0.1 score.</li></ul><p>Adopting lightweight frontend frameworks, server-side asset pre-rendering, modern image codecs (WebP, AVIF), and edge CDN caching ensures consistently pristine lighthouse scores.</p>',
                'tags' => ['Web Development', 'Core Web Vitals', 'PageSpeed', 'SEO'],
                'meta_title' => 'Core Web Vitals & Web Performance Guide | Retrotech',
                'meta_description' => 'How modern web performance engineering directly fuels search engine rankings and business conversions.',
                'focus_keyword' => 'core web vitals performance',
                'reading_time' => 5,
                'days_ago' => 0,
                'faqs' => [
                    [
                        'question' => 'What are the three primary Google Core Web Vitals metrics?',
                        'answer' => 'Largest Contentful Paint (LCP) for loading speed, Interaction to Next Paint (INP) for responsiveness, and Cumulative Layout Shift (CLS) for visual stability.',
                    ],
                    [
                        'question' => 'How does faster web load time translate to business revenue?',
                        'answer' => 'Studies consistently demonstrate that every 100ms improvement in page speed boosts conversion rates by up to 8% and significantly reduces user bounce rates.',
                    ],
                ],
            ],
        ];

        foreach ($blogsData as $data) {
            $destPath = $storageDir . '/' . $data['image_name'];
            if (File::exists($data['source_image']) && !File::exists($destPath)) {
                File::copy($data['source_image'], $destPath);
            }

            $imagePath = File::exists($destPath) ? 'blog_images/' . $data['image_name'] : null;

            $post = BlogPost::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'content_blocks' => [[
                        'type' => 'html',
                        'content' => $data['content'],
                    ]],
                    'image_path' => $imagePath,
                    'author_name' => $data['author_name'],
                    'author_designation' => $data['author_designation'],
                    'category' => $data['category'],
                    'tags' => $data['tags'],
                    'meta_title' => $data['meta_title'],
                    'meta_description' => $data['meta_description'],
                    'focus_keyword' => $data['focus_keyword'],
                    'canonical_url' => url('/blog/' . $data['slug']),
                    'robots_meta' => 'index, follow',
                    'is_published' => true,
                    'post_status' => 'published',
                    'published_at' => now()->subDays($data['days_ago'])->setHour(10)->setMinute(30),
                    'comment_status' => true,
                    'reading_time' => $data['reading_time'],
                ]
            );

            // Clean up and re-attach FAQs
            $post->faqs()->delete();

            foreach ($data['faqs'] as $index => $faqItem) {
                $post->faqs()->create([
                    'model_type' => 'blog',
                    'model_id' => $post->id,
                    'question' => $faqItem['question'],
                    'answer' => $faqItem['answer'],
                    'order' => $index + 1,
                    'sort_order' => $index + 1,
                    'is_published' => true,
                ]);
            }
        }
    }
}
