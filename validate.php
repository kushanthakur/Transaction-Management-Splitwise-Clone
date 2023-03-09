<?php
include "config.php";

if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['email']);
    $pf = mysqli_real_escape_string($con,$_POST['password']);
    $password=md5($pf);

    if (!empty($uname) && !empty($pf)){

        $sql_query = "select count(*) as cntUser from users where email='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_assoc($result);

        $count = $row['cntUser'];
        

        if($count > 0){
            // get retrieved row
            //$row = $result->fetch();
            // create array
            $sql_query2 = "select * from users where email='".$uname."' and password='".$password."'";
            $result2 = mysqli_query($con,$sql_query2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_arr=array(
                "status" => true,
                "message" => "Successfully Loggedin!",
                "fname" => $row2['fname'],
                "username" => $row2['email']
            );
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['fname']= $user_arr['fname'];
            $_SESSION['username']= $user_arr['username'];
            header('location:index.php');
        }
        else
        {
            $user_arr=array(
                "status" => false,
                "message" => "Invalid Username or Password!",
                
            );
            // header('location:oopmsg.php');
        }
        $jason=json_encode($user_arr);
        
        print_r($jason);
        echo"\n";
        echo $uname;        echo"\n";
        echo $password;         echo"\n";
        echo $_SESSION['fname'];

     
       
        

    }

}
else
{
    echo '<script>alert("Incorrect Credentials!")</script>';
  // header('location:login.php');
}
?>