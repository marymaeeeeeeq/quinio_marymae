<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student</title>
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
      background-color: #54e76aff;
      border-color: #0f0407ff;
    }
    .btn-primary:hover {
      background-color: #50c441ff;
      border-color: #0f0508ff;
    }
    .btn-secondary {
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Update Student</h1>
    <form action="<?=site_url('students/update/' . $student['id']);?>" method="post">
      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="<?=html_escape($student['last_name']);?>" required>
      </div>
      
      <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="<?=html_escape($student['first_name']);?>" required>
      </div>
      
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?=html_escape($student['email']);?>" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?=site_url('students');?>" class="btn btn-secondary">Back</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
