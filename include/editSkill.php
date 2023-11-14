<?php
require('../include/db.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
    echo "<script>window.location.href = 'login-v2.php';</script>";
}

if (isset($_GET['id'])) {
    $skillId = $_GET['id'];
    $query = "SELECT * FROM skills WHERE id = $skillId";
    $result = mysqli_query($db, $query);
    $skill = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Skill ID is missing.'); window.location.href ='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Edit Skill</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Your existing HTML code for the sidebar, navbar, etc. -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Skill</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Skill</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="../include/updateSkill.php" method="POST">
                                <input type="hidden" name="skill_id" value="<?= $skill['id'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="skill_name">Skill Name</label>
                                        <input type="text" class="form-control" id="skill_name" name="skill_name" value="<?= $skill['skill_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="skill_level">Skill Level</label>
                                        <input type="range" class="form-control" id="skill_level" name="skill_level" min="0" max="100" value="<?= $skill['skill_level'] ?>">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Skill</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Your existing HTML code for the footer and control sidebar -->

</div>
<!-- ./wrapper -->

<!-- Your existing JavaScript scripts -->
</body>
</html>
