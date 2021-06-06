<?php 
    include '../shared/header.php';
    include '../general/configDB.php';
    include '../general/functions.php';
    include '../shared/nav.php';
    auth();

    // select
    $select = "select * from `courses`";
    $s = mysqli_query($conn, $select);

    //delete
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "delete from `courses` where id = $id";
        $d = mysqli_query($conn, $delete);
        header("location: /amit/courses/list.php");
    }
?>

<h1 class="text text-center text-primary display-4">List Courses</h1>

<div class="container col-7">
    <div class="card">
        <div class="card-body">
            <table class="table table-info table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>cost</th>
                    <th>Description</th>
                    <?php if(isset($_SESSION['admin'])){ ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['cost'] ?></td>
                    <td><?php echo $data['description'] ?></td>
                    <?php if(isset($_SESSION['admin'])){ ?>
                    <td>
                        <a href="/amit/courses/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="/amit/courses/list.php?delete=<?php echo $data['id'] ?>"
                        onclick="return confirm('Are you sure!')"
                        class="btn btn-danger">Delete</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
    include '../shared/script.php';
?>