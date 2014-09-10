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
<table border="1" width="750">
    <tr align="center" bgcolor="#FFD76E"><td>Exam ID</td><td>Subject</td><td>Option</td></tr>
<?php
    // printing table ................................
    require "connection.php";
    $str='select * from subject';
    $result=mysqli_query($con, $str);
    while ($row=mysqli_fetch_array($result)) {
    echo "<tr align='center'><td>".$row[0]."</td><td>".$row[1]."</td><td><a href='subject_edit.php?exam_id=$row[0]'>Edit</a> <a href='subject_delete.php?exam_id=$row[0]'>Delete</a></td></tr>";

    }
    echo "<tr align='center'><td colspan='2'></td><td><a href='subject_add.php'>Add</a></td></tr>";
?>

</table>
</center>
</font>
</body>
</html>
