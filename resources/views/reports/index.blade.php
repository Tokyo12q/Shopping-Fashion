```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reports - Fashion Store</title>

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

    .container-narrow{ max-width: 1100px; }
    .page-wrap{ padding: 22px 0 40px; }

    .page-title{
      color:#fff;
      font-weight: 800;
      letter-spacing: .2px;
      margin-bottom: 4px;
    }
    .page-sub{ color: rgba(255,255,255,.75); margin-bottom: 18px; }

    /* Card */
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

    /* Small top cards */
    .stat-card{
      background: rgba(255,255,255,.92);
      border: 1px solid rgba(0,0,0,.05);
      border-radius: 18px;
      box-shadow: 0 12px 34px rgba(0,0,0,.14);
      overflow: hidden;
      height: 100%;
    }
    .stat-accent{ height: 4px; width: 100%; }
    .accent-success .stat-accent{ background: linear-gradient(135deg, #16a34a, #86efac); }
    .accent-info .stat-accent{ background: linear-gradient(135deg, #06b6d4, #67e8f9); }
    .accent-warning .stat-accent{ background: linear-gradient(135deg, #f59e0b, #fde68a); }

    .stat-icon{
      width: 46px; height: 46px;
      border-radius: 16px;
      display:grid; place-items:center;
      border: 1px solid rgba(0,0,0,.06);
    }
    .accent-success .stat-icon{ background: rgba(22,163,74,.10); border-color: rgba(22,163,74,.18); }
    .accent-info .stat-icon{ background: rgba(6,182,212,.10); border-color: rgba(6,182,212,.18); }
    .accent-warning .stat-icon{ background: rgba(245,158,11,.12); border-color: rgba(245,158,11,.20); }

    .stat-label{ color: rgba(0,0,0,.62); font-weight: 700; margin: 0; }
    .stat-value{ font-size: 1.9rem; font-weight: 900; margin: 0; line-height: 1.1; }

    /* Buttons */
    .btn-logout{
      border: 0;
      border-radius: 12px;
      padding: .5rem .9rem;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(135deg, #ef4444, #f97316);
      box-shadow: 0 10px 24px rgba(239,68,68,.20);
    }
    .btn-pill{
      border-radius: 12px;
      font-weight: 800;
      padding: .55rem .85rem;
    }
    .btn-filter{
      border-radius: 999px;
      padding: .45rem .8rem;
      font-weight: 800;
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
    .badge-pill{
      border-radius: 999px;
      padding: .45rem .65rem;
      font-weight: 800;
      letter-spacing: .2px;
    }

    .section-title{
      font-weight: 900;
      letter-spacing: .2px;
      margin: 0;
    }
    .section-sub{
      color: rgba(0,0,0,.55);
      margin: 0;
      font-size: .95rem;
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
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="bi bi-people me-1"></i> Users</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('items.index') }}"><i class="bi bi-box-seam me-1"></i> Items</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('sells.index') }}"><i class="bi bi-receipt me-1"></i> Sells</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ route('reports.index') }}"><i class="bi bi-graph-up-arrow me-1"></i> Reports</a></li>
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
    <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-2">
      <div>
        <h2 class="page-title">Sales Reports</h2>
        <div class="page-sub">Track revenue, sales volume, and low stock items</div>
      </div>

      <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('reports.index', ['filter' => 'today']) }}"
           class="btn btn-filter {{ $filter == 'today' ? 'btn-primary' : 'btn-outline-light' }}">
          Today
        </a>
        <a href="{{ route('reports.index', ['filter' => 'week']) }}"
           class="btn btn-filter {{ $filter == 'week' ? 'btn-primary' : 'btn-outline-light' }}">
          This Week
        </a>
        <a href="{{ route('reports.index', ['filter' => 'month']) }}"
           class="btn btn-filter {{ $filter == 'month' ? 'btn-primary' : 'btn-outline-light' }}">
          This Month
        </a>
        <a href="{{ route('reports.index', ['filter' => 'all']) }}"
           class="btn btn-filter {{ $filter == 'all' ? 'btn-primary' : 'btn-outline-light' }}">
          All Time
        </a>
      </div>
    </div>

    <!-- Summary cards -->
    <div class="row g-3 mt-1">
      <div class="col-12 col-md-4">
        <div class="stat-card accent-success">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div class="stat-icon"><i class="bi bi-currency-dollar fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius:999px;">Revenue</span>
            </div>
            <p class="stat-label">Total Revenue</p>
            <p class="stat-value">${{ number_format($totalRevenue, 2) }}</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="stat-card accent-info">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div class="stat-icon"><i class="bi bi-bag-check fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius:999px;">Units</span>
            </div>
            <p class="stat-label">Total Items Sold</p>
            <p class="stat-value">{{ $totalItemsSold }}</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="stat-card accent-warning">
          <div class="stat-accent"></div>
          <div class="p-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div class="stat-icon"><i class="bi bi-receipt fs-5"></i></div>
              <span class="badge text-bg-light border" style="border-radius:999px;">Sales</span>
            </div>
            <p class="stat-label">Total Sales</p>
            <p class="stat-value">{{ $totalSales }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Top selling items -->
    <div class="panel mt-3">
      <div class="panel-accent"></div>
      <div class="p-3 p-md-4">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-2">
          <div>
            <h5 class="section-title">Top 5 Selling Items</h5>
            <p class="section-sub">Best performers for the selected period</p>
          </div>
          <span class="badge text-bg-light border" style="border-radius:999px;">
            <i class="bi bi-trophy me-1"></i> Top Items
          </span>
        </div>

        <div class="table-wrap">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>Item Name</th>
                <th style="width:180px;">Total Quantity Sold</th>
                <th style="width:180px;">Total Revenue</th>
              </tr>
            </thead>
            <tbody>
              @forelse($topItems as $topItem)
                <tr>
                  <td class="fw-semibold">{{ $topItem->item->name }}</td>
                  <td>{{ $topItem->total_quantity }}</td>
                  <td>${{ number_format($topItem->total_revenue, 2) }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="text-center py-4">No sales data available</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Low stock alert -->
    <div class="panel mt-3">
      <div class="panel-accent" style="background: linear-gradient(135deg, #ef4444, #f97316);"></div>
      <div class="p-3 p-md-4">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-2">
          <div>
            <h5 class="section-title">Low Stock Alert</h5>
            <p class="section-sub">Items with less than 10 units</p>
          </div>
          <span class="badge text-bg-danger badge-pill">
            <i class="bi bi-exclamation-triangle me-1"></i> Attention
          </span>
        </div>

        <div class="table-wrap">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>Item Name</th>
                <th style="width:180px;">Category</th>
                <th style="width:160px;">Current Stock</th>
                <th style="width:160px;">Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($lowStockItems as $item)
                <tr>
                  <td class="fw-semibold">{{ $item->name }}</td>
                  <td>{{ $item->category }}</td>
                  <td class="fw-bold">{{ $item->stock_quantity }}</td>
                  <td>
                    @if($item->stock_quantity == 0)
                      <span class="badge text-bg-danger badge-pill">
                        <i class="bi bi-x-circle me-1"></i> Out of Stock
                      </span>
                    @else
                      <span class="badge text-bg-warning badge-pill">
                        <i class="bi bi-exclamation-circle me-1"></i> Low Stock
                      </span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center py-4 text-success fw-semibold">
                    <i class="bi bi-check-circle-fill me-1"></i> All items have sufficient stock!
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Recent sales -->
    <div class="panel mt-3">
      <div class="panel-accent" style="background: linear-gradient(135deg, #06b6d4, #67e8f9);"></div>
      <div class="p-3 p-md-4">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-2">
          <div>
            <h5 class="section-title">Recent Sales</h5>
            <p class="section-sub">Latest transactions for the selected period</p>
          </div>
          <span class="badge text-bg-light border" style="border-radius:999px;">
            <i class="bi bi-clock-history me-1"></i> Recent
          </span>
        </div>

        <div class="table-wrap">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th style="width:160px;">Date</th>
                <th>Item</th>
                <th style="width:140px;">Quantity</th>
                <th style="width:180px;">Total Price</th>
              </tr>
            </thead>
            <tbody>
              @forelse($sells as $sell)
                <tr>
                  <td>{{ date('Y-m-d', strtotime($sell->sell_date)) }}</td>
                  <td class="fw-semibold">{{ $sell->item->name }}</td>
                  <td>{{ $sell->quantity }}</td>
                  <td>${{ number_format($sell->total_price, 2) }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center py-4">No sales found for this period</td>
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

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```
