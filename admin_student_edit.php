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
    <table border='1' width='750'>";
    require "connection.php";
    $username=$_GET['id'];
    $str="select * from student where username='".$username."';";
    // echo $str;
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='500'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td>Options</td><td>Input Fields</td></tr>";
    echo "<tr align='center'><td>Username</td><td> <input type='text' name=username value='".$row[0]."' readonly></td></tr>";
    echo "<tr align='center'><td>ID</td><td> <input type='text' name=stud_id value='".$row[1]."' placeholder='".$row[1]."'></td></tr>";
    echo "<tr align='center'><td>Name</td><td> <input type='text' name=stud_name value='".$row[2]."' placeholder='".$row[2]."'></td></tr>";
    echo "<tr align='center'><td>Email</td><td> <input type='text' name=sem value='".$row[3]."' placeholder='".$row[3]."'></td></tr>";
    echo "<tr align='center'><td>Phone Number</td><td> <input type='text' name=course value=".$row[4]." placeholder=".$row[4]."></td></tr>";
    echo "<tr align='center'><td>Address</td><td> <input type='text' name=phno value='".$row[5]."' placeholder='".$row[5]."'></td></tr>";
    echo "<tr align='center'><td>Password</td><td> <input type='text' name=status value='".$row[6]."' placeholder='".$row[6]."'></td></tr>";
    echo "<tr align='center'><td>Status(y or n)</td><td> <input type='email' name=email value='".$row[8]."' placeholder='".$row[8]."'></td></tr>";

    echo "</table>
    <input type='submit' name='submit' >
</form>
</center>
</body><p align='right'>
</html>";
$flag=1;

?>

<?php
if($flag==1)  {
    $username=$_GET['username'];
    $stud_id=$_GET['stud_id'];
    $stud_name=$_GET['stud_name'];
    $sem=$_GET['sem'];
    $course=$_GET['course'];
    $phno=$_GET['phno'];
    $status=$_GET['status'];
    $email=$_GET['email'];
    $password=$_GET['password'];

    require "connection.php";
    // updating with primary key
    if(isset($_GET['submit'])) {
        $str="update student set stud_id='".$stud_id."', stud_name='".$stud_name."', sem=".$sem.", course='".$course."', phno=".$phno.", email='".$email."', password='".$password."'  where username='".$username."';";

        echo $str;
        mysqli_query($con, $str);
        header("location:admin.php");
    }
}
?>
