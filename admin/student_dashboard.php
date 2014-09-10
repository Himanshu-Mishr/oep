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

</font>
<?php
    //echo "<div id='header'><br><br><h2>ADMINISTRATION PAGE</h2><br><br><p align='left'><a href='admin.php'>Home </a><a href='logout.php'>Logout</a></p><p align='right' style='color: blue;'>Welcome <u><b>".$_COOKIE['username']."</b></u></p></div>";
echo "<br><br>
<center>
<font size='3'>
<h3>Edit Student Details</h3>
<form method='GET' action=''>
<table border='1' width='900' >";

require "connection.php";
// printing table ................................
$str='select * from student';
$result=mysqli_query($con, $str);
echo "<tr align='center' bgcolor='#FFD76E'>
<td>Username</td>
<td>ID</td>
<td>Name</td>
<td>Email</td>
<td>Phone Number</td>
<td>Address</td>
<td>Password</td>
<td colspan='2'>Options</td></tr>";

// why the fuck this password is not printing
while ($row=mysqli_fetch_array($result)) {
        echo "<tr align='center'>
        <td>".$row[0]."</td>
        <td>".$row[1]."</td>
        <td>".$row[2]."</td>
        <td>".$row[3]."</td>
        <td>".$row[4]."</td>
        <td>".$row[5]."</td>
        <td>".$row[6]."</td>";
        if($row[8]=='y')
            echo "<td><a href='status_manipulation.php?id=$row[0]'>Unconfirm</a></td>
                  <td><a href='admin_student_edit.php?id=$row[0]'>Edit </a><a href='admin_student_delete.php?id=$row[0]'> Delete</a></td></tr>";
        else
            echo "<td><a href='status_manipulation.php?id=$row[0]'>Confirm</a></td>
        <td><a href='admin_student_edit.php?id=$row[0]'> Edit </a><a href='admin_student_delete.php?id=$row[0]'> Delete </a></td></tr>";
}
echo "<tr align='center'><td colspan='8' ></td><td><a href='admin_student_add.php'>Add</a></td></tr>"
?>
</table>
</form>
</font>
</center>
</body>
</html>
