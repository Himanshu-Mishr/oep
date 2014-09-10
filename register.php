<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
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
        a {
        text-decoration: none;
    }
    </style>
    <title>SIGN-UP</title>

</head>
<body>
<br><br><br>
<center>
<form method='GET' action=''>
<table width='350' height='450' bgcolor='white'>
<tr align='center' bgcolor="#FFD76E" ><td id="table_title">SIGN-UP</td></tr>
<tr align='center'><td><input type='text' name='username' placeholder='username' required></td></tr>
<tr align='center'><td><input type='email' name='email' placeholder='email address' required></td></tr>
<tr align='center'><td><input type='text' name='password' placeholder='password' required></td></tr>
<tr align='center'><td>+91<input type='text' name='phno' placeholder='mobile number' required></td></tr>
<tr align='center'><td><input type='submit' name='submit' value='Sign - Up' size='100'></td></tr>
<tr align='center'><td><a href="login.php">already registered?</a></td></tr>

</table>
</form>
</center>
</body>
</html>
<?php
$str='';

if(isset($_GET['submit'])) {
    $username=$_GET['username'];
    $email=$_GET['email'];
    $password=$_GET['password'];
    $phno=$_GET['phno'];
    require "connection.php";
    $str="insert into student values('".$username."', '', '', '".$email."', ".$phno.", '', '".$password."', '' , 'n');";
    echo $str;
    mysqli_query($con, $str);
    $_SESSION['a']='user';
    echo $_COOKIE['username'];
    setcookie("username", $username, time()+60*60*8);
    setcookie("password", $password, time()+60*60*8);
    setcookie("phno", $phno, time()+60*60*8);

    $str="create table ".$_COOKIE."_photo ( path varchar(50));";
    mysqli_query($con, $str);
    $path="photos/default.png";
    $str="insert into ".$_COOKIE['username']."_photo ('".$path."');";
    mysqli_query($con, $str);
    header("location:otp_handler.php");
}
?>
