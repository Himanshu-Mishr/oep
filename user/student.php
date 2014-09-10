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
<style>
 #input_info {
    color: black;
    padding: 300px 10px;
 }
 #t1 {
    padding: 200px 0px;
    float: right;
 }
</style>
</head>
<body>

<font size="5" color="white">
<?php
// echo "<img src='photos/".$_COOKIE['username'].".jpg' width='100' height='100'>";
echo "<div id='info'>Welcome : ".$_COOKIE['username']."<img src='photos/".$_COOKIE['username'].".jpg' width='75' height='75'></div>";
// require "connection.php";
// $str="select * from ".$__COOKIE['username']."_photo;";
// $result=mysqli_query($con, $str);
// while ($row=mysqli_fetch_array($result)) {
//     echo "<img src=".$row[0].">";
// }
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
<div id='t1'>
<?php
echo "
<table  border='1' width='750' height='250'>
    <tr align='center'><td>Username : ".$_COOKIE['username']."</td><td><img src='photos/".$_COOKIE['username'].".jpg' width='100' height='100'></td></tr>";
require "connection.php";
$str="select * from student where username='".$_COOKIE['username']."';";
$result=mysqli_query($con, $str);
while ($row=mysqli_fetch_array($result)) {
echo "
    <tr><td>Name : ".$row[2]."</td><td>Email Address".$row[3]."</td></tr>
    <tr><td>Phone Number : ".$row[4]."</td><td>Location : ".$row[5]."</td></tr>
    ";
}
?>
</table>
</div>
</body>
</html>
