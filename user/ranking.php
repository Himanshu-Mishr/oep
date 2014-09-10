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
</style>
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
</body>
</html>
