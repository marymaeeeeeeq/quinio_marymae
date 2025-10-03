<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Upload Success </title>
</head>
<body>
    <h3> Your file was successfully uploaded! </h3>
    <p>Filename: <?= $filename; ?></p>
    <img src="<?= base_url('uploads/' . $filename); ?>" width="200">
</body>
</html>