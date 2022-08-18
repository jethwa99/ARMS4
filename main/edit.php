<?php
error_reporting(0);
include 'dbcon.php';
include 'session.php';

//------------------ Fetch old data from db ---------------------------------

if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $que = mysqli_query($conn, "SELECT * FROM `users` 
    LEFT OUTER JOIN semester ON users.Semester = semester.SemID 
    LEFT OUTER JOIN course ON users.Course = course.CourseID 
    WHERE users.ID = '$id'");
    $row = mysqli_fetch_array($que);
}
//------------------------Update--------------------------------------------------

if (($_GET['Id'] && $_GET['action']) && $_GET['action'] == "edit") {
    $id = $_GET['Id'];

    $que = $conn->query("SELECT * FROM users where ID = $id");
    $rows = $que->fetch_assoc();

    if (isset($_POST['update'])) {
        $name = $_POST["inputName4"];
        $add = $_POST["inputAddress4"];
        $contact = $_POST["inputContact4"];
        $email = $_POST["inputEmail4"];
        $username = $_POST["inputUsername4"];
        $dob = $_POST["inputDate4"];
        $update = date("Y-m-d");
        $gen = $_POST["inputGender4"];
        if (isset($_GET['type']) && $_GET['type'] == '2') {
            $query = mysqli_query($conn, "UPDATE `users` SET `Name`='$name',`Add`='$add',`Gender`='$gen',`DOB`='$dob',`Contact`='$contact',`Email`='$email',`UserName`='$username',`UpdationDate`='$update' WHERE ID = $id");
            if ($query) {
                echo "<script type = \"text/javascript\">
                    window.location = (\"teacher.php\")
                    </script>";
            } else {
                echo "<div class='alert alert-danger' style='margin-right:700px;'><a href = 'admin.php?error='An error Occurred!''></div>";
            }
        }else if((isset($_GET['type']) && $_GET['type'] == '1')){
            $query = mysqli_query($conn, "UPDATE `users` SET `Name`='$name',`Add`='$add',`Gender`='$gen',`DOB`='$dob',`Contact`='$contact',`Email`='$email',`UserName`='$username',`UpdationDate`='$update' WHERE ID = $id");
            if ($query) {
                echo "<script type = \"text/javascript\">
                            window.location = (\"admin.php\")
                            </script>";
            } else {
                echo "<div class='alert alert-danger' style='margin-right:700px;'><a href = 'admin.php?error='An error Occurred!''></div>";
            }
        }else{
            $course = $_POST['inputCourse4'];
            $sem = $_POST['inputSem4'];

            $query = mysqli_query($conn, "UPDATE `users` SET `Name`='$name',`Add`='$add',`Gender`='$gen',`Course`='$course',`Semester`='$sem',`DOB`='$dob',`Contact`='$contact',`Email`='$email',`UserName`='$username',`UpdationDate`='$update' WHERE ID = $id");
            if ($query) {
                echo "<script type = \"text/javascript\">
                    window.location = (\"student.php\")
                    </script>";
            } else {
                echo "<div class='alert alert-danger' style='margin-right:700px;'><a href = 'admin.php?error='An error Occurred!''></div>";
            }
        }
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
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php if (isset($_GET['type']) && $_GET['type'] == '2') {
                                                                    echo "Class Teacher";
                                                                } else if (isset($_GET['type']) && $_GET['type'] == '1') {
                                                                    echo "Admin";
                                                                } else {
                                                                    echo "Student";
                                                                } ?></h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item"><?php if (isset($_GET['type']) && $_GET['type'] == '2') {
                                                            echo "Class Teacher";
                                                        } else if (isset($_GET['type']) && $_GET['type'] == '1') {
                                                            echo "Admin";
                                                        } else {
                                                            echo "Student";
                                                        } ?></li>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php if (isset($_GET['type']) && $_GET['type'] == '2') {
                                                                                            echo "Class Teacher";
                                                                                        } else if (isset($_GET['type']) && $_GET['type'] == '1') {
                                                                                            echo "Admin";
                                                                                        } else {
                                                                                            echo "Student";
                                                                                        } ?></li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Form Basic -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php if (isset($_GET['type']) && $_GET['type'] == '2') {
                                                                                            echo "Class Teacher";
                                                                                        } else if (isset($_GET['type']) && $_GET['type'] == '1') {
                                                                                            echo "Admin";
                                                                                        } else {
                                                                                            echo "Student";
                                                                                        } ?></h6>
                                    <?php echo $statusMsg ?>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <!---------------------------------------- Name -------------------------------------------------->
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                                                <input type="text" class="form-control" required name="inputName4" id="exampleInputFirstName" value="<?php echo $row['Name'] ?>">
                                            </div>
                                            <!---------------------------------------- Address -------------------------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Address<span class="text-danger ml-2">*</span></label>
                                                <textarea class="form-control" required name="inputAddress4" id="exampleInputFirstName"><?php echo $row['Add'] ?></textarea>
                                            </div>
                                        </div>
                                        <!---------------------------------------- Contact -------------------------------------------------->
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Contact<span class="text-danger ml-2">*</span></label>
                                                <input type="text" class="form-control" required name="inputContact4" id="exampleInputFirstName" value="<?php echo $row['Contact'] ?>">
                                            </div>
                                            <!---------------------------------------- DOB -------------------------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-control-label">DOB<span class="text-danger ml-2">*</span></label>
                                                <input type="date" class="form-control" name="inputDate4" id="exampleInputFirstName" value="<?php echo $row['DOB'] ?>">
                                            </div>
                                        </div>
                                        <!---------------------------------------- Gender -------------------------------------------------->
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Gender<span class="text-danger ml-2">*</span></label>
                                                <select required name="inputGender4" class="form-control mb-3">
                                                    <?php 
                                                    if($row['Gender'] == 'male'){
                                                        echo "<option value='Male' selected>Male</option>
                                                    <option value='Female'>Female</option>";
                                                    }else{
                                                        echo "<option value='Male'>Male</option>
                                                    <option value='Female' selected >Female</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!---------------------------------------- Email -------------------------------------------------->
                                            <div class="col-xl-6">
                                                <label class="form-control-label">Email<span class="text-danger ml-2">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text">@</div>
                                                    <input type="email" class="form-control" required name="inputEmail4" id="exampleInputFirstName" value="<?php echo $row['Email'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------- UserName -------------------------------------------------->
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6">
                                                <label class="form-control-label">User Name<span class="text-danger ml-2">*</span></label>
                                                <input type="text" class="form-control" required name="inputUsername4" id="exampleInputFirstName" value="<?php echo $row['UserName'] ?>">
                                            </div>
                                              <!---------------------------------------- Course -------------------------------------------------->
                                            <?php if (isset($_GET['type']) && $_GET['type'] == '3') { ?>
                                                <div class="col-xl-6">
                                                    <label class="form-control-label">Course<span class="text-danger ml-2">*</span></label>
                                                    <?php
                                                    
                                                    $qry = "SELECT * FROM course";
                                                    $result = $conn->query($qry);
                                                    $num = $result->num_rows;
                                                    if ($num > 0) {
                                                        echo ' <select required name="inputCourse4" class="form-control mb-3">';
                                                        echo '<option value="'.$row['CourseID'].'">'.$row['CourseName'].'</option>';
                                                        while ($rows = $result->fetch_assoc()) {
                                                            echo '<option value="' . $rows['CourseID'] . '" >' . $rows['CourseName'] . '</option>';
                                                        }
                                                        echo '</select>';
                                                    }
                                                    ?>
                                                </div>
                                                <!---------------------------------------- Semester -------------------------------------------------->
                                                <div class="col-xl-6">
                                                    <label class="form-control-label">Semester<span class="text-danger ml-2">*</span></label>
                                                    <?php
                                                    $qry = "SELECT * FROM semester";
                                                    $result = $conn->query($qry);
                                                    $num = $result->num_rows;
                                                    if ($num > 0) {
                                                        echo ' <select required name="inputSem4" class="form-control mb-3">';
                                                        echo '<option value="'.$row['SemID'].'">'.$row['SemName'].'</option>';
                                                        while ($rows = $result->fetch_assoc()) {
                                                            echo '<option value="' . $rows['SemID'] . '" >' . $rows['SemName'] . '</option>';
                                                        }
                                                        echo '</select>';
                                                    }
                                                    ?>
                                                </div>

                                            <?php } ?>
                                        </div>
                                      
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
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