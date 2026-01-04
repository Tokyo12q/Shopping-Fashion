<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Record Sale - Fashion Store</title>

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

    /* Navbar glass (same as other pages) */
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

    .form-label{ font-weight: 700; color: rgba(0,0,0,.75); }
    .form-control, .form-select{
      border-radius: 12px;
      padding: 12px 14px;
      border: 1px solid rgba(0,0,0,.10);
    }
    .form-control:focus, .form-select:focus{
      border-color: rgba(109,40,217,.45);
      box-shadow: 0 0 0 .25rem rgba(109,40,217,.15);
    }

    .price-box{
      border-radius: 16px;
      border: 1px solid rgba(0,0,0,.06);
      background: rgba(255,255,255,.90);
      padding: 16px 18px;
    }
    .price-big{
      font-size: 2rem;
      font-weight: 900;
      line-height: 1.1;
    }

    .badge-pill{
      border-radius: 999px;
      padding: .45rem .65rem;
      font-weight: 800;
      letter-spacing: .2px;
    }

    .btn-save{
      border: 0;
      border-radius: 12px;
      padding: .65rem 1rem;
      font-weight: 800;
      color:#fff;
      background: linear-gradient(135deg, #16a34a, #22c55e);
      box-shadow: 0 10px 24px rgba(34,197,94,.18);
    }
    .btn-save:hover{ filter: brightness(1.05); transform: translateY(-1px); }

    .btn-soft{
      border-radius: 12px;
      padding: .65rem 1rem;
      font-weight: 800;
    }
  </style>
</head>

<body>
  <!-- Navbar (same design as your other pages) -->
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
        <h2 class="page-title">Record New Sale</h2>
        <div class="page-sub">Complete the transaction and update inventory</div>
      </div>
      <a href="{{ route('sells.index') }}" class="btn btn-outline-light" style="border-radius:12px;">
        <i class="bi bi-arrow-left me-1"></i> Back to Sells
      </a>
    </div>

    <div class="panel">
      <div class="panel-accent"></div>
      <div class="p-4 p-md-5">

        @if($errors->any())
          <div class="alert alert-danger" role="alert" style="border-radius: 12px;">
            <div class="d-flex gap-2">
              <i class="bi bi-exclamation-triangle-fill mt-1"></i>
              <div>
                <div class="fw-bold mb-1">Please fix the following:</div>
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        @endif

        <form action="{{ route('sells.store') }}" method="POST" class="needs-validation" novalidate>
          @csrf

          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Select Item</label>
              <select name="item_id" id="itemSelect" class="form-select" required>
                <option value="">Choose an item...</option>
                @foreach($items as $item)
                  <option value="{{ $item->id }}"
                          data-price="{{ $item->price }}"
                          data-stock="{{ $item->stock_quantity }}">
                    {{ $item->name }} - ${{ $item->price }} (Stock: {{ $item->stock_quantity }})
                  </option>
                @endforeach
              </select>
              <div class="invalid-feedback">Please select an item.</div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Quantity</label>
              <input type="number" name="quantity" id="quantity" class="form-control" min="1" placeholder="Enter quantity" required>
              <div id="stockInfo" class="form-text text-muted mt-2">
                <i class="bi bi-info-circle me-1"></i>
                <span>Select an item to see available stock</span>
              </div>
              <div class="invalid-feedback">Quantity is required.</div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Sale Date</label>
              <input type="date" name="sell_date" class="form-control" value="{{ date('Y-m-d') }}" required>
              <div class="invalid-feedback">Sale date is required.</div>
            </div>

            <div class="col-12">
              <label class="form-label">Total Price</label>
              <div class="price-box d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="text-muted">
                  <i class="bi bi-cash-coin me-1"></i> Total Amount
                </div>
                <div class="price-big">
                  $<span id="totalPrice">0.00</span>
                </div>
              </div>
            </div>

            <div class="col-12 d-flex flex-column flex-sm-row gap-2 mt-2">
              <button type="submit" class="btn btn-save">
                <i class="bi bi-check2-circle me-1"></i> Record Sale
              </button>
              <a href="{{ route('sells.index') }}" class="btn btn-outline-dark btn-soft">
                Cancel
              </a>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Bootstrap validation
    (function () {
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();

    // Sale calculation logic (same behavior as your original)
    const itemSelect = document.getElementById('itemSelect');
    const quantityInput = document.getElementById('quantity');
    const totalPriceSpan = document.getElementById('totalPrice');
    const stockInfo = document.getElementById('stockInfo');

    function calculateTotal() {
      const selectedOption = itemSelect.options[itemSelect.selectedIndex];
      const price = parseFloat(selectedOption?.dataset?.price) || 0;
      const stock = parseInt(selectedOption?.dataset?.stock) || 0;
      const quantity = parseInt(quantityInput.value) || 0;

      if (itemSelect.value && quantity > 0) {
        if (quantity > stock) {
          stockInfo.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-1"></i><span>Warning: Only <b>' + stock + '</b> items available in stock!</span>';
          stockInfo.className = 'form-text text-danger mt-2';
        } else {
          stockInfo.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i><span>Available stock: <b>' + stock + '</b> items</span>';
          stockInfo.className = 'form-text text-muted mt-2';
        }
        totalPriceSpan.textContent = (price * quantity).toFixed(2);
      } else {
        totalPriceSpan.textContent = '0.00';
        if (itemSelect.value) {
          stockInfo.innerHTML = '<i class="bi bi-info-circle me-1"></i><span>Available stock: <b>' + stock + '</b> items</span>';
          stockInfo.className = 'form-text text-muted mt-2';
        } else {
          stockInfo.innerHTML = '<i class="bi bi-info-circle me-1"></i><span>Select an item to see available stock</span>';
          stockInfo.className = 'form-text text-muted mt-2';
        }
      }
    }

    itemSelect.addEventListener('change', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);
  </script>
</body>
</html>
