<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Student Add</title>
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
</ul>

</font>
<font size='3'>

<center>
<?php

echo "<br><br>
<h3>Edit Student Details</h3>
    <form method='GET' action=''>
    <table border='1' width='750'>";

    echo "<table border='1' width='500'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td>Option</td><td>Input Field</td></tr>";
    echo "<tr align='center'><td>Username</td><td> <input type='text' name=username></td></tr>";
    echo "<tr align='center'><td>ID</td><td> <input type='text' name=id></td></tr>";
    echo "<tr align='center'><td>Name</td><td> <input type='text' name=name ></td></tr>";
    echo "<tr align='center'><td>Email</td><td> <input type='text' name=email></td></tr>";
    echo "<tr align='center'><td>Phone Number</td><td> <input type='text' name=phno></td></tr>";
    echo "<tr align='center'><td>Address</td><td> <input type='text' name=address></td></tr>";
    echo "<tr align='center'><td>Password</td><td> <input type='text' name=password></td></tr>";
    echo "<tr align='center'><td>Status(y or n)</td><td><input type='text' name=status></td></tr>";
    echo "</table>
    <input type='submit' name='submit' value='Submit'>
</form>";

$flag=1;

?>
<?php
$uflag=0;
if($flag==1)  {
    $username=$_GET['username'];
    $id=$_GET['id'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $phno=$_GET['phno'];
    $address=$_GET['address'];
    $status=$_GET['status'];
    $password=$_GET['password'];

    require "connection.php";
    // inserting data (new data)...............................
    if(isset($_GET['submit'])) {

        // checking primary key , if it exist or not ................................
        $str='select username from student';
        $result=mysqli_query($con, $str);
        while ($row=mysqli_fetch_array($result)) {
            if($row[0]==$username || $row[1]==$id )
            {
                $uflag=1;
                echo "<p style='color: red;' align='center'>Attempting to duplicate Primary Key. This Username already exist. Please fill another data</p>";
                break;
            }
        }

        $str="insert into student values('".$username."', '".$id."', '".$name."', '".$email."', ".$phno.", '".$address."', '".$password."', '', '".$status."');";
        echo $str;
        mysqli_query($con, $str);
        // creating a database in name of student.
        $str="create table ".$username." (exam_id varchar(10) primary key, marks_obt int(2), time_start datetime, time_end datetime);";
        mysqli_query($con, $str);
        $flag=2;
        if($flag==2 && $uflag!=1) {
            header("location:student_dashboard.php");
        }
        else {
            header('location:admin_student_add.php');

        }
    }
}
?>
</center>
</font>
</body>
</html>
