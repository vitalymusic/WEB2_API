<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      background-color: white;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h3 class="text-center mb-4">Pieteikšanās</h3>
    <form>
      <div class="mb-3">
        <label for="email" class="form-label">E-pasts</label>
        <input type="email" class="form-control" id="email" placeholder="ievadi e-pastu">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Parole</label>
        <input type="password" class="form-control" id="password" placeholder="ievadi paroli">
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Ieiet</button>
      </div>
      <div class="text-center mt-3">
        <a href="#">Aizmirsi paroli?</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
