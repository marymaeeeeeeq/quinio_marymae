<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family:  Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    }
    .login-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      text-align: center;
      width: 100%;
      max-width: 400px;
    }
    h1 {
      color: #e75480;
      font-weight: bold;
      margin-bottom: 25px;
    }
    .form-control {
      margin-bottom: 20px;
      border-radius: 10px;
      padding: 10px;
    }
    .btn-primary {
      background-color: #e24d7aff;
      border-color: #e75480;
      border-radius: 10px;
      width: 100%;
      padding: 10px;
    }
    .btn-primary:hover {
      background-color: #e24d7aff;
      border-color: #c44169;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h1>Login</h1>
    <form action="" method="post">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <input type="password" name="password" class="form-control" placeholder="Password" required><br>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="<?=site_url('auth/register');?>" class="login-link">Don't have an account? Register here</a>
  </div>
</body>
</html>
