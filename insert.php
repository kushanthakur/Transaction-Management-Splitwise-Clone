<?php
include_once 'config.php';
$error=0;$nameErr=0;$emailErr=0;$pw1Err=0; $pw2Err=0;$pfErr=0;
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
if(isset($_POST['entry']))
{	 
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $pw1 = $_POST['pw1'];
    $pw2 = $_POST['pw2'];

    if (empty($_POST["fname"])) {
        $nameErrmsg = "First Name is required!";
        $error++;$nameErr++;
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
        $nameErrmsg = "Only letters and white space allowed";
        $error++;$nameErr++;
        }
    }
    
    if (empty($_POST["email"])) {
        $emailErrmsg = "Email is required!";
        $error++;$emailErr++;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErrmsg = "Invalid email format";
        $error++;$emailErr++;
        }
    }
    if (empty($_POST["pw1"])) {
        $pw1Errmsg = "Password is required!";
        $error++;$pw1Err++;
    } else {
        $pw1 = test_input($_POST["pw1"]);
    }
    if (empty($_POST["pw2"])) {
        $pw2Errmsg = "Password is required!";
        $error++;$pw2Err++;
    } else {
        $pw2 = test_input($_POST["pw2"]);
    }
    if($pw1==$pw2){
        $pf=md5($pw1);
    }else{
        $pfErrmsg="Passwords donot match!";
        $error++;$pfErr++;
    }
    
    if($nameErr==1) echo $nameErrmsg;
    if($emailErr==1) echo $emailErrmsg;
    if($pw1Err==1) echo $pw1Errmsg;
    if($pw2Err==1) echo $pw1Errmsg;
    if($pfErr=1) echo $pfErrmsg;
    if($error==0)
    { 
        $sql = "select count(*) as cntUser from users where email='".$email."'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        if($count>0)
        {
        echo '<script>alert("Already Registered!")</script>';
        header('location:login.php');
        }
        else
        {
        $sql = "INSERT INTO users (fname,email,password) VALUES ('$fname','$email','$pf')";
            if (mysqli_query($con, $sql)) 
            {
                header('location:index.php');
            
            } 
            else 
            {
                echo "Error: " . $sql . " " . mysqli_error($con);
            }
        
        }
    }
}
mysqli_close($con);
?>