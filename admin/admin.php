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

</font>
<center>
<font size='4'>
Database Analysis
<div id='t' >
<table width='850' height='300' border='1' bgcolor="#FFC527">
<?php
    require "connection.php";
    $str='select * from student';
    $result=mysqli_query($con, $str);
    $student_count=0;
    $student_confirmed=0;
    $incomplete=0;
    while ($row=mysqli_fetch_array($result)) {
        $student_count++;
        if($row[8]=='y')
            $student_confirmed++;
        if($row[2]=='')
            $incomplete++;
    }
    echo "
    <tr align='center'><td>Total no of Student : ".$student_count."</td><td>Total no.of student confirmed : ".$student_confirmed."</td></tr>
    <tr align='center'><td>Incomplete Applications : ".$incomplete."</td><td></td></tr>";

    $str='select * from subject';
    $result=mysqli_query($con, $str);
    $exam_count=0;
    $incomplete=0;
    while ($row=mysqli_fetch_array($result)) {
        $exam_count++;
    }
    echo "<tr align='center'><td>Total no of exam : ".$exam_count."</td><td></td></tr>";
?>
</table>
</div>
</font>
</center>
</body>
</html>
