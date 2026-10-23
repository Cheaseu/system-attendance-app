<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Attendents</title>
    <link rel="icon" type="image/png" href="{{ asset('imgs/boy.png') }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer&display=swap" rel="stylesheet">

<style>
        :root {
            --primary: #0627B6;
            --bg: #f5f7fb;
            --border: #e5e7eb;
        }

        body {
            background: #f5f7fb;
            font-family: 'Noto Sans Khmer', 'Segoe UI', sans-serif;
            margin: 0;
        }

        /* Sidebar Sticky fixed */
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

        /* Card container */
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,.03);
            background: #ffffff;
        }

        /* Search Bar */
        .custom-search-group {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            transition: box-shadow 0.15s ease-in-out, border-color 0.15s ease-in-out;
            overflow: hidden;
        }

        .custom-search-group:focus-within {
            box-shadow: 0 0 0 0.2rem rgba(6, 39, 182, 0.25);
        }

        .custom-search-group .form-control,
        .custom-search-group .input-group-text,
        .custom-search-group .btn {
            border: none !important;
            box-shadow: none !important;
        }

        .custom-search-group .form-control:focus {
            background-color: transparent;
        }

        .table-responsive {
            max-height: calc(100vh - 180px);
            overflow-y: auto;
            border-radius: 8px;
        }

        .table {
            margin-bottom: 0; 
        }

        .table tbody td {
            text-align: left;
            vertical-align: middle;
            padding: 8px 12px; 
        }

        .btn-search {
            background-color: var(--primary);
            color: white;
            border-radius: 0 !important;
        }

        .btn-search:hover {
            background-color: #0B1C70;
            color: white;
        }

        /* Export Button */
        .btn-export {
            background-color: #198754;
            color: white;
            border: none;
            transition: all 0.15s ease-in-out;
        }

        .btn-export:hover {
            background-color: #146c43;
            color: white;
        }

        /* Add Button */
        .btn-add {
            background-color: var(--primary);
            color: white;
            border: none;
            transition: all 0.15s ease-in-out;
        }

        .btn-add:hover {
            background-color: #0B1C70;
            color: white;
        }

        /* Update Button */
        .btn-update {
            background: var(--primary);
            border: none;
            transition: all 0.15s ease-in-out;
        }

        .btn-update:hover {
            background: #0B1C70;
        }

        /* Delete Button */
        .btn-delete {
            background: #CC1123;
            border: none;
            transition: all 0.15s ease-in-out;
        }

        .btn-delete:hover {
            background: #6F0A14;
        }

        /* border-radius */
        .table thead tr th:first-child {
            border-top-left-radius: 10px;
        }

        .table thead tr th:last-child {
            border-top-right-radius: 10px;
        }

        /* ៣. Sticky Header CSS */
        .table thead th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #0627B6 !important;
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            padding: 12px 8px;
            border: none;
        }

        /* Custom Pagination Design */
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
            background-color: #0627B6 !important;
            border-color: #0627B6 !important;
            color: #fff !important;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f1f3f5;
            color: #aaa;
            border-color: #e0e0e0;
        }

        .pagination .page-item .page-link:hover:not(.active) {
            background-color: #e9ecef;
            color: #000;
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

    <!-- Main Content -->
    <main class="flex-fill p-3">
        <div class="card p-3">
            <h5 class="mb-3 fw-semibold">ភ្ញៀវដែលបានចូលរួមកម្មវិធី</h5>

            <!-- Search + Actions -->
            <div class="bg-white pb-2 mb-2">
                <div class="row g-2 align-items-center">
                    <!-- Search -->
                    <div class="col-12 col-md-6">
                        <form method="GET" action="{{ route('viewcoustomer') }}">
                            <div class="input-group custom-search-group">
                                <span class="input-group-text bg-white text-muted"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control ps-0" placeholder="Search by name or location..." value="{{ request('search') }}">
                                
                                @if(request('search'))
                                    <a href="{{ route('viewcoustomer') }}" class="btn btn-link text-secondary d-flex align-items-center px-2" title="Clear Search" style="text-decoration: none;"><i class="bi bi-x-lg"></i></a>
                                @endif
                                <button type="submit" class="btn btn-search px-4">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Actions -->
                    <div class="col-12 col-md-6 d-flex justify-content-md-end gap-2 pe-md-4">
                        <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                            <i class="bi bi-person-plus me-1"></i>បញ្ចូលអ្នកចូលរួម
                        </button>
                        <a href="{{ route('customers.export', ['search' => request('search')]) }}" class="btn btn-export">
                            <i class="bi bi-file-earmark-excel me-1"></i>Export to Excel
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>{{ __('table.number') }}</th>
                            <th>{{ __('table.name') }}</th>
                            <th>{{ __('table.gift') }}</th>
                            <th>{{ __('table.location') }}</th>
                            <th>{{ __('table.time') }}</th>
                            <th>{{ __('table.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($getquery as $item)
                            <tr>
                                <td class="text-start">{{ $item->id }}</td>
                                <td class="text-start">{{ $item->fullname }}</td>
                                <td class="text-start">{{ $item->money }} {{ $item->symbol }}</td>
                                <td class="text-start">{{ $item->location }}</td>
                                <td class="text-start">{{ $item->created_at }}</td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div style="display: flex; justify-content: center; align-items: center; gap: 5px;">
                                        <!-- ប៊ូតុងកែប្រែ បើក EDIT MODAL -->
                                        <button class="btn btn-sm btn-update text-white btn-edit" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editCustomerModal"
                                                data-id="{{ $item->id }}"
                                                data-fullname="{{ $item->fullname }}"
                                                data-money="{{ $item->money }}"
                                                data-symbol="{{ $item->symbol }}"
                                                data-location="{{ $item->location }}">
                                            កែប្រែ
                                        </button>

                                        <form action="{{ url('deleted/' . $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-delete text-white">លុប</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No customer found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </main>
</div>

<!-- ================= 1. ADD CUSTOMER MODAL ================= -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <div class="modal-header text-white" style="background-color: var(--primary);">
                <h5 class="modal-title" id="addCustomerModalLabel">
                    <i class="bi bi-person-plus me-2"></i>បញ្ចូលអ្នកចូលរួម
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('addcoustomer-submit') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="add_fullname" class="form-label fw-semibold">ឈ្មោះអ្នកចូលរួម (Name)</label>
                        <input type="text" class="form-control" id="add_fullname" name="fullname" placeholder="បញ្ចូលឈ្មោះ..." required>
                    </div>

                    <div class="mb-3">
                        <label for="add_money" class="form-label fw-semibold">ចំណងដៃ (Gift Amount)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="add_money" name="money" placeholder="0.00" required>
                            <select class="form-select" name="symbol" style="max-width: 100px;">
                                <option value="$">$</option>
                                <option value="៛">៛</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="add_location" class="form-label fw-semibold">ទីកន្លែង (Location)</label>
                        <input type="text" class="form-control" id="add_location" name="location" placeholder="បញ្ចូលទីកន្លែង/អាសយដ្ឋាន..." required>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">បោះបង់</button>
                    <button type="submit" class="btn btn-add px-4">រក្សាទុក</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- ================= 2. EDIT CUSTOMER MODAL ================= -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <div class="modal-header text-white" style="background-color: #ffc107;">
                <h5 class="modal-title text-dark fw-bold" id="editCustomerModalLabel">
                    <i class="bi bi-pencil-square me-2"></i>កែប្រែព័ត៌មានអ្នកចូលរួម
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- ត្រូវប្រាកដថាឈ្មោះ Route ត្រូវគ្នាជាមួយ Controller Update របស់អ្នក -->
            <form action="{{ route('updatecoustomer-submit') }}" method="POST">
                @csrf
                <!-- Input Hidden សម្រាប់ផ្ញើ ID ទៅកែប្រែ -->
                <input type="hidden" name="id" id="edit_id">

                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="edit_fullname" class="form-label fw-semibold">ឈ្មោះអ្នកចូលរួម (Name)</label>
                        <input type="text" class="form-control" id="edit_fullname" name="fullname" placeholder="បញ្ចូលឈ្មោះ..." required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_money" class="form-label fw-semibold">ចំណងដៃ (Gift Amount)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="edit_money" name="money" placeholder="0.00" required>
                            <select class="form-select" id="edit_symbol" name="symbol" style="max-width: 100px;">
                                <option value="$">$</option>
                                <option value="៛">៛</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_location" class="form-label fw-semibold">ទីកន្លែង (Location)</label>
                        <input type="text" class="form-control" id="edit_location" name="location" placeholder="បញ្ចូលទីកន្លែង/អាសយដ្ឋាន..." required>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">បោះបង់</button>
                    <button type="submit" class="btn btn-warning text-dark px-4 fw-semibold">កែប្រែ</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS សម្រាប់ចាប់យកទិន្នន័យពី Table ដាក់ចូល Edit Modal -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');
    
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // ចាប់យកទិន្នន័យពី data-attributes
            const id = this.getAttribute('data-id');
            const fullname = this.getAttribute('data-fullname');
            const money = this.getAttribute('data-money');
            const symbol = this.getAttribute('data-symbol');
            const location = this.getAttribute('data-location');

            // បញ្ចូលទិន្នន័យទៅក្នុង Input Form របស់ Edit Modal
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_fullname').value = fullname;
            document.getElementById('edit_money').value = money;
            document.getElementById('edit_symbol').value = symbol;
            document.getElementById('edit_location').value = location;
        });
    });
});
</script>

</body>
</html>