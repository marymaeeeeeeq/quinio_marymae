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
      font-family:  Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    }
    .success-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      text-align: center;
      max-width: 500px;
      width: 100%;
    }
    h3 {
      color: #28a745;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .btn-primary {
      background-color: #950ba1ff;
      border-color: #e75480;
    }
    .btn-primary:hover {
      background-color: #950ba1ff;
      border-color: #c44169;
    }
  </style>
</head>
<body>

  <div class="success-box">
    <h3>Your file was successfully uploaded!</h3>
    <p><strong>File Name:</strong> <?php echo $filename; ?></p>

    <a href="upload_form.php" class="btn btn-primary mt-3">Upload Another File</a>
  </div>

</body>
</html>
