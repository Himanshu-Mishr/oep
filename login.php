<?php
session_start();
/*
  we assume that the loginer is already in database.
*/
?>
<!DOCTYPE html>
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
    a {
        text-decoration: none;
    }
    </style>
    <title>SIGN-IN</title>

</head>
<body>
<br><br><br>
<center>
<!-- form for login -->
<form method='GET' action=''>
<table width='350' height='450' bgcolor='white'>
<tr align='center' bgcolor="#FFD76E" ><td id="table_title">SIGN-IN</td></tr>
<tr align='center'><td><input type='text' name='username' placeholder='username' required></td></tr>
<tr align='center'><td><input type='text' name='password' placeholder='password' required></td></tr>
<tr align='center'><td><input type='submit' name='submit' value='Sign - In' size='100'></td></tr>
<tr align='center'><td><a href="register.php">new user?</a></td></tr>

<?php
$flag=0;
$username=$_GET['username'];
$password=$_GET['password'];
if (isset($_GET['submit'])) {

    // connecting and fetching credential with DB
    require "connection.php";
    $str='select * from student';
    $result=mysqli_query($con, $str);
    while ($row=mysqli_fetch_array($result)) {
        // if user is admin
        if ($_GET['username'] == 'admin' && $_GET['password'] == $row[6] ) {
            $_SESSION['a']='admin';
            // creating cookies for showing who has logged in.
            setcookie("username", $username, time()+60*60*8);
            setcookie("password", $password, time()+60*60*8);
            $flag=0;
            header("location:admin/admin.php");
            // header('location:otp_handler.php');
            break;
        }
        // if password matches then he is student
        else if ($_GET['username'] == $row[0] && $_GET['password'] == $row[6] ) {
            $_SESSION['a']='user';
            setcookie("username", $username, time()+60*60*8);
            setcookie("password", $password, time()+60*60*8);
            $flag=0;
            header("location:user/student.php");
            // header('location:otp_handler.php');
            break;
        }
        $flag=1;
    }
    if($flag==1) {
        echo "<tr id='notification' align='center' style='color:red;'><td>Invalid username and/or password</td></tr>";
    }
}

?>

</table>
</form>

</center>
</body>
</html>
