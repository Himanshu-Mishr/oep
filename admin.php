<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
    <style>
    #header {
        padding: 5px 10px;
        background-color: #33BF77;
    }
    </style>
</head>
<body>
<center>
<?php
    echo "<div id='header'><br><br><h2>ADMINISTRATION PAGE</h2><br><br><p align='left'><a href='admin.php'>Home </a><a href='logout.php'>Logout</a></p><p align='right' style='color: blue;'>Welcome <u><b>".$_COOKIE['username']."</b></u></p></div>";
echo "<br><br>
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
<br><br>
<h3>Edit Subjects</h3>
<table border="1" width="750">
    <tr align="center" bgcolor="#FFD76E"><td>Subjects</td><td>Exam</td><td>Option</td></tr>
<?php
    // printing table ................................
    require "connection.php";
    $str='select * from question';
    $result=mysqli_query($con, $str);
    while ($row=mysqli_fetch_array($result)) {
    echo "<tr align='center'><td>".$row[0]."</td><td>".$row[1]."</td><td><a href='subject_edit.php?subject_id=$row[0]'>Edit</a> <a href='subject_delete.php?subject_id=$row[0]'>Delete</a></td></tr>";

    }
    echo "<tr align='center'><td colspan='2'></td><td><a href='subject_add.php'>Add</a></td></tr>";
?>

</table>
</center>

</body>
</html>
