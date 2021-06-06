<?php
include '../shared/header.php';
include '../general/configDB.php';
include '../general/functions.php';
include '../shared/nav.php';
authAdmin();

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $des = $_POST['des'];
    $insert = "insert into `courses` values (NULL, '$name', '$cost', '$des')";
    $i = mysqli_query($conn, $insert);
    //testMassage($i, "Insert to DB");
    header("location: /amit/courses/list.php");
}

//edit
$name = "";
$cost = "";
$des = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "select * from `courses` where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $name = $row['name'];
    $cost = $row['cost'];
    $des = $row['description'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $des = $_POST['des'];
        $update = "update `courses` set name = '$name', cost = $cost, description = '$des' where id = $id";
        $i = mysqli_query($conn, $update);
        header("location: /amit/courses/list.php");
    }
}
?>
<?php if ($update == false) : ?>
    <h1 class="text text-center text-primary display-4">Add Course</h1>
<?php else : ?>
    <h1 class="text text-center text-primary display-4">Edit Course</h1>
<?php endif; ?>

<div class="container col-7">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="name">Courses name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cost">Courses cost</label>
                    <input type="number" name="cost" value="<?php echo $cost ?>" id="cost" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="des">Description</label>
                    <textarea class="form-control" name="des" value="<?php echo $des ?>" id="des" required></textarea>
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