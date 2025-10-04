<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Dashboard </title>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
    <p>Role: <?= $_SESSION['role'] ?></p>
    <a href="<?= site_url('index') ?>">Go to Student Management</a> | 
    <a href="<?= site_url('auth/logout') ?>"> Logout </a>
</body>
</html>