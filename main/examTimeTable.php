<?php
error_reporting(0);
include 'dbcon.php';
include 'session.php';



//------------------------SAVE--------------------------------------------------

if (isset($_POST['add'])) {

  $subjectName = mysqli_real_escape_string($conn, $_POST["inputSubject4"]);
  $marks = mysqli_real_escape_string($conn, $_POST["marks"]);
  $date = $_POST['date'];
  $examID = $_GET['Eid'];

  $query = mysqli_query($conn, "select * from exam_tt where ExamName ='$examID' AND SubName ='$subjectName'");
  $ret = mysqli_fetch_array($query);

  if ($ret > 0) {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>You Already Add This!</div>";
  } else {

    $query = mysqli_query($conn, "INSERT INTO `exam_tt`(`ExamName`,`SubName`,`Marks`,`Date`) VALUES ('$examID','$subjectName','$marks','$date')");

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

  $query = mysqli_query($conn, "DELETE FROM exam_tt WHERE ETTID='$Id'");

  if ($query == TRUE) {

    echo "<script type = \"text/javascript\">
          window.location = (\"examTimeTable.php\")
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
            <h1 class="h3 mb-0 text-gray-800">Exam Time Table</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="exam.php">Exam</a></li>
              <li class="breadcrumb-item active" aria-current="page">Exam Time Table</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Exam Time Rable</h6>
                  <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Subject<span class="text-danger ml-2">*</span></label>
                        <?php
                          $course = $_GET['cid'];
                          $sem = $_GET['sId'];
                          $qry = "SELECT * FROM subject WHERE Course = '$course' AND Semester = '$sem'";
                          $result = $conn->query($qry);
                          $num = $result->num_rows;
                            echo ' <select required name="inputSubject4" class="form-control mb-3">';
                            echo '<option value="">--Select Subject--</option>';
                            while ($rows = $result->fetch_assoc()) {
                              echo '<option value="' . $rows['SubjectID'] . '" >' . $rows['SubjectName'] . '</option>';
                            }
                            echo '</select>';
                          ?>
                          
                      </div>
                      <div class="col-xl-6">
                        <label class="form-control-label">Marks<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="marks" id="exampleInputFirstName">
                      </div>
                      <div class="col-xl-6">
                        <label class="form-control-label">Date<span class="text-danger ml-2">*</span></label>
                        <input type="date" class="form-control" name="date">
                      </div>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Exam Time Table <?php
                        $exam = $_GET['Eid'];
                        $que = mysqli_query($conn, "SELECT * FROM exam 
                        INNER JOIN course ON exam.Course = course.CourseID
                        INNER JOIN semester ON exam.Semester = semester.SemID WHERE ExamID = $exam");
                        $ret = mysqli_fetch_array($que);
                        echo "For ".$ret['ExamName'] ." ". $ret['CourseName'] ." ". $ret['SemName'];
                      ?></h6>
                     
                    </div>
                    <div class="table-responsive p-3">
                      <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Total Marks</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>

                        <tbody>
  
                          <?php
                          $examId = $_GET['Eid'];
                          $query = "SELECT * FROM exam_tt 
                          INNER JOIN subject ON exam_tt.SubName = subject.SubjectID 
                          WHERE exam_tt.ExamName = $examId ";
                          $rs = $conn->query($query);
                          $num = $rs->num_rows;
                          $sn = 0;
                          if ($num > 0) {
                            while ($rows = $rs->fetch_assoc()) {
                              $sn = $sn + 1;
                              echo "
                              <tr>
                                <td>" . $sn . "</td>
                                <td>" . $rows['Code'] . "</td>
                                <td>" . $rows['SubjectName'] . "</td>
                                <td>" . $rows['Marks'] . "</td>
                                <td>" . $rows['Date'] . "</td>
                                <td><a href='?Id=" . $rows['ETTID'] . "'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
                              </tr>";
                            }
                          } else {
                            echo
                            "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                          }
                          

                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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