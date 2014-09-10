<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
?>
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
    <li id="home"><a class='sidelink' href="admin.php">Home</a></li>
    <li><a class='sidelink' href="student_dashboard.php">Student Menu</a></li>
    <li><a class='sidelink1' href="admin_student_add.php">Add Student</a></li>
    <li><a class='sidelink1' href="middle_edit.php">Edit Student</a></li>
    <li><a class='sidelink1' href="middle_delete.php">Delete Student</a></li>
    <li><a class='sidelink' href="subject_dashboard.php">Exam Menu</a></li>
    <li><a class='sidelink1' href="subject_add.php">Add Subject</a></li>
    <li><a class='sidelink1' href="middle_edit_subject.php">Edit Subject</a></li>
    <li><a class='sidelink1' href="middle_delete_subject.php">Delete Subject</a></li>

    <li id="logout"><a class='sidelink' href="/finalProject/logout.php">Logout</a></li></ul>
</ul>
<center>
<form method="GET" action=''>
<div id='input_info' color='black'>Enter Exam ID <input type="text" name="id" ><input type="submit" name="submit" value="GO"></div>
</form>
<?php
if (isset($_GET['submit'])) {
    $str="location:subject_edit.php?id=".$_GET['id']."";
header($str);
}
?>
</center>
</font>

</body>
</html>
