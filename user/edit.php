<?php
session_start();
if($_SESSION['a'] !='user') {
    header("location:login.php");
}
?>
<!--
    this page will display all the past history analysis of the student.
    No of test he has given.
 -->


<!DOCTYPE html>
<html>
<head>
    <title>SIDE SLIDE</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<font size="5" color="white">
<?php
echo "<div id='info'>Welcome : ".$_COOKIE['username']."<img src='photos/".$_COOKIE['username'].".jpg' width='75' height='75'></div>";
?>
<ul id="nav" type="none">
    <li id="home"><a class='sidelink' href="student.php">Home</a></li>
    <li><a class='sidelink' href="ranking.php">Global Ranking</a></li>
    <li><a class='sidelink' href="exam_dashboard.php">Exam Dashboard</a></li>
    <li><a class='sidelink' href="take_test.php">Take a Test</a></li>
    <li><a class='sidelink' href="edit.php">Edit Your Details</a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href="rules_and_regulations.php">Rules and Regulations</a></li>

    <li id="logout"><a class='sidelink' href="/finalProject/logout.php">Logout</a></li></ul>
</ul>
</font>

<font size='3'>
<center>

<?php
echo "<br><br>
<h3>Edit Your Details</h3>
    <form method='GET' action=''>
    <table border='1' width='750'>";
    require "connection.php";
    $str="select * from student where username='".$_COOKIE['username']."';";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);

    echo "<table border='1' width='500'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td>Options</td><td>Input Fields</td></tr>";
    echo "<tr align='center'><td>Username</td><td> <input type='text' name='username' value='".$row[0]."' readonly></td></tr>";
    echo "<tr align='center'><td>ID</td><td> <input type='text' name='id' value='".$row[1]."' placeholder='".$row[1]."' readonly ></td></tr>";
    echo "<tr align='center'><td>Name</td><td> <input type='text' name='name' value='".$row[2]."' placeholder='".$row[2]."'></td></tr>";
    echo "<tr align='center'><td>Email</td><td> <input type='text' name='email' value='".$row[3]."' placeholder='".$row[3]."'></td></tr>";
    echo "<tr align='center'><td>Phone Number</td><td> <input type='text' name='phno' value=".$row[4]." placeholder=".$row[4]."></td></tr>";
    echo "<tr align='center'><td>Address</td><td> <input type='text' name='address' value='".$row[5]."' placeholder='".$row[5]."'></td></tr>";
    echo "<tr align='center'><td>Password</td><td> <input type='text' name='password' value='".$row[6]."' placeholder='".$row[6]."'></td></tr>";
    echo "<tr align='center'><td>Status(y or n)</td><td> <input type='text' name='status' value='".$row[8]."' placeholder='".$row[8]."' readonly ></td></tr>";

    echo "</table>
    <input type='submit' name='submit' >
</form>
</center>";
$flag=1;

?>

<?php
if($flag==1)  {
    $username=$_GET['username'];
    $id=$_GET['id'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $phno=$_GET['phno'];
    $address=$_GET['address'];
    $password=$_GET['password'];
    $status=$_GET['status'];

    require "connection.php";
    // updating with primary key
    if(isset($_GET['submit'])) {
        $str="update student set name='".$name."', address='".$address."', phno=".$phno.", email='".$email."', password='".$password."'  where username='".$username."';";

        mysqli_query($con, $str);
        header("location:student.php");
    }
}
?>
<br><br><br><br>

<center>
<form name="jlt" action="sub.php" method="post" enctype="multipart/form-data">
<table border='1'>
<tr align="center"><td>Upload your profile picture.</td></tr>
<tr align="center"><td>First Name<input type="text" name="name" size="40"></td></tr>
<tr align="center"><td>Photo<input type="file" name="file"></td></tr>
<tr align="center"><td><input type="submit" name="submit" value="submit"></td></tr>
</form>
</table>
</center>
</font>
</body>
</html>
