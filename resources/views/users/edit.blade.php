<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit User - Fashion Store</title>

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
    .hint{ color: rgba(0,0,0,.55); font-size: .9rem; margin-top: 6px; }

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
          <li class="nav-item"><a class="nav-link active" href="{{ route('users.index') }}"><i class="bi bi-people me-1"></i> Users</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('items.index') }}"><i class="bi bi-box-seam me-1"></i> Items</a></li>
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
        <h2 class="page-title">Edit User</h2>
        <div class="page-sub">Update user details and permissions</div>
      </div>
      <a href="{{ route('users.index') }}" class="btn btn-outline-light" style="border-radius:12px;">
        <i class="bi bi-arrow-left me-1"></i> Back to Users
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

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
              <div class="invalid-feedback">Name is required.</div>
            </div>

            <div class="col-12">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
              <div class="invalid-feedback">Valid email is required.</div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Password</label>
              <input id="password" type="password" name="password" class="form-control" placeholder="Leave empty to keep current">
              <div class="hint">
                <i class="bi bi-info-circle me-1"></i> Leave empty to keep current password.
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Role</label>
              <select name="role" class="form-select" required>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
              </select>
              <div class="invalid-feedback">Role is required.</div>
            </div>

            <div class="col-12 d-flex flex-column flex-sm-row gap-2 mt-2">
              <button type="submit" class="btn btn-save">
                <i class="bi bi-save2 me-1"></i> Update User
              </button>
              <a href="{{ route('users.index') }}" class="btn btn-outline-dark btn-soft">
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
