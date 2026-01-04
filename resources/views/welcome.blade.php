<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fashion Store</title>

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
      --card: rgba(255,255,255,.9);
    }

    body{
      min-height: 100vh;
      background:
        radial-gradient(900px 500px at 10% 10%, rgba(236,72,153,.18), transparent 60%),
        radial-gradient(900px 500px at 90% 10%, rgba(109,40,217,.18), transparent 60%),
        linear-gradient(180deg, var(--bg-1) 0%, var(--bg-2) 45%, var(--bg-1) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-modern{
      background: var(--card);
      border-radius: 20px;
      box-shadow: 0 20px 50px rgba(0,0,0,.25);
      padding: 40px;
      text-align: center;
      max-width: 420px;
      width: 100%;
    }

    .brand{
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 20px;
    }

    .brand-icon{
      width: 48px;
      height: 48px;
      border-radius: 14px;
      display: grid;
      place-items: center;
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
      color: #fff;
      font-size: 22px;
      box-shadow: 0 10px 24px rgba(236,72,153,.25);
    }

    .brand-name{
      font-weight: 800;
      font-size: 22px;
      letter-spacing: .3px;
    }

    .btn-dashboard{
      border-radius: 14px;
      padding: 14px 22px;
      font-weight: 800;
      font-size: 16px;
      color: #fff;
      background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
      border: none;
      box-shadow: 0 12px 28px rgba(109,40,217,.25);
    }

    .btn-dashboard:hover{
      transform: translateY(-2px);
      filter: brightness(1.05);
    }
  </style>
</head>

<body>
  <div class="card-modern">
    <div class="brand">
      <div class="brand-icon">
        <i class="bi bi-bag-heart-fill"></i>
      </div>
      <div class="brand-name">Fashion Store</div>
    </div>

    <p class="text-muted mb-4">
      Welcome to your management panel
    </p>

    <a href="{{ url('/dashboard') }}" class="btn btn-dashboard w-100">
      <i class="bi bi-speedometer2 me-2"></i>
      Go to Dashboard
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
