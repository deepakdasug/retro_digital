@extends('layouts.app')

@section('title', 'Admin Dashboard - Retrotech')

@section('content')
<main class="admin-dashboard-page">
  <aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation">
    <a class="admin-brand" href="{{ route('home') }}" aria-label="Retrotech website home">
      <img class="admin-brand-full" src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Digital">
      <img class="admin-brand-mark" src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
    </a>
    <span class="admin-sidebar-caption">WORKSPACE</span>
    <nav class="admin-sidebar-nav">
      <button class="admin-sidebar-link is-active" type="button" data-admin-tab="overview" aria-label="Overview" title="Overview" onclick="showAdminTab('overview')"><i class="fa-solid fa-chart-pie" aria-hidden="true"></i><span>Overview</span></button>
      <button class="admin-sidebar-link" type="button" data-admin-tab="contacts" aria-label="Contacts ({{ $contacts->count() }})" title="Contacts ({{ $contacts->count() }})" onclick="showAdminTab('contacts')"><i class="fa-regular fa-address-book" aria-hidden="true"></i><span>Contacts</span><b>{{ $contacts->count() }}</b></button>
      <button class="admin-sidebar-link" type="button" data-admin-tab="enquiry-insights" aria-label="Enquiry insights ({{ $serviceCategoryCount }} service categories)" title="Enquiry insights" onclick="showAdminTab('enquiry-insights')"><i class="fa-solid fa-chart-column" aria-hidden="true"></i><span>Enquiry insights</span><b>{{ $serviceCategoryCount }}</b></button>
      <button class="admin-sidebar-link" type="button" data-admin-tab="blogs" aria-label="Blog articles ({{ $blogs->count() }})" title="Blog articles ({{ $blogs->count() }})" onclick="showAdminTab('blogs')"><i class="fa-regular fa-newspaper" aria-hidden="true"></i><span>Blog articles</span><b>{{ $blogs->count() }}</b></button>
      <button class="admin-sidebar-link" type="button" data-admin-tab="content-insights" aria-label="Content insights ({{ $draftBlogs }} drafts)" title="Content insights" onclick="showAdminTab('content-insights')"><i class="fa-solid fa-chart-line" aria-hidden="true"></i><span>Content insights</span><b>{{ $draftBlogs }}</b></button>
      <button class="admin-sidebar-link" type="button" data-admin-tab="recent-activity" aria-label="Recent activity ({{ $recentActivityCount }} this week)" title="Recent activity" onclick="showAdminTab('recent-activity')"><i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i><span>Recent activity</span><b>{{ $recentActivityCount }}</b></button>
      <button class="admin-sidebar-link" type="button" data-admin-tab="testimonials" aria-label="Testimonials" title="Testimonials" onclick="showAdminTab('testimonials')"><i class="fa-regular fa-star" aria-hidden="true"></i><span>Testimonials</span></button>
    </nav>
    <div class="admin-sidebar-bottom">
      <a href="{{ route('home') }}" target="_blank" rel="noopener" class="icon-label-control" aria-label="View website" title="View website"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i><span>View website</span></a>
      <div class="admin-sidebar-user"><span class="admin-user-avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>Administrator</small></span></div>
      <form method="POST" action="{{ route('logout') }}" style="width:100%">
        @csrf
        <!-- <button type="submit" class="icon-label-control" style="width:100%;background:none;border:none;cursor:pointer;color:inherit;" aria-label="Sign out" title="Sign out">
          <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i><span>Sign out</span>
        </button> -->
      </form>
      <button type="button" class="admin-sidebar-collapse-btn" id="sidebarToggle" aria-label="Collapse sidebar" aria-controls="adminSidebar" aria-expanded="true" title="Collapse sidebar">
        <i class="fa-solid fa-angles-left" aria-hidden="true"></i>
        <span>Collapse</span>
      </button>
    </div>
  </aside>

  <div class="admin-dashboard-main" id="dashboard">
    <header class="admin-topbar">
      <div class="admin-topbar-heading">
        <div class="admin-topbar-title"><span class="admin-dashboard-kicker">RETROTECH DIGITAL</span><h1>Admin workspace</h1></div>
      </div>
      <div class="admin-topbar-actions">
        <span class="admin-dashboard-date"><i class="fa-regular fa-calendar"></i> {{ now()->format('l, F j, Y') }}</span>
        <span class="admin-topbar-avatar" aria-label="{{ auth()->user()->name }}">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="admin-dashboard-logout icon-label-control" aria-label="Log out" title="Log out">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i><span>Log out</span>
          </button>
        </form>
      </div>
    </header>

    @if(session('success'))
      <div class="admin-dashboard-success" role="status"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif

    <section id="section-overview" class="admin-overview-section" role="tabpanel" aria-label="Dashboard overview">
    <section class="admin-traffic-panel" aria-label="Interactive contact and blog activity">
      <div class="admin-traffic-heading">
        <div><span class="admin-section-eyebrow">SITE ACTIVITY</span><h2>Enquiries &amp; publishing</h2><p>Explore how contact enquiries and blog publishing change over time.</p></div>
        <div class="admin-traffic-summary"><span><i></i><b id="chartContactTotal">{{ $contacts->count() }}</b> contacts</span><span><i></i><b id="chartBlogTotal">{{ $blogs->count() }}</b> articles</span></div>
      </div>
      <div class="admin-traffic-controls" aria-label="Graph options">
        <div class="admin-chart-ranges" role="group" aria-label="Time period">
          <button type="button" data-chart-range="7d" aria-label="Show last 7 days" title="Show last 7 days" aria-pressed="false"><i class="fa-regular fa-calendar" aria-hidden="true"></i><span>7 days</span></button>
          <button type="button" data-chart-range="30d" aria-label="Show last 30 days" title="Show last 30 days" aria-pressed="true"><i class="fa-regular fa-calendar-days" aria-hidden="true"></i><span>30 days</span></button>
          <button type="button" data-chart-range="6m" aria-label="Show last 6 months" title="Show last 6 months" aria-pressed="false"><i class="fa-solid fa-calendar-week" aria-hidden="true"></i><span>6 months</span></button>
        </div>
        <div class="admin-chart-series" role="group" aria-label="Show data series">
          <button type="button" data-chart-series="contacts" aria-label="Toggle contacts series" title="Toggle contacts series" aria-pressed="true"><i class="fa-regular fa-address-book" aria-hidden="true"></i><span>Contacts</span></button>
          <button type="button" data-chart-series="blogs" aria-label="Toggle blog articles series" title="Toggle blog articles series" aria-pressed="true"><i class="fa-regular fa-newspaper" aria-hidden="true"></i><span>Blog articles</span></button>
        </div>
      </div>
      <div class="admin-traffic-chart-wrap">
        <svg id="adminActivityChart" class="admin-traffic-chart" viewBox="0 0 1000 330" role="img" aria-label="Interactive graph of contacts and blog articles over time"></svg>
        <div id="adminChartTooltip" class="admin-chart-tooltip" role="status" aria-live="polite">Hover or focus a graph point to see its details.</div>
      </div>
      <script type="application/json" id="adminChartData">@json($overviewChartData)</script>
    </section>

    <section class="admin-dashboard-metrics" aria-label="Website overview">
      <article class="admin-metric-card"><div class="admin-metric-icon is-green"><i class="fa-regular fa-address-card"></i></div><div><span class="admin-metric-label">Total enquiries</span><strong>{{ $contacts->count() }}</strong><small>{{ $contactsThisWeek }} received this week</small></div></article>
      <article class="admin-metric-card"><div class="admin-metric-icon is-blue"><i class="fa-solid fa-arrow-trend-up"></i></div><div><span class="admin-metric-label">This month</span><strong>{{ $contactsThisMonth }}</strong><small>Website enquiries this month</small></div></article>
      <article class="admin-metric-card"><div class="admin-metric-icon is-violet"><i class="fa-regular fa-newspaper"></i></div><div><span class="admin-metric-label">Published articles</span><strong>{{ $publishedBlogs }}</strong><small>{{ $blogsThisMonth }} created this month</small></div></article>
      <article class="admin-metric-card"><div class="admin-metric-icon is-amber"><i class="fa-regular fa-pen-to-square"></i></div><div><span class="admin-metric-label">Draft articles</span><strong>{{ $draftBlogs }}</strong><small>Ready for review or editing</small></div></article>
    </section>

    <section class="admin-insights-grid" aria-label="Contact and blog analysis">
      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">ENQUIRY ANALYSIS</span><h2>What visitors are asking for</h2><p>Service interests from all website submissions.</p></div><span class="admin-insight-icon"><i class="fa-solid fa-chart-pie"></i></span></div>
        @if($contactServices->isNotEmpty())
          <div class="admin-breakdown-list">
            @foreach($contactServices->take(5) as $service => $count)
              @php($share = $contacts->count() ? round($count / $contacts->count() * 100) : 0)
              <div class="admin-breakdown-item"><div><strong>{{ $service }}</strong><span>{{ $count }} {{ \Illuminate\Support\Str::plural('enquiry', $count) }}</span></div><div class="admin-breakdown-track"><span style="width: {{ $share }}%"></span></div></div>
            @endforeach
          </div>
        @else
          <p class="admin-insight-empty">Service interest analysis will appear as enquiries arrive.</p>
        @endif
        <div class="admin-insight-foot"><span><i class="fa-regular fa-building"></i> {{ $companyEnquiries }} company enquiries</span><span><i class="fa-regular fa-user"></i> {{ $contacts->count() - $companyEnquiries }} individual / unspecified</span></div>
      </article>

      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">CONTENT ANALYSIS</span><h2>Blog publishing overview</h2><p>Current publishing mix and recent activity.</p></div><span class="admin-insight-icon is-violet"><i class="fa-regular fa-newspaper"></i></span></div>
        <div class="admin-publishing-summary"><div><span>Published</span><strong>{{ $publishedBlogs }}</strong></div><div><span>Drafts</span><strong>{{ $draftBlogs }}</strong></div><div><span>Created this month</span><strong>{{ $blogsThisMonth }}</strong></div></div>
        <div class="admin-insight-latest"><span>Latest article</span>@if($latestBlog)<strong>{{ $latestBlog->title }}</strong><small>{{ $latestBlog->updated_at?->format('M d, Y') }} · {{ $latestBlog->is_published ? 'Published' : 'Draft' }}</small>@else<strong>No articles yet</strong><small>Create an article to begin your content library.</small>@endif</div>
        <div class="admin-insight-foot"><span><i class="fa-regular fa-user"></i> {{ $blogAuthors->count() }} {{ \Illuminate\Support\Str::plural('author', $blogAuthors->count()) }}</span><span><i class="fa-solid fa-file-lines"></i> {{ $blogContentCount }} articles with formatted content</span></div>
      </article>

      <article class="admin-insight-panel admin-insight-sources">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">VISITOR SOURCES</span><h2>How people found you</h2><p>Referral source responses from the contact form.</p></div><span class="admin-insight-icon is-blue"><i class="fa-solid fa-share-nodes"></i></span></div>
        @if($contactSources->isNotEmpty())
          <div class="admin-source-chips">@foreach($contactSources->take(6) as $source => $count)<span>{{ $source }} <b>{{ $count }}</b></span>@endforeach</div>
        @else
          <p class="admin-insight-empty">Referral insights will appear when people share how they found Retrotech.</p>
        @endif
        <div class="admin-insight-foot"><span><i class="fa-regular fa-clock"></i> Latest enquiry</span><strong>{{ $latestContact?->created_at?->diffForHumans() ?? 'No submissions yet' }}</strong></div>
      </article>

    </section>

    <section class="admin-insights-grid admin-overview-extra" aria-label="Recent work and items to review">
      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">INBOX SNAPSHOT</span><h2>Latest enquiries</h2><p>Most recent website submissions.</p></div><span class="admin-insight-icon"><i class="fa-regular fa-envelope"></i></span></div>
        @if($recentContacts->isNotEmpty())
          <div class="admin-activity-list">
            @foreach($recentContacts->take(5) as $contact)
              <div class="admin-activity-item"><span class="admin-activity-icon"><i class="fa-regular fa-user"></i></span><div><strong>{{ $contact->name }}</strong><small>{{ $contact->service ?: 'General enquiry' }} · {{ $contact->created_at?->diffForHumans() }}</small></div><a href="mailto:{{ $contact->email }}" aria-label="Email {{ $contact->name }}" title="Email {{ $contact->name }}"><i class="fa-regular fa-paper-plane"></i></a></div>
            @endforeach
          </div>
        @else
          <p class="admin-insight-empty">New website submissions will appear here.</p>
        @endif
        <button class="admin-inline-link" type="button" onclick="showAdminTab('contacts')">Open contact inbox <i class="fa-solid fa-arrow-right"></i></button>
      </article>

      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">EDITORIAL QUEUE</span><h2>Drafts to review</h2><p>Saved articles that are not published yet.</p></div><span class="admin-insight-icon is-violet"><i class="fa-regular fa-pen-to-square"></i></span></div>
        @php($overviewDrafts = $blogs->where('is_published', false)->take(4))
        @if($overviewDrafts->isNotEmpty())
          <div class="admin-activity-list">
            @foreach($overviewDrafts as $draft)
              <div class="admin-activity-item"><span class="admin-activity-icon is-violet"><i class="fa-regular fa-file-lines"></i></span><div><strong>{{ $draft->title }}</strong><small>Updated {{ $draft->updated_at?->diffForHumans() }}</small></div><a href="{{ route('admin.blog.edit', $draft) }}" aria-label="Edit {{ $draft->title }}" title="Edit draft"><i class="fa-regular fa-pen-to-square"></i></a></div>
            @endforeach
          </div>
        @else
          <p class="admin-insight-empty">There are no drafts waiting for review.</p>
        @endif
        <button class="admin-inline-link" type="button" onclick="showAdminTab('blogs')">Open blog library <i class="fa-solid fa-arrow-right"></i></button>
      </article>
    </section>

    </section>

    <section id="section-contacts" class="admin-dashboard-section" role="tabpanel" aria-label="Contact submissions" hidden>
        <div class="admin-section-heading">
          <div><span class="admin-section-eyebrow">INBOX</span><h2>Contact submissions</h2><p>Review enquiries and reach out to people interested in your services.</p></div>
          <span class="admin-section-total"><i class="fa-solid fa-inbox"></i> {{ $contacts->count() }} total</span>
        </div>
        <div class="admin-table-scroll"><table class="admin-data-table">
          <thead><tr><th>Name and email</th><th>Company</th><th>Service interest</th><th>Received</th><th>Details</th></tr></thead>
          <tbody>
            @forelse($contacts as $contact)
              <tr>
                <td><div class="admin-person-cell"><span class="admin-person-avatar">{{ mb_strtoupper(mb_substr($contact->name, 0, 1)) }}</span><div><strong>{{ $contact->name }}</strong><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div></div></td>
                <td>{{ $contact->company_name ?: 'Individual' }}</td>
                <td><span class="admin-service-tag">{{ $contact->service ?: 'General enquiry' }}</span></td>
                <td><strong class="admin-date-primary">{{ $contact->created_at?->format('M d, Y') }}</strong></td>
                <td><button class="admin-secondary-button" type="button" aria-label="View details for {{ $contact->name }}" title="View contact details" aria-expanded="false" aria-controls="contact-detail-{{ $contact->id }}" onclick="toggleAdminDetails(this, 'contact-detail-{{ $contact->id }}')"><i class="fa-regular fa-eye" aria-hidden="true"></i>View details</button></td>
              </tr>
              <tr id="contact-detail-{{ $contact->id }}" class="admin-detail-row" hidden><td colspan="5"><div class="admin-detail-grid"><div><span>Phone</span><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></div><div><span>Company address</span><strong>{{ $contact->company_address ?: 'Not provided' }}</strong></div><div><span>Website</span>@if($contact->website_url)<a href="{{ \Illuminate\Support\Str::startsWith($contact->website_url, ['http://', 'https://']) ? $contact->website_url : 'https://'.$contact->website_url }}" target="_blank" rel="noopener">{{ $contact->website_url }}</a>@else<strong>Not provided</strong>@endif</div><div><span>Referral source</span><strong>{{ $contact->referral_source ?: 'Not specified' }}</strong></div><div class="admin-detail-message"><span>Message</span><p>{{ $contact->message ?: 'No message provided.' }}</p></div></div></td></tr>
            @empty
              <tr><td colspan="5" class="admin-table-empty"><span class="admin-empty-icon"><i class="fa-regular fa-envelope-open"></i></span><strong>Your inbox is clear</strong><span>New website enquiries will appear here as soon as someone contacts you.</span></td></tr>
            @endforelse
          </tbody>
        </table></div>
    </section>

    <section id="section-enquiry-insights" class="admin-dashboard-section" role="tabpanel" aria-label="Enquiry insights" hidden>
      <div class="admin-section-heading"><div><span class="admin-section-eyebrow">ENQUIRY ANALYSIS</span><h2>Understand incoming requests</h2><p>Explore the service interests, company details, and referral sources shared in website enquiries.</p></div><span class="admin-section-total"><i class="fa-solid fa-chart-column"></i> {{ $contacts->count() }} submissions</span></div>
      <div class="admin-dashboard-metrics admin-insight-metrics">
        <article class="admin-metric-card"><div class="admin-metric-icon is-green"><i class="fa-regular fa-building"></i></div><div><span class="admin-metric-label">Company enquiries</span><strong>{{ $companyEnquiries }}</strong><small>{{ $enquiriesWithoutCompany }} without a company name</small></div></article>
        <article class="admin-metric-card"><div class="admin-metric-icon is-blue"><i class="fa-solid fa-globe"></i></div><div><span class="admin-metric-label">Website provided</span><strong>{{ $enquiriesWithWebsite }}</strong><small>Of {{ $contacts->count() }} submissions</small></div></article>
        <article class="admin-metric-card"><div class="admin-metric-icon is-violet"><i class="fa-regular fa-message"></i></div><div><span class="admin-metric-label">Messages included</span><strong>{{ $enquiriesWithMessage }}</strong><small>Additional project context shared</small></div></article>
        <article class="admin-metric-card"><div class="admin-metric-icon is-amber"><i class="fa-solid fa-layer-group"></i></div><div><span class="admin-metric-label">Service categories</span><strong>{{ $serviceCategoryCount }}</strong><small>Distinct interests recorded</small></div></article>
      </div>
      <div class="admin-insights-grid admin-insights-expanded">
        <article class="admin-insight-panel"><div class="admin-insight-heading"><div><span class="admin-section-eyebrow">SERVICE INTEREST</span><h2>Requests by service</h2><p>Most common services selected on the contact form.</p></div><span class="admin-insight-icon"><i class="fa-solid fa-list-check"></i></span></div>
          @if($contactServices->isNotEmpty())<div class="admin-breakdown-list">@foreach($contactServices as $service => $count)@php($share = $contacts->count() ? round($count / $contacts->count() * 100) : 0)<div class="admin-breakdown-item"><div><strong>{{ $service }}</strong><span>{{ $count }} · {{ $share }}%</span></div><div class="admin-breakdown-track"><span style="width: {{ $share }}%"></span></div></div>@endforeach</div>@else<p class="admin-insight-empty">Service interest analysis will appear as enquiries arrive.</p>@endif
        </article>
        <article class="admin-insight-panel"><div class="admin-insight-heading"><div><span class="admin-section-eyebrow">REFERRAL SOURCES</span><h2>Where visitors found you</h2><p>Responses selected in the contact form.</p></div><span class="admin-insight-icon is-blue"><i class="fa-solid fa-share-nodes"></i></span></div>
          @if($contactSources->isNotEmpty())<div class="admin-source-chips">@foreach($contactSources as $source => $count)<span>{{ $source }} <b>{{ $count }}</b></span>@endforeach</div>@else<p class="admin-insight-empty">Referral source responses will appear here.</p>@endif
          <div class="admin-insight-foot"><span><i class="fa-regular fa-building"></i> Company enquiries</span><strong>{{ $companyEnquiries }}</strong></div>
        </article>
      </div>
    </section>

    <section id="section-blogs" class="admin-dashboard-section" role="tabpanel" aria-label="Blog articles" hidden>
        <div class="admin-section-heading admin-blog-section-heading">
          <div><span class="admin-section-eyebrow">CONTENT LIBRARY</span><h2>Blog articles</h2><p>Keep your audience informed with useful insights and company updates.</p></div>
          <a href="{{ route('admin.blog.create') }}" class="admin-action-button" aria-label="Create article" title="Create article"><i class="fa-solid fa-plus" aria-hidden="true"></i>Create article</a>
        </div>
        <div class="admin-table-scroll"><table class="admin-data-table">
          <thead><tr><th>Article</th><th>Author</th><th>Status</th><th>Updated</th><th>Actions</th></tr></thead>
          <tbody>
            @forelse($blogs as $blog)
              <tr>
                <td><div class="admin-article-cell">@if($blog->image_path)<img src="{{ Storage::url($blog->image_path) }}" alt="" loading="lazy">@else<span class="admin-article-placeholder"><i class="fa-regular fa-image"></i></span>@endif<div class="admin-article-title-wrap"><strong>{{ $blog->title }}</strong><button class="admin-article-title-button" type="button" aria-label="Toggle details for {{ $blog->title }}" title="Toggle article details" aria-expanded="false" aria-controls="blog-detail-{{ $blog->id }}" onclick="toggleAdminDetails(this, 'blog-detail-{{ $blog->id }}')"><span>Details</span><i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button></div></div></td>
                <td><strong>{{ $blog->author_name }}</strong></td>
                <td><span class="admin-status-badge {{ $blog->is_published ? '' : 'is-draft' }}"><span></span>{{ $blog->is_published ? 'Published' : 'Draft' }}</span></td>
                <td><strong class="admin-date-primary">{{ $blog->updated_at?->format('M d, Y') }}</strong><span class="admin-date-secondary">{{ $blog->updated_at?->diffForHumans() }}</span></td>
                <td><div class="admin-row-actions">@if($blog->is_published)<a href="{{ route('blog.show', $blog->slug) }}" class="admin-secondary-button" aria-label="View {{ $blog->title }}" title="View article"><i class="fa-regular fa-eye" aria-hidden="true"></i>View</a>@endif<a href="{{ route('admin.blog.edit', $blog) }}" class="admin-secondary-button" aria-label="Edit {{ $blog->title }}" title="Edit article"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>Edit</a><form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this post and its uploaded images? This cannot be undone.');">@csrf @method('DELETE')<button type="submit" class="admin-delete-button" aria-label="Delete {{ $blog->title }}" title="Delete article"><i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete</button></form></div></td>
              </tr>
              <tr id="blog-detail-{{ $blog->id }}" class="admin-detail-row" hidden><td colspan="5"><div class="admin-blog-detail">@if($blog->excerpt)<p class="admin-blog-detail-excerpt">{{ $blog->excerpt }}</p>@endif<div class="admin-blog-detail-meta"><span>Slug: {{ $blog->slug }}</span><span>Published: {{ $blog->published_at?->format('M d, Y') ?? 'Not published' }}</span>@if($blog->author_designation)<span>Author role: {{ $blog->author_designation }}</span>@endif</div>@if(filled($blog->content_html))<div class="admin-blog-detail-content">{!! $blog->content_html !!}</div>@endif</div></td></tr>
            @empty
              <tr><td colspan="5" class="admin-table-empty">No blog posts have been created yet.</td></tr>
            @endforelse
          </tbody>
        </table></div>
    </section>

    <section id="section-content-insights" class="admin-dashboard-section" role="tabpanel" aria-label="Content insights" hidden>
      <div class="admin-section-heading"><div><span class="admin-section-eyebrow">CONTENT ANALYSIS</span><h2>Publishing and authors</h2><p>Review your publishing mix and see which authors are contributing to the blog.</p></div><span class="admin-section-total"><i class="fa-regular fa-newspaper"></i> {{ $blogs->count() }} articles</span></div>
      <div class="admin-dashboard-metrics admin-insight-metrics">
        <article class="admin-metric-card"><div class="admin-metric-icon is-green"><i class="fa-solid fa-globe"></i></div><div><span class="admin-metric-label">Publishing rate</span><strong>{{ $publicationRate }}%</strong><small>{{ $publishedBlogs }} of {{ $blogs->count() }} articles published</small></div></article>
        <article class="admin-metric-card"><div class="admin-metric-icon is-blue"><i class="fa-solid fa-calendar-check"></i></div><div><span class="admin-metric-label">Created this month</span><strong>{{ $blogsThisMonth }}</strong><small>New articles this month</small></div></article>
        <article class="admin-metric-card"><div class="admin-metric-icon is-violet"><i class="fa-solid fa-users"></i></div><div><span class="admin-metric-label">Contributing authors</span><strong>{{ $blogAuthors->count() }}</strong><small>Distinct author names</small></div></article>
        <article class="admin-metric-card"><div class="admin-metric-icon is-amber"><i class="fa-solid fa-align-left"></i></div><div><span class="admin-metric-label">With article content</span><strong>{{ $blogContentCount }}</strong><small>Articles with formatted text</small></div></article>
      </div>
      <article class="admin-insight-panel admin-author-panel"><div class="admin-insight-heading"><div><span class="admin-section-eyebrow">AUTHOR CONTRIBUTIONS</span><h2>Articles by author</h2><p>Counts include drafts and published articles.</p></div><span class="admin-insight-icon is-violet"><i class="fa-solid fa-pen-nib"></i></span></div>
        @if($blogAuthors->isNotEmpty())<div class="admin-breakdown-list">@foreach($blogAuthors as $author => $count)@php($share = $blogs->count() ? round($count / $blogs->count() * 100) : 0)<div class="admin-breakdown-item"><div><strong>{{ $author }}</strong><span>{{ $count }} {{ \Illuminate\Support\Str::plural('article', $count) }} · {{ $share }}%</span></div><div class="admin-breakdown-track is-violet"><span style="width: {{ $share }}%"></span></div></div>@endforeach</div>@else<p class="admin-insight-empty">Author statistics will appear when you create articles.</p>@endif
      </article>
    </section>

    <section id="section-recent-activity" class="admin-dashboard-section" role="tabpanel" aria-label="Recent activity" hidden>
      <div class="admin-section-heading"><div><span class="admin-section-eyebrow">WORKSPACE TIMELINE</span><h2>Recent activity</h2><p>The latest contact submissions and blog updates recorded in this site.</p></div><span class="admin-section-total"><i class="fa-regular fa-clock"></i> Latest records</span></div>
      <div class="admin-insights-grid admin-insights-expanded">
        <article class="admin-insight-panel"><div class="admin-insight-heading"><div><span class="admin-section-eyebrow">CONTACTS</span><h2>Latest submissions</h2><p>Newest enquiries first.</p></div><span class="admin-insight-icon"><i class="fa-regular fa-address-book"></i></span></div>
          @if($recentContacts->isNotEmpty())<div class="admin-activity-list">@foreach($recentContacts as $contact)<div class="admin-activity-item"><span class="admin-activity-icon"><i class="fa-regular fa-user"></i></span><div><strong>{{ $contact->name }}</strong><small>{{ $contact->email }} · {{ $contact->created_at?->format('M d, Y · g:i A') }}</small></div><a href="mailto:{{ $contact->email }}" aria-label="Email {{ $contact->name }}"><i class="fa-regular fa-paper-plane"></i></a></div>@endforeach</div>@else<p class="admin-insight-empty">There are no contact submissions yet.</p>@endif
        </article>
        <article class="admin-insight-panel"><div class="admin-insight-heading"><div><span class="admin-section-eyebrow">BLOG LIBRARY</span><h2>Latest article updates</h2><p>Newest saved or edited articles first.</p></div><span class="admin-insight-icon is-violet"><i class="fa-regular fa-newspaper"></i></span></div>
          @if($recentBlogs->isNotEmpty())<div class="admin-activity-list">@foreach($recentBlogs as $blog)<div class="admin-activity-item"><span class="admin-activity-icon is-violet"><i class="fa-regular fa-file-lines"></i></span><div><strong>{{ $blog->title }}</strong><small>{{ $blog->is_published ? 'Published' : 'Draft' }} · Updated {{ $blog->updated_at?->diffForHumans() }}</small></div><a href="{{ route('admin.blog.edit', $blog) }}" aria-label="Edit {{ $blog->title }}"><i class="fa-regular fa-pen-to-square"></i></a></div>@endforeach</div>@else<p class="admin-insight-empty">There are no articles yet.</p>@endif
        </article>
      </div>
    </section>

        <section id="section-testimonials" class="admin-dashboard-section" role="tabpanel" aria-label="Testimonials" hidden>
        <div class="admin-section-heading admin-blog-section-heading">
          <div><span class="admin-section-eyebrow">CUSTOMER VOICES</span><h2>Testimonials</h2><p>Manage customer reviews shown in the carousel on the home page.</p></div>
          <a href="{{ route('admin.testimonials.create') }}" class="admin-action-button" aria-label="Add testimonial" title="Add testimonial"><i class="fa-solid fa-plus" aria-hidden="true"></i>Add testimonial</a>
        </div>
        <div style="margin-top:1.5rem">
          <a href="{{ route('admin.testimonials.index') }}" class="admin-secondary-button" aria-label="Manage testimonials" title="Manage testimonials"><i class="fa-solid fa-list" aria-hidden="true"></i>Manage all testimonials</a>
        </div>
    </section>
    
  </div>
</main>

<script>
  function toggleAdminDetails(button, rowId) {
    const row = document.getElementById(rowId);
    if (!row) return;
    const isOpening = row.hidden;
    row.hidden = !isOpening;
    button.setAttribute('aria-expanded', String(isOpening));
  }

  function showAdminTab(tabName, updateAddress = true) {
    const allowedTabs = ['overview', 'contacts', 'enquiry-insights', 'blogs',  'content-insights', 'recent-activity','testimonials'];
    if (!allowedTabs.includes(tabName)) tabName = 'overview';

    allowedTabs.forEach((name) => {
      const section = document.getElementById(`section-${name}`);
      const selected = name === tabName;
      section.hidden = !selected;
    });

    document.querySelectorAll('.admin-sidebar-link').forEach((link) => {
      const isActive = link.dataset.adminTab === tabName;
      link.classList.toggle('is-active', isActive);
      link.setAttribute('aria-current', isActive ? 'page' : 'false');
    });
    const sidebarTarget = document.querySelector(`.admin-sidebar-link[data-admin-tab="${tabName}"]`);
    if (sidebarTarget) sidebarTarget.classList.add('is-active');

    if (updateAddress) {
      const url = new URL(window.location.href);
      url.searchParams.set('tab', tabName);
      window.history.replaceState({}, '', url);
    }
  }

  function initializeAdminActivityChart() {
    const svg = document.getElementById('adminActivityChart');
    const dataElement = document.getElementById('adminChartData');
    if (!svg || !dataElement) return;

    const chartData = JSON.parse(dataElement.textContent);
    const tooltip = document.getElementById('adminChartTooltip');
    const contactTotal = document.getElementById('chartContactTotal');
    const blogTotal = document.getElementById('chartBlogTotal');
    const enabled = { contacts: true, blogs: true };
    let range = '30d';
    const ns = 'http://www.w3.org/2000/svg';
    const palette = { contacts: '#398158', blogs: '#4d53a0' };
    const names = { contacts: 'Contacts', blogs: 'Blog articles' };
    const create = (tag, attrs = {}) => {
      const el = document.createElementNS(ns, tag);
      Object.entries(attrs).forEach(([key, value]) => el.setAttribute(key, value));
      return el;
    };

    function render() {
      const current = chartData[range];
      const labels = current.labels;
      const chartSeries = ['contacts', 'blogs'].filter((key) => enabled[key]);
      const allValues = chartSeries.flatMap((key) => current[key]);
      const maxValue = Math.max(1, ...allValues);
      const topScale = Math.ceil(maxValue * 1.15);
      const left = 62, right = 22, top = 24, bottom = 48, width = 1000, height = 330;
      const plotWidth = width - left - right, plotHeight = height - top - bottom;
      const x = (index) => left + (labels.length <= 1 ? plotWidth / 2 : index * plotWidth / (labels.length - 1));
      const y = (value) => top + plotHeight - (value / topScale) * plotHeight;
      svg.replaceChildren();

      const defs = create('defs');
      [['contacts', '#398158'], ['blogs', '#4d53a0']].forEach(([key, color]) => {
        const gradient = create('linearGradient', { id: `chart-fill-${key}`, x1: '0', x2: '0', y1: '0', y2: '1' });
        gradient.append(create('stop', { offset: '0%', 'stop-color': color, 'stop-opacity': '0.22' }));
        gradient.append(create('stop', { offset: '100%', 'stop-color': color, 'stop-opacity': '0.015' }));
        defs.append(gradient);
      });
      svg.append(defs);

      for (let tick = 0; tick <= 4; tick++) {
        const value = Math.round(topScale * (4 - tick) / 4);
        const yy = top + plotHeight * tick / 4;
        svg.append(create('line', { x1: left, x2: width - right, y1: yy, y2: yy, class: 'admin-chart-grid-line' }));
        const label = create('text', { x: left - 14, y: yy + 4, 'text-anchor': 'end', class: 'admin-chart-axis-label' });
        label.textContent = value;
        svg.append(label);
      }

      const labelStep = Math.max(1, Math.ceil(labels.length / 7));
      labels.forEach((label, index) => {
        if (index % labelStep !== 0 && index !== labels.length - 1) return;
        const tickLabel = create('text', { x: x(index), y: height - 15, 'text-anchor': 'middle', class: 'admin-chart-axis-label' });
        tickLabel.textContent = label;
        svg.append(tickLabel);
      });

      chartSeries.forEach((key) => {
        const values = current[key];
        const points = values.map((value, index) => ({ x: x(index), y: y(value), value, label: labels[index], index }));
        let linePath = `M ${points[0].x} ${points[0].y}`;
        for (let i = 0; i < points.length - 1; i++) {
          const a = points[i], b = points[i + 1], dx = (b.x - a.x) / 3;
          linePath += ` C ${a.x + dx} ${a.y}, ${b.x - dx} ${b.y}, ${b.x} ${b.y}`;
        }
        const areaPath = `${linePath} L ${points[points.length - 1].x} ${top + plotHeight} L ${points[0].x} ${top + plotHeight} Z`;
        svg.append(create('path', { d: areaPath, fill: `url(#chart-fill-${key})`, class: 'admin-chart-area' }));
        svg.append(create('path', { d: linePath, stroke: palette[key], class: 'admin-chart-line' }));

        points.forEach((point) => {
          const dot = create('circle', { cx: point.x, cy: point.y, r: '5.5', fill: palette[key], class: 'admin-chart-point', tabindex: '0', role: 'img' });
          const tip = `${point.label} · ${names[key]}: ${point.value} · Contacts: ${current.contacts[point.index]} · Blog articles: ${current.blogs[point.index]}`;
          dot.setAttribute('aria-label', tip);
          dot.addEventListener('mouseenter', () => { tooltip.textContent = tip; dot.classList.add('is-highlighted'); });
          dot.addEventListener('mouseleave', () => { dot.classList.remove('is-highlighted'); });
          dot.addEventListener('focus', () => { tooltip.textContent = tip; dot.classList.add('is-highlighted'); });
          dot.addEventListener('blur', () => { dot.classList.remove('is-highlighted'); });
          svg.append(dot);
        });
      });

      contactTotal.textContent = current.contacts.reduce((sum, value) => sum + value, 0);
      blogTotal.textContent = current.blogs.reduce((sum, value) => sum + value, 0);
      tooltip.textContent = chartSeries.length ? 'Hover or focus a graph point to see its details.' : 'Select a data series to display it.';
    }

    document.querySelectorAll('[data-chart-range]').forEach((button) => button.addEventListener('click', () => {
      range = button.dataset.chartRange;
      document.querySelectorAll('[data-chart-range]').forEach((option) => option.setAttribute('aria-pressed', String(option === button)));
      render();
    }));
    document.querySelectorAll('[data-chart-series]').forEach((button) => button.addEventListener('click', () => {
      const key = button.dataset.chartSeries;
      enabled[key] = !enabled[key];
      button.setAttribute('aria-pressed', String(enabled[key]));
      render();
    }));
    render();
  }

  document.addEventListener('DOMContentLoaded', () => {
    showAdminTab(new URLSearchParams(window.location.search).get('tab') || 'overview', false);
    initializeAdminActivityChart();

    // Sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.admin-sidebar');
    const dashboardPage = document.querySelector('.admin-dashboard-page');

    if (sidebarToggle && sidebar && dashboardPage) {
      sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar-collapsed');
        dashboardPage.classList.toggle('sidebar-collapsed');

        const isCollapsed = sidebar.classList.contains('sidebar-collapsed');
        sidebarToggle.setAttribute('aria-expanded', String(!isCollapsed));
        const actionLabel = isCollapsed ? 'Expand sidebar' : 'Collapse sidebar';
        sidebarToggle.title = actionLabel;
        sidebarToggle.setAttribute('aria-label', actionLabel);
        // Update visible label span inside the button
        const labelSpan = sidebarToggle.querySelector('span');
        if (labelSpan) labelSpan.textContent = isCollapsed ? 'Expand' : 'Collapse';
        localStorage.setItem('adminSidebarCollapsed', isCollapsed);
      });

      const savedState = localStorage.getItem('adminSidebarCollapsed');
      if (savedState === 'true') {
        sidebar.classList.add('sidebar-collapsed');
        dashboardPage.classList.add('sidebar-collapsed');
        sidebarToggle.setAttribute('aria-expanded', 'false');
        sidebarToggle.title = 'Expand sidebar';
        sidebarToggle.setAttribute('aria-label', 'Expand sidebar');
        const labelSpan = sidebarToggle.querySelector('span');
        if (labelSpan) labelSpan.textContent = 'Expand';
      }
    }
  });
</script>
@endsection
