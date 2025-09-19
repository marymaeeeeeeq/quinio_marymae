<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    }
    .container {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      margin-top: 60px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      max-width: 600px;
      width: 100%;
    }
    h1 {
      text-align: center;
      color: #e75480;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .btn-primary {
      background-color: rgba(84, 231, 104, 1);
      border-color: #0f0609ff;
    }
    .btn-primary:hover {
      background-color: rgba(65, 196, 67, 1);
      border-color: #14060aff;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Create Student</h1>
    <form action="<?=site_url('students/create');?>" method="post">
      <div class="mb-4">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" required>
      </div>
      
      <div class="mb-4">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" required>
      </div>
      
      <div class="mb-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      
      <button type="submit" class="btn btn-primary w-100">Create</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
