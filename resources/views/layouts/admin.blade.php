@extends('layouts.app')

@section('content')
@php
  $adminTabs = ['overview', 'contacts', 'blogs', 'webpage', 'testimonials'];
  $requestedTab = request()->query('tab');
  $routeTab = match (true) {
    request()->routeIs('admin.blog.*') => 'blogs',
    request()->routeIs('admin.testimonials.*') => 'testimonials',
    request()->routeIs('admin.web-pages.*') => 'webpage',
    default => null,
  };
  $currentTab = in_array($requestedTab, $adminTabs, true)
    ? $requestedTab
    : $routeTab;
  $contactsCount = isset($contacts) ? $contacts->count() : 0;
  $blogsCount = isset($blogs) ? $blogs->count() : 0;
  $webpagesCount = $webpagesCount ?? 0;
  $testimonialsCount = $testimonialsCount ?? 0;
@endphp
<main class="admin-dashboard-page">

  
  <!-- ================= SIDEBAR ================= -->
  <aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation" data-lenis-prevent>
    <a class="admin-brand" href="{{ route('home') }}" aria-label="Retrotech website home">
      <img class="admin-brand-full" src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Digital">
      <img class="admin-brand-mark" src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
    </a>
    
    <span class="admin-sidebar-caption">WORKSPACE</span>
    <nav class="admin-sidebar-nav" data-lenis-prevent>
      <button class="admin-sidebar-link {{ $currentTab == 'overview' ? 'is-active' : '' }}" type="button" data-admin-tab="overview" aria-label="Overview" title="Overview" onclick="showAdminTab('overview')"><i class="fa-solid fa-chart-pie" aria-hidden="true"></i><span>Overview</span></button>
      
      <button class="admin-sidebar-link {{ $currentTab == 'contacts' ? 'is-active' : '' }}" type="button" data-admin-tab="contacts" aria-label="Contacts ({{ $contactsCount }})" title="Contacts ({{ $contactsCount }})" onclick="showAdminTab('contacts')"><i class="fa-regular fa-address-book" aria-hidden="true"></i><span>Contacts</span><b>{{ $contactsCount }}</b></button>
      
      <button class="admin-sidebar-link {{ $currentTab == 'blogs' ? 'is-active' : '' }}" type="button" data-admin-tab="blogs" aria-label="Blog articles ({{ $blogsCount }})" title="Blog articles ({{ $blogsCount }})" onclick="showAdminTab('blogs')"><i class="fa-regular fa-newspaper" aria-hidden="true"></i><span>Blog articles</span><b>{{ $blogsCount }}</b></button>
      
      <button class="admin-sidebar-link {{ $currentTab == 'webpage' ? 'is-active' : '' }}" type="button" data-admin-tab="webpage" aria-label="Webpages ({{ $webpagesCount ?? 0 }})" title="Webpages ({{ $webpagesCount ?? 0 }})" onclick="showAdminTab('webpage')"><i class="fa-solid fa-globe" aria-hidden="true"></i><span>Webpage</span><b>{{ $webpagesCount ?? 0 }}</b></button>
      
      <button class="admin-sidebar-link {{ $currentTab == 'testimonials' ? 'is-active' : '' }}" type="button" data-admin-tab="testimonials" aria-label="Testimonials ({{ $testimonialsCount ?? 0 }})" title="Testimonials ({{ $testimonialsCount ?? 0 }})" onclick="showAdminTab('testimonials')"><i class="fa-regular fa-star" aria-hidden="true"></i><span>Testimonials</span><b>{{ $testimonialsCount ?? 0 }}</b></button>
    </nav>
    
    <div class="admin-sidebar-bottom">
      <a href="{{ route('home') }}" target="_blank" rel="noopener" class="icon-label-control" aria-label="View website" title="View website"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i><span>View website</span></a>
      <div class="admin-sidebar-user"><span class="admin-user-avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>Administrator</small></span></div>
      <form method="POST" action="{{ route('logout') }}" style="width:100%">
        @csrf
      </form>
      <button type="button" class="admin-sidebar-collapse-btn" id="sidebarToggle" aria-label="Collapse sidebar" aria-controls="adminSidebar" aria-expanded="true" title="Collapse sidebar">
        <i class="fa-solid fa-angles-left" aria-hidden="true"></i>
        <span>Collapse</span>
      </button>
    </div>
  </aside>

  <!-- ================= MAIN CONTENT ================= -->
  <div class="admin-dashboard-main" id="dashboard">
    <header class="admin-topbar" >
      <div class="admin-topbar-heading">
        <div class="admin-topbar-title"><span class="admin-dashboard-kicker">RETROTECH DIGITAL</span><h1>@yield('page_heading', 'Admin workspace')</h1></div>
      </div>
      <div class="admin-topbar-actions" >
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
    @if(session('error'))
      <div class="admin-dashboard-error" style="background: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 0.75rem 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;" role="alert"><i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}</div>
    @endif

    <!-- THIS IS WHERE YOUR DASHBOARD OR FORMS WILL LOAD -->
    @yield('admin-content')
    
  </div>
</main>
@endsection

@push('scripts')
<script>
  // --- 1. TAB SWITCHING LOGIC ---
  const adminSidebarTabs = ['overview', 'contacts', 'blogs', 'webpage', 'testimonials'];

  function showAdminTab(tabName, updateAddress = true) {
    if (!adminSidebarTabs.includes(tabName)) tabName = 'overview';

    if (updateAddress && !document.getElementById(`section-${tabName}`)) {
      localStorage.setItem('adminLastTab', tabName);
      const dashboardUrl = new URL(@json(route('admin.dashboard')), window.location.origin);
      dashboardUrl.searchParams.set('tab', tabName);
      window.location.assign(dashboardUrl.toString());
      return;
    }

    adminSidebarTabs.forEach((name) => {
      const section = document.getElementById(`section-${name}`);
      if (!section) return;
      const selected = name === tabName;
      section.hidden = !selected;
    });

    document.querySelectorAll('.admin-sidebar-link').forEach((link) => {
      const isActive = link.dataset.adminTab === tabName;
      link.classList.toggle('is-active', isActive);
      link.setAttribute('aria-current', isActive ? 'page' : 'false');
    });
    localStorage.setItem('adminLastTab', tabName);

    if (updateAddress) {
      const url = new URL(window.location.href);
      url.searchParams.set('tab', tabName);
      window.history.replaceState({}, '', url);
    }
  }

  // --- 2. DETAIL TOGGLE LOGIC ---
  function toggleAdminDetails(button, rowId) {
    const row = document.getElementById(rowId);
    if (!row) return;
    const isOpening = row.hidden;
    row.hidden = !isOpening;
    button.setAttribute('aria-expanded', String(isOpening));
  }

  // --- 3. SIDEBAR & SCROLL LOGIC ---
  document.addEventListener('DOMContentLoaded', () => {
    // Keep sidebar scrolling isolated
    const sidebarNavEl = document.querySelector('.admin-sidebar-nav');
    const adminSidebarEl = document.getElementById('adminSidebar');

    if (sidebarNavEl) {
      sidebarNavEl.addEventListener('wheel', (e) => {
        const { scrollTop, scrollHeight, clientHeight } = sidebarNavEl;
        const canScroll = scrollHeight > clientHeight;
        if (!canScroll) { e.preventDefault(); return; }
        const delta = e.deltaY;
        const isDown = delta > 0;
        const atBottom = scrollTop + clientHeight >= scrollHeight - 1;
        const atTop = scrollTop <= 0;
        if ((isDown && atBottom) || (!isDown && atTop)) e.preventDefault();
      }, { passive: false });
    }

    if (adminSidebarEl) {
      adminSidebarEl.addEventListener('wheel', (e) => {
        if (!e.target.closest('.admin-sidebar-nav')) e.preventDefault();
      }, { passive: false });
    }

    // Handle sidebar collapse toggle
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
        const labelSpan = sidebarToggle.querySelector('span');
        if (labelSpan) labelSpan.textContent = isCollapsed ? 'Expand' : 'Collapse';
        localStorage.setItem('adminSidebarCollapsed', isCollapsed);
      });

      // Remember collapsed state on page reload
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
    
    // Auto-trigger the correct tab on load if it's the dashboard
    const urlParams = new URLSearchParams(window.location.search);
    const requestedTab = urlParams.get('tab');
    const routeTab = @json($routeTab);
    const lastTab = localStorage.getItem('adminLastTab');
    const initialTab = adminSidebarTabs.includes(requestedTab)
      ? requestedTab
      : (adminSidebarTabs.includes(routeTab)
        ? routeTab
        : (adminSidebarTabs.includes(lastTab) ? lastTab : 'overview'));
    showAdminTab(initialTab, false);
  });
</script>
@endpush