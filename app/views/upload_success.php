<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Success</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .success-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    h3 {
      color: #e75480;
      font-weight: bold;
      margin-bottom: 20px;
    }
    p {
      color: #333;
      font-size: 16px;
    }
    img {
      margin-top: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    a {
      display: inline-block;
      margin-top: 25px;
      text-decoration: none;
      color: white;
      background-color: #e75480;
      padding: 10px 20px;
      border-radius: 10px;
      transition: background-color 0.3s;
    }
    a:hover {
      background-color: #c44169;
    }
  </style>
</head>
<body>
  <div class="success-box">
    <h3>Your file was successfully uploaded!</h3>
    <p><strong>Filename:</strong> <?= $filename; ?></p>
    <img src="<?= base_url() . 'uploads/' . $filename; ?>" width="200" alt="Uploaded File">
    <br>
    <a href="<?= site_url('students'); ?>">Back to Student Management</a>
  </div>
</body>
</html>
