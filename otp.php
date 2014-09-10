<?php
session_start();

echo "<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: verdana;
        background-color: #EDF5FC;
    }
    html, body {
        height: 100%;
    }
    table {
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(204, 204, 204);
        box-shadow: 0px 0px 5px rgb(204, 204, 204);
    }
    #notification {
    background-color: #FFD76E;
    }
    a {
        text-decoration: none;
    }
    </style>
    <title>otp VERIFICATION</title>

</head>
<body>
<br><br><br>
<center>
<form method='GET' action=''>
<table width='350' height='450' bgcolor='white'>
<tr align='center' bgcolor='#FFD76E' ><td id='table_title'>otp - VERIFICATION</td></tr>
<tr align='center'><td><input type='text' name='otp_code' placeholder='enter otp code here' required></td></tr>
<tr align='center'><td><input type='submit' name='submit' value='Enter here' size='100'></td></tr>
<tr id='notification' align='center'><td>Please be patience as we send the otp-code. If you don't receive it after some minutes.<br><a href='otp_handler.php'> Click here to resend it</a></td></tr>";

$flag=0;
$username=$_COOKIE['username'];
$otp_code=$_GET['otp_code'];

if (isset($_GET['submit'])) {
    require "connection.php";
    // printing table ................................
    $str='select * from student';
    $result=mysqli_query($con, $str);
    while ($row=mysqli_fetch_array($result)) {
        if ($username == 'admin' && $otp_code == $row[7] ) {
            $_SESSION['a']='admin';
            $flag=0;
            // cleaning the otp-code from db
            $str1="update student set otp_code='' where username='".$_COOKIE['username']."';";
            mysqli_query($con, $str1);
            header("location:admin/admin.php");
            break;
        }
        // if password matches then he is student
        else if ($username == $row['username'] && $otp_code == $row[7] ) {
            $_SESSION['a']='user';
            // cleaning the otp-code from db
            $str1="update student set otp_code='' where username='".$_COOKIE['username']."';";
            mysqli_query($con, $str1);
+           $flag=0;
            header("location:user/student.php");
            break;
        }
    $flag=1;
    }
    // if nothing matches then tell him to register
    if($flag==1) {
        setcookie("username", $username, time()-60*60*8);
        echo "<tr align='center' style='color:red;'><td>*Invalid otp-CODE. You are been redirected to login screen. Please login with correct credentials</td></tr>";
        header('refresh:3,url:http://localhost/finalProject/login.php');
    }
}

?>

</table>
</form>

</center>
</body>
</html>
