<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Image</title>
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
    .upload-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }
    h2 {
      color: #e75480;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .btn-primary {
      background-color: #950ba1ff;
      border-color: #0f0609ff;
    }
    .btn-primary:hover {
      background-color: #950ba1ff;
      border-color: #0f0609ff;
    }
  </style>
</head>
<body>

  <div class="upload-box">
    <h2>Upload Image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" required>
      </div>
      <input type="submit" value="Upload Image" name="submit" class="btn btn-primary w-100">
    </form>
  </div>

</body>
</html>
