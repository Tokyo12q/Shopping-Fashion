
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sells - Fashion Store</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand-1:#6d28d9;
      --brand-2:#ec4899;
      --bg-1:#0b1020;
      --bg-2:#0e1630;
      --card: rgba(255,255,255,.86);
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
      display:inline-flex;
      align-items:center;
      gap:.6rem;
      padding:.45rem .75rem;
      border-radius:999px;
      background: rgba(255,255,255,.10);
      border:1px solid rgba(255,255,255,.15);
    }

    .brand-dot{
      width: 34px; height: 34px;
      border-radius: 12px;
      display:grid; place-items:center;
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
      color:#fff !important;
    }

    .btn-logout{
      border: 0;
      border-radius: 12px;
      padding: .5rem .9rem;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(135deg, #ef4444, #f97316);
      box-shadow: 0 10px 24px rgba(239,68,68,.20);
    }

    .container-narrow{ max-width: 1100px; }
    .page-wrap{ padding: 22px 0 40px; }

    .page-title{
      color:#fff;
      font-weight: 800;
      letter-spacing: .2px;
      margin-bottom: 4px;
    }
    .page-sub{ color: rgba(255,255,255,.75); margin-bottom: 18px; }

    /* Panel */
    .panel{
      background: var(--card);
      border: 1px solid rgba(0,0,0,.05);
      border-radius: 18px;
      box-shadow: 0 14px 42px rgba(0,0,0,.18);
      overflow: hidden;
    }
    .panel-accent{
      height: 4px;
      width: 100%;
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
    }

    /* Table wrapper */
    .table-wrap{
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid rgba(0,0,0,.06);
      background: rgba(255,255,255,.92);
    }
    .table thead th{
      font-weight: 900;
      letter-spacing: .2px;
      background: rgba(15, 23, 42, 0.92) !important;
      color: #fff !important;
      border-color: rgba(255,255,255,.06) !important;
    }
    .table tbody td{ vertical-align: middle; }

    .btn-pill{
      border-radius: 12px;
      font-weight: 800;
      padding: .6rem .9rem;
    }
    .btn-primary-grad{
      border: 0;
      color:#fff;
      background: linear-gradient(135deg, #2563eb, #60a5fa);
      box-shadow: 0 10px 24px rgba(37,99,235,.18);
    }

    /* Summary card */
    .summary{
      background: rgba(255,255,255,.90);
      border: 1px solid rgba(0,0,0,.06);
      border-radius: 18px;
      box-shadow: 0 12px 34px rgba(0,0,0,.14);
    }
    .summary .kpi{
      border-radius: 14px;
      border: 1px solid rgba(0,0,0,.06);
      background: rgba(255,255,255,.75);
      padding: 14px 16px;
    }
    .summary .kpi .label{ color: rgba(0,0,0,.55); font-weight: 700; }
    .summary .kpi .value{ font-size: 1.3rem; font-weight: 900; }
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
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="bi bi-people me-1"></i> Users</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('items.index') }}"><i class="bi bi-box-seam me-1"></i> Items</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ route('sells.index') }}"><i class="bi bi-receipt me-1"></i> Sells</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('reports.index') }}"><i class="bi bi-graph-up-arrow me-1"></i> Reports</a></li>
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
        <h2 class="page-title">Sales History</h2>
        <div class="page-sub">Review transactions and revenue</div>
      </div>

      <a href="{{ route('sells.create') }}" class="btn btn-pill btn-primary-grad">
        <i class="bi bi-plus-circle me-1"></i> Record New Sale
      </a>
    </div>

    @if(session('success'))
      <div class="alert alert-success" role="alert" style="border-radius: 12px;">
        <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
      </div>
    @endif

    <div class="panel">
      <div class="panel-accent"></div>
      <div class="p-3 p-md-4">
        <div class="table-wrap">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th style="width:70px;">ID</th>
                <th>Item Name</th>
                <th>Sold By</th>
                <th style="width:120px;">Quantity</th>
                <th style="width:150px;">Total Price</th>
                <th style="width:140px;">Sale Date</th>
                <th style="width:170px;">Recorded At</th>
              </tr>
            </thead>
            <tbody>
              @forelse($sells as $sell)
                <tr>
                  <td class="fw-semibold">{{ $sell->id }}</td>
                  <td class="fw-semibold">{{ $sell->item->name }}</td>
                  <td>{{ $sell->user->name }}</td>
                  <td>{{ $sell->quantity }}</td>
                  <td>${{ number_format($sell->total_price, 2) }}</td>
                  <td>{{ date('Y-m-d', strtotime($sell->sell_date)) }}</td>
                  <td>{{ $sell->created_at->format('Y-m-d H:i') }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center py-4">No sales recorded yet.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Optional: pagination if $sells is paginated -->
        @if(method_exists($sells, 'links'))
          <div class="mt-3">
            {{ $sells->links() }}
          </div>
        @endif
      </div>
    </div>

    @if($sells->count() > 0)
      <div class="summary mt-3 p-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <div class="fw-bold fs-5">
            <i class="bi bi-bar-chart-line me-1"></i> Total Sales Summary
          </div>
          <span class="badge text-bg-light border" style="border-radius:999px;">
            <i class="bi bi-clock-history me-1"></i> Current View
          </span>
        </div>

        <div class="row g-3">
          <div class="col-12 col-md-4">
            <div class="kpi">
              <div class="label">Total Sales</div>
              <div class="value">{{ $sells->count() }}</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="kpi">
              <div class="label">Total Revenue</div>
              <div class="value">${{ number_format($sells->sum('total_price'), 2) }}</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="kpi">
              <div class="label">Total Items Sold</div>
              <div class="value">{{ $sells->sum('quantity') }}</div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

