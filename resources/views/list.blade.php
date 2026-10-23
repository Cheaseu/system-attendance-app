<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Attendents</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('imgs/boy.png') }}"> 
    
    <!-- Fonts & CSS Libraries -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #0627B6;
            --primary-hover: #0B1C70;
            --bg-main: #f8fafc;
            --card-border: #e2e8f0;
            --text-muted: #64748b;
        }

        body {
            background-color: var(--bg-main);
            font-family: 'Noto Sans Khmer', 'Segoe UI', sans-serif;
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: sticky;
            top: 0;
            background: #ffffff;
            border-right: 1px solid var(--card-border);
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
            color: #ffffff;
        }

        /* Stat Cards */
        .stat-card-clean {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 1.25rem;
            transition: all 0.25s ease-in-out;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .stat-card-clean:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* Filter Card & Forms */
        .filter-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        /* Table Styling */
        .table-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .table-responsive {
            max-height: calc(100vh - 280px);
            overflow-y: auto;
        }

        .custom-table {
            margin-bottom: 0;
        }

        .custom-table th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: var(--primary) !important;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 12px 16px;
            border: none;
            vertical-align: middle;
        }

        .custom-table td {
            padding: 12px 16px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.925rem;
            vertical-align: middle;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Action Buttons & Badges */
        .btn-action-clean {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            border: 1px solid var(--card-border);
            background: #ffffff;
            color: #64748b;
            text-decoration: none;
        }

        .btn-action-clean:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        .btn-action-clean.delete:hover {
            background: #fef2f2;
            color: #ef4444;
            border-color: #fca5a5;
        }

        .badge-soft-success {
            background-color: #dcfce7;
            color: #15803d;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .badge-soft-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .badge-soft-secondary {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 8px;
            display: inline-block;
        }

        /* Pagination Styles */
        .pagination {
            gap: 6px;
            margin-bottom: 0;
        }

        .pagination .page-item .page-link {
            border-radius: 8px !important;
            border: 1px solid #e0e0e0;
            color: #333;
            background-color: #f8f9fa;
            padding: 6px 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f1f3f5;
            color: #aaa;
            border-color: #e0e0e0;
        }

        .pagination .page-item .page-link:hover:not(.active) {
            background-color: #e9ecef;
            color: #000000;
        }

        .pagination-wrapper p {
            display: none !important;
        }
    </style>
</head>

<body>

<div class="d-flex">
    <!-- Sidebar -->
    @include('sidebar')

    <!-- Main Content Area -->
    <main class="flex-fill p-4">
        
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h4 fw-bold text-dark mb-1">បញ្ជីកម្មវិធី និងចំនួនភ្ញៀវ</h2>
                <p class="text-muted small mb-0">គ្រប់គ្រងកម្មវិធី ពិនិត្យមើលចំនួនភ្ញៀវ និងរបាយការណ៍ថវិកា</p>
            </div>
            <a href="{{ url('admin/event/add') }}" class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                <i class="bi bi-plus-lg"></i>
                <span class="fw-medium">បន្ថែមកម្មវិធីថ្មី</span>
            </a>
        </div>

        {{-- @include('backend.message') --}}

        <!-- 📊 1. Summary Cards Section -->
        <div class="row g-3 mb-4">
            <!-- កម្មវិធីសរុប -->
            <div class="col-md-4">
                <div class="stat-card-clean d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-medium mb-1">កម្មវិធីសរុប</div>
                        <div class="h3 fw-bold text-dark mb-0">{{ number_format($totalPrograms) }}</div>
                    </div>
                    <div class="icon-box text-primary" style="background-color: #e0e7ff;">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>

            <!-- ភ្ញៀវចូលរួមសរុប -->
            <div class="col-md-4">
                <div class="stat-card-clean d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-medium mb-1">ភ្ញៀវចូលរួមសរុប</div>
                        <div class="h3 fw-bold text-dark mb-0">
                            {{ number_format($totalGuests) }} <span class="fs-6 fw-normal text-muted">នាក់</span>
                        </div>
                    </div>
                    <div class="icon-box text-success" style="background-color: #dcfce7;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>

            <!-- ថវិកាសរុប -->
            <div class="col-md-4">
                <div class="stat-card-clean d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-medium mb-1">ថវិការកបានសរុប</div>
                        <div class="h3 fw-bold text-dark mb-0">${{ number_format($totalAmount, 2) }}</div>
                    </div>
                    <div class="icon-box text-warning" style="background-color: #fef3c7;">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🔍 2. Search & Filter Section -->
        <div class="filter-card mb-4 p-3">
            <form action="" method="get">
                <div class="row g-3 align-items-end">

                    <!-- Search by ID -->
                    <div class="col-md-2">
                        <label class="form-label text-secondary small fw-medium">អត្តលេខ (ID)</label>
                        <input type="text" name="id" class="form-control rounded-3" placeholder="ID" value="{{ request('id') }}">
                    </div>

                    <!-- Filter តាមឈ្មោះម្ចាស់ដើមកម្មវិធី -->
                    <div class="col-md-4">
                        <label class="form-label text-secondary small fw-medium">ឈ្មោះម្ចាស់ដើមកម្មវិធី</label>
                        <input type="text" name="host_name" class="form-control rounded-3" placeholder="ស្វែងរកតាមឈ្មោះ (ឧ. លោក ហេង)..." value="{{ request('host_name') }}">
                    </div>

                    <!-- Filter by Status -->
                    <div class="col-md-3">
                        <label class="form-label text-secondary small fw-medium">ស្ថានភាព</label>
                        <select name="status" class="form-select rounded-3">
                            <option value="">ស្ថានភាពទាំងអស់</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>សកម្ម (Active)</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>អសកម្ម (Inactive)</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100 rounded-3">
                            <i class="bi bi-search me-1"></i> ស្វែងរក
                        </button>
                        <a href="{{ url('list') }}" class="btn btn-light border w-100 rounded-3">
                            កំណត់ឡើងវិញ
                        </a>
                    </div>

                </div>
            </form>
        </div>

        <!-- 📋 3. Data Table Section -->
        <div class="table-card">
            <div class="table-responsive">
                <table class="table custom-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>ឈ្មោះម្ចាស់ដើមកម្មវិធី</th>
                            <th>ឈ្មោះកម្មវិធី</th>
                            <th class="text-center">ចំនួនភ្ញៀវចូលរួម</th>
                            <th class="text-end">ថវិកាសរុប</th>
                            <th>ស្ថានភាព</th>
                            <th>កាលបរិច្ឆេទ</th>
                            <th class="text-end">សកម្មភាព</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getquery as $value)
                            <tr>
                                <td class="fw-medium text-muted">#{{ $value->id }}</td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $value->host_name ?? 'N/A' }}</div>
                                </td>
                                <td>{{ $value->name }}</td>
                                <td class="text-center">
                                    <span class="badge-soft-secondary">{{ number_format($value->guest_count) }} នាក់</span>
                                </td>
                                <td class="text-end fw-bold text-success">${{ number_format($value->total_amount, 2) }}</td>
                                <td>
                                    @if($value->status == 1)
                                        <span class="badge-soft-success">Active</span>
                                    @else
                                        <span class="badge-soft-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-muted small">{{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ url('admin/event/edit/'.$value->id) }}" class="btn-action-clean me-1" title="កែប្រែ">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ url('admin/event/delete/'.$value->id) }}" class="btn-action-clean delete" title="លុប" onclick="return confirm('តើអ្នកប្រាកដជាចង់លុបទិន្នន័យនេះមែនទេ?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                                    មិនមានទិន្នន័យត្រូវបានស្វែងរកឃើញទេ។
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            {{-- <div class="d-flex justify-content-between align-items-center p-3 border-top">
                <div class="text-muted small">
                    Showing {{ $getquery->firstItem() ?? 0 }} to {{ $getquery->lastItem() ?? 0 }} of {{ $getquery->total() ?? 0 }} entries
                </div>
                <div class="pagination-wrapper">
                    {{ $getquery->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div> --}}
        </div>

    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>