<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      font-family: Arial, sans-serif;
    }
    .container {
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 15px;
      margin-top: 40px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    h1 {
      color: #df547eff;
      font-weight: bold;
    }
    .btn-success {
      background-color: #950ba1ff;
      border-color: #0f0307ff;
    }
    .btn-success:hover {
      background-color: #950ba1ff;
      border-color: #0b0307ff;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <form action="<?=site_url('students'); ?>" method="get" class="col-sm-4 float-end d-flex mb-3">
        <?php
          $q = '';
          if(isset($_GET['q'])) {
                  $q = $_GET['q'];
          }
        ?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?= html_escape($q); ?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
    </form>
    
    <center><h1 class="mb-4">Student Management</h1></center>
    <a href="<?=site_url('students/create');?>" class="btn btn-success btn-lg mt-3">Add Student</a><br><br>

    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if (!empty($students)): ?>
          <?php foreach(html_escape($students) as $student): ?>
              <tr>
                  <td><?=$student['id'];?></td>
                  <td><?=$student['last_name'];?></td>
                  <td><?=$student['first_name'];?></td>
                  <td><?=$student['email'];?></td>
                  <td>
                      <a href="<?=site_url('students/update/' .$student['id']);?>" class="btn btn-warning btn-sm">Update</a> 
                      <a href="<?=site_url('students/delete/' .$student['id']);?>" class="btn btn-danger btn-sm">Delete</a>
                      <a href="" class="btn btn-primary btn-sm">Upload Image</a>
                  </td>
              </tr>
          <?php endforeach; ?>
      <?php else: ?>
        <tr>
            <td colspan="5">No student found.</td>
        </tr>
      <?php endif; ?>
      </tbody>
    </table>
    <?php
    echo $page;?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>