<?php 
session_start(); 
if(!isset($_SESSION['cleint_login'])){
  header("Location:login.php");
}
?>
<?php include_once("../inc/db_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <?php include_once("inc/top_nav.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <?php include_once("inc/left_bar3.php"); ?>

  <!-- Main Sidebar Container --> 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Booking id</th>
                    <th>Car id</th>
                    <th>client id</th>
                    <th>client nid</th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Total Amount</th>                   
                    <th>Booking status</th>
                    <th>Creat At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $client_id = $_SESSION['user_id'];
                    
                    $sql = "SELECT * FROM bookings WHERE client_id= '$client_id' " ;
                     $rawData = $db->query($sql);
                  while($row = $rawData->fetch_object()): 
                    ?>
                  <tr>
                    <td><?php echo $row->booking_id; ?></td>
                    <td><?php echo $row->car_id; ?></td>
                    <td><?php echo $row->client_id; ?></td>
                    <td><?php echo $row->nid; ?></td>
                    <td><?php echo $row->start_date; ?> -to-<?php echo $row->end_date; ?></td>
                    
                    <td><?php echo $row->pick_address; ?></td>
                    <td><?php echo $row->drop_address; ?></td>
                    <td><?php echo $row->total_amount; ?></td>
                    <td><?php echo $row->booking_status; ?></td>
                    <td><?php echo $row->created_at; ?></td>
                    <td style="text-align: center;"><a href="../payment_form.php?b_id=<?php echo $row->booking_id; ?>&car_id=<?php echo $row->car_id ?>&c_id=<?php echo $row->client_id ?>&amount=<?php echo $row->total_amount ?>">
                        
                        <button type="button" class="btn btn-default">payment</button>
                        
                    </a></td>
                   
                  </tr>
                   <?php 
                  endwhile;
                  $db->close();
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- footer -->
 <?php include_once("inc/footer.php"); ?>
<!-- /footer -->

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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
