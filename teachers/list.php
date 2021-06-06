<?php 
    include '../shared/header.php';
    include '../general/configDB.php';
    include '../general/functions.php';
    include '../shared/nav.php';
    authAdmin();

    //select
    $select = "select * from `teachers`";
    $s = mysqli_query($conn, $select);

    //delete
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "delete from `teachers` where id = $id";
        $d = mysqli_query($conn, $delete);
        header("location: /amit/teachers/list.php");
    }
?>

<h1 class="text text-center text-primary display-4">List Teacher</h1>

<div class="container col-7">
    <div class="card">
        <div class="card-body">
            <table class="table table-info table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Course Id</th>
                    <th>Action</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['salary'] ?></td>
                    <td><?php echo $data['courseId'] ?></td>
                    <td>
                        <a href="/amit/teachers/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="/amit/teachers/list.php?delete=<?php echo $data['id'] ?>" 
                        onclick="return confirm('Are you sure!')"
                        class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
    include '../shared/script.php';
?>