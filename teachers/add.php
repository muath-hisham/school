<?php
include '../shared/header.php';
include '../general/configDB.php';
include '../general/functions.php';
include '../shared/nav.php';
authAdmin();

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $cid = $_POST['cid'];
    $pass = $_POST['password'];
    $insert = "insert into `teachers` values (NULL, '$name', '$salary', '$cid', '$pass')";
    $i = mysqli_query($conn, $insert);
    //testMassage($i, "Insert to DB");
    header("location: /amit/teachers/list.php");
}

//edit
$name = "";
$salary = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "select * from `teachers` where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $name = $row['name'];
    $salary = $row['salary'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $courseId = $_POST['cid'];
        $update = "update `teachers` set name = '$name', salary = $salary,  courseId = $courseId where id = $id";
        $i = mysqli_query($conn, $update);
        header("location: /amit/teachers/list.php");
    }
}

$select = "select * from `courses`";
$s = mysqli_query($conn, $select);
?>

<?php if ($update == false) : ?>
    <h1 class="text text-center text-primary display-4">Add Teacher</h1>
<?php else : ?>
    <h1 class="text text-center text-primary display-4">Edit Teacher</h1>
<?php endif; ?>

<div class="container col-7">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="name">Teacher name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="salary">Teacher salary</label>
                    <input type="number" name="salary" value="<?php echo $salary ?>" id="salary" class="form-control" required>
                </div>
                <?php if($update == false){ ?>
                <div class="form-group">
                    <label for="password">Teacher password</label>
                    <input type="number" name="password" value="<?php echo $password ?>" id="password" class="form-control" required>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label for="cid">Course Id</label>
                    <select name="cid" id="cid" class="form-control" required>
                        <?php foreach($s as $data){ ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if ($update == false) : ?>
                    <div><button name="send" class="btn btn-primary btn-block ">Send Data</button></div>
                <?php else : ?>
                    <div><button name="update" class="btn btn-primary btn-block ">Edit Data</button></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php
include '../shared/script.php';
?>