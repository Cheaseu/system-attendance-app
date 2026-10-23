<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Khmer Font -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#4f6ef7;
    --bg:#f5f7fb;
    --border:#e5e7eb;
}

body{
    background: var(--bg);
    font-family: 'Noto Sans Khmer', 'Segoe UI', sans-serif;
}

/* Sidebar */
.sidebar{
    width:240px;
    min-height:100vh;
    background:#fff;
    border-right:1px solid var(--border);
}

.sidebar .nav-link{
    color:#555;
    padding:10px 12px;
    border-radius:8px;
    transition:.2s;
}

.sidebar .nav-link i{
    font-size:18px;
}

.sidebar .nav-link:hover,
.sidebar .nav-link.active{
    background:var(--primary);
    color:#fff;
}

/* Card */
.card{
    border:none;
    border-radius:14px;
    box-shadow:0 8px 20px rgba(0,0,0,.05);
}
</style>
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar p-3">
        <h4 class="fw-bold text-primary mb-4">Mazer</h4>

        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a class="nav-link active" href="dashboard">
                    <i class="bi bi-grid me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewcoustomer">
                    <i class="bi bi-people me-2"></i> View Customer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addcoustomer">
                    <i class="bi bi-person-plus me-2"></i> បញ្ចូលអ្នកចូលរួម
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main -->
    <main class="flex-fill p-4">
        <h3 class="fw-semibold mb-4">Profile Statistics</h3>

        <div class="card p-4">
            <h5 class="fw-semibold mb-3">ភ្ញៀវដែលបានចូលរួមកម្មវិធី</h5>

            <form action="{{ route('updatecoustomer-submit') }}" method="POST" class="row g-3">
                @csrf
                <input type="hidden"name="id" value="{{$sqlupdate->id}}">
                <div class="col-md-6">
                    <label class="form-label">ឈ្មោះអ្នកចូលរួម</label>
                    <input type="text" name="fullname" class="form-control"value="{{$sqlupdate->fullname}}" placeholder="Full name" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">ចំណងដៃ</label>
                    <input type="number" name="money" class="form-control"value="{{$sqlupdate->money}}" placeholder="money" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">ប្រភេទប្រាក់</label>
                    <select name="symbol" class="form-select">
                        <option value="$" {{ $sqlupdate->symbol == '$' ? 'selected' : '' }}>$ USD</option>
                        <option value="៛" {{ $sqlupdate->symbol == '៛' ? 'selected' : '' }}>៛ KHR</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">ទីកន្លែង</label>
                    <input type="text" name="location" class="form-control"value="{{$sqlupdate->location}}" placeholder="Location">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i> Updated
                    </button>
                </div>

            </form>
        </div>
    </main>
</div>

</body>
</html>
