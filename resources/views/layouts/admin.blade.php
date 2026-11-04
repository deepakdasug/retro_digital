@extends('layouts.app')

@push('styles')
<style>
  /* ================= MODERN ADMIN TOPBAR & HEADER ================= */
  .admin-topbar {
    position: sticky;
    top: 0;
    z-index: 35;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    padding: 0.95rem 1.4rem;
    margin-bottom: 1.5rem;
    border: 1px solid rgba(216, 230, 219, 0.95);
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    box-shadow: 0 4px 18px rgba(20, 40, 26, 0.04);
  }

  .admin-topbar-heading {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    min-width: 0;
  }

  .admin-mobile-menu-btn {
    display: none;
    align-items: center;
    justify-content: center;
    width: 2.4rem;
    height: 2.4rem;
    border-radius: 8px;
    border: 1px solid #d4e2d6;
    background: #ffffff;
    color: #274b34;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.2s ease;
    flex-shrink: 0;
  }
  .admin-mobile-menu-btn:hover {
    background: #eaf3ec;
    border-color: #398158;
    color: #1e3a28;
  }

  .admin-mobile-close-btn {
    display: none;
    align-items: center;
    justify-content: center;
    width: 2rem;
    height: 2rem;
    border-radius: 6px;
    border: 1px solid #d1ded3;
    background: #ffffff;
    color: #556b5a;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .admin-mobile-close-btn:hover {
    background: #fee2e2;
    border-color: #fca5a5;
    color: #dc2626;
  }

  .admin-topbar-title {
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
    min-width: 0;
  }

  .admin-dashboard-kicker {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    color: #4b6b55;
    font-size: 0.72rem;
    font-weight: 750;
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }

  .admin-pulse-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.22);
    animation: adminPulse 2s infinite ease-in-out;
  }
  @keyframes adminPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.55; transform: scale(0.85); }
  }

  .admin-topbar-title h1 {
    margin: 0;
    color: #1a2f21;
    font-size: 1.4rem;
    font-weight: 750;
    letter-spacing: -0.025em;
    line-height: 1.25;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .admin-topbar-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-shrink: 0;
  }

  .admin-dashboard-date {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.45rem 0.85rem;
    border-radius: 9999px;
    background: #edf5ef;
    border: 1px solid #d8e8da;
    color: #275235;
    font-size: 0.82rem;
    font-weight: 600;
    white-space: nowrap;
  }

  .admin-topbar-site-link {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.45rem 0.85rem;
    border-radius: 8px;
    background: #ffffff;
    border: 1px solid #cce0d1;
    color: #275235;
    font-size: 0.82rem;
    font-weight: 650;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
  }
  .admin-topbar-site-link:hover {
    background: #eaf3ec;
    border-color: #398158;
    color: #173621;
    transform: translateY(-1px);
  }

  .admin-topbar-user {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.3rem 0.75rem 0.3rem 0.35rem;
    border-radius: 9999px;
    background: #ffffff;
    border: 1px solid #d5e4d7;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
  }

  .admin-topbar-avatar {
    width: 2.1rem;
    height: 2.1rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981 0%, #047857 100%);
    color: #ffffff;
    font-size: 0.82rem;
    font-weight: 750;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 5px rgba(4, 120, 87, 0.25);
    flex-shrink: 0;
  }

  .admin-topbar-user-info {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
  }
  .admin-topbar-user-name {
    font-size: 0.82rem;
    font-weight: 700;
    color: #182e1f;
  }
  .admin-topbar-user-role {
    font-size: 0.68rem;
    color: #617b68;
    font-weight: 500;
  }

  .admin-logout-form {
    margin: 0;
  }

  .admin-topbar-actions .admin-dashboard-logout {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.48rem 0.85rem;
    border-radius: 8px;
    background: #fff5f5;
    border: 1px solid #fecaca;
    color: #dc2626;
    font-size: 0.82rem;
    font-weight: 650;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
  }
  .admin-topbar-actions .admin-dashboard-logout:hover {
    background: #fee2e2;
    border-color: #f87171;
    color: #b91c1c;
    transform: translateY(-1px);
  }

  /* Backdrop for mobile drawer */
  .admin-sidebar-backdrop {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.45);
    backdrop-filter: blur(4px);
    z-index: 45;
    opacity: 0;
    transition: opacity 0.25s ease;
  }
  .admin-sidebar-backdrop.is-active {
    display: block;
    opacity: 1;
  }

  .admin-sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
  }

  /* Mobile Responsive */
  @media (max-width: 900px) {
    .admin-mobile-menu-btn {
      display: inline-flex;
    }
    .admin-dashboard-date {
      display: none;
    }
    .admin-topbar-user-info {
      display: none;
    }
    .admin-topbar-site-link span {
      display: none;
    }
    .admin-topbar {
      padding: 0.75rem 1rem;
      border-radius: 10px;
      margin-bottom: 1.25rem;
    }
    .admin-topbar-title h1 {
      font-size: 1.15rem;
    }
    .admin-sidebar {
      position: fixed !important;
      top: 0;
      left: 0;
      bottom: 0;
      width: 260px !important;
      max-width: 82vw;
      height: 100vh !important;
      background: #ffffff !important;
      z-index: 50 !important;
      box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15) !important;
      transform: translateX(-100%);
      transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      display: flex !important;
      flex-direction: column !important;
      overflow-y: auto !important;
      padding: 1rem !important;
    }
    .admin-sidebar.is-mobile-open {
      transform: translateX(0) !important;
    }
    .admin-mobile-close-btn {
      display: inline-flex;
    }
    .admin-sidebar-caption,
    .admin-sidebar-bottom {
      display: flex !important;
    }
    .admin-sidebar-nav {
      flex-direction: column !important;
      overflow-x: hidden !important;
    }
  }

  @media (max-width: 640px) {
    .admin-topbar-actions .admin-dashboard-logout span {
      display: none;
    }
    .admin-topbar-actions .admin-dashboard-logout {
      padding: 0.48rem 0.65rem;
    }
    .admin-topbar-user {
      padding: 0.2rem;
      border-radius: 50%;
    }
  }
</style>
@endpush

@section('content')
@php
  $adminTabs = ['overview', 'contacts', 'blogs', 'webpage', 'testimonials', 'faqs'];
  $requestedTab = request()->query('tab');
  $routeTab = match (true) {
    request()->routeIs('admin.blog.*') => 'blogs',
    request()->routeIs('admin.testimonials.*') => 'testimonials',
    request()->routeIs('admin.web-pages.*') => 'webpage',
    request()->routeIs('admin.faqs.*') => 'faqs',
    default => null,
  };
  $currentTab = in_array($requestedTab, $adminTabs, true)
    ? $requestedTab
    : $routeTab;
@endphp
<main class="admin-dashboard-page">

  <!-- Backdrop for mobile drawer -->
  <div class="admin-sidebar-backdrop" id="adminSidebarBackdrop" aria-hidden="true"></div>

  <!-- ================= SIDEBAR ================= -->
  <aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation" data-lenis-prevent>
    <div class="admin-sidebar-header">
      <a class="admin-brand" href="{{ route('home') }}" aria-label="Retrotech website home">
        <img class="admin-brand-full" src="{{ asset('assets/images/logo.png') }}" alt="Retrotech Digital">
        <img class="admin-brand-mark" src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
      </a>
      <button type="button" class="admin-mobile-close-btn" id="mobileSidebarClose" aria-label="Close sidebar" title="Close sidebar">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
    
    <span class="admin-sidebar-caption">WORKSPACE</span>
    <nav class="admin-sidebar-nav" data-lenis-prevent>
      @can('dashboard.view')
      <button class="admin-sidebar-link {{ $currentTab == 'overview' ? 'is-active' : '' }}" type="button" data-admin-tab="overview" aria-label="Overview" title="Overview" onclick="showAdminTab('overview')"><i class="fa-solid fa-chart-pie" aria-hidden="true"></i><span>Overview</span></button>
      @endcan
      
      @can('contacts.view')
      <button class="admin-sidebar-link {{ $currentTab == 'contacts' ? 'is-active' : '' }}" type="button" data-admin-tab="contacts" aria-label="Contacts" title="Contacts" onclick="showAdminTab('contacts')"><i class="fa-regular fa-address-book" aria-hidden="true"></i><span>Contacts</span></button>
      @endcan
      
      @can('blogs.view')
      <button class="admin-sidebar-link {{ $currentTab == 'blogs' ? 'is-active' : '' }}" type="button" data-admin-tab="blogs" aria-label="Blog articles" title="Blog articles" onclick="showAdminTab('blogs')"><i class="fa-regular fa-newspaper" aria-hidden="true"></i><span>Blog articles</span></button>
      @endcan
      
      @can('webpages.view')
      <button class="admin-sidebar-link {{ $currentTab == 'webpage' ? 'is-active' : '' }}" type="button" data-admin-tab="webpage" aria-label="Webpages" title="Webpages" onclick="showAdminTab('webpage')"><i class="fa-solid fa-globe" aria-hidden="true"></i><span>Webpage</span></button>
      @endcan
      
      @can('testimonials.view')
      <button class="admin-sidebar-link {{ $currentTab == 'testimonials' ? 'is-active' : '' }}" type="button" data-admin-tab="testimonials" aria-label="Testimonials" title="Testimonials" onclick="showAdminTab('testimonials')"><i class="fa-regular fa-star" aria-hidden="true"></i><span>Testimonials</span></button>
      @endcan

      @can('faqs.view')
      <button class="admin-sidebar-link {{ $currentTab == 'faqs' ? 'is-active' : '' }}" type="button" data-admin-tab="faqs" aria-label="FAQs" title="FAQs" onclick="showAdminTab('faqs')"><i class="fa-regular fa-circle-question" aria-hidden="true"></i><span>FAQs</span></button>
      @endcan

    </nav>
    
    <div class="admin-sidebar-bottom">
      <a href="{{ route('home') }}" target="_blank" rel="noopener" class="icon-label-control" aria-label="View website" title="View website"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i><span>View website</span></a>
      <div class="admin-sidebar-user">
        <span class="admin-user-avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
        <span>
          <strong>{{ auth()->user()->name }}</strong>
          <small>{{ auth()->user()->is_admin ? 'Super Admin' : 'Staff' }}</small>
        </span>
      </div>
      <button type="button" class="admin-sidebar-collapse-btn" id="sidebarToggle" aria-label="Collapse sidebar" aria-controls="adminSidebar" aria-expanded="true" title="Collapse sidebar">
        <i class="fa-solid fa-angles-left" aria-hidden="true"></i>
        <span>Collapse</span>
      </button>
    </div>
  </aside>

  <!-- ================= MAIN CONTENT ================= -->
  <div class="admin-dashboard-main" id="dashboard">
    <header class="admin-topbar">
      <div class="admin-topbar-heading">
        <button type="button" class="admin-mobile-menu-btn" id="mobileSidebarToggle" aria-label="Toggle navigation menu" title="Open navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="admin-topbar-title">
          <span class="admin-dashboard-kicker">
            <span class="admin-pulse-dot" aria-hidden="true"></span>
            RETROTECH DIGITAL &middot; ADMIN PANEL
          </span>
          <h1 id="adminPageHeading">@yield('page_heading', 'Admin workspace')</h1>
        </div>
      </div>
      
      <div class="admin-topbar-actions">
        <span class="admin-dashboard-date" title="Current Date">
          <i class="fa-regular fa-calendar"></i>
          <span>{{ now()->format('l, F j, Y') }}</span>
        </span>

        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="admin-topbar-site-link" title="Open live website in new tab">
          <i class="fa-solid fa-arrow-up-right-from-square"></i>
          <span>Live Site</span>
        </a>

        <div class="admin-topbar-user" title="Logged in as {{ auth()->user()->email }}">
          <span class="admin-topbar-avatar" aria-label="{{ auth()->user()->name }}">
            {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
          </span>
          <div class="admin-topbar-user-info">
            <strong class="admin-topbar-user-name">{{ auth()->user()->name }}</strong>
            <small class="admin-topbar-user-role">{{ auth()->user()->is_admin ? 'Super Admin' : 'Staff' }}</small>
          </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="admin-logout-form">
          @csrf
          <button type="submit" class="admin-dashboard-logout icon-label-control" aria-label="Log out" title="Log out from admin panel">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
            <span>Log out</span>
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
  const adminSidebarTabs = ['overview', 'contacts', 'blogs', 'webpage', 'testimonials', 'faqs'];
  const adminTabTitles = {
    'overview': 'Dashboard Overview',
    'contacts': 'Contact Submissions',
    'blogs': 'Blog Articles',
    'webpage': 'Webpages & Content',
    'testimonials': 'Client Testimonials',
    'faqs': 'Frequently Asked Questions (FAQs)',
  };

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

    // Dynamically update page heading on dashboard
    const headingEl = document.getElementById('adminPageHeading');
    const isDashboard = Boolean(document.getElementById('section-overview'));
    if (headingEl && isDashboard && adminTabTitles[tabName]) {
      headingEl.textContent = adminTabTitles[tabName];
    }

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

  // --- 3. SIDEBAR, MOBILE DRAWER & SCROLL LOGIC ---
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

    // Handle desktop sidebar collapse toggle
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

    // Mobile Sidebar Drawer
    const mobileToggle = document.getElementById('mobileSidebarToggle');
    const mobileClose = document.getElementById('mobileSidebarClose');
    const backdrop = document.getElementById('adminSidebarBackdrop');

    function openMobileDrawer() {
      if (adminSidebarEl) adminSidebarEl.classList.add('is-mobile-open');
      if (backdrop) backdrop.classList.add('is-active');
      document.body.style.overflow = 'hidden';
    }

    function closeMobileDrawer() {
      if (adminSidebarEl) adminSidebarEl.classList.remove('is-mobile-open');
      if (backdrop) backdrop.classList.remove('is-active');
      document.body.style.overflow = '';
    }

    if (mobileToggle) mobileToggle.addEventListener('click', openMobileDrawer);
    if (mobileClose) mobileClose.addEventListener('click', closeMobileDrawer);
    if (backdrop) backdrop.addEventListener('click', closeMobileDrawer);

    // Auto close mobile drawer on tab click
    document.querySelectorAll('.admin-sidebar-link').forEach((link) => {
      link.addEventListener('click', () => {
        if (window.innerWidth <= 900) {
          closeMobileDrawer();
        }
      });
    });
    
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