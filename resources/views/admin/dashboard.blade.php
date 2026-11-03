@extends('layouts.admin')

@section('title', 'Admin Dashboard - Retrotech')
@section('page_heading', 'Admin workspace')

@section('admin-content')
    <section id="section-overview" class="admin-overview-section" role="tabpanel" aria-label="Dashboard overview">
    <section class="admin-dashboard-metrics" aria-label="Website overview">
      <article class="admin-metric-card"><div class="admin-metric-icon is-green"><i class="fa-regular fa-address-card"></i></div><div><span class="admin-metric-label">Total enquiries</span><strong>{{ $contacts->count() }}</strong><small>{{ $contactsThisWeek }} received this week</small></div></article>
      <article class="admin-metric-card"><div class="admin-metric-icon is-violet"><i class="fa-regular fa-newspaper"></i></div><div><span class="admin-metric-label">Published articles</span><strong>{{ $publishedBlogs }}</strong><small>{{ $blogsThisMonth }} created this month</small></div></article>
      <article class="admin-metric-card"><div class="admin-metric-icon is-teal"><i class="fa-solid fa-globe"></i></div><div><span class="admin-metric-label">Web content</span><strong>{{ $webpagesCount }}</strong><small>{{ $services->count() }} services + {{ $techDevelopments->count() }} tech</small></div></article>
      <article class="admin-metric-card"><div class="admin-metric-icon is-orange"><i class="fa-solid fa-star"></i></div><div><span class="admin-metric-label">Testimonials</span><strong>{{ $testimonialsCount }}</strong><small>{{ $averageRating }} avg rating</small></div></article>
    </section>

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
        <div class="admin-publishing-summary"><div><span>Published</span><strong>{{ $publishedBlogs }}</strong></div><div><span>Drafts</span><strong>{{ $draftBlogs }}</strong></div></div>
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

    <section class="admin-insights-grid admin-overview-extended" aria-label="Comprehensive analysis across all sections">
      {{-- Testimonials Analysis --}}
      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">TESTIMONIALS</span><h2>Customer feedback</h2><p>Client ratings and reviews analysis.</p></div><span class="admin-insight-icon is-amber"><i class="fa-solid fa-star"></i></span></div>
        <div class="admin-rating-summary">
          <div class="admin-rating-primary">
            <span class="admin-rating-number">{{ $averageRating }}</span>
            <span class="admin-rating-label">Average rating</span>
          </div>
          <div class="admin-rating-stats">
            <div><span>Total reviews</span><strong>{{ $testimonialsCount }}</strong></div>
            <div><span>5-star reviews</span><strong>{{ $fiveStarCount }}</strong></div>
            <div><span>5-star rate</span><strong>{{ $testimonialsCount ? round(($fiveStarCount / $testimonialsCount) * 100) : 0 }}%</strong></div>
          </div>
        </div>
        <div class="admin-insight-foot"><span><i class="fa-regular fa-star"></i> {{ $averageRating }}/5.0 average</span><span><i class="fa-solid fa-trophy"></i> {{ $fiveStarCount }} excellent reviews</span></div>
      </article>

      {{-- Webpages Analysis --}}
      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">WEB CONTENT</span><h2>Pages &amp; Services</h2><p>Marketing services and tech developments.</p></div><span class="admin-insight-icon is-green"><i class="fa-solid fa-globe"></i></span></div>
        <div class="admin-publishing-summary">
          <div><span>Total pages</span><strong>{{ $webpagesCount }}</strong></div>
          <div><span>Services</span><strong>{{ $services->count() }}</strong></div>
          <div><span>Tech dev</span><strong>{{ $techDevelopments->count() }}</strong></div>
        </div>
        @if($webpages->isNotEmpty())
          <div class="admin-activity-list">
            @foreach($webpages->take(3) as $page)
              <div class="admin-activity-item">
                <span class="admin-activity-icon {{ $page->category === 'Marketing Service' ? 'is-green' : 'is-blue' }}">
                  <i class="fa-solid {{ $page->category === 'Marketing Service' ? 'fa-bullhorn' : 'fa-code' }}"></i>
                </span>
                <div>
                  <strong>{{ $page->title }}</strong>
                  <small>{{ $page->category }} · {{ $page->status }}</small>
                </div>
                <a href="{{ $page->url }}" target="_blank" rel="noopener" aria-label="View {{ $page->title }}" title="View page">
                  <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
              </div>
            @endforeach
          </div>
        @else
          <p class="admin-insight-empty">No webpages created yet.</p>
        @endif
        <div class="admin-insight-foot"><span><i class="fa-regular fa-file-lines"></i> {{ $webpagesCount }} total pages</span><button class="admin-inline-link" type="button" onclick="showAdminTab('webpage')">Manage webpages <i class="fa-solid fa-arrow-right"></i></button></div>
      </article>

      {{-- Contact Enrichment Analysis --}}
      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">ENQUIRY QUALITY</span><h2>Lead enrichment</h2><p>Information completeness metrics.</p></div><span class="admin-insight-icon is-blue"><i class="fa-solid fa-magnifying-glass"></i></span></div>
        <div class="admin-publishing-summary">
          <div><span>With company</span><strong>{{ $companyEnquiries }}</strong></div>
          <div><span>With website</span><strong>{{ $enquiriesWithWebsite }}</strong></div>
          <div><span>With message</span><strong>{{ $enquiriesWithMessage }}</strong></div>
        </div>
        <div class="admin-breakdown-list">
          @php($enrichmentRate = $contacts->count() ? round(($enquiriesWithWebsite + $enquiriesWithMessage) / $contacts->count() * 100) : 0)
          <div class="admin-breakdown-item">
            <div><strong>Enriched enquiries</strong><span>{{ $enquiriesWithWebsite + $enquiriesWithMessage }} · {{ $enrichmentRate }}%</span></div>
            <div class="admin-breakdown-track"><span style="width: {{ $enrichmentRate }}%; background: #398158;"></span></div>
          </div>
        </div>
        <div class="admin-insight-foot"><span><i class="fa-regular fa-building"></i> {{ $companyEnquiries }} company leads</span><span><i class="fa-regular fa-user"></i> {{ $enquiriesWithoutCompany }} individual enquiries</span></div>
      </article>

      {{-- Blog Content Quality --}}
      <article class="admin-insight-panel">
        <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">CONTENT QUALITY</span><h2>Blog completeness</h2><p>Content depth and media coverage.</p></div><span class="admin-insight-icon is-violet"><i class="fa-regular fa-file-lines"></i></span></div>
        <div class="admin-publishing-summary">
          <div><span>With content</span><strong>{{ $blogContentCount }}</strong></div>
          <div><span>Missing image</span><strong>{{ $blogsWithoutImage }}</strong></div>
          <div><span>Drafts</span><strong>{{ $draftBlogs }}</strong></div>
        </div>
        <div class="admin-breakdown-list">
          @php($publicationRate)
          <div class="admin-breakdown-item">
            <div><strong>Publication rate</strong><span>{{ $publishedBlogs }} of {{ $blogs->count() }} · {{ $publicationRate }}%</span></div>
            <div class="admin-breakdown-track"><span style="width: {{ $publicationRate }}%; background: #6b4c8a;"></span></div>
          </div>
        </div>
        <div class="admin-insight-foot"><span><i class="fa-regular fa-user"></i> {{ $blogAuthors->count() }} {{ \Illuminate\Support\Str::plural('author', $blogAuthors->count()) }}</span><span><i class="fa-solid fa-pen"></i> {{ $blogsUpdatedThisWeek }} updated this week</span></div>
      </article>
    </section>

    </section>

    <section id="section-contacts" class="admin-dashboard-section" role="tabpanel" aria-label="Contact submissions" hidden>
        <div class="admin-section-heading">
          <div><span class="admin-section-eyebrow">INBOX &amp; ENQUIRIES</span><h2>Contact submissions</h2><p>Review website enquiries, customer service interests, and referral sources.</p></div>
          <span class="admin-section-total"><i class="fa-solid fa-inbox"></i> {{ $contacts->count() }} total submissions</span>
        </div>

        <div class="admin-dashboard-metrics admin-insight-metrics" style="margin-bottom: 1.5rem;">
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-green"><i class="fa-regular fa-building"></i></div>
            <div>
              <span class="admin-metric-label">Company enquiries</span>
              <strong>{{ $companyEnquiries }}</strong>
              <small>{{ $enquiriesWithoutCompany }} individual / unspecified</small>
            </div>
          </article>
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-blue"><i class="fa-solid fa-globe"></i></div>
            <div>
              <span class="admin-metric-label">Website provided</span>
              <strong>{{ $enquiriesWithWebsite }}</strong>
              <small>Of {{ $contacts->count() }} submissions</small>
            </div>
          </article>
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-violet"><i class="fa-regular fa-message"></i></div>
            <div>
              <span class="admin-metric-label">Messages included</span>
              <strong>{{ $enquiriesWithMessage }}</strong>
              <small>Project context shared</small>
            </div>
          </article>
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-amber"><i class="fa-solid fa-layer-group"></i></div>
            <div>
              <span class="admin-metric-label">Service categories</span>
              <strong>{{ $serviceCategoryCount }}</strong>
              <small>Distinct services selected</small>
            </div>
          </article>
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

        <div class="admin-insights-grid admin-insights-expanded" style="margin-top: 1.5rem;">
          <article class="admin-insight-panel"><div class="admin-insight-heading"><div><span class="admin-section-eyebrow">SERVICE INTEREST</span><h2>Requests by service</h2><p>Most common services selected on the contact form.</p></div><span class="admin-insight-icon"><i class="fa-solid fa-list-check"></i></span></div>
            @if($contactServices->isNotEmpty())<div class="admin-breakdown-list">@foreach($contactServices->take(5) as $service => $count)@php($share = $contacts->count() ? round($count / $contacts->count() * 100) : 0)<div class="admin-breakdown-item"><div><strong>{{ $service }}</strong><span>{{ $count }} · {{ $share }}%</span></div><div class="admin-breakdown-track"><span style="width: {{ $share }}%"></span></div></div>@endforeach</div>@else<p class="admin-insight-empty">Service interest analysis will appear as enquiries arrive.</p>@endif
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
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <span class="admin-section-total"><i class="fa-regular fa-newspaper"></i> {{ $blogs->count() }} total</span>
            <a href="{{ route('admin.blog.create') }}" class="admin-action-button" aria-label="Create article" title="Create article"><i class="fa-solid fa-plus" aria-hidden="true" style="margin-right: 0.45rem;"></i>Create article</a>
          </div>
        </div>

        <div class="admin-dashboard-metrics admin-insight-metrics" style="margin-bottom: 1.5rem;">
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-green"><i class="fa-solid fa-circle-check"></i></div>
            <div>
              <span class="admin-metric-label">Publishing rate</span>
              <strong>{{ $publicationRate }}%</strong>
              <small>{{ $publishedBlogs }} published</small>
            </div>
          </article>
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-blue"><i class="fa-solid fa-calendar-check"></i></div>
            <div>
              <span class="admin-metric-label">Draft articles</span>
              <strong>{{ $draftBlogs }}</strong>
              <small>Not published</small>
            </div>
          </article>
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-violet"><i class="fa-solid fa-users"></i></div>
            <div>
              <span class="admin-metric-label">Contributing authors</span>
              <strong>{{ $blogAuthors->count() }}</strong>
              <small>Distinct author names</small>
            </div>
          </article>
          <article class="admin-metric-card">
            <div class="admin-metric-icon is-amber"><i class="fa-solid fa-align-left"></i></div>
            <div>
              <span class="admin-metric-label">With article content</span>
              <strong>{{ $blogContentCount }}</strong>
              <small>Articles with formatted text</small>
            </div>
          </article>
        </div>

        <div class="admin-table-scroll"><table class="admin-data-table">
          <thead><tr><th>Article</th><th>Author</th><th>Status</th><th>Updated</th><th>Actions</th></tr></thead>
          <tbody>
            @forelse($blogs as $blog)
              @php($blogStatusLabel = $blog->is_published ? 'Published' : 'Draft')
              <tr>
                <td><div class="admin-article-cell">@if($blog->image_path)<img src="{{ Storage::url($blog->image_path) }}" alt="" loading="lazy">@else<span class="admin-article-placeholder"><i class="fa-regular fa-image"></i></span>@endif<div class="admin-article-title-wrap"><strong>{{ $blog->title }}</strong><button class="admin-article-title-button" type="button" aria-label="Toggle details for {{ $blog->title }}" title="Toggle article details" aria-expanded="false" aria-controls="blog-detail-{{ $blog->id }}" onclick="toggleAdminDetails(this, 'blog-detail-{{ $blog->id }}')"><span>Details</span><i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button></div></div></td>
                <td><strong>{{ $blog->author_name }}</strong></td>
                <td><span class="admin-status-badge {{ $blog->is_published ? '' : 'is-draft' }}"><span></span>{{ $blogStatusLabel }}</span></td>
                <td><strong class="admin-date-primary">{{ $blog->updated_at?->format('M d, Y') }}</strong><span class="admin-date-secondary">{{ $blog->updated_at?->diffForHumans() }}</span></td>
                <td><div class="admin-row-actions">@if($blog->is_published)<a href="{{ route('blog.show', $blog->slug) }}" class="admin-secondary-button" aria-label="View {{ $blog->title }}" title="View article"><i class="fa-regular fa-eye" aria-hidden="true"></i>View</a>@endif<a href="{{ route('admin.blog.edit', $blog) }}" class="admin-secondary-button" aria-label="Edit {{ $blog->title }}" title="Edit article"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>Edit</a><form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this post and its uploaded images? This cannot be undone.');">@csrf @method('DELETE')<button type="submit" class="admin-delete-button" aria-label="Delete {{ $blog->title }}" title="Delete article"><i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete</button></form></div></td>
              </tr>
              <tr id="blog-detail-{{ $blog->id }}" class="admin-detail-row" hidden><td colspan="5"><div class="admin-blog-detail">@if($blog->excerpt)<p class="admin-blog-detail-excerpt">{{ $blog->excerpt }}</p>@endif<div class="admin-blog-detail-meta"><span>Slug: {{ $blog->slug }}</span><span>Status: {{ $blogStatusLabel }}</span>@if($blog->category)<span>Category: {{ $blog->category }}</span>@endif @if($blog->tags)<span>Tags: {{ implode(', ', $blog->tags) }}</span>@endif<span>Published: {{ $blog->published_at?->format('M d, Y') ?? 'Not published' }}</span>@if($blog->author_designation)<span>Author role: {{ $blog->author_designation }}</span>@endif @if($blog->reading_time)<span>Read time: {{ $blog->reading_time }} min</span>@endif<span>Comments: {{ $blog->comment_status ? 'Enabled' : 'Disabled' }}</span></div>@if(filled($blog->content_html))<div class="admin-blog-detail-content">{!! $blog->content_html !!}</div>@endif</div></td></tr>
            @empty
              <tr><td colspan="5" class="admin-table-empty">No blog posts have been created yet.</td></tr>
            @endforelse
          </tbody>
        </table></div>

        @if($blogAuthors->isNotEmpty())
          <article class="admin-insight-panel admin-author-panel" style="margin-top: 1.5rem; max-width: 100%;">
            <div class="admin-insight-heading"><div><span class="admin-section-eyebrow">AUTHOR CONTRIBUTIONS</span><h2>Articles by author</h2><p>Counts include drafts and published articles.</p></div><span class="admin-insight-icon is-violet"><i class="fa-solid fa-pen-nib"></i></span></div>
            <div class="admin-breakdown-list">@foreach($blogAuthors as $author => $count)@php($share = $blogs->count() ? round($count / $blogs->count() * 100) : 0)<div class="admin-breakdown-item"><div><strong>{{ $author }}</strong><span>{{ $count }} {{ \Illuminate\Support\Str::plural('article', $count) }} · {{ $share }}%</span></div><div class="admin-breakdown-track is-violet"><span style="width: {{ $share }}%"></span></div></div>@endforeach</div>
          </article>
        @endif
    </section>

    <section id="section-webpage" class="admin-dashboard-section" role="tabpanel" aria-label="Webpages" hidden>
      <div class="admin-section-heading admin-blog-section-heading">
        <div>
          <span class="admin-section-eyebrow">PAGES &amp; ROUTING</span>
          <h2>Webpages</h2>
          <p>Information on recently added dynamic marketing and tech development web pages.</p>
        </div>
        <div style="display:flex;align-items:center;gap:0.75rem;">
          <span class="admin-section-total"><i class="fa-solid fa-globe" aria-hidden="true"></i> {{ $webpagesCount }} total</span>
          <a href="{{ route('admin.web-pages.create') }}" class="admin-action-button" aria-label="Add a web page" title="Add a web page" style="display: inline-flex; align-items: center; text-decoration: none;">
            <i class="fa-solid fa-plus" aria-hidden="true" style="margin-right: 0.45rem;"></i>Add a web page
          </a>
        </div>
      </div>

      <div class="admin-dashboard-metrics admin-insight-metrics" style="margin-bottom: 1.5rem;">
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-green"><i class="fa-solid fa-globe"></i></div>
          <div>
            <span class="admin-metric-label">Total Webpages</span>
            <strong>{{ $webpagesCount }}</strong>
            <small>Marketing &amp; tech pages</small>
          </div>
        </article>
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-blue"><i class="fa-solid fa-bullhorn"></i></div>
          <div>
            <span class="admin-metric-label">Marketing Services</span>
            <strong>{{ $services->count() }}</strong>
            <small>Under /services/{slug}</small>
          </div>
        </article>
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-violet"><i class="fa-solid fa-code"></i></div>
          <div>
            <span class="admin-metric-label">Tech Development</span>
            <strong>{{ $techDevelopments->count() }}</strong>
            <small>Under /tech-development/{slug}</small>
          </div>
        </article>
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-amber"><i class="fa-solid fa-circle-check"></i></div>
          <div>
            <span class="admin-metric-label">Active / Live</span>
            <strong>{{ $webpages->where('status', 'Active')->count() + $webpages->where('status', 'Published')->count() }}</strong>
            <small>Publicly accessible</small>
          </div>
        </article>
      </div>

      <div class="admin-table-scroll">
        <table class="admin-data-table">
          <thead>
            <tr>
              <th>Webpage</th>
              <th>Category</th>
              <th>Status</th>
              <th>Updated</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($webpages as $page)
              <tr>
                <td>
                  <div class="admin-article-cell">
                    @if($page->hero_image)
                      <img src="{{ $page->hero_image }}" alt="" loading="lazy" style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; flex-shrink: 0;">
                    @else
                      <span class="admin-article-placeholder" style="width: 44px; height: 44px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; background: #eaf6ec; color: #397b4e; flex-shrink: 0;"><i class="fa-solid fa-globe"></i></span>
                    @endif
                    <div class="admin-article-title-wrap">
                      <strong>{{ $page->title }}</strong>
                      <span style="font-size: 0.78rem; color: #6b7280; font-family: monospace;">/{{ $page->model_type === 'service' ? 'services' : ($page->model_type === 'tech-development' ? 'tech-development' : 'web') }}/{{ $page->slug }}</span>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="admin-service-tag" style="{{ $page->model_type === 'tech-development' ? 'background: #eef2ff; color: #4338ca; border: 1px solid #c7d2fe;' : ($page->model_type === 'web-page' ? 'background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0;' : '') }}">
                    <i class="fa-solid {{ $page->model_type === 'tech-development' ? 'fa-code' : ($page->model_type === 'web-page' ? 'fa-file-lines' : 'fa-bullhorn') }}" style="font-size: 0.7rem; margin-right: 0.35rem;"></i>{{ $page->category }}
                  </span>
                </td>
                <td>
                  <span class="admin-status-badge {{ $page->status === 'Draft' ? 'is-draft' : '' }}">
                    <span></span>{{ $page->status }}
                  </span>
                </td>
                <td>
                  <strong class="admin-date-primary">{{ \Carbon\Carbon::parse($page->updated_at)->format('M d, Y') }}</strong>
                  <span class="admin-date-secondary">{{ \Carbon\Carbon::parse($page->updated_at)->diffForHumans() }}</span>
                </td>
                <td>
                  <div class="admin-row-actions">
                    <a href="{{ $page->url }}" target="_blank" rel="noopener" class="admin-secondary-button" aria-label="View {{ $page->title }}" title="View live page">
                      <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>View
                    </a>

                    @if($page->model_type === 'web-page')
                      <a href="{{ route('admin.web-pages.edit', $page->id) }}" class="admin-secondary-button" aria-label="Edit {{ $page->title }}" title="Edit web page">
                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>Edit
                      </a>
                    @elseif($page->model_type === 'service')
                      <a href="{{ route('admin.services.edit', $page->id) }}" class="admin-secondary-button" aria-label="Edit {{ $page->title }}" title="Edit service">
                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>Edit
                      </a>
                    @endif

                    @if($page->model_type === 'web-page')
                      <form action="{{ route('admin.web-pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this web page? This cannot be undone.');" style="display:inline-block; margin:0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-delete-button" aria-label="Delete {{ $page->title }}" title="Delete web page">
                          <i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete
                        </button>
                      </form>
                    @elseif($page->model_type === 'service')
                      <form action="{{ route('admin.services.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service page? This cannot be undone.');" style="display:inline-block; margin:0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-delete-button" aria-label="Delete {{ $page->title }}" title="Delete service">
                          <i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete
                        </button>
                      </form>
                    @elseif($page->model_type === 'tech-development')
                      <form action="{{ route('admin.tech-developments.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tech page? This cannot be undone.');" style="display:inline-block; margin:0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-delete-button" aria-label="Delete {{ $page->title }}" title="Delete tech page">
                          <i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete
                        </button>
                      </form>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="admin-table-empty">
                  <span class="admin-empty-icon"><i class="fa-solid fa-globe"></i></span>
                  <strong>No web pages found</strong>
                  <span>Click "Add a web page" above to create a new page.</span>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </section>

    <section id="section-testimonials" class="admin-dashboard-section" role="tabpanel" aria-label="Testimonials" hidden>
      <div class="admin-section-heading admin-blog-section-heading">
        <div>
          <span class="admin-section-eyebrow">CUSTOMER VOICES</span>
          <h2>Customer Testimonials</h2>
          <p>Verified client reviews stored in the database and showcased live in the marquee on the home page.</p>
        </div>
        <div style="display:flex; align-items:center; gap:0.75rem;">
          <span class="admin-section-total"><i class="fa-regular fa-star"></i> {{ $testimonialsCount }} total</span>
          <a href="{{ route('admin.testimonials.create') }}" class="admin-action-button" aria-label="Add testimonial" title="Add testimonial">
            <i class="fa-solid fa-plus" aria-hidden="true" style="margin-right: 0.45rem;"></i>Add testimonial
          </a>
        </div>
      </div>

      <div class="admin-dashboard-metrics admin-insight-metrics" style="margin-bottom: 1.5rem;">
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-amber"><i class="fa-solid fa-star"></i></div>
          <div>
            <span class="admin-metric-label">Average Rating</span>
            <strong>{{ $averageRating }} <small style="font-size:0.8rem; font-weight:500; color:#6b7280;">/ 5.0</small></strong>
            <small>Across {{ $testimonialsCount }} verified reviews</small>
          </div>
        </article>
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-green"><i class="fa-solid fa-award"></i></div>
          <div>
            <span class="admin-metric-label">5-Star Reviews</span>
            <strong>{{ $fiveStarCount }}</strong>
            <small>{{ $testimonialsCount > 0 ? round(($fiveStarCount / $testimonialsCount) * 100) : 0 }}% top-tier satisfaction</small>
          </div>
        </article>
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-blue"><i class="fa-solid fa-comments"></i></div>
          <div>
            <span class="admin-metric-label">Total Testimonials</span>
            <strong>{{ $testimonialsCount }}</strong>
            <small>Stored in database</small>
          </div>
        </article>
        <article class="admin-metric-card">
          <div class="admin-metric-icon is-violet"><i class="fa-solid fa-display"></i></div>
          <div>
            <span class="admin-metric-label">Website Visibility</span>
            <strong style="color: #397b4e;">Live</strong>
            <small>Displaying on Home Page marquee</small>
          </div>
        </article>
      </div>

      <div class="admin-table-scroll">
        <table class="admin-data-table">
          <thead>
            <tr>
              <th>Customer</th>
              <th>Location / Company</th>
              <th>Rating</th>
              <th>Review Excerpt</th>
              <th>Added</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($testimonials as $testimonial)
              <tr>
                <td>
                  <div class="admin-person-cell">
                    @if($testimonial->image)
                      <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" style="width: 42px; height: 42px; border-radius: 50%; object-fit: cover; flex-shrink: 0; border: 1px solid #d1d5db;">
                    @else
                      <span class="admin-person-avatar" style="width: 42px; height: 42px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; background: #eaf6ec; color: #397b4e; flex-shrink: 0;">{{ mb_strtoupper(mb_substr($testimonial->name, 0, 1)) }}</span>
                    @endif
                    <div>
                      <strong>{{ $testimonial->name }}</strong>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="admin-service-tag">{{ $testimonial->location ?: 'Not specified' }}</span>
                </td>
                <td>
                  <span class="admin-status-badge" style="background-color: #fff7ed; color: #ea580c; border: 1px solid #fed7aa; font-weight: 600;">
                    <i class="fa-solid fa-star" style="font-size: 0.72rem; margin-right: 0.25rem;"></i>{{ number_format((float) $testimonial->rating, 1) }} / 5
                  </span>
                </td>
                <td>
                  <div style="max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: #4b5563;" title="{{ $testimonial->content }}">
                    “{{ $testimonial->content }}”
                  </div>
                </td>
                <td>
                  <strong class="admin-date-primary">{{ $testimonial->created_at ? $testimonial->created_at->format('M d, Y') : '—' }}</strong>
                  <span class="admin-date-secondary">{{ $testimonial->created_at ? $testimonial->created_at->diffForHumans() : '' }}</span>
                </td>
                <td>
                  <div class="admin-row-actions">
                    <button class="admin-secondary-button" type="button" aria-label="Toggle details for {{ $testimonial->name }}" title="Toggle full review" aria-expanded="false" aria-controls="testimonial-detail-{{ $testimonial->id }}" onclick="toggleAdminDetails(this, 'testimonial-detail-{{ $testimonial->id }}')">
                      <i class="fa-regular fa-eye" aria-hidden="true"></i>Details
                    </button>
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="admin-secondary-button" aria-label="Edit {{ $testimonial->name }}" title="Edit testimonial">
                      <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>Edit
                    </a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial? This cannot be undone.');" style="display:inline-block; margin:0;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="admin-delete-button" aria-label="Delete {{ $testimonial->name }}" title="Delete testimonial">
                        <i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              <tr id="testimonial-detail-{{ $testimonial->id }}" class="admin-detail-row" hidden>
                <td colspan="6">
                  <div class="admin-detail-grid">
                    <div><span>Customer Name</span><strong>{{ $testimonial->name }}</strong></div>
                    <div><span>Location / Company</span><strong>{{ $testimonial->location ?: 'Not specified' }}</strong></div>
                    <div><span>Star Rating</span><strong style="color: #ea580c;">★ {{ number_format((float) $testimonial->rating, 1) }} out of 5.0</strong></div>
                    <div><span>Date Recorded</span><strong>{{ $testimonial->created_at ? $testimonial->created_at->format('M d, Y · g:i A') : '—' }}</strong></div>
                    <div class="admin-detail-message" style="grid-column: 1 / -1;">
                      <span>Full Customer Testimonial</span>
                      <p style="font-size: 0.95rem; line-height: 1.6; color: #374151;">“{{ $testimonial->content }}”</p>
                    </div>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="admin-table-empty">
                  <span class="admin-empty-icon"><i class="fa-regular fa-star"></i></span>
                  <strong>No testimonials found in database</strong>
                  <span>Click "Add testimonial" above to record customer feedback.</span>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </section>
    
<script>
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

  document.addEventListener('DOMContentLoaded', initializeAdminActivityChart);
</script>
@endsection