<?php
session_start(); 
if(!isset($_SESSION['admin_login'])){
  header("Location:login.php");
}
 include_once("../inc/db_config.php"); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Editors</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
<?php include_once("inc/top_nav.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include_once("inc/left_bar1.php"); ?>
  <!-- /Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Car Add Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <?php 
                if(isset($_POST['submit'])){
                  extract($_POST);
                  $p_name = $_FILES['photo']['name'];
                  $tmp_name = $_FILES['photo']['tmp_name'];
                  $path =  "img/".$p_name ;
                  move_uploaded_file($tmp_name, $path);
                  $sql = "INSERT INTO cars VALUES(NULL, '$name', '$type', '$model_year', '$reg_no', '$price', '$status', '$path')";
                  $db->query($sql);
                  if($db->affected_rows){
                    echo '<div class="alert alert-success">Successfully Submitted</div>';
                  }
                }
                
                ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">Car Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your car name">
              </div>
                
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">type</label>
                <input type="text" name="type" class="form-control" placeholder="Enter your car price">
              </div>
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">model_year</label>
                <input type="text" name="model_year" class="form-control" placeholder="Enter your car price">
              </div>
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">Reg_no</label>
                <input type="text" name="reg_no" class="form-control" placeholder="Enter your car price">
              </div>
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter your car price">
              </div>
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">status</label>
                <input type="text" name="status" class="form-control" placeholder="Enter your car price">
              </div>
                <div class="formgroup">
                <label for="input-id" class="col-sm-2">Photo</label>
                <input type="file" name="photo" class="form-control" placeholder="Enter your car's photo">
              </div>
                
              <span class="label">Details</span>
              <textarea id="summernote" name="details" rows="30">  </textarea>
              <br><br>
              <input type="submit" name="submit" value="SUBMIT">
              </form>
            </div>
           
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2025-2026 <a >Mahfuzur</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote({

    })

  })
</script>
</body>
</html>
