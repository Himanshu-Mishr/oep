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
 #course {
    padding: 100px 70px;
 }
 #course td:hover {
        color: white;
        background-color: #916B05;
 }
 #gap {

 }
 .info_id {
    color: #4285F4;
    font-size: 16px;
 }
 #course a {
    text-decoration: none;
    color: black;

 }

#course a:hover {
    text-decoration: none;
    color: white;

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
<font size="4" style="font-family:'verdana'">
<center>
<div id='course'>
<table  width="800" height='600' bgcolor="#FFC527">
<?php
    // printing all the exams available
    require "connection.php";
    $str='select * from subject';
    $result=mysqli_query($con, $str);

    $x=0;
    while ($row=mysqli_fetch_array($result)) {
        if( $x == 0) {
            echo "<tr align='center'><td><a href='test.php?id=".$row[0]."'> ".$row[1]." <div class='info_id'>[Exam Code : ".$row[0]."]</div></a></td><td id='gap' bgcolor=white></td>";
            $x++;
        }
        else{
            echo "<td><a href='test.php?id=".$row[0]."'>".$row[1]." <div class='info_id'>[Exam Code : ".$row[0]."]</div> </a></td></tr><tr bgcolor=white ><td></td><td></td><td></td><td></td></tr>";
            $x--;
        }
    }

?>
</table>
</div>
</center>
</font>
</body>
</html>






