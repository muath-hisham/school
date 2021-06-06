<?php
include '../shared/header.php';
include '../general/configDB.php';
include '../general/functions.php';

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $access[] = $_POST['access'];
    if ($access[0] == "admin") {
        $select = "select * from `admin` where name = '$name' and password = '$password'";
    } else if ($access[0] == "teacher") {
        $select = "select * from `teachers` where name = '$name' and password = '$password'";
    }
    $s = mysqli_query($conn, $select);
    $numRows = mysqli_num_rows($s);
    if ($numRows > 0) {
        $_SESSION[$access[0]] = $name;
        header("location: /amit/index.php");
    } else {
        echo "<div class='alert alert-danger'>
        <h1 class='text text-center text-info display-4'>user name or password is wrong</h1>
        </div>";
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">School System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/amit/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
    </ul>
</nav>
<div class="container col-7">
    <div class="card my-5">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Your name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <input type="radio" name="access" value="admin" class="mr-1"> Admin
                <input type="radio" name="access" value="teacher" class="mr-1"> Teacher
                <button type="submit" name="login" class="btn btn-success btn-block mt-3">login</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/script.php';
?>