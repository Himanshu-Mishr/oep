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

</font size=''>
<font>
<center>
<br><br>
<h3>Edit Subjects</h3>
<form action="" method="GET" accept-charset="utf-8">
<table border="1" width="750">
    <tr align="center" bgcolor="#FFD76E"><td>Option</td><td>Input Field</td></tr>
    <tr align="center" ><td>Exam ID</td><td><input type="text" name=exam_id></td></tr>
    <tr align="center" ><td>Subject Name</td><td><input type="text" name=subject></td></tr>
</table>
<input type='submit' name='submit' >
</form>
</center>
<?php
if(isset($_GET['submit'])) {
    require "connection.php";
    $str="insert into subject values('".$_GET['exam_id']."', '".$_GET['subject']."');";
    mysqli_query($con, $str);
    echo $str."<br>";
    $str="create table ".$_GET['exam_id']." ( question_no int(3) primary key, question varchar(50), answer int(2), opt_a varchar(20), opt_b varchar(20), opt_c varchar(20), opt_d varchar(20));";
    mysqli_query($con, $str);
    echo $str."<br>";

    $temp=0;
    while($temp < 5) {
        $str="insert into ".$_GET['exam_id']." values($temp, '', 0, '', '', '', '');";
        mysqli_query($con, $str);
        echo $str."<br>";
        $temp = $temp + 1;
    }
    header('location:subject_dashboard.php');
}
?>
</font>
</body>
</html>
