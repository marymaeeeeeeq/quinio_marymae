<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    }
    .dashboard-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    h1 {
      color: #e75480;
      font-weight: bold;
      margin-bottom: 15px;
    }
    p {
      font-size: 18px;
      color: #555;
      margin-bottom: 25px;
    }
    .btn-custom {
      background-color: #e75480;
      border-color: #e75480;
      border-radius: 10px;
      padding: 10px 20px;
      color: white;
      text-decoration: none;
      font-weight: 500;
      margin: 5px;
      display: inline-block;
    }
    .btn-custom:hover {
      background-color: #c44169;
      border-color: #c44169;
      color: white;
    }
  </style>
</head>
<body>
  <div class="dashboard-box">
    <?php $session = load_class('session'); ?>
    <h1>Welcome, <?= $session->userdata('username') ?>!</h1>
    <p><strong>Role:</strong> <?= $session->userdata('role') ?></p>

    <a href="<?= site_url('students') ?>" class="btn-custom">Go to Student Management</a>
    <a href="<?= site_url('auth/logout') ?>" class="btn-custom">Logout</a>
  </div>
</body>
</html>
