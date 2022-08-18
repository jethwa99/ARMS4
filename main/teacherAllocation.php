<?php
error_reporting(0);
include 'dbcon.php';
include 'session.php';



//------------------------Allocation of Teacher--------------------------------------------------

if (isset($_POST["allocateTeacher"])) {

    $course = strtoupper(mysqli_real_escape_string($conn, $_POST["inputCourse4"]));
    $sem = strtoupper(mysqli_real_escape_string($conn, $_POST["inputSem4"]));
    $teacher = strtoupper(mysqli_real_escape_string($conn, $_POST["inputTeacher4"]));

    $que = "SELECT * FROM teacher_allocation WHERE UserName = '$teacher' AND Course = '$course' AND Sem = '$sem'";
    $result = mysqli_query($conn, $que);


    if (mysqli_num_rows($result) > 0) {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Allocation Already Exists!</div>";
    } else {
        $query = "INSERT INTO `teacher_allocation`(`UserName`,`Course`,`Sem`) VALUES ('$teacher','$course','$sem')";
        if (mysqli_query($conn, $query)) {
            $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Successfully Allocated!</div>";
        } else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}
//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id'])) {

    $Id = $_GET['Id'];
    echo "<script>alert('are you sure')</script>";

    $query = mysqli_query($conn, "DELETE FROM teacher_allocation WHERE aID='$Id'");

    if ($query == TRUE) {

        echo "<script type = \"text/javascript\">
          window.location = (\"teacherAllocation.php\")
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
    <?php include 'includes/title.php'; ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Class Teacher Allocation</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item">Teacher</li>
                            <li class="breadcrumb-item active" aria-current="page">Class Teacher Allocation</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Form Basic -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Allocate Teacher</h6>
                                    <?php echo $statusMsg; ?>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group row mb-3">
                                            <!------------------------- Teacher Name ----------------------->
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Teacher<span class="text-danger ml-2">*</span></label>
                                                <?php
                                                $qry = "SELECT * FROM users WHERE Type = '2'";
                                                $result = $conn->query($qry);
                                                $num = $result->num_rows;
                                                if ($num > 0) {
                                                    echo ' <select required name="inputTeacher4" class="form-control mb-3">';
                                                    echo '<option value="">--Select Teacher--</option>';
                                                    while ($rows = $result->fetch_assoc()) {
                                                        echo '<option value="' . $rows['ID'] . '" >' . $rows['Name'] . '</option>';
                                                    }
                                                    echo '</select>';
                                                }
                                                ?>
                                            </div>
                                            <!------------------------- Course ----------------------->
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Course Name<span class="text-danger ml-2">*</span></label>
                                                <?php
                                                $qry = "SELECT * FROM course";
                                                $result = $conn->query($qry);
                                                $num = $result->num_rows;
                                                if ($num > 0) {
                                                    echo ' <select required name="inputCourse4" class="form-control mb-3">';
                                                    echo '<option value="">--Select Course--</option>';
                                                    while ($rows = $result->fetch_assoc()) {
                                                        echo '<option value="' . $rows['CourseID'] . '" >' . $rows['CourseName'] . '</option>';
                                                    }
                                                    echo '</select>';
                                                }
                                                ?>
                                            </div>
                                            <!------------------------- Semester ----------------------->
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Semester<span class="text-danger ml-2">*</span></label>
                                                <?php
                                                $qry = "SELECT * FROM semester";
                                                $result = $conn->query($qry);
                                                $num = $result->num_rows;
                                                if ($num > 0) {
                                                    echo ' <select required name="inputSem4" class="form-control mb-3">';
                                                    echo '<option value="">--Select Semester--</option>';
                                                    while ($rows = $result->fetch_assoc()) {
                                                        echo '<option value="' . $rows['SemID'] . '" >' . $rows['SemName'] . '</option>';
                                                    }
                                                    echo '</select>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <button type="submit" name="allocateTeacher" class="btn btn-primary">Allocate</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Input Group -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
                                        </div>
                                        <div class="table-responsive p-3">
                                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Teacher Name</th>
                                                        <th scope="col">Course</th>
                                                        <th scope="col">Semester</th>
                                                        <th scope="col">Created On</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    $query = "SELECT teacher_allocation.aID,teacher_allocation.CreationDate, users.Name, semester.SemName,course.CourseName FROM teacher_allocation 
                                                    INNER JOIN users ON teacher_allocation.UserName = users.ID 
                                                    INNER JOIN semester ON teacher_allocation.sem = semester.SemID 
                                                    INNER JOIN course ON teacher_allocation.Course = course.CourseID";
                                                    $rs = $conn->query($query);
                                                    $num = $rs->num_rows;
                                                    $sn = 0;
                                                    if ($num > 0) {
                                                        while ($rows = $rs->fetch_assoc()) {
                                                            $sn = $sn + 1;
                                                            echo "
                              <tr>
                              <td>" . $sn . "</td>
                              <td>" . $rows['Name'] . "</td>
                              <td>" . $rows['CourseName'] . "</td>
                              <td>" . $rows['SemName'] . "</td>
                              <td>" . $rows['CreationDate'] . "</td>
                                <td><a href = '?Id=" . $rows['aID'] . "'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
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