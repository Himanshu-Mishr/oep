<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Edit Student details</title>
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
    require "connection.php";
    $username=$_GET['id'];
    $str="select * from student where username='".$username."';";
    // echo $str;
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);

    echo "<table border='1' width='500'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td>Options</td><td>Input Fields</td></tr>";
    echo "<tr align='center'><td>Username</td><td> <input type='text' name='username' value='".$row[0]."' readonly></td></tr>";
    echo "<tr align='center'><td>ID</td><td> <input type='text' name='id' value='".$row[1]."' placeholder='".$row[1]."'></td></tr>";
    echo "<tr align='center'><td>Name</td><td> <input type='text' name='name' value='".$row[2]."' placeholder='".$row[2]."'></td></tr>";
    echo "<tr align='center'><td>Email</td><td> <input type='text' name='email' value='".$row[3]."' placeholder='".$row[3]."'></td></tr>";
    echo "<tr align='center'><td>Phone Number</td><td> <input type='text' name='phno' value=".$row[4]." placeholder=".$row[4]."></td></tr>";
    echo "<tr align='center'><td>Address</td><td> <input type='text' name='address' value='".$row[5]."' placeholder='".$row[5]."'></td></tr>";
    echo "<tr align='center'><td>Password</td><td> <input type='text' name='password' value='".$row[6]."' placeholder='".$row[6]."'></td></tr>";
    echo "<tr align='center'><td>Status(y or n)</td><td> <input type='text' name='status' value='".$row[8]."' placeholder='".$row[8]."'></td></tr>";

    echo "</table>
    <input type='submit' name='submit' >
</form>
</center>";
$flag=1;

?>

<?php
if($flag==1)  {
    $username=$_GET['username'];
    $id=$_GET['id'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $phno=$_GET['phno'];
    $address=$_GET['address'];
    $password=$_GET['password'];
    $status=$_GET['status'];

    require "connection.php";
    // updating with primary key
    if(isset($_GET['submit'])) {
        $str="update student set id='".$id."', name='".$name."', address='".$address."', phno=".$phno.", email='".$email."', password='".$password."', status='".$status."'  where username='".$username."';";

        mysqli_query($con, $str);
        header("location:student_dashboard.php");
    }
}
?>
</font>
</body>
</html>
