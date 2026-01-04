<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Item - Fashion Store</title>

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

    .btn-brand{
      border: 0;
      border-radius: 12px;
      padding: .65rem 1rem;
      font-weight: 700;
      color:#fff;
      background: linear-gradient(135deg, #16a34a, #22c55e);
      box-shadow: 0 10px 24px rgba(34,197,94,.18);
    }
    .btn-brand:hover{ filter: brightness(1.05); transform: translateY(-1px); }

    .btn-soft{
      border-radius: 12px;
      padding: .65rem 1rem;
      font-weight: 700;
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

    .hint{
      color: rgba(0,0,0,.55);
      font-size: .9rem;
      margin-top: 6px;
    }

    @media (max-width: 991.98px noted){
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
        <h2 class="page-title">Add New Item</h2>
        <div class="page-sub">Create a product with details, stock, and variations</div>
      </div>
      <a href="{{ route('items.index') }}" class="btn btn-outline-light" style="border-radius:12px;">
        <i class="bi bi-arrow-left me-1"></i> Back to Items
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

        <form action="{{ route('items.store') }}" method="POST" class="needs-validation" novalidate>
          @csrf

          <div class="row g-3">
            <div class="col-12 col-md-6">
              <label class="form-label">Item Name</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Classic Denim Jacket" value="{{ old('name') }}" required>
              <div class="invalid-feedback">Item name is required.</div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Category</label>
              <select name="category" class="form-select">
                <option value="">Select Category</option>
                <option value="Shirts" {{ old('category')=='Shirts' ? 'selected' : '' }}>Shirts</option>
                <option value="Pants" {{ old('category')=='Pants' ? 'selected' : '' }}>Pants</option>
                <option value="Shoes" {{ old('category')=='Shoes' ? 'selected' : '' }}>Shoes</option>
                <option value="Accessories" {{ old('category')=='Accessories' ? 'selected' : '' }}>Accessories</option>
                <option value="Dresses" {{ old('category')=='Dresses' ? 'selected' : '' }}>Dresses</option>
              </select>
              <div class="hint">Optional, but recommended for filtering.</div>
            </div>

            <div class="col-12">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="4" placeholder="Short description for the product...">{{ old('description') }}</textarea>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">Price</label>
              <div class="input-group">
                <span class="input-group-text" style="border-radius:12px 0 0 12px;">$</span>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                <div class="invalid-feedback">Price is required.</div>
              </div>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">Stock Quantity</label>
              <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity') }}" required>
              <div class="invalid-feedback">Stock quantity is required.</div>
            </div>

            <div class="col-12 col-md-4">
              <label class="form-label">Size</label>
              <select name="size" class="form-select">
                <option value="">Select Size</option>
                @php $sizes = ['XS','S','M','L','XL','XXL']; @endphp
                @foreach($sizes as $s)
                  <option value="{{ $s }}" {{ old('size')==$s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
              </select>
              <div class="hint">Optional (use if item has sizes).</div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Color</label>
              <input type="text" name="color" class="form-control" placeholder="e.g. Red, Blue, Black" value="{{ old('color') }}">
              <div class="hint">Optional (comma separated is ok).</div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <option value="active" {{ old('status','active')=='active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
              <div class="hint">You can hide inactive items from the store.</div>
            </div>

            <div class="col-12 d-flex flex-column flex-sm-row gap-2 mt-2">
              <button type="submit" class="btn btn-brand">
                <i class="bi bi-check2-circle me-1"></i> Add Item
              </button>
              <a href="{{ route('items.index') }}" class="btn btn-outline-dark btn-soft">
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
  </script>
</body>
</html>
