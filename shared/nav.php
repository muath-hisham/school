<?php
  if(isset($_GET['logout'])){
    session_unset();
    header("location: /amit/admin/login.php");
  }
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">School System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/amit/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if (isset($_SESSION['admin'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Teachers
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/amit/teachers/add.php">Add Teacher</a>
            <a class="dropdown-item" href="/amit/teachers/list.php">List Teachers</a>
          </div>
        </li>
      <?php endif; ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Students
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/amit/students/add.php">Add Student</a>
          <a class="dropdown-item" href="/amit/students/list.php">List Students</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if (isset($_SESSION['admin'])) : ?>
            <a class="dropdown-item" href="/amit/courses/add.php">Add Course</a>
          <?php endif; ?>
          <a class="dropdown-item" href="/amit/courses/list.php">List Courses</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-secondary my-2 my-sm-0" name="logout" type="submit">log out</button>
    </form>
  </div>
</nav>