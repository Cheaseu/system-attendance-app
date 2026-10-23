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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
        }

        .sidebar .nav-link {
            color: #555;
            border-radius: 8px;
            padding: 10px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: #4f6ef7;
            color: #fff;
        }

        .stat-card {
            border: none;
            border-radius: 12px;
        }

        .icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .chart-placeholder {
            height: 260px;
            background: #f1f3f9;
            border-radius: 10px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    @include('sidebar')

    <!-- Main Content -->
    <main class="flex-fill p-4">
        
        <!-- Header with Language Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="m-0" data-en="Profile Statistics" data-km="ស្ថិតិប្រវត្តិរូប">Profile Statistics</h3>
            
           
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-translate me-1"></i> Language
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                    <li><a class="dropdown-menu-item dropdown-item" href="#" onclick="changeLanguage('en')">English</a></li>
                    <li><a class="dropdown-menu-item dropdown-item" href="#" onclick="changeLanguage('km')">ខ្មែរ</a></li>
                </ul>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <a href="viewcoustomer" style="text-decoration: none;">
                    <div class="card stat-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon bg-primary text-white me-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <p class="mb-0 text-muted">sok dara</p>
                                <h5>112,000</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                 <a href="viewcoustomer" style="text-decoration: none;">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon bg-info text-white me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-muted">thida</p>
                            <h5>183,000</h5>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3">
                 <a href="viewcoustomer" style="text-decoration: none;">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon bg-success text-white me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-muted">Xing Xing</p>
                            <h5>80,000</h5>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3">
                 <a href="viewcoustomer" style="text-decoration: none;">
                <div class="card stat-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon bg-danger text-white me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-muted">Nu na</p>
                            <h5>112</h5>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>

    </main>
</div>

<!-- Bootstrap 5 JavaScript Bundle (Required for Dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Language Switcher Script -->
<script>
    function changeLanguage(lang) {
        // Find all elements containing language data attributes
        const elements = document.querySelectorAll('[data-en]');
        
        elements.forEach(el => {
            if (lang === 'km') {
                el.textContent = el.getAttribute('data-km');
            } else {
                el.textContent = el.getAttribute('data-en');
            }
        });

        // Update the main dropdown toggle button text optionally
        document.getElementById('langDropdown').innerHTML = `<i class="bi bi-translate me-1"></i> ${lang === 'km' ? 'ភាសា' : 'Language'}`;
        
        // Update html lang attribute
        document.documentElement.lang = lang;
    }
</script>
</body>
</html>