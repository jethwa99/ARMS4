<?php
error_reporting(0);
include 'dbcon.php';
include 'session.php';



//------------------------SAVE--------------------------------------------------

if (isset($_POST['save'])) {

  $code = strtoupper(mysqli_real_escape_string($conn, $_POST["inputCode4"]));
  $subject = strtoupper(mysqli_real_escape_string($conn, $_POST["inputSubjectName4"]));
  $course = strtoupper(mysqli_real_escape_string($conn, $_POST["inputCourseName4"]));
  $sem = strtoupper(mysqli_real_escape_string($conn, $_POST["inputSem4"]));

  $query = mysqli_query($conn, "SELECT * FROM subject WHERE Code = '$code'");
  $ret = mysqli_fetch_array($query);

  if ($ret > 0) {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Course Already Exists!</div>";
  } else {

    $query = mysqli_query($conn, "INSERT INTO `subject`(`Code`,`SubjectName`,`Course`,`Semester`) VALUES ('$code','$subject','$course','$sem')");

    if ($query) {

      $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Created Successfully!</div>";
    } else {
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
  }
}
//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id'])) {

  $Id = $_GET['Id'];
  echo "<script>alert('are you sure')</script>";

  $query = mysqli_query($conn, "DELETE FROM subject WHERE SubjectID='$Id'");

  if ($query == TRUE) {

    echo "<script type = \"text/javascript\">
          window.location = (\"subject.php\")
          </script>";
  } else {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <?php include 'title.php'; ?>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "sidebar.php"; ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "topbar.php"; ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Result</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Result</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                  <?php echo $statusMsg; ?>
                </div>
             
            <!--Row-->

            <!-- Documentation Link -->
            <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div> -->

          </div>
          <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <?php include "footer.php"; ?>
        <!-- Footer -->
      </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
      $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
      });
    </script>
</body>

</html>