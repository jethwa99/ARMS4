<?php
error_reporting(0);
include 'dbcon.php';
include 'session.php';

//------------------------SAVE--------------------------------------------------

if (isset($_POST['save'])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $emailAddress = $_POST['emailAddress'];

  $phoneNo = $_POST['phoneNo'];
  $classId = $_POST['classId'];
  $classArmId = $_POST['classArmId'];
  $dateCreated = date("Y-m-d");

  $query = mysqli_query($conn, "select * from tblclassteacher where emailAddress ='$emailAddress'");
  $ret = mysqli_fetch_array($query);

  $sampPass = "pass123";
  $sampPass_2 = md5($sampPass);

  if ($ret > 0) {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Email Address Already Exists!</div>";
  } else {

    $query = mysqli_query($conn, "INSERT into tblclassteacher(firstName,lastName,emailAddress,password,phoneNo,classId,classArmId,dateCreated) 
    value('$firstName','$lastName','$emailAddress','$sampPass_2','$phoneNo','$classId','$classArmId','$dateCreated')");

    if ($query) {

      $qu = mysqli_query($conn, "update tblclassarms set isAssigned='1' where Id ='$classArmId'");
      if ($qu) {

        $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Created Successfully!</div>";
      } else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
      }
    } else {
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
  }
}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete")
	{
        $Id= $_GET['Id'];

        $query = mysqli_query($conn,"DELETE FROM users WHERE ID='$Id'");

        if ($query == TRUE) {

            echo "<script type = \"text/javascript\">
            window.location = (\"student.php\")
            </script>";
        }
        else{

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



  <script>
    function classArmDropdown(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxClassArms.php?cid=" + str, true);
        xmlhttp.send();
      }
    }
  </script>
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
            <h1 class="h3 mb-0 text-gray-800">Student</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Student</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <a href="register.php?type=3"><input type="button" class="btn btn-primary" value = "Add Student"></a>

              <!-- Input Group -->
             <div class="row">
                <div class="col-lg-12">
                  <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">All Students</h6>
                    </div>
                    <div class="table-responsive p-3">
                      <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Course</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          //$query = "SELECT * FROM users WHERE users.Type = '3'";
                          $query = "SELECT * FROM users
                          INNER JOIN course ON users.Course = course.CourseID
                          INNER JOIN semester ON users.Semester = semester.SemID
                          WHERE users.Type = '3'";
                          $rs = $conn->query($query);
                          $num = $rs->num_rows;
                          $sn = 0;
                          $status = "";
                          if ($num > 0) {
                            while ($rows = $rs->fetch_assoc()) {
                              $sn = $sn + 1;
                              echo "
                              <tr>
                              <td>" . $sn . "</td>
                              <td>" . $rows['stdID'] . "</td>
                              <td>" . $rows['Name'] . "</td>
                              <td>" . $rows['Gender'] . "</td>
                              <td>" . $rows['Email'] . "</td>
                              <td>" . $rows['Contact'] . "</td>
                              <td>" . $rows['CourseName'] . "</td>
                              <td>" . $rows['SemName'] . "</td>
                              <td>" . $rows['CreationDate'] . "</td>
                              <td><a href='edit.php?action=edit&Id=".$rows['ID']."&type=3'><i class='fas fa-fw fa-edit'></i></a></td>
                              <td><a href='?action=delete&Id=".$rows['ID']."'><i class='fas fa-fw fa-trash'></i></a></td>
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