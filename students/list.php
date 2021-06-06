<?php 
    include '../shared/header.php';
    include '../general/configDB.php';
    include '../general/functions.php';
    include '../shared/nav.php';
    auth();

    //select
    $select = "select * from `student`";
    $s = mysqli_query($conn, $select);

    //delete
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "delete from `student` where id = $id";
        $d = mysqli_query($conn, $delete);
        header("location: /amit/students/list.php");
    }
?>

<h1 class="text text-center text-primary display-4">List Student</h1>

<div class="container col-7">
    <div class="card">
        <div class="card-body">
            <table class="table table-info table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Teacher Id</th>
                    <th>Action</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['level'] ?></td>
                    <td><?php echo $data['teacherId'] ?></td>
                    <td>
                        <a href="/amit/students/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="/amit/students/list.php?delete=<?php echo $data['id'] ?>" 
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