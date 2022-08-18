
<ul class="navbar-nav sidebar sidebar-light accordion " id="accordionSidebar">
   <a class="sidebar-brand d-flex align-items-center bg-gradient-primary  justify-content-center" href="index.php">
     <div class="sidebar-brand-icon">
       <img src="img/logo/attnlg.jpg">
     </div>
     <div class="sidebar-brand-text mx-3">ARMS</div>
   </a>
   <hr class="sidebar-divider my-0">
   <li class="nav-item active">
     <a class="nav-link" href="dashboard.php">
       <i class="fas fa-fw fa-tachometer-alt"></i>
       <span>Dashboard</span></a>
   </li>
   <hr class="sidebar-divider">
<!----------------------------------- Teachers ------------------------------------>
      <div class="sidebar-heading">
        users
      </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teacher"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Teachers</span>
        </a>
        <div id="teacher" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Teachers</h6>
             <a class="collapse-item" href="teacher.php">Teacher List</a>
             <a class="collapse-item" href="teacherAllocation.php">Assign Classes</a>
          </div>
        </div>
    </li>
    
<!----------------------------------- Students ------------------------------------>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#students"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fas fa-user-graduate"></i>
          <span>Student</span>
        </a>
        <div id="students" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students</h6>
            <a class="collapse-item" href="student.php">Students List</a>
            <!-- <a class="collapse-item" href="usersList.php">User List</a> -->
          </div>
        </div>
    </li>
    <hr class="sidebar-divider">
<!----------------------------------- Course ------------------------------------>
      <div class="sidebar-heading">
        Course And Subject
      </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#course"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fas fa-chalkboard"></i>
          <span>Course</span>
        </a>
        <div id="course" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Course</h6>
            <a class="collapse-item" href="course.php">Course List</a>
            <!-- <a class="collapse-item" href="usersList.php">User List</a> -->
          </div>
        </div>
    </li>
    
<!----------------------------------- Subject ------------------------------------>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subject"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fas fa-code-branch"></i>
          <span>Subject</span>
        </a>
        <div id="subject" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Subject</h6>
            <a class="collapse-item" href="subject.php">Subject List</a>
            <!-- <a class="collapse-item" href="usersList.php">User List</a> -->
          </div>
        </div>
    </li>
    <hr class="sidebar-divider">
<!----------------------------------- Attendance ------------------------------------>
      <div class="sidebar-heading">
        Attendance
      </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attendance"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fa fa-calendar"></i>
          <span>Attendance</span>
        </a>
        <div id="attendance" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Attendance</h6>
            <a class="collapse-item" href="takeAttendance.php">Take Attendance</a>
            <a class="collapse-item" href="viewAttendance.php">View Attendance</a> 
          </div>
        </div>
    </li>
    <hr class="sidebar-divider">
<!----------------------------------- Leave ------------------------------------>
    <div class="sidebar-heading">
        Leave application
      </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fa fa-calendar-alt"></i>
          <span>Leave</span>
        </a>
        <div id="leave" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Leave</h6>
            <a class="collapse-item" href="leave.php">Leave</a>
            <a class="collapse-item" href="#">View Leave</a> 
          </div>
        </div>
    </li>
    <hr class="sidebar-divider">
<!----------------------------------- Exam ------------------------------------>
      <div class="sidebar-heading">
        Exams And Result
      </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#exam"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fas fa-edit"></i>
          <span>Exam</span>
        </a>
        <div id="exam" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Exam</h6>
            <a class="collapse-item" href="exam.php">Exam List</a>
          </div>
        </div>
    </li>
    
<!----------------------------------- Result ------------------------------------>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#result"
          aria-expanded="true" aria-controls="collapseBootstrapusers">
          <i class="fas fa-graduation-cap"></i>
          <span>Result</span>
        </a>
        <div id="result" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Result</h6>
            <a class="collapse-item" href="result.php">Result List</a>
          </div>
        </div>
    </li>
    <hr class="sidebar-divider">

   <div class="version" id="version-ruangadmin"></div>
 </ul>