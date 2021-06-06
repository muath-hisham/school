<?php
    function testMassage ($condation, $mess){
        if ($condation){
            echo "<div class='alert alert-info'>
            <h1 class='text text-center text-info display-4'>$mess is true</h1>
            </div>";
        }
        else{
            echo "<div class='alert alert-danger'>
            <h1 class='text text-center text-info display-4'>$mess is false</h1>
            </div>";
        }
    }

    function auth (){
        if(isset($_SESSION['admin']) || isset($_SESSION['teacher'])){
            
        }else{
            header("location: /amit/admin/login.php");
        }
    }

    function authAdmin (){
        if(isset($_SESSION['admin'])){
            
        }else{
            header("location: /amit/admin/login.php");
        }
    }
?>
