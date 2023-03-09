<?php
include "expensemanagement/config.php";

session_start();
$error=0;$msg="";
$_SESSION['connected']=false;
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if(isset($_POST['submit']))
{
   
    $_SESSION['connected']=true;
    $gname = $_POST['gname'];
    $fname = $_POST['gadmin'];
    if (empty($_POST["gname"])) {
        $msg = "Group Name is required!";
        $error++;
    } else {
        $gname = test_input($_POST["gname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$gname)) {
        $msg = "Only letters and white space allowed";
        $error++;
        }
    }
    if($error==0)
    { 
        $sql = "select * from groupt where gname='".$gname."'";
        $result = mysqli_query($con,$sql);
        //$row = mysqli_fetch_array($result);
       // echo $result;

        //$count = mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
        echo '<script>alert("Group Already Exist!")</script>';
       
        }
        else
        {
        $sql = "INSERT INTO groupt (gname,gadmin) VALUES ('$gname','$fname')";
            if (mysqli_query($con, $sql)) 
            {
               $msg="Group name = $gname Created Successfully!"  ; 
               header('location:index.php');
             
            } 
            else 
            {
                echo "Error: " . $sql . " " . mysqli_error($con);
            }
        
        }
    }
}
     $_SESSION['msg']=$msg;      
            
           
mysqli_close($con);
?>