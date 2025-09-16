<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <center><h1 class="mb-4">Student Management</h1></center>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(html_escape($students) as $student): ?>
                    <tr>
                        <td><?=$student['id'];?></td>
                        <td><?=$student['last_name'];?></td>
                        <td><?=$student['first_name'];?></td>
                        <td><?=$student['email'];?></td>
                        <td>
                            <a href="<?=site_url('students/update/' .$student['id']);?>" class="btn btn-warning btn-sm">Update</a> 
                            <a href="<?=site_url('students/delete/' .$student['id']);?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="<?=site_url('students/create');?>" class="btn btn-success btn-lg mt-3">Create New Student</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
