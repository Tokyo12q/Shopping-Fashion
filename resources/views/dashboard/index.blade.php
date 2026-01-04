<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Fashion Store</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand-1:#6d28d9; /* purple */
      --brand-2:#ec4899; /* pink */
      --bg-1:#0b1020;
      --bg-2:#0e1630;
      --card: rgba(255,255,255,.86);
      --border: rgba(255,255,255,.45);
    }

    body{
      min-height: 100vh;
      background:
        radial-gradient(900px 500px at 10% 10%, rgba(236,72,153,.18), transparent 60%),
        radial-gradient(900px 500px at 90% 10%, rgba(109,40,217,.18), transparent 60%),
        linear-gradient(180deg, var(--bg-1) 0%, var(--bg-2) 45%, var(--bg-1) 100%);
    }

    /* Navbar glass */
    .nav-glass{
      background: rgba(255,255,255,.08) !important;
      border-bottom: 1px solid rgba(255,255,255,.12);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
    }

    .brand-pill{
      display: inline-flex;
      align-items: center;
      gap: .6rem;
      padding: .45rem .75rem;
      border-radius: 999px;
      background: rgba(255,255,255,.10);
      border: 1px solid rgba(255,255,255,.15);
    }

    .brand-dot{
      width: 34px;
      height: 34px;
      border-radius: 12px;
      display: grid;
      place-items: center;
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
      box-shadow: 0 10px 24px rgba(236,72,153,.18);
    }

    .nav-link{
      border-radius: 12px;
      padding: .5rem .75rem !important;
      color: rgba(255,255,255,.82) !important;
    }
    .nav-link:hover{ background: rgba(255,255,255,.10); }
    .nav-link.active{
      background: rgba(255,255,255,.14);
      color: #fff !important;
    }

    .page-wrap{
      padding: 22px 0 40px;
    }

    .page-title{
      color: #fff;
      font-weight: 800;
      letter-spacing: .2px;
      margin-bottom: 4px;
    }

    .page-sub{
      color: rgba(255,255,255,.75);
      margin-bottom: 18px;
    }

    /* Stat cards */
    .stat-card{
      background: var(--card);
      border: 1px solid rgba(0,0,0,.05);
      border-radius: 18px;
      box-shadow: 0 14px 42px rgba(0,0,0,.18);
      overflow: hidden;
    }

    .stat-accent{
      height: 4px;
      width: 100%;
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
    }

    .stat-icon{
      width: 46px;
      height: 46px;
      border-radius: 16px;
      display: grid;
      place-items: center;
      background: rgba(109,40,217,.10);
      border: 1px solid rgba(109,40,217,.18);
    }

    .stat-label{
      color: rgba(0,0,0,.62);
      font-weight: 600;
      margin: 0;
      font-size: .95rem;
    }

    .stat-value{
      font-size: 2rem;
      font-weight: 800;
      margin: 0;
      line-height: 1.1;
    }

    /* Different accent colors per card */
    .accent-primary .stat-accent{ background: linear-gradient(135deg, #2563eb, #60a5fa); }
    .accent-success .stat-accent{ background: linear-gradient(135deg, #16a34a, #86efac); }
    .accent-warning .stat-accent{ background: linear-gradient(135deg, #f59e0b, #fde68a); }
    .accent-info .stat-accent{ background: linear-gradient(135deg, #06b6d4, #67e8f9); }

    .accent-primary .stat-icon{ background: rgba(37,99,235,.10); border-color: rgba(37,99,235,.18); }
    .accent-success .stat-icon{ background: rgba(22,163,74,.10); border-color: rgba(22,163,74,.18); }
    .accent-warning .stat-icon{ background: rgba(245,158,11,.12); border-color: rgba(245,158,11,.20); }
    .accent-info .stat-icon{ background: rgba(6,182,212,.10); border-color: rgba(6,182,212,.18); }

    .btn-logout{
      border: 0;
      border-radius: 12px;
      padding: .5rem .9rem;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(135deg, #ef4444, #f97316);
      box-shadow: 0 10px 24px rgba(239,68,68,.20);
    }
    .btn-logout:hover{ filter: brightness(1.05); transform: translateY(-1px); }

    /* Make container feel centered on big screens */
    .container-narrow{ max-width: 1100px; }

    @media (max-width: 991.98px){
      .nav-link{ margin-top: .35rem; }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark nav-glass">
    <div class="container-fluid container-narrow">
      <a class="navbar-brand brand-pill" href="#">
        <span class="brand-dot"><i class="bi bi-bag-heart-fill"></i></span>
        <span class="fw-bold">Fashion Store</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mt-3 mt-lg-0 gap-1">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}">
              <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
              <i class="bi bi-people me-1"></i> Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('items.index') }}">
              <i class="bi bi-box-seam me-1"></i> Items
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sells.index') }}">
              <i class="bi bi-receipt me-1"></i> Sells
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.index') }}">
              <i class="bi bi-graph-up-arrow me-1"></i> Reports
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mt-3 mt-lg-0">
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-logout btn-sm">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
              </button>
            </form>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container container-narrow page-wrap">
    <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-2">
      <div>
        <h2 class="page-title">Dashboard</h2>
        <div class="page-sub">Overview of your store today</div>
      </div>

      <!-- Optional quick action placeholder -->
      <div class="text-white-50 small">
        <i class="bi bi-shield-check me-1"></i> Admin Panel
      </div>
    </div>

    <div class="row g-3 mt-1">
      <!-- Total Users -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="stat-card accent-primary h-100">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="stat-icon"><i class="bi bi-people fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius: 999px;">All</span>
            </div>
            <p class="stat-label">Total Users</p>
            <p class="stat-value">{{ $totalUsers }}</p>
          </div>
        </div>
      </div>

      <!-- Total Items -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="stat-card accent-success h-100">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="stat-icon"><i class="bi bi-box-seam fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius: 999px;">Stock</span>
            </div>
            <p class="stat-label">Total Items</p>
            <p class="stat-value">{{ $totalItems }}</p>
          </div>
        </div>
      </div>

      <!-- Total Sells -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="stat-card accent-warning h-100">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="stat-icon"><i class="bi bi-receipt fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius: 999px;">Sales</span>
            </div>
            <p class="stat-label">Total Sells</p>
            <p class="stat-value">{{ $totalSells }}</p>
          </div>
        </div>
      </div>

      <!-- Low Stock -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="stat-card accent-info h-100">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="stat-icon"><i class="bi bi-exclamation-circle fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius: 999px;">Alert</span>
            </div>
            <p class="stat-label">Low Stock Items</p>
            <p class="stat-value">{{ $lowStock }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional extra panel (you can remove if you want) -->
    <div class="row g-3 mt-3">
      <div class="col-12">
        <div class="stat-card">
          <div class="stat-accent"></div>
          <div class="p-4 indicated">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <div class="d-flex align-items-center gap-2">
                <div class="stat-icon" style="background: rgba(236,72,153,.10); border-color: rgba(236,72,153,.18);">
                  <i class="bi bi-stars fs-5"></i>
                </div>
                <div>
                  <div class="fw-bold">Quick Tips</div>
                  <div class="text-muted">Use Reports to track sales and restock low items.</div>
                </div>
              </div>
              <a class="btn btn-outline-dark" style="border-radius:12px;" href="{{ route('reports.index') }}">
                Open Reports <i class="bi bi-arrow-right ms-1"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
