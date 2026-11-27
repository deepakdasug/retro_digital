<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaMarketingSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $service = Service::firstOrCreate(
            ['slug' => 'social-media-marketing'],
            [
                'page_section' => 'services',
                'title' => 'Social Media Marketing',
                'meta_description' => 'Social media strategy, content, and campaigns that turn followers into customers.',
            ],
        );

        if ($service->page_section !== 'services' || $service->sections()->exists()) {
            return;
        }

        DB::transaction(function () use ($service): void {
            foreach ($this->sections() as $index => $section) {
                $service->sections()->create([
                    'section_type' => 'custom',
                    'content' => [
                        'schema' => $section['schema'],
                        'values' => $section['values'],
                        'html' => $section['html'],
                        'css' => $section['css'],
                        'js' => $section['js'] ?? '// This section is fully editable from the admin panel.',
                    ],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }

            $service->touch();
        });
    }

    private function sections(): array
    {
        return [
            $this->heroSection(),
            $this->marqueeSection(),
            $this->servicesSection(),
            $this->bentoSection(),
            $this->processSection(),
            $this->resultsSection(),
            $this->platformsSection(),
            $this->caseStudySection(),
            $this->pricingSection(),
            $this->faqSection(),
        ];
    }

    private function heroSection(): array
    {
        return [
            'schema' => [
                ['key' => 'eyebrow', 'label' => 'Eyebrow badge', 'type' => 'text'],
                ['key' => 'heading', 'label' => 'Main heading', 'type' => 'heading'],
                ['key' => 'heading_accent', 'label' => 'Highlighted words', 'type' => 'text'],
                ['key' => 'body', 'label' => 'Intro paragraph', 'type' => 'paragraph'],
                ['key' => 'cta1_text', 'label' => 'Primary button text', 'type' => 'text'],
                ['key' => 'cta1_link', 'label' => 'Primary button link', 'type' => 'link'],
                ['key' => 'cta2_text', 'label' => 'Secondary button text', 'type' => 'text'],
                ['key' => 'cta2_link', 'label' => 'Secondary button link', 'type' => 'link'],
                ['key' => 'hero_image', 'label' => 'Hero image URL', 'type' => 'text'],
                ['key' => 'stat1_value', 'label' => 'Stat 1 value', 'type' => 'text'],
                ['key' => 'stat1_label', 'label' => 'Stat 1 label', 'type' => 'text'],
                ['key' => 'stat2_value', 'label' => 'Stat 2 value', 'type' => 'text'],
                ['key' => 'stat2_label', 'label' => 'Stat 2 label', 'type' => 'text'],
                ['key' => 'stat3_value', 'label' => 'Stat 3 value', 'type' => 'text'],
                ['key' => 'stat3_label', 'label' => 'Stat 3 label', 'type' => 'text'],
            ],
            'values' => [
                'eyebrow' => 'Social Media Marketing Agency',
                'heading' => 'Scroll. Stop. Click.',
                'heading_accent' => 'Convert.',
                'body' => 'Social strategies that turn followers into loyal customers.',
                'cta1_text' => 'Get a Free Strategy Call',
                'cta1_link' => '/contact#contact',
                'cta2_text' => 'See Our Work',
                'cta2_link' => '#proven-results',
                'hero_image' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=1000&q=80',
                'stat1_value' => '4.8x',
                'stat1_label' => 'Average ROAS',
                'stat2_value' => '92%',
                'stat2_label' => 'Client retention',
                'stat3_value' => '250M+',
                'stat3_label' => 'Monthly impressions',
            ],
            'html' => <<<'HTML'
<section class="smm-hero">
  <div class="smm-orb smm-orb-a"></div>
  <div class="smm-orb smm-orb-b"></div>
  <div class="smm-grid-lines"></div>
  <div class="smm-hero-inner">
    <div class="smm-hero-copy">
      <span class="smm-pill"><i class="fa-solid fa-bolt"></i> {{eyebrow}}</span>
      <h1>{{heading}} <span class="smm-grad">{{heading_accent}}</span></h1>
      <p class="smm-hero-body">{{body}}</p>
      <div class="smm-hero-cta">
        <a class="smm-btn smm-btn-primary" href="{{cta1_link}}">{{cta1_text}} <i class="fa-solid fa-arrow-right"></i></a>
        <a class="smm-btn smm-btn-ghost" href="{{cta2_link}}">{{cta2_text}}</a>
      </div>
      <div class="smm-stats">
        <div class="smm-stat"><strong>{{stat1_value}}</strong><span>{{stat1_label}}</span></div>
        <div class="smm-stat"><strong>{{stat2_value}}</strong><span>{{stat2_label}}</span></div>
        <div class="smm-stat"><strong>{{stat3_value}}</strong><span>{{stat3_label}}</span></div>
      </div>
    </div>
    <div class="smm-hero-media">
      <div class="smm-media-frame">
        <img src="{{hero_image}}" alt="Social media marketing dashboard" onerror="this.onerror=null;this.src='https://picsum.photos/seed/smm-hero/1000/1200';">
        <span class="smm-media-ring"></span>
      </div>
      <div class="smm-float smm-float-chart">
        <div class="smm-chart-head"><i class="fa-solid fa-chart-simple"></i> Campaign lift</div>
        <div class="smm-bars">
          <span style="height:34%"></span><span style="height:52%"></span><span style="height:44%"></span><span style="height:70%"></span><span style="height:86%"></span><span style="height:100%"></span>
        </div>
        <em>+118% last 90 days</em>
      </div>
      <div class="smm-float smm-float-badge">
        <i class="fa-solid fa-arrow-trend-up"></i>
        <div><strong>+312%</strong><span>Reach growth</span></div>
      </div>
      <div class="smm-avatars">
        <img src="https://i.pravatar.cc/80?img=12" alt="Client" onerror="this.style.display='none'">
        <img src="https://i.pravatar.cc/80?img=32" alt="Client" onerror="this.style.display='none'">
        <img src="https://i.pravatar.cc/80?img=45" alt="Client" onerror="this.style.display='none'">
        <span>1.2k+ brands scaled</span>
      </div>
    </div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-hero{position:relative;overflow:hidden;isolation:isolate;background:radial-gradient(120% 120% at 85% 0%,#1d1b4b 0%,#0b0b23 45%,#05050f 100%);color:#fff;padding:clamp(3.5rem,7vw,6.5rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;min-height:92vh;display:flex;align-items:center}
.smm-hero-inner{position:relative;z-index:2;width:min(1240px,100%);margin:0 auto;display:grid;grid-template-columns:1.08fr .92fr;gap:clamp(2rem,5vw,4.5rem);align-items:center}
.smm-orb{position:absolute;border-radius:50%;filter:blur(70px);opacity:.55;z-index:0}
.smm-orb-a{width:520px;height:520px;background:#7c3aed;top:-160px;right:-120px}
.smm-orb-b{width:440px;height:440px;background:#06b6d4;bottom:-200px;left:-140px;opacity:.4}
.smm-grid-lines{position:absolute;inset:0;z-index:0;background-image:linear-gradient(rgba(255,255,255,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.05) 1px,transparent 1px);background-size:64px 64px;mask-image:radial-gradient(ellipse at 50% 40%,#000 30%,transparent 75%)}
.smm-pill{display:inline-flex;align-items:center;gap:9px;padding:8px 16px;border-radius:999px;background:rgba(124,58,237,.16);border:1px solid rgba(167,139,250,.4);color:#c4b5fd;font-size:.78rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase}
.smm-pill i{color:#f0abfc}
.smm-hero h1{font-size:clamp(2.6rem,5.2vw,4.6rem);line-height:1.02;letter-spacing:-.04em;font-weight:800;margin:22px 0 20px;color:#fff}
.smm-grad{background:linear-gradient(100deg,#a78bfa,#22d3ee 60%,#34d399);-webkit-background-clip:text;background-clip:text;color:transparent}
.smm-hero-body{font-size:clamp(1rem,1.5vw,1.16rem);line-height:1.75;color:rgba(226,232,240,.82);max-width:560px;margin:0}
.smm-hero-cta{display:flex;flex-wrap:wrap;gap:14px;margin:32px 0 40px}
.smm-btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:15px 26px;border-radius:14px;font-size:.95rem;font-weight:750;text-decoration:none;transition:transform .2s,box-shadow .2s,background .2s}
.smm-btn:hover{transform:translateY(-2px)}
.smm-btn-primary{background:linear-gradient(100deg,#8b5cf6,#06b6d4);color:#fff;box-shadow:0 14px 34px -12px rgba(139,92,246,.8)}
.smm-btn-ghost{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.18);color:#e2e8f0}
.smm-stats{display:grid;grid-template-columns:repeat(3,auto);gap:clamp(1.2rem,3vw,2.6rem);justify-content:start;border-top:1px solid rgba(255,255,255,.12);padding-top:26px}
.smm-stat strong{display:block;font-size:clamp(1.5rem,2.6vw,2.1rem);font-weight:800;letter-spacing:-.03em;background:linear-gradient(90deg,#fff,#c4b5fd);-webkit-background-clip:text;background-clip:text;color:transparent}
.smm-stat span{font-size:.8rem;color:rgba(203,213,225,.72);font-weight:600;letter-spacing:.03em}
.smm-hero-media{position:relative;min-height:480px;display:flex;justify-content:center;align-items:center}
.smm-media-frame{position:relative;width:min(420px,100%);aspect-ratio:4/5;border-radius:28px;overflow:hidden;border:1px solid rgba(255,255,255,.16);box-shadow:0 40px 90px -30px rgba(0,0,0,.8);transform:rotate(-2deg)}
.smm-media-frame img{width:100%;height:100%;object-fit:cover;display:block}
.smm-media-frame:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 40%,rgba(5,5,15,.75))}
.smm-media-ring{position:absolute;width:120%;aspect-ratio:1;border-radius:50%;border:1px dashed rgba(167,139,250,.35);top:50%;left:50%;transform:translate(-50%,-50%);z-index:-1}
.smm-float{position:absolute;background:rgba(15,17,40,.86);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.14);border-radius:16px;padding:14px 16px;box-shadow:0 20px 45px -18px rgba(0,0,0,.7)}
.smm-float-chart{left:-6%;bottom:12%;width:180px;z-index:3}
.smm-chart-head{display:flex;align-items:center;gap:8px;font-size:.74rem;font-weight:700;color:#cbd5e1;margin-bottom:12px}
.smm-chart-head i{color:#22d3ee}
.smm-bars{display:flex;align-items:flex-end;gap:7px;height:70px}
.smm-bars span{flex:1;border-radius:5px 5px 0 0;background:linear-gradient(180deg,#22d3ee,#8b5cf6)}
.smm-float-chart em{display:block;margin-top:10px;font-style:normal;font-size:.72rem;color:#34d399;font-weight:700}
.smm-float-badge{right:-4%;top:14%;display:flex;align-items:center;gap:12px;z-index:3}
.smm-float-badge i{display:grid;place-items:center;width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#34d399,#06b6d4);color:#04231b;font-size:1.1rem}
.smm-float-badge strong{display:block;font-size:1.12rem}
.smm-float-badge span{font-size:.72rem;color:#94a3b8}
.smm-avatars{position:absolute;bottom:-2%;right:2%;display:flex;align-items:center;background:rgba(15,17,40,.9);border:1px solid rgba(255,255,255,.12);border-radius:999px;padding:7px 14px 7px 7px;z-index:3}
.smm-avatars img{width:30px;height:30px;border-radius:50%;object-fit:cover;border:2px solid #0f1128;margin-left:-8px}
.smm-avatars img:first-child{margin-left:0}
.smm-avatars span{margin-left:10px;font-size:.72rem;color:#cbd5e1;font-weight:600}
@media(max-width:980px){.smm-hero-inner{grid-template-columns:1fr;gap:3.5rem}.smm-hero-media{min-height:auto;margin-top:1rem}.smm-hero{min-height:auto}.smm-hero-body{max-width:100%}.smm-float-chart{left:0;bottom:4%}.smm-float-badge{right:0;top:4%}}
@media(max-width:560px){.smm-stats{grid-template-columns:1fr 1fr;gap:1.2rem}.smm-float-chart{width:140px}.smm-avatars{display:none}.smm-media-frame{transform:none}}
CSS,
        ];
    }

    private function marqueeSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Intro label', 'type' => 'text'],
                ['key' => 'kpi1_value', 'label' => 'KPI 1 value', 'type' => 'text'],
                ['key' => 'kpi1_label', 'label' => 'KPI 1 label', 'type' => 'text'],
                ['key' => 'kpi2_value', 'label' => 'KPI 2 value', 'type' => 'text'],
                ['key' => 'kpi2_label', 'label' => 'KPI 2 label', 'type' => 'text'],
                ['key' => 'kpi3_value', 'label' => 'KPI 3 value', 'type' => 'text'],
                ['key' => 'kpi3_label', 'label' => 'KPI 3 label', 'type' => 'text'],
                ['key' => 'kpi4_value', 'label' => 'KPI 4 value', 'type' => 'text'],
                ['key' => 'kpi4_label', 'label' => 'KPI 4 label', 'type' => 'text'],
            ],
            'values' => [
                'heading' => 'Trusted by brands that live online',
                'kpi1_value' => '1.2k+',
                'kpi1_label' => 'Brands partnered',
                'kpi2_value' => '38',
                'kpi2_label' => 'Markets reached',
                'kpi3_value' => '250M+',
                'kpi3_label' => 'Monthly impressions',
                'kpi4_value' => '4.9/5',
                'kpi4_label' => 'Average client rating',
            ],
            'html' => <<<'HTML'
<section class="smm-marquee-band">
  <p class="smm-marquee-label">{{heading}}</p>
  <div class="smm-marquee-mask">
    <div class="smm-marquee-track">
      <span class="smm-brand"><i class="fa-solid fa-cube"></i> Northwind</span>
      <span class="smm-brand"><i class="fa-solid fa-bolt"></i> Kinetic</span>
      <span class="smm-brand"><i class="fa-solid fa-sun"></i> Aura</span>
      <span class="smm-brand"><i class="fa-solid fa-infinity"></i> Loop</span>
      <span class="smm-brand"><i class="fa-solid fa-leaf"></i> Bloom</span>
      <span class="smm-brand"><i class="fa-solid fa-location-crosshairs"></i> Vertex</span>
      <span class="smm-brand"><i class="fa-solid fa-circle-nodes"></i> Orbit</span>
      <span class="smm-brand"><i class="fa-solid fa-cube"></i> Northwind</span>
      <span class="smm-brand"><i class="fa-solid fa-bolt"></i> Kinetic</span>
      <span class="smm-brand"><i class="fa-solid fa-sun"></i> Aura</span>
      <span class="smm-brand"><i class="fa-solid fa-infinity"></i> Loop</span>
      <span class="smm-brand"><i class="fa-solid fa-leaf"></i> Bloom</span>
      <span class="smm-brand"><i class="fa-solid fa-location-crosshairs"></i> Vertex</span>
      <span class="smm-brand"><i class="fa-solid fa-circle-nodes"></i> Orbit</span>
    </div>
  </div>
  <div class="smm-kpi-grid">
    <div class="smm-kpi"><strong>{{kpi1_value}}</strong><span>{{kpi1_label}}</span></div>
    <div class="smm-kpi"><strong>{{kpi2_value}}</strong><span>{{kpi2_label}}</span></div>
    <div class="smm-kpi"><strong>{{kpi3_value}}</strong><span>{{kpi3_label}}</span></div>
    <div class="smm-kpi"><strong>{{kpi4_value}}</strong><span>{{kpi4_label}}</span></div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-marquee-band{background:#f7f6ff;padding:clamp(2.5rem,5vw,4rem) 0;font-family:Inter,Arial,sans-serif;border-bottom:1px solid #ece9ff}
.smm-marquee-label{text-align:center;color:#6d6a8c;font-size:.8rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;margin:0 1.5rem 1.6rem}
.smm-marquee-mask{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 12%,#000 88%,transparent);mask-image:linear-gradient(90deg,transparent,#000 12%,#000 88%,transparent)}
.smm-marquee-track{display:flex;align-items:center;gap:3.5rem;width:max-content;animation:smm-scroll 26s linear infinite}
.smm-brand{display:inline-flex;align-items:center;gap:10px;font-size:1.35rem;font-weight:800;color:#2b2848;letter-spacing:-.02em;opacity:.72;transition:opacity .2s}
.smm-brand:hover{opacity:1}
.smm-brand i{color:#8b5cf6;font-size:1.05rem}
@keyframes smm-scroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.smm-kpi-grid{width:min(1180px,calc(100% - 3rem));margin:clamp(2.5rem,5vw,3.6rem) auto 0;display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;background:#fff;border:1px solid #ece9ff;border-radius:22px;padding:clamp(1.4rem,3vw,2.2rem);box-shadow:0 24px 55px -32px rgba(80,60,180,.35)}
.smm-kpi{text-align:center;padding:.4rem 1rem;border-right:1px solid #f0eefc}
.smm-kpi:last-child{border-right:0}
.smm-kpi strong{display:block;font-size:clamp(1.6rem,3vw,2.3rem);font-weight:800;color:#1e1b3a;letter-spacing:-.03em}
.smm-kpi span{font-size:.82rem;color:#74719a;font-weight:600}
@media(max-width:720px){.smm-kpi-grid{grid-template-columns:1fr 1fr}.smm-kpi:nth-child(2){border-right:0}.smm-kpi:nth-child(1),.smm-kpi:nth-child(2){border-bottom:1px solid #f0eefc;padding-bottom:1rem}}
CSS,
        ];
    }

    private function servicesSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'subheading', 'label' => 'Section intro', 'type' => 'paragraph'],
                ['key' => 's1_title', 'label' => 'Service 1 title', 'type' => 'text'],
                ['key' => 's1_desc', 'label' => 'Service 1 description', 'type' => 'paragraph'],
                ['key' => 's2_title', 'label' => 'Service 2 title', 'type' => 'text'],
                ['key' => 's2_desc', 'label' => 'Service 2 description', 'type' => 'paragraph'],
                ['key' => 's3_title', 'label' => 'Service 3 title', 'type' => 'text'],
                ['key' => 's3_desc', 'label' => 'Service 3 description', 'type' => 'paragraph'],
                ['key' => 's4_title', 'label' => 'Service 4 title', 'type' => 'text'],
                ['key' => 's4_desc', 'label' => 'Service 4 description', 'type' => 'paragraph'],
                ['key' => 'cta_text', 'label' => 'Button text', 'type' => 'text'],
                ['key' => 'cta_link', 'label' => 'Button link', 'type' => 'link'],
            ],
            'values' => [
                'heading' => 'Everything your feed needs to convert',
                'subheading' => 'Strategy, creative and media buying under one roof — so every post and every rupee works toward the same growth goal.',
                's1_title' => 'Social Strategy & Audits',
                's1_desc' => 'Deep audits of your channels, competitors and audience, translated into a 90-day roadmap with clear KPIs.',
                's2_title' => 'Content & Creative Studio',
                's2_desc' => 'Reels, carousels, motion graphics and copy designed to stop the scroll and stay on-brand.',
                's3_title' => 'Paid Social & Performance',
                's3_desc' => 'Full-funnel Meta, TikTok, LinkedIn and YouTube campaigns built for qualified pipeline — not vanity likes.',
                's4_title' => 'Community & Influencers',
                's4_desc' => 'Responsive community management and creator partnerships that turn attention into trust.',
                'cta_text' => 'Explore all services',
                'cta_link' => '/contact#contact',
            ],
            'html' => <<<'HTML'
<section class="smm-svc">
  <div class="smm-wrap">
    <div class="smm-svc-head">
      <span class="smm-kicker"><i class="fa-solid fa-layer-group"></i> What we run</span>
      <h2>{{heading}}</h2>
      <p>{{subheading}}</p>
    </div>
    <div class="smm-svc-rows">
      <a class="smm-svc-row" href="{{cta_link}}">
        <span class="smm-row-num">01</span>
        <span class="smm-row-main"><span class="smm-row-title">{{s1_title}}</span><span class="smm-row-desc">{{s1_desc}}</span></span>
        <span class="smm-row-tags"><em>Audit</em><em>Roadmap</em></span>
        <span class="smm-row-arrow"><i class="fa-solid fa-arrow-up-right"></i></span>
      </a>
      <a class="smm-svc-row" href="{{cta_link}}">
        <span class="smm-row-num">02</span>
        <span class="smm-row-main"><span class="smm-row-title">{{s2_title}}</span><span class="smm-row-desc">{{s2_desc}}</span></span>
        <span class="smm-row-tags"><em>Reels</em><em>Design</em></span>
        <span class="smm-row-arrow"><i class="fa-solid fa-arrow-up-right"></i></span>
      </a>
      <a class="smm-svc-row" href="{{cta_link}}">
        <span class="smm-row-num">03</span>
        <span class="smm-row-main"><span class="smm-row-title">{{s3_title}}</span><span class="smm-row-desc">{{s3_desc}}</span></span>
        <span class="smm-row-tags"><em>Meta Ads</em><em>TikTok</em></span>
        <span class="smm-row-arrow"><i class="fa-solid fa-arrow-up-right"></i></span>
      </a>
      <a class="smm-svc-row" href="{{cta_link}}">
        <span class="smm-row-num">04</span>
        <span class="smm-row-main"><span class="smm-row-title">{{s4_title}}</span><span class="smm-row-desc">{{s4_desc}}</span></span>
        <span class="smm-row-tags"><em>Creators</em><em>Support</em></span>
        <span class="smm-row-arrow"><i class="fa-solid fa-arrow-up-right"></i></span>
      </a>
    </div>
    <div class="smm-svc-foot"><a class="smm-svc-btn" href="{{cta_link}}">{{cta_text}} <i class="fa-solid fa-arrow-right"></i></a></div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-svc{background:#ffffff;padding:clamp(3.5rem,7vw,6rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;color:#191634}
.smm-wrap{width:min(1180px,100%);margin:0 auto}
.smm-svc-head{max-width:780px;margin-bottom:clamp(2rem,4vw,3rem)}
.smm-kicker{display:inline-flex;align-items:center;gap:9px;font-size:.76rem;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:#7c3aed}
.smm-kicker i{font-size:.8rem}
.smm-svc-head h2{font-size:clamp(2rem,4vw,3.2rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;color:#14112b;margin:14px 0 16px}
.smm-svc-head p{font-size:1.05rem;line-height:1.7;color:#64617f;margin:0}
.smm-svc-rows{border-top:1px solid #eae7f7}
.smm-svc-row{display:grid;grid-template-columns:70px 1fr auto 56px;align-items:center;gap:clamp(1rem,3vw,2.5rem);padding:clamp(1.4rem,3vw,2rem) 1rem;border-bottom:1px solid #eae7f7;text-decoration:none;color:inherit;position:relative;transition:background .25s,padding .25s}
.smm-svc-row:before{content:"";position:absolute;left:0;right:0;top:0;bottom:0;background:linear-gradient(90deg,#f6f2ff,#ffffff 70%);opacity:0;transition:opacity .25s;z-index:0}
.smm-svc-row:hover:before{opacity:1}
.smm-svc-row:hover{padding-left:1.8rem}
.smm-svc-row>*{position:relative;z-index:1}
.smm-row-num{font-size:1rem;font-weight:800;color:#b3aed6;letter-spacing:.05em}
.smm-row-title{display:block;font-size:clamp(1.15rem,2.2vw,1.6rem);font-weight:750;letter-spacing:-.02em;color:#17142f;margin-bottom:6px;transition:color .2s}
.smm-svc-row:hover .smm-row-title{color:#7c3aed}
.smm-row-desc{display:block;font-size:.94rem;line-height:1.6;color:#6b6885;max-width:560px}
.smm-row-tags{display:flex;gap:8px;flex-wrap:wrap}
.smm-row-tags em{font-style:normal;font-size:.72rem;font-weight:700;padding:6px 11px;border-radius:999px;background:#f2efff;color:#6d4bd8;white-space:nowrap}
.smm-row-arrow{display:grid;place-items:center;width:48px;height:48px;border-radius:50%;border:1px solid #e4dffb;color:#7c3aed;font-size:1rem;transition:all .25s}
.smm-svc-row:hover .smm-row-arrow{background:#7c3aed;border-color:#7c3aed;color:#fff;transform:rotate(45deg)}
.smm-svc-foot{margin-top:2.2rem}
.smm-svc-btn{display:inline-flex;align-items:center;gap:10px;background:#17142f;color:#fff;text-decoration:none;padding:15px 28px;border-radius:14px;font-weight:750;font-size:.95rem;transition:transform .2s,background .2s}
.smm-svc-btn:hover{background:#7c3aed;transform:translateY(-2px)}
@media(max-width:820px){.smm-svc-row{grid-template-columns:44px 1fr 48px;gap:1rem}.smm-row-tags{display:none}.smm-row-desc{font-size:.88rem}}
CSS,
        ];
    }

    private function bentoSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'subheading', 'label' => 'Section intro', 'type' => 'paragraph'],
                ['key' => 'image1', 'label' => 'Bento image 1 URL', 'type' => 'text'],
                ['key' => 'image2', 'label' => 'Bento image 2 URL', 'type' => 'text'],
                ['key' => 'big_stat', 'label' => 'Big statistic', 'type' => 'text'],
                ['key' => 'big_stat_label', 'label' => 'Big statistic label', 'type' => 'text'],
                ['key' => 'quote', 'label' => 'Quote', 'type' => 'paragraph'],
                ['key' => 'quote_author', 'label' => 'Quote author', 'type' => 'text'],
            ],
            'values' => [
                'heading' => 'A social engine built for every format',
                'subheading' => 'From a single idea to a multi-channel system — we handle the strategy, production and optimisation that keeps your brand everywhere it matters.',
                'image1' => 'https://images.unsplash.com/photo-1611926653458-09294b3142bf?auto=format&fit=crop&w=900&q=80',
                'image2' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80',
                'big_stat' => '12x',
                'big_stat_label' => 'More qualified leads from social in 6 months',
                'quote' => 'They turned our social channels into our best-performing lead source — with content people actually want to watch.',
                'quote_author' => 'Marketing Director, D2C brand',
            ],
            'html' => <<<'HTML'
<section class="smm-bento">
  <div class="smm-wrap">
    <div class="smm-bento-head">
      <div>
        <span class="smm-bento-kicker">Capabilities</span>
        <h2>{{heading}}</h2>
      </div>
      <p>{{subheading}}</p>
    </div>
    <div class="smm-bento-grid">
      <article class="smm-bcard smm-b-img1">
        <img src="{{image1}}" alt="Social content creation" onerror="this.onerror=null;this.src='https://picsum.photos/seed/smm-bento1/900/700';">
        <span class="smm-btag">Content Studio</span>
        <div class="smm-bimg-cap"><strong>Always-on creative</strong><span>Reels · Carousels · Stories</span></div>
      </article>
      <article class="smm-bcard smm-b-stat">
        <span class="smm-bstat-glow"></span>
        <strong>{{big_stat}}</strong>
        <span>{{big_stat_label}}</span>
        <div class="smm-bspark"><i style="height:30%"></i><i style="height:52%"></i><i style="height:40%"></i><i style="height:72%"></i><i style="height:90%"></i></div>
      </article>
      <article class="smm-bcard smm-b-icon">
        <span class="smm-bicon"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
        <h3>Creative that converts</h3>
        <p>Thumb-stopping hooks, native-first edits and testing cycles that find your winners fast.</p>
      </article>
      <article class="smm-bcard smm-b-img2">
        <img src="{{image2}}" alt="Social media team planning" onerror="this.onerror=null;this.src='https://picsum.photos/seed/smm-bento2/900/700';">
        <div class="smm-bimg-cap"><strong>One connected team</strong><span>Strategy · Media · Creative</span></div>
      </article>
      <article class="smm-bcard smm-b-list">
        <h3>Channels we scale</h3>
        <ul>
          <li><i class="fa-brands fa-instagram"></i> Instagram</li>
          <li><i class="fa-brands fa-tiktok"></i> TikTok</li>
          <li><i class="fa-brands fa-linkedin"></i> LinkedIn</li>
          <li><i class="fa-brands fa-youtube"></i> YouTube</li>
        </ul>
      </article>
      <article class="smm-bcard smm-b-quote">
        <i class="fa-solid fa-quote-left"></i>
        <p>{{quote}}</p>
        <span>{{quote_author}}</span>
      </article>
    </div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-bento{background:#f4f2ff;padding:clamp(3.5rem,7vw,6rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;color:#191634}
.smm-bento-head{display:grid;grid-template-columns:1.1fr .9fr;gap:clamp(1.5rem,4vw,3rem);align-items:end;margin-bottom:clamp(1.8rem,4vw,2.8rem)}
.smm-bento-kicker{font-size:.76rem;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:#7c3aed}
.smm-bento-head h2{font-size:clamp(2rem,4vw,3.1rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;margin:12px 0 0;color:#14112b}
.smm-bento-head>p{margin:0;color:#64617f;line-height:1.7;font-size:1rem}
.smm-bento-grid{display:grid;grid-template-columns:repeat(4,1fr);grid-template-rows:repeat(3,minmax(150px,auto));gap:16px}
.smm-bcard{position:relative;border-radius:22px;overflow:hidden;background:#fff;border:1px solid #e7e2fb;box-shadow:0 18px 40px -30px rgba(60,40,140,.4);padding:24px}
.smm-b-img1{grid-column:1/3;grid-row:1/3;padding:0}
.smm-b-img1 img,.smm-b-img2 img{width:100%;height:100%;object-fit:cover;position:absolute;inset:0}
.smm-b-img1:after,.smm-b-img2:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 45%,rgba(12,10,30,.82))}
.smm-btag{position:absolute;top:16px;left:16px;z-index:2;background:rgba(255,255,255,.92);color:#5b21b6;font-size:.72rem;font-weight:800;padding:7px 12px;border-radius:999px;letter-spacing:.04em}
.smm-bimg-cap{position:absolute;left:22px;right:22px;bottom:20px;z-index:2;color:#fff}
.smm-bimg-cap strong{display:block;font-size:1.15rem;font-weight:750;margin-bottom:4px}
.smm-bimg-cap span{font-size:.78rem;color:rgba(255,255,255,.78)}
.smm-b-stat{grid-column:3/5;grid-row:1/2;background:linear-gradient(135deg,#1e1b4b,#4c1d95);color:#fff;display:flex;flex-direction:column;justify-content:center}
.smm-bstat-glow{position:absolute;width:200px;height:200px;border-radius:50%;background:#7c3aed;filter:blur(60px);opacity:.6;top:-60px;right:-40px}
.smm-b-stat strong{position:relative;font-size:clamp(2.4rem,5vw,3.6rem);font-weight:800;letter-spacing:-.04em;line-height:1}
.smm-b-stat>span{position:relative;margin-top:8px;font-size:.86rem;color:#c4b5fd;font-weight:600;max-width:260px}
.smm-bspark{position:absolute;right:22px;bottom:22px;display:flex;align-items:flex-end;gap:5px;height:54px}
.smm-bspark i{width:9px;border-radius:4px 4px 0 0;background:linear-gradient(180deg,#22d3ee,#a78bfa)}
.smm-b-icon{grid-column:3/4;grid-row:2/3;background:#fff}
.smm-bicon{display:grid;place-items:center;width:48px;height:48px;border-radius:14px;background:#ede9fe;color:#7c3aed;font-size:1.2rem;margin-bottom:16px}
.smm-b-icon h3{font-size:1.02rem;font-weight:750;margin:0 0 8px;color:#191634}
.smm-b-icon p{font-size:.82rem;line-height:1.6;color:#6b6885;margin:0}
.smm-b-img2{grid-column:4/5;grid-row:2/3;padding:0}
.smm-b-list{grid-column:1/2;grid-row:3/4;background:#fff}
.smm-b-list h3{font-size:1rem;font-weight:750;margin:0 0 14px;color:#191634}
.smm-b-list ul{list-style:none;margin:0;padding:0;display:grid;gap:10px}
.smm-b-list li{display:flex;align-items:center;gap:9px;font-size:.86rem;font-weight:600;color:#4b4866}
.smm-b-list li i{color:#7c3aed;width:18px;text-align:center}
.smm-b-quote{grid-column:2/5;grid-row:3/4;background:linear-gradient(120deg,#ffffff,#f3efff);display:flex;flex-direction:column;justify-content:center}
.smm-b-quote>i{color:#c4b5fd;font-size:1.5rem;margin-bottom:10px}
.smm-b-quote p{font-size:clamp(1rem,1.6vw,1.22rem);font-weight:600;line-height:1.5;color:#2b2848;margin:0 0 12px;letter-spacing:-.01em}
.smm-b-quote span{font-size:.8rem;font-weight:700;color:#7c3aed}
@media(max-width:900px){.smm-bento-head{grid-template-columns:1fr}.smm-bento-grid{grid-template-columns:1fr 1fr;grid-template-rows:auto}
.smm-b-img1{grid-column:1/3;grid-row:auto;aspect-ratio:16/10}.smm-b-stat{grid-column:1/3;grid-row:auto}.smm-b-icon{grid-column:1/2;grid-row:auto}.smm-b-img2{grid-column:2/3;grid-row:auto;aspect-ratio:1}.smm-b-list{grid-column:1/2;grid-row:auto}.smm-b-quote{grid-column:2/3;grid-row:auto}}
@media(max-width:560px){.smm-bento-grid{grid-template-columns:1fr}.smm-b-img1,.smm-b-stat,.smm-b-icon,.smm-b-img2,.smm-b-list,.smm-b-quote{grid-column:1;grid-row:auto}.smm-b-img2{aspect-ratio:16/10}}
CSS,
        ];
    }

    private function processSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'subheading', 'label' => 'Section intro', 'type' => 'paragraph'],
                ['key' => 'step1_title', 'label' => 'Step 1 title', 'type' => 'text'],
                ['key' => 'step1_desc', 'label' => 'Step 1 description', 'type' => 'paragraph'],
                ['key' => 'step2_title', 'label' => 'Step 2 title', 'type' => 'text'],
                ['key' => 'step2_desc', 'label' => 'Step 2 description', 'type' => 'paragraph'],
                ['key' => 'step3_title', 'label' => 'Step 3 title', 'type' => 'text'],
                ['key' => 'step3_desc', 'label' => 'Step 3 description', 'type' => 'paragraph'],
                ['key' => 'step4_title', 'label' => 'Step 4 title', 'type' => 'text'],
                ['key' => 'step4_desc', 'label' => 'Step 4 description', 'type' => 'paragraph'],
            ],
            'values' => [
                'heading' => 'From first audit to compounding growth',
                'subheading' => 'A simple, transparent process — with clear approvals, weekly check-ins and reporting you can actually act on.',
                'step1_title' => 'Audit & Discover',
                'step1_desc' => 'We map your channels, audience, competitors and past performance to find the fastest wins.',
                'step2_title' => 'Strategy & Plan',
                'step2_desc' => 'You get a 90-day roadmap with content pillars, channel roles, budgets and target KPIs.',
                'step3_title' => 'Launch & Create',
                'step3_desc' => 'Our studio ships platform-native creative while media buyers launch and test campaigns.',
                'step4_title' => 'Optimise & Scale',
                'step4_desc' => 'We double down on what converts, kill what does not, and report results every week.',
            ],
            'html' => <<<'HTML'
<section class="smm-proc">
  <div class="smm-wrap">
    <div class="smm-proc-head">
      <span class="smm-proc-kicker">How it works</span>
      <h2>{{heading}}</h2>
      <p>{{subheading}}</p>
    </div>
    <div class="smm-proc-track">
      <span class="smm-proc-line"></span>
      <div class="smm-step">
        <span class="smm-step-dot"><i class="fa-solid fa-magnifying-glass"></i></span>
        <span class="smm-step-num">01</span>
        <h3>{{step1_title}}</h3>
        <p>{{step1_desc}}</p>
      </div>
      <div class="smm-step">
        <span class="smm-step-dot"><i class="fa-solid fa-compass-drafting"></i></span>
        <span class="smm-step-num">02</span>
        <h3>{{step2_title}}</h3>
        <p>{{step2_desc}}</p>
      </div>
      <div class="smm-step">
        <span class="smm-step-dot"><i class="fa-solid fa-rocket"></i></span>
        <span class="smm-step-num">03</span>
        <h3>{{step3_title}}</h3>
        <p>{{step3_desc}}</p>
      </div>
      <div class="smm-step">
        <span class="smm-step-dot"><i class="fa-solid fa-chart-line"></i></span>
        <span class="smm-step-num">04</span>
        <h3>{{step4_title}}</h3>
        <p>{{step4_desc}}</p>
      </div>
    </div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-proc{background:#fffaf3;padding:clamp(3.5rem,7vw,6rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;color:#1b1730}
.smm-proc-head{max-width:720px;margin:0 auto clamp(2.4rem,5vw,3.6rem);text-align:center}
.smm-proc-kicker{display:inline-block;font-size:.76rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#d97706}
.smm-proc-head h2{font-size:clamp(2rem,4vw,3.1rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;margin:14px 0 16px;color:#1b1730}
.smm-proc-head p{margin:0;color:#6a6580;line-height:1.7;font-size:1.02rem}
.smm-proc-track{position:relative;display:grid;grid-template-columns:repeat(4,1fr);gap:clamp(1rem,2.5vw,2rem)}
.smm-proc-line{position:absolute;top:34px;left:9%;right:9%;height:2px;background:linear-gradient(90deg,#fbbf24,#f97316,#ec4899,#a855f7);opacity:.45}
.smm-step{position:relative;text-align:center;padding:0 .4rem}
.smm-step-dot{position:relative;z-index:2;display:grid;place-items:center;width:68px;height:68px;margin:0 auto 22px;border-radius:20px;background:#fff;border:2px solid #fde3c4;color:#ea580c;font-size:1.35rem;box-shadow:0 14px 34px -18px rgba(234,88,12,.5)}
.smm-step-num{display:block;font-size:.74rem;font-weight:800;letter-spacing:.18em;color:#d97706;margin-bottom:8px}
.smm-step h3{font-size:1.1rem;font-weight:750;margin:0 0 9px;color:#1b1730}
.smm-step p{font-size:.88rem;line-height:1.65;color:#6a6580;margin:0}
@media(max-width:820px){.smm-proc-track{grid-template-columns:1fr 1fr;gap:2.2rem 1.4rem}.smm-proc-line{display:none}}
@media(max-width:520px){.smm-proc-track{grid-template-columns:1fr}.smm-step{text-align:left;display:grid;grid-template-columns:68px 1fr;column-gap:18px;align-items:start}.smm-step-dot{margin:0;grid-row:1/4}.smm-step-num{margin:2px 0 6px}}
CSS,
        ];
    }

    private function resultsSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'body', 'label' => 'Section paragraph', 'type' => 'paragraph'],
                ['key' => 'bg_image', 'label' => 'Background image URL', 'type' => 'text'],
                ['key' => 'm1_value', 'label' => 'Metric 1 value', 'type' => 'text'],
                ['key' => 'm1_label', 'label' => 'Metric 1 label', 'type' => 'text'],
                ['key' => 'm1_bar', 'label' => 'Metric 1 bar width (%)', 'type' => 'text'],
                ['key' => 'm2_value', 'label' => 'Metric 2 value', 'type' => 'text'],
                ['key' => 'm2_label', 'label' => 'Metric 2 label', 'type' => 'text'],
                ['key' => 'm2_bar', 'label' => 'Metric 2 bar width (%)', 'type' => 'text'],
                ['key' => 'm3_value', 'label' => 'Metric 3 value', 'type' => 'text'],
                ['key' => 'm3_label', 'label' => 'Metric 3 label', 'type' => 'text'],
                ['key' => 'm3_bar', 'label' => 'Metric 3 bar width (%)', 'type' => 'text'],
                ['key' => 'cta_text', 'label' => 'Button text', 'type' => 'text'],
                ['key' => 'cta_link', 'label' => 'Button link', 'type' => 'link'],
            ],
            'values' => [
                'heading' => 'Proof that social actually pays back',
                'body' => 'We track the metrics that matter to your business — reach, engagement, cost per lead and revenue — and turn them into decisions, not dashboards nobody reads.',
                'bg_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
                'm1_value' => '4.8x',
                'm1_label' => 'Return on ad spend',
                'm1_bar' => '92',
                'm2_value' => '-38%',
                'm2_label' => 'Cost per qualified lead',
                'm2_bar' => '74',
                'm3_value' => '3.1x',
                'm3_label' => 'Engagement rate growth',
                'm3_bar' => '83',
                'cta_text' => 'Request a performance audit',
                'cta_link' => '/contact#contact',
            ],
            'html' => <<<'HTML'
<section class="smm-results" id="proven-results">
  <img class="smm-results-bg" src="{{bg_image}}" alt="Analytics dashboard" onerror="this.style.display='none'">
  <span class="smm-results-veil"></span>
  <div class="smm-wrap smm-results-grid">
    <div class="smm-results-copy">
      <span class="smm-results-kicker"><i class="fa-solid fa-signal"></i> Results</span>
      <h2>{{heading}}</h2>
      <p>{{body}}</p>
      <a class="smm-results-btn" href="{{cta_link}}">{{cta_text}} <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="smm-panel">
      <div class="smm-panel-head"><span>Performance snapshot</span><em>Last 6 months</em></div>
      <div class="smm-meter">
        <div class="smm-meter-top"><span>{{m1_label}}</span><strong>{{m1_value}}</strong></div>
        <div class="smm-meter-bar"><i style="width:{{m1_bar}}%"></i></div>
      </div>
      <div class="smm-meter">
        <div class="smm-meter-top"><span>{{m2_label}}</span><strong>{{m2_value}}</strong></div>
        <div class="smm-meter-bar smm-meter-bar--cyan"><i style="width:{{m2_bar}}%"></i></div>
      </div>
      <div class="smm-meter">
        <div class="smm-meter-top"><span>{{m3_label}}</span><strong>{{m3_value}}</strong></div>
        <div class="smm-meter-bar smm-meter-bar--green"><i style="width:{{m3_bar}}%"></i></div>
      </div>
      <p class="smm-panel-note"><i class="fa-solid fa-circle-check"></i> Data from blended client campaigns. Results vary by industry and budget.</p>
    </div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-results{position:relative;overflow:hidden;background:#0b0b23;color:#fff;padding:clamp(4rem,8vw,7rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;isolation:isolate}
.smm-results-bg{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:.28;z-index:0}
.smm-results-veil{position:absolute;inset:0;z-index:1;background:linear-gradient(105deg,#0b0b23 30%,rgba(11,11,35,.86) 55%,rgba(76,29,149,.6))}
.smm-results-grid{position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:clamp(2rem,5vw,4rem);align-items:center}
.smm-results-kicker{display:inline-flex;align-items:center;gap:9px;font-size:.76rem;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:#67e8f9}
.smm-results-copy h2{font-size:clamp(2rem,4vw,3.3rem);line-height:1.06;letter-spacing:-.04em;font-weight:800;margin:14px 0 18px}
.smm-results-copy p{color:rgba(226,232,240,.8);line-height:1.75;font-size:1.02rem;margin:0 0 28px;max-width:520px}
.smm-results-btn{display:inline-flex;align-items:center;gap:10px;background:linear-gradient(100deg,#22d3ee,#8b5cf6);color:#fff;text-decoration:none;padding:15px 26px;border-radius:14px;font-weight:750;font-size:.95rem;transition:transform .2s;box-shadow:0 16px 36px -16px rgba(34,211,238,.7)}
.smm-results-btn:hover{transform:translateY(-2px)}
.smm-panel{background:rgba(255,255,255,.06);backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.14);border-radius:24px;padding:clamp(1.5rem,3vw,2.2rem);box-shadow:0 30px 70px -30px rgba(0,0,0,.7)}
.smm-panel-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.6rem}
.smm-panel-head span{font-weight:750;font-size:1rem}
.smm-panel-head em{font-style:normal;font-size:.74rem;color:#a5b4fc;font-weight:600}
.smm-meter{margin-bottom:1.4rem}
.smm-meter-top{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:9px}
.smm-meter-top span{font-size:.86rem;color:#cbd5e1;font-weight:600}
.smm-meter-top strong{font-size:1.35rem;font-weight:800;letter-spacing:-.02em}
.smm-meter-bar{height:9px;border-radius:999px;background:rgba(255,255,255,.12);overflow:hidden}
.smm-meter-bar i{display:block;height:100%;border-radius:999px;background:linear-gradient(90deg,#a78bfa,#8b5cf6)}
.smm-meter-bar--cyan i{background:linear-gradient(90deg,#22d3ee,#0ea5e9)}
.smm-meter-bar--green i{background:linear-gradient(90deg,#34d399,#10b981)}
.smm-panel-note{margin:1.2rem 0 0;font-size:.74rem;color:#94a3b8;line-height:1.5;display:flex;gap:8px}
.smm-panel-note i{color:#34d399;margin-top:2px}
@media(max-width:860px){.smm-results-grid{grid-template-columns:1fr}}
CSS,
        ];
    }

    private function platformsSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'subheading', 'label' => 'Section intro', 'type' => 'paragraph'],
            ],
            'values' => [
                'heading' => 'Native expertise on every platform',
                'subheading' => 'We do not recycle one format everywhere. Each channel gets its own creative language, posting rhythm and performance plan.',
            ],
            'html' => <<<'HTML'
<section class="smm-platforms">
  <div class="smm-plat-head">
    <span class="smm-plat-kicker">Platforms</span>
    <h2>{{heading}}</h2>
    <p>{{subheading}}</p>
  </div>
  <div class="smm-plat-scroller">
    <article class="smm-plat-card smm-p-ig">
      <span class="smm-plat-icon"><i class="fa-brands fa-instagram"></i></span>
      <h3>Instagram</h3>
      <p>Reels, carousels and shopping-first creative that turns saves and shares into sales.</p>
      <span class="smm-plat-stat"><strong>8.4%</strong> avg. engagement lift</span>
    </article>
    <article class="smm-plat-card smm-p-tt">
      <span class="smm-plat-icon"><i class="fa-brands fa-tiktok"></i></span>
      <h3>TikTok</h3>
      <p>Native, creator-style video built to ride trends without losing your brand voice.</p>
      <span class="smm-plat-stat"><strong>3.2x</strong> average reach</span>
    </article>
    <article class="smm-plat-card smm-p-li">
      <span class="smm-plat-icon"><i class="fa-brands fa-linkedin"></i></span>
      <h3>LinkedIn</h3>
      <p>Thought-leadership and ABM campaigns that fill your pipeline with real decision-makers.</p>
      <span class="smm-plat-stat"><strong>61%</strong> lower CPL</span>
    </article>
    <article class="smm-plat-card smm-p-yt">
      <span class="smm-plat-icon"><i class="fa-brands fa-youtube"></i></span>
      <h3>YouTube</h3>
      <p>Video storytelling and in-feed ads that build memory and drive measurable intent.</p>
      <span class="smm-plat-stat"><strong>2.7x</strong> view-through</span>
    </article>
    <article class="smm-plat-card smm-p-x">
      <span class="smm-plat-icon"><i class="fa-brands fa-x-twitter"></i></span>
      <h3>X</h3>
      <p>Real-time conversation and launch moments that keep your brand part of the dialogue.</p>
      <span class="smm-plat-stat"><strong>+46%</strong> mentions</span>
    </article>
    <article class="smm-plat-card smm-p-fb">
      <span class="smm-plat-icon"><i class="fa-brands fa-facebook-f"></i></span>
      <h3>Facebook</h3>
      <p>Full-funnel ads, catalogues and retargeting that consistently deliver at scale.</p>
      <span class="smm-plat-stat"><strong>5.1x</strong> average ROAS</span>
    </article>
  </div>
  <p class="smm-plat-hint">Swipe to explore <i class="fa-solid fa-arrow-right"></i></p>
</section>
HTML,
            'css' => <<<'CSS'
.smm-platforms{background:#ffffff;padding:clamp(3.5rem,7vw,6rem) 0 clamp(2.5rem,5vw,4rem);font-family:Inter,Arial,sans-serif;color:#191634;overflow:hidden}
.smm-plat-head{width:min(1180px,calc(100% - 3rem));margin:0 auto clamp(1.8rem,4vw,2.6rem);text-align:center}
.smm-plat-kicker{display:inline-block;font-size:.76rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#db2777}
.smm-plat-head h2{font-size:clamp(2rem,4vw,3.1rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;margin:12px 0 14px;color:#14112b}
.smm-plat-head p{max-width:660px;margin:0 auto;color:#64617f;line-height:1.7;font-size:1rem}
.smm-plat-scroller{display:flex;gap:18px;overflow-x:auto;scroll-snap-type:x mandatory;padding:6px clamp(1.25rem,4vw,3.5rem) 24px;scrollbar-width:thin}
.smm-plat-scroller::-webkit-scrollbar{height:8px}
.smm-plat-scroller::-webkit-scrollbar-thumb{background:#d8d2f5;border-radius:99px}
.smm-plat-card{flex:0 0 clamp(250px,26vw,300px);scroll-snap-align:center;border-radius:22px;padding:28px;color:#fff;position:relative;overflow:hidden;min-height:300px;display:flex;flex-direction:column;transition:transform .25s;border:1px solid rgba(255,255,255,.14)}
.smm-plat-card:hover{transform:translateY(-6px)}
.smm-plat-icon{display:grid;place-items:center;width:52px;height:52px;border-radius:15px;background:rgba(255,255,255,.16);font-size:1.5rem;margin-bottom:auto}
.smm-plat-card h3{font-size:1.35rem;font-weight:800;margin:20px 0 9px;letter-spacing:-.02em}
.smm-plat-card p{font-size:.87rem;line-height:1.6;color:rgba(255,255,255,.85);margin:0 0 16px}
.smm-plat-stat{display:inline-flex;align-items:baseline;gap:6px;font-size:.78rem;color:rgba(255,255,255,.85);padding-top:12px;border-top:1px solid rgba(255,255,255,.22)}
.smm-plat-stat strong{font-size:1.05rem;color:#fff}
.smm-p-ig{background:linear-gradient(150deg,#833ab4,#fd1d1d 60%,#fcb045)}
.smm-p-tt{background:linear-gradient(150deg,#111827,#25f4ee 140%);}
.smm-p-li{background:linear-gradient(150deg,#0a66c2,#004182)}
.smm-p-yt{background:linear-gradient(150deg,#ff0000,#7f1d1d)}
.smm-p-x{background:linear-gradient(150deg,#1f2937,#000)}
.smm-p-fb{background:linear-gradient(150deg,#1877f2,#0b3d91)}
.smm-plat-hint{width:min(1180px,calc(100% - 3rem));margin:0 auto;text-align:right;font-size:.78rem;font-weight:700;color:#8b88a8}
.smm-plat-hint i{animation:smm-nudge 1.4s ease-in-out infinite}
@keyframes smm-nudge{0%,100%{transform:translateX(0)}50%{transform:translateX(6px)}}
CSS,
        ];
    }

    private function caseStudySection(): array
    {
        return [
            'schema' => [
                ['key' => 'client', 'label' => 'Client / category label', 'type' => 'text'],
                ['key' => 'heading', 'label' => 'Case study heading', 'type' => 'heading'],
                ['key' => 'body', 'label' => 'Case study body', 'type' => 'paragraph'],
                ['key' => 'image', 'label' => 'Case study image URL', 'type' => 'text'],
                ['key' => 'r1_value', 'label' => 'Result 1 value', 'type' => 'text'],
                ['key' => 'r1_label', 'label' => 'Result 1 label', 'type' => 'text'],
                ['key' => 'r2_value', 'label' => 'Result 2 value', 'type' => 'text'],
                ['key' => 'r2_label', 'label' => 'Result 2 label', 'type' => 'text'],
                ['key' => 'r3_value', 'label' => 'Result 3 value', 'type' => 'text'],
                ['key' => 'r3_label', 'label' => 'Result 3 label', 'type' => 'text'],
                ['key' => 'quote', 'label' => 'Client quote', 'type' => 'paragraph'],
                ['key' => 'author', 'label' => 'Quote author', 'type' => 'text'],
                ['key' => 'cta_text', 'label' => 'Button text', 'type' => 'text'],
                ['key' => 'cta_link', 'label' => 'Button link', 'type' => 'link'],
            ],
            'values' => [
                'client' => 'Case study · D2C skincare',
                'heading' => 'From quiet channels to a 7-figure social funnel',
                'body' => 'A skincare brand was posting daily but barely moving the needle. We rebuilt the content engine, introduced creator-led video and switched to a full-funnel paid structure.',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1000&q=80',
                'r1_value' => '+412%',
                'r1_label' => 'Revenue from social',
                'r2_value' => '-43%',
                'r2_label' => 'Cost per purchase',
                'r3_value' => '18M',
                'r3_label' => 'Organic video views',
                'quote' => 'For the first time, social feels like a real revenue channel instead of a content chore. The reporting alone changed how we plan.',
                'author' => 'Founder, skincare brand',
                'cta_text' => 'Read the full story',
                'cta_link' => '/contact#contact',
            ],
            'html' => <<<'HTML'
<section class="smm-case">
  <div class="smm-case-grid">
    <div class="smm-case-media">
      <img src="{{image}}" alt="Social media campaign team" onerror="this.onerror=null;this.src='https://picsum.photos/seed/smm-case/1000/1300';">
      <span class="smm-case-flag"><i class="fa-solid fa-star"></i> Case Study</span>
    </div>
    <div class="smm-case-card">
      <span class="smm-case-client">{{client}}</span>
      <h2>{{heading}}</h2>
      <p>{{body}}</p>
      <div class="smm-case-metrics">
        <div><strong>{{r1_value}}</strong><span>{{r1_label}}</span></div>
        <div><strong>{{r2_value}}</strong><span>{{r2_label}}</span></div>
        <div><strong>{{r3_value}}</strong><span>{{r3_label}}</span></div>
      </div>
      <blockquote>
        <i class="fa-solid fa-quote-left"></i>
        <p>{{quote}}</p>
        <cite>{{author}}</cite>
      </blockquote>
      <a class="smm-case-btn" href="{{cta_link}}">{{cta_text}} <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-case{background:linear-gradient(120deg,#f4f1ff 0%,#ffffff 55%,#eef6ff 100%);padding:clamp(3.5rem,7vw,6rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;color:#191634}
.smm-case-grid{width:min(1180px,100%);margin:0 auto;display:grid;grid-template-columns:.9fr 1.1fr;gap:clamp(2rem,5vw,4rem);align-items:center}
.smm-case-media{position:relative;border-radius:26px;overflow:hidden;box-shadow:0 40px 80px -40px rgba(60,40,140,.55);aspect-ratio:4/5}
.smm-case-media img{width:100%;height:100%;object-fit:cover;display:block}
.smm-case-media:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 55%,rgba(20,16,50,.6))}
.smm-case-flag{position:absolute;top:18px;left:18px;z-index:2;display:inline-flex;align-items:center;gap:7px;background:rgba(255,255,255,.94);color:#6d28d9;font-size:.74rem;font-weight:800;padding:8px 13px;border-radius:999px;letter-spacing:.05em;text-transform:uppercase}
.smm-case-card{background:rgba(255,255,255,.7);backdrop-filter:blur(8px);border:1px solid #ece7fb;border-radius:26px;padding:clamp(1.6rem,3.5vw,2.8rem);box-shadow:0 30px 70px -45px rgba(60,40,140,.5)}
.smm-case-client{font-size:.76rem;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#7c3aed}
.smm-case-card h2{font-size:clamp(1.8rem,3.4vw,2.7rem);line-height:1.1;letter-spacing:-.04em;font-weight:800;margin:12px 0 16px;color:#14112b}
.smm-case-card>p{color:#645f80;line-height:1.7;font-size:.98rem;margin:0 0 24px}
.smm-case-metrics{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;padding:20px 0;border-top:1px solid #eae4fa;border-bottom:1px solid #eae4fa;margin-bottom:22px}
.smm-case-metrics strong{display:block;font-size:clamp(1.4rem,2.6vw,1.9rem);font-weight:800;letter-spacing:-.03em;color:#6d28d9}
.smm-case-metrics span{font-size:.74rem;color:#77739a;font-weight:600;line-height:1.4;display:block;margin-top:4px}
.smm-case-card blockquote{margin:0 0 24px;padding:0}
.smm-case-card blockquote>i{color:#c4b5fd;font-size:1.2rem;margin-bottom:8px;display:block}
.smm-case-card blockquote p{font-size:1rem;line-height:1.6;font-weight:600;color:#2b2848;margin:0 0 8px}
.smm-case-card cite{font-style:normal;font-size:.8rem;font-weight:700;color:#7c3aed}
.smm-case-btn{display:inline-flex;align-items:center;gap:10px;background:#17142f;color:#fff;text-decoration:none;padding:14px 24px;border-radius:13px;font-weight:750;font-size:.9rem;transition:transform .2s,background .2s}
.smm-case-btn:hover{background:#7c3aed;transform:translateY(-2px)}
@media(max-width:860px){.smm-case-grid{grid-template-columns:1fr}.smm-case-media{aspect-ratio:16/10;order:2}.smm-case-card{order:1}}
@media(max-width:480px){.smm-case-metrics{grid-template-columns:1fr;gap:14px;text-align:left}}
CSS,
        ];
    }

    private function pricingSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'subheading', 'label' => 'Section intro', 'type' => 'paragraph'],
                ['key' => 'plan1_name', 'label' => 'Plan 1 name', 'type' => 'text'],
                ['key' => 'plan1_price', 'label' => 'Plan 1 price', 'type' => 'text'],
                ['key' => 'plan1_desc', 'label' => 'Plan 1 description', 'type' => 'text'],
                ['key' => 'plan2_name', 'label' => 'Plan 2 name', 'type' => 'text'],
                ['key' => 'plan2_price', 'label' => 'Plan 2 price', 'type' => 'text'],
                ['key' => 'plan2_desc', 'label' => 'Plan 2 description', 'type' => 'text'],
                ['key' => 'plan3_name', 'label' => 'Plan 3 name', 'type' => 'text'],
                ['key' => 'plan3_price', 'label' => 'Plan 3 price', 'type' => 'text'],
                ['key' => 'plan3_desc', 'label' => 'Plan 3 description', 'type' => 'text'],
                ['key' => 'cta_link', 'label' => 'Plan button link', 'type' => 'link'],
                ['key' => 'note', 'label' => 'Pricing note', 'type' => 'text'],
            ],
            'values' => [
                'heading' => 'Plans that grow with your ambition',
                'subheading' => 'Start with a focused sprint or hand us the keys to an always-on social engine. Every plan includes a dedicated strategist.',
                'plan1_name' => 'Launch',
                'plan1_price' => '₹45k',
                'plan1_desc' => 'For brands building a consistent presence.',
                'plan2_name' => 'Growth',
                'plan2_price' => '₹95k',
                'plan2_desc' => 'Our most popular full-funnel engine.',
                'plan3_name' => 'Scale',
                'plan3_price' => 'Custom',
                'plan3_desc' => 'For multi-market, multi-channel brands.',
                'cta_link' => '/contact#contact',
                'note' => 'Monthly retainers. Ad spend billed separately. No long lock-ins.',
            ],
            'html' => <<<'HTML'
<section class="smm-pricing">
  <div class="smm-wrap">
    <div class="smm-price-head">
      <span class="smm-price-kicker">Packages</span>
      <h2>{{heading}}</h2>
      <p>{{subheading}}</p>
    </div>
    <div class="smm-price-grid">
      <article class="smm-plan">
        <span class="smm-plan-name">{{plan1_name}}</span>
        <div class="smm-plan-price">{{plan1_price}}<em>/mo</em></div>
        <p class="smm-plan-desc">{{plan1_desc}}</p>
        <ul>
          <li><i class="fa-solid fa-check"></i> 2 platforms</li>
          <li><i class="fa-solid fa-check"></i> 12 posts per month</li>
          <li><i class="fa-solid fa-check"></i> Monthly reporting</li>
          <li><i class="fa-solid fa-check"></i> Community support</li>
        </ul>
        <a class="smm-plan-btn" href="{{cta_link}}">Choose Launch</a>
      </article>
      <article class="smm-plan smm-plan-featured">
        <span class="smm-plan-flag">Most popular</span>
        <span class="smm-plan-name">{{plan2_name}}</span>
        <div class="smm-plan-price">{{plan2_price}}<em>/mo</em></div>
        <p class="smm-plan-desc">{{plan2_desc}}</p>
        <ul>
          <li><i class="fa-solid fa-check"></i> 4 platforms + paid ads</li>
          <li><i class="fa-solid fa-check"></i> 24 posts + 8 reels</li>
          <li><i class="fa-solid fa-check"></i> Creator partnerships</li>
          <li><i class="fa-solid fa-check"></i> Weekly optimisation</li>
          <li><i class="fa-solid fa-check"></i> Live performance dashboard</li>
        </ul>
        <a class="smm-plan-btn smm-plan-btn-solid" href="{{cta_link}}">Choose Growth</a>
      </article>
      <article class="smm-plan">
        <span class="smm-plan-name">{{plan3_name}}</span>
        <div class="smm-plan-price">{{plan3_price}}</div>
        <p class="smm-plan-desc">{{plan3_desc}}</p>
        <ul>
          <li><i class="fa-solid fa-check"></i> Unlimited channels</li>
          <li><i class="fa-solid fa-check"></i> Dedicated pod</li>
          <li><i class="fa-solid fa-check"></i> Advanced attribution</li>
          <li><i class="fa-solid fa-check"></i> Quarterly strategy labs</li>
        </ul>
        <a class="smm-plan-btn" href="{{cta_link}}">Talk to sales</a>
      </article>
    </div>
    <p class="smm-price-note"><i class="fa-solid fa-circle-info"></i> {{note}}</p>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-pricing{background:#fbfaff;padding:clamp(3.5rem,7vw,6rem) clamp(1.25rem,4vw,3.5rem);font-family:Inter,Arial,sans-serif;color:#191634}
.smm-price-head{max-width:720px;margin:0 auto clamp(2rem,4vw,3rem);text-align:center}
.smm-price-kicker{display:inline-block;font-size:.76rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#7c3aed}
.smm-price-head h2{font-size:clamp(2rem,4vw,3.1rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;margin:12px 0 14px;color:#14112b}
.smm-price-head p{color:#64617f;line-height:1.7;font-size:1rem;margin:0}
.smm-price-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;align-items:stretch}
.smm-plan{position:relative;background:#fff;border:1px solid #eae5fa;border-radius:24px;padding:clamp(1.6rem,2.6vw,2.2rem);display:flex;flex-direction:column;box-shadow:0 22px 50px -40px rgba(60,40,140,.5);transition:transform .25s,box-shadow .25s}
.smm-plan:hover{transform:translateY(-6px);box-shadow:0 34px 60px -38px rgba(60,40,140,.55)}
.smm-plan-name{font-size:.82rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:#7c3aed;margin-bottom:12px}
.smm-plan-price{font-size:clamp(2rem,3.6vw,2.8rem);font-weight:800;letter-spacing:-.04em;color:#14112b;line-height:1}
.smm-plan-price em{font-style:normal;font-size:.9rem;font-weight:600;color:#8b87a8;margin-left:3px}
.smm-plan-desc{font-size:.88rem;color:#6b6885;line-height:1.55;margin:10px 0 20px}
.smm-plan ul{list-style:none;margin:0 0 26px;padding:0;display:grid;gap:12px;flex:1}
.smm-plan li{display:flex;align-items:flex-start;gap:10px;font-size:.88rem;color:#4b4866;font-weight:500;line-height:1.4}
.smm-plan li i{color:#16a34a;margin-top:3px;font-size:.85rem}
.smm-plan-btn{display:block;text-align:center;text-decoration:none;padding:13px;border-radius:12px;border:1px solid #d9d1f7;color:#6d28d9;font-weight:750;font-size:.9rem;transition:all .2s}
.smm-plan-btn:hover{background:#f3efff}
.smm-plan-featured{background:linear-gradient(160deg,#1e1b4b,#4c1d95);border-color:#4c1d95;color:#fff;transform:scale(1.03);box-shadow:0 40px 80px -40px rgba(76,29,149,.7)}
.smm-plan-featured:hover{transform:scale(1.03) translateY(-6px)}
.smm-plan-featured .smm-plan-name{color:#c4b5fd}
.smm-plan-featured .smm-plan-price{color:#fff}
.smm-plan-featured .smm-plan-desc{color:rgba(226,232,240,.8)}
.smm-plan-featured li{color:rgba(226,232,240,.9)}
.smm-plan-featured li i{color:#34d399}
.smm-plan-flag{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:linear-gradient(100deg,#22d3ee,#a78bfa);color:#0b0b23;font-size:.7rem;font-weight:800;padding:6px 14px;border-radius:999px;white-space:nowrap;letter-spacing:.04em}
.smm-plan-btn-solid{background:#fff;border-color:#fff;color:#4c1d95}
.smm-plan-btn-solid:hover{background:#e9e4ff}
.smm-price-note{text-align:center;margin:2rem 0 0;font-size:.82rem;color:#8b87a8;display:flex;align-items:center;justify-content:center;gap:8px}
@media(max-width:900px){.smm-price-grid{grid-template-columns:1fr;max-width:460px;margin:0 auto}.smm-plan-featured{transform:none}.smm-plan-featured:hover{transform:translateY(-6px)}}
CSS,
        ];
    }

    private function faqSection(): array
    {
        return [
            'schema' => [
                ['key' => 'heading', 'label' => 'Section heading', 'type' => 'heading'],
                ['key' => 'subheading', 'label' => 'Section intro', 'type' => 'paragraph'],
                ['key' => 'q1', 'label' => 'Question 1', 'type' => 'text'],
                ['key' => 'a1', 'label' => 'Answer 1', 'type' => 'paragraph'],
                ['key' => 'q2', 'label' => 'Question 2', 'type' => 'text'],
                ['key' => 'a2', 'label' => 'Answer 2', 'type' => 'paragraph'],
                ['key' => 'q3', 'label' => 'Question 3', 'type' => 'text'],
                ['key' => 'a3', 'label' => 'Answer 3', 'type' => 'paragraph'],
                ['key' => 'q4', 'label' => 'Question 4', 'type' => 'text'],
                ['key' => 'a4', 'label' => 'Answer 4', 'type' => 'paragraph'],
                ['key' => 'q5', 'label' => 'Question 5', 'type' => 'text'],
                ['key' => 'a5', 'label' => 'Answer 5', 'type' => 'paragraph'],
                ['key' => 'cta_heading', 'label' => 'CTA heading', 'type' => 'text'],
                ['key' => 'cta_text', 'label' => 'CTA text', 'type' => 'text'],
                ['key' => 'cta_button', 'label' => 'CTA button text', 'type' => 'text'],
                ['key' => 'cta_link', 'label' => 'CTA button link', 'type' => 'link'],
            ],
            'values' => [
                'heading' => 'Questions? We have answers.',
                'subheading' => 'Everything you need to know before handing us your social channels — and what happens after you do.',
                'q1' => 'Which platforms should my brand be on?',
                'a1' => 'We look at where your audience already spends time, what your competitors are doing and what your sales cycle looks like. Then we recommend a focused set of channels instead of spreading you thin everywhere.',
                'q2' => 'Do you create the content or do we?',
                'a2' => 'We handle strategy, copywriting, design, editing and publishing. You review and approve through a simple monthly calendar. If you already have an in-house team, we plug in alongside them.',
                'q3' => 'How long until we see results?',
                'a3' => 'Paid campaigns can show meaningful signals within 3–4 weeks. Organic growth compounds over 3–6 months. We set expectations up front and report against them every week.',
                'q4' => 'Is ad spend included in the retainer?',
                'a4' => 'No — ad spend is billed directly to your ad accounts so you keep full ownership and transparency. Your retainer covers strategy, creative, media management and reporting.',
                'q5' => 'Can you work with our existing brand guidelines?',
                'a5' => 'Absolutely. We work inside your brand system and adapt it natively for each platform. If your guidelines are light, we can help evolve them into a flexible social style guide.',
                'cta_heading' => 'Ready to make social your growth channel?',
                'cta_text' => 'Book a free 30-minute strategy call. No pitch deck, no pressure — just a clear look at what is possible.',
                'cta_button' => 'Book your strategy call',
                'cta_link' => '/contact#contact',
            ],
            'html' => <<<'HTML'
<section class="smm-faq">
  <div class="smm-wrap smm-faq-grid">
    <div class="smm-faq-side">
      <span class="smm-faq-kicker">FAQ</span>
      <h2>{{heading}}</h2>
      <p>{{subheading}}</p>
      <div class="smm-faq-contact">
        <span class="smm-faq-ic"><i class="fa-solid fa-comments"></i></span>
        <div><strong>Still have questions?</strong><a href="{{cta_link}}">Talk to a strategist <i class="fa-solid fa-arrow-right"></i></a></div>
      </div>
    </div>
    <div class="smm-faq-list">
      <details class="smm-faq-item" open>
        <summary>{{q1}}<i class="fa-solid fa-plus"></i></summary>
        <p>{{a1}}</p>
      </details>
      <details class="smm-faq-item">
        <summary>{{q2}}<i class="fa-solid fa-plus"></i></summary>
        <p>{{a2}}</p>
      </details>
      <details class="smm-faq-item">
        <summary>{{q3}}<i class="fa-solid fa-plus"></i></summary>
        <p>{{a3}}</p>
      </details>
      <details class="smm-faq-item">
        <summary>{{q4}}<i class="fa-solid fa-plus"></i></summary>
        <p>{{a4}}</p>
      </details>
      <details class="smm-faq-item">
        <summary>{{q5}}<i class="fa-solid fa-plus"></i></summary>
        <p>{{a5}}</p>
      </details>
    </div>
  </div>
  <div class="smm-wrap">
    <div class="smm-faq-cta">
      <div>
        <h3>{{cta_heading}}</h3>
        <p>{{cta_text}}</p>
      </div>
      <a class="smm-faq-btn" href="{{cta_link}}">{{cta_button}} <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
</section>
HTML,
            'css' => <<<'CSS'
.smm-faq{background:#ffffff;padding:clamp(3.5rem,7vw,6rem) clamp(1.25rem,4vw,3.5rem) clamp(3rem,6vw,5rem);font-family:Inter,Arial,sans-serif;color:#191634}
.smm-faq-grid{display:grid;grid-template-columns:.85fr 1.15fr;gap:clamp(2rem,5vw,4rem);align-items:start;margin-bottom:clamp(2.5rem,5vw,4rem)}
.smm-faq-kicker{display:inline-block;font-size:.76rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#7c3aed}
.smm-faq-side h2{font-size:clamp(2rem,4vw,3rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;margin:12px 0 16px;color:#14112b}
.smm-faq-side>p{color:#64617f;line-height:1.7;font-size:1rem;margin:0 0 26px}
.smm-faq-contact{display:flex;align-items:center;gap:14px;padding:18px;border:1px solid #ece7fb;border-radius:16px;background:#faf8ff}
.smm-faq-ic{display:grid;place-items:center;width:46px;height:46px;border-radius:13px;background:linear-gradient(135deg,#8b5cf6,#06b6d4);color:#fff;font-size:1.1rem;flex:none}
.smm-faq-contact strong{display:block;font-size:.92rem;color:#191634;margin-bottom:3px}
.smm-faq-contact a{font-size:.85rem;font-weight:700;color:#7c3aed;text-decoration:none;display:inline-flex;align-items:center;gap:6px}
.smm-faq-list{display:grid;gap:12px}
.smm-faq-item{border:1px solid #ece7f8;border-radius:16px;background:#fff;padding:0 22px;transition:border-color .2s,box-shadow .2s}
.smm-faq-item[open]{border-color:#d8ccfb;box-shadow:0 18px 40px -34px rgba(80,60,180,.6)}
.smm-faq-item summary{display:flex;align-items:center;justify-content:space-between;gap:18px;cursor:pointer;list-style:none;padding:20px 0;font-size:1rem;font-weight:700;color:#1c1936}
.smm-faq-item summary::-webkit-details-marker{display:none}
.smm-faq-item summary i{color:#7c3aed;font-size:.8rem;transition:transform .25s;flex:none}
.smm-faq-item[open] summary i{transform:rotate(45deg)}
.smm-faq-item p{margin:0;padding:0 30px 22px 0;color:#6b6885;line-height:1.7;font-size:.92rem}
.smm-faq-cta{display:flex;align-items:center;justify-content:space-between;gap:2rem;background:linear-gradient(110deg,#1e1b4b,#4c1d95 55%,#7c3aed);border-radius:26px;padding:clamp(1.8rem,4vw,3rem);color:#fff;box-shadow:0 34px 70px -40px rgba(76,29,149,.75);overflow:hidden;position:relative}
.smm-faq-cta:after{content:"";position:absolute;width:320px;height:320px;border-radius:50%;background:#22d3ee;filter:blur(90px);opacity:.28;right:-60px;top:-80px}
.smm-faq-cta h3{position:relative;font-size:clamp(1.5rem,3vw,2.2rem);font-weight:800;letter-spacing:-.03em;line-height:1.15;margin:0 0 8px;max-width:600px}
.smm-faq-cta p{position:relative;margin:0;color:rgba(226,232,240,.82);font-size:.95rem;line-height:1.6;max-width:560px}
.smm-faq-btn{position:relative;flex:none;display:inline-flex;align-items:center;gap:10px;background:#fff;color:#4c1d95;text-decoration:none;padding:15px 26px;border-radius:14px;font-weight:800;font-size:.92rem;transition:transform .2s}
.smm-faq-btn:hover{transform:translateY(-2px)}
@media(max-width:860px){.smm-faq-grid{grid-template-columns:1fr}.smm-faq-cta{flex-direction:column;align-items:flex-start}.smm-faq-btn{width:100%;justify-content:center}}
CSS,
        ];
    }
}
