```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stock - Fashion Store</title>

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

    /* Table */
    .table-wrap{
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid rgba(0,0,0,.06);
    }
    .table thead th{
      font-weight: 800;
      letter-spacing: .2px;
      background: rgba(15, 23, 42, 0.92) !important;
      color: #fff !important;
      border-color: rgba(255,255,255,.06) !important;
    }
    .table tbody td{ vertical-align: middle; }

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
      font-weight: 700;
      padding: .6rem .9rem;
    }

    .badge-pill{
      border-radius: 999px;
      padding: .45rem .65rem;
      font-weight: 800;
      letter-spacing: .2px;
    }

    /* Low stock row style (soft, modern) */
    tr.low-stock{
      background: rgba(239, 68, 68, .10);
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
          <li class="nav-item"><a class="nav-link active" href="{{ route('items.index') }}"><i class="bi bi-box-seam me-1"></i> Items</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('sells.index') }}"><i class="bi bi-receipt me-1"></i> Sells</a></li>
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
        <h2 class="page-title">Stock Management</h2>
        <div class="page-sub">Monitor availability and low stock items</div>
      </div>

      <a href="{{ route('items.index') }}" class="btn btn-outline-light btn-pill">
        <i class="bi bi-arrow-left me-1"></i> Back to Items
      </a>
    </div>

    <div class="panel">
      <div class="panel-accent"></div>
      <div class="p-3 p-md-4">

        <div class="alert alert-info d-flex align-items-start gap-2" role="alert" style="border-radius: 12px;">
          <i class="bi bi-info-circle-fill mt-1"></i>
          <div>
            <div class="fw-bold">Low Stock Alert</div>
            <div>Items with less than <span class="fw-bold">10</span> units are highlighted.</div>
          </div>
        </div>

        <div class="table-wrap">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th style="width:70px;">ID</th>
                <th>Item Name</th>
                <th>Category</th>
                <th style="width:90px;">Size</th>
                <th style="width:130px;">Color</th>
                <th style="width:140px;">Stock Qty</th>
                <th style="width:150px;">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="{{ $item->stock_quantity < 10 ? 'low-stock' : '' }}">
                  <td class="fw-semibold">{{ $item->id }}</td>
                  <td class="fw-semibold">{{ $item->name }}</td>
                  <td>{{ $item->category }}</td>
                  <td>{{ $item->size }}</td>
                  <td>{{ $item->color }}</td>
                  <td class="fw-bold">{{ $item->stock_quantity }}</td>
                  <td>
                    @if($item->stock_quantity == 0)
                      <span class="badge text-bg-danger badge-pill">
                        <i class="bi bi-x-circle me-1"></i> Out of Stock
                      </span>
                    @elseif($item->stock_quantity < 10)
                      <span class="badge text-bg-warning badge-pill">
                        <i class="bi bi-exclamation-triangle me-1"></i> Low Stock
                      </span>
                    @else
                      <span class="badge text-bg-success badge-pill">
                        <i class="bi bi-check-circle me-1"></i> In Stock
                      </span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Optional: Laravel pagination (remove if you don't use paginate()) -->
        @if(method_exists($items, 'links'))
          <div class="mt-3">
            {{ $items->links() }}
          </div>
        @endif

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```
