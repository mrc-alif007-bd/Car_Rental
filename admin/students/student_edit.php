<?php 
include_once("../inc/db_config.php");
 session_start(); 
if(!isset($_SESSION['loggedin'])){
  header("Location:index.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include ("../inc/top_nav.php") ?>

  <?php include ("../inc/left_bar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <?php
                 $id = $_GET['stid'];
                 $sql = "SELECT * FROM students WHERE employeeID='$id'";
                 $rawData= $db->query($sql);
                 $raw = $rawData->fetch_object();

                
                ?>
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Student Data</h3>

                

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" placeholder="Enter  First Name" value="<?php  echo $raw->first_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" value="<?php  echo $raw->last_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Birthdate</label>
                    <input type="date" name="dob" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php  echo $raw->birthdate;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Notes</label>
                   <Textarea name="notes" class="form-control" id="exampleInputPassword1" rows="5"><?php  echo $raw->notes;?></Textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="sibmit" class="btn btn-primary">UPDATE</button>
                </div>

                <?php
                if(isset($_POST['sibmit'])){
                    extract($_POST) ;

                    $update = "UPDATE students SET
                        first_name = '$fname',
                        last_name = '$lname',
                        birthdate = '$dob',
                        notes = '$notes'
                        WHERE employeeID = '$id'";

                  $db->query($update);
                  

                  if($db->affected_rows){
                  session_start();
                    $_SESSION['msg']='Student Data Changed Successfully ';
                    header("Location:index.php");
                  }

                }
                 $db->close();   

                ?>

              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- footer -->
  <?php include_once("../inc/footer.php"); ?>

    <!-- /. footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>



<!-- Page specific script -->

<!-- <script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script> -->


</body>
</html>