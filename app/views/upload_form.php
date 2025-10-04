<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Upload Form </title>
</head>
<body>
    <?php if(!empty($errors)) : ?>
        <?php foreach($errors as $error) : ?>
            <p style="color:red"><?= $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="<?= site_url('students/do_upload'); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile" size="20" >
        <br><br>
        <input type="submit" value="Upload" >
    </form>
</body>
</html>