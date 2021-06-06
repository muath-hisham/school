<?php 
    include '../shared/header.php';
    include '../general/configDB.php';
    include '../general/functions.php';
    include '../shared/nav.php';
    auth();

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $level = $_POST['level'];
        $tid = $_POST['tid'];
        $insert = "insert into `student` values (NULL, '$name', '$level', '$tid')";
        $i = mysqli_query($conn, $insert);
        //testMassage($i, "Insert to DB");
        header("location: /amit/students/list.php");
    }

    //edit
    $name = "";
    $level = "";
    $update = false;
    if (isset($_GET['edit'])) {
        $update = true;
        $id = $_GET['edit'];
        $select = "select * from `student` where id = $id";
        $s = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($s);
        $name = $row['name'];
        $level = $row['level'];
        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $level = $_POST['level'];
            $teacherId = $_POST['tid'];
            $update = "update `student` set name = '$name', level = $level, teacherId = $teacherId where id = $id";
            $i = mysqli_query($conn, $update);
            header("location: /amit/students/list.php");
        }
    }

    $select = "select * from `teachers`";
    $s = mysqli_query($conn, $select);
?>

<?php if ($update == false) : ?>
    <h1 class="text text-center text-primary display-4">Add Student</h1>
<?php else : ?>
    <h1 class="text text-center text-primary display-4">Edit Student</h1>
<?php endif; ?>

<div class="container col-7">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="name">Student name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="level">Student level</label>
                    <input type="number" name="level" value="<?php echo $level ?>" id="level" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tid">Teacher Id</label>
                    <select name="tid" id="tid" class="form-control" required>
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