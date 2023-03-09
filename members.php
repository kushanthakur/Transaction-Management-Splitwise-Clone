<?php
// Connect to database 
include "expensemanagement/config.php";
session_start();
    $sql = "SELECT gname FROM groupt";
    $gname = mysqli_query($con, $sql);

    if(isset($_POST['submit']))
    {

        $gid = mysqli_real_escape_string($con, $_POST['group']); //Form field with name Group has gid as its option value
        $uid = mysqli_real_escape_string($con, $_POST['member']); //Form field with name member has uid as its option value
        $sql_insert= "INSERT INTO members(gid, uid) VALUES ('$gid','$uid')";
           
        if(mysqli_query($con, $sql_insert))
        {
            echo '<script>alert("Member added successfully")</script>';
            header('location:index.php');
        }
    }

?>