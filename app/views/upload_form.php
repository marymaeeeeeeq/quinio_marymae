<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Form</title>
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
      font-family: Arial, Helvetica, sans-serif;
    }
    .upload-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    h2 {
      color: #e75480;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
    }
    input[type="file"] {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 8px;
      width: 100%;
    }
    input[type="submit"] {
      background-color: #e75480;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 25px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
      background-color: #c44169;
    }
  </style>
</head>
<body>
  <div class="upload-box">
    <h2>Upload File</h2>

    <?php if(!empty($errors)) : ?>
      <?php foreach($errors as $error) : ?>
        <p class="error"><?= $error ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

    <form action="<?= site_url('students/do_upload'); ?>" method="post" enctype="multipart/form-data">
      <input type="file" name="userfile" size="20">
      <br>
      <input type="submit" value="Upload">
    </form>
  </div>
</body>
</html>
