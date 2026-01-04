<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Fashion Store</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons (optional but nice) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand-1:#6d28d9; /* purple */
      --brand-2:#ec4899; /* pink */
      --glass: rgba(255,255,255,.72);
      --border: rgba(255,255,255,.38);
    }

    body{
      min-height: 100vh;
      background:
        radial-gradient(900px 500px at 10% 10%, rgba(236,72,153,.22), transparent 60%),
        radial-gradient(900px 500px at 90% 20%, rgba(109,40,217,.22), transparent 60%),
        linear-gradient(180deg, #0b1020 0%, #0e1630 40%, #0b1020 100%);
      display: grid;
      place-items: center;
      padding: 24px;
    }

    .auth-card{
      background: var(--glass);
      border: 1px solid var(--border);
      border-radius: 18px;
      box-shadow: 0 18px 60px rgba(0,0,0,.28);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      overflow: hidden;
    }

    .brand-header{
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
      padding: 18px 20px;
      color: #fff;
    }

    .brand-badge{
      width: 42px;
      height: 42px;
      border-radius: 12px;
      display: grid;
      place-items: center;
      background: rgba(255,255,255,.18);
      border: 1px solid rgba(255,255,255,.25);
    }

    .brand-title{
      font-weight: 700;
      letter-spacing: .2px;
      margin: 0;
    }

    .brand-subtitle{
      margin: 0;
      opacity: .9;
      font-size: .9rem;
    }

    .form-control{
      border-radius: 12px;
      padding: 12px 14px;
      border: 1px solid rgba(0,0,0,.08);
    }

    .form-control:focus{
      border-color: rgba(109,40,217,.45);
      box-shadow: 0 0 0 .25rem rgba(109,40,217,.15);
    }

    .input-group-text{
      border-radius: 12px 0 0 12px;
      border: 1px solid rgba(0,0,0,.08);
      background: rgba(255,255,255,.7);
    }

    .btn-brand{
      border: 0;
      border-radius: 12px;
      padding: 12px 14px;
      font-weight: 600;
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
      box-shadow: 0 10px 24px rgba(236,72,153,.22);
    }
    .btn-brand:hover{
      filter: brightness(1.05);
      transform: translateY(-1px);
    }

    .helper-links a{
      text-decoration: none;
    }
    .helper-links a:hover{
      text-decoration: underline;
    }

    .small-muted{
      color: rgba(255,255,255,.75);
      text-align: center;
      margin-top: 14px;
      font-size: .9rem;
    }
  </style>
</head>

<body>
  <div class="container" style="max-width: 980px;">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6">

        <div class="auth-card">
          <div class="brand-header">
            <div class="d-flex align-items-center gap-3">
              <div class="brand-badge">
                <i class="bi bi-bag-heart-fill fs-5"></i>
              </div>
              <div>
                <h4 class="brand-title">Fashion Store</h4>
                <p class="brand-subtitle">Welcome back — login to continue</p>
              </div>
            </div>
          </div>

          <div class="p-4 p-sm-5">
            @if($errors->any())
              <div class="alert alert-danger d-flex align-items-start gap-2" role="alert" style="border-radius: 12px;">
                <i class="bi bi-exclamation-triangle-fill mt-1"></i>
                <div>{{ $errors->first() }}</div>
              </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="needs-validation" novalidate>
              @csrf

              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                  >
                  <div class="invalid-feedback">Please enter a valid email.</div>
                </div>
              </div>

              <div class="mb-2">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                  <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                  >
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius: 0 12px 12px 0;">
                    <i class="bi bi-eye"></i>
                  </button>
                  <div class="invalid-feedback">Password is required.</div>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3 mb-4 helper-links">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <!-- If you have a route for forgot password, replace href -->
                <a href="#" class="text-decoration-none">Forgot password?</a>
              </div>

              <button type="submit" class="btn btn-brand text-white w-100">
                Login <i class="bi bi-arrow-right ms-1"></i>
              </button>
            </form>
          </div>
        </div>

        <div class="small-muted">
          © {{ date('Y') }} Fashion Store. All rights reserved.
        </div>

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

    // Show/hide password
    const btn = document.getElementById('togglePassword');
    const input = document.getElementById('password');
    if (btn && input) {
      btn.addEventListener('click', () => {
        const isPwd = input.getAttribute('type') === 'password';
        input.setAttribute('type', isPwd ? 'text' : 'password');
        btn.innerHTML = isPwd ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
      });
    }
  </script>
</body>
</html>
