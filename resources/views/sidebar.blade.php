<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="sidebar p-3">
    <h4 class="mb-4 fw-bold text-primary">Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <i class="bi bi-grid me-2"></i>
                <span data-en="Dashboard" data-km="ផ្ទាំងគ្រប់គ្រង">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('viewcoustomer*') ? 'active' : '' }}" href="{{ url('viewcoustomer') }}">
                <i class="bi bi-people me-2"></i>
                <span data-en="View Customer" data-km="មើលអតិថិជន">View Customer</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('list*') ? 'active' : '' }}" href="{{ url('list') }}">
                <i class="bi bi-people me-2"></i>
                <span data-en="View Customer" data-km="បញ្ជីឈ្មោះភ្ញៀវ">បញ្ជីឈ្មោះភ្ញៀវ</span>
            </a>
        </li>
        
    </ul>
</aside>
<style>
    :root {
        --primary: #0627B6;
        --bg: #f5f7fb;
        --border: #e5e7eb;
    }

    body {
        background: #ffff;
        font-family: 'Noto Sans Khmer', 'Segoe UI', sans-serif;
        margin: 0;
    }

    /* Fixed/Sticky Sidebar */
    .sidebar {
        width: 240px;
        height: 100vh;
        position: sticky;
        top: 0;
        background: #fff;
        border-right: 1px solid var(--border);
        overflow-y: auto;
        flex-shrink: 0;
    }

    .sidebar .nav-link {
        color: #555;
        border-radius: 8px;
        padding: 10px 12px;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background: var(--primary);
        color: #fff;
    }

    /* Main Content */
    main {
        min-width: 0; /* ការពារ Overflow លើអេក្រង់តូច */
    }
</style>