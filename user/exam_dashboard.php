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

#t {
    padding: 100px;
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
<center>
<font size='4'>
<div id='t' >
Your Marks Table
<table width='850' height='300' border='1'>
<?php
    echo "<tr align='center' bgcolor='#FFC527'><td>Exam ID</td><td>Marks Obtained</td><td>Time Started</td><td>Time Ended</td></tr>";
    require "connection.php";
    $str="select * from ".$_COOKIE['username']."";
    $result=mysqli_query($con, $str);
    while ($row=mysqli_fetch_array($result)) {
        echo "<tr align='center'><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
    }


?>
</table>
</div>
</font>
</center>
</body>
</html>
