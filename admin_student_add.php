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

    echo "<table border='1' width='500'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td>Option</td><td>Input Field</td></tr>";
    echo "<tr align='center'><td>Username</td><td> <input type='text' name=username></td></tr>";
    echo "<tr align='center'><td>ID</td><td> <input type='text' name=stud_id></td></tr>";
    echo "<tr align='center'><td>Name</td><td> <input type='text' name=stud_name ></td></tr>";
    echo "<tr align='center'><td>Email</td><td> <input type='text' name=sem></td></tr>";
    echo "<tr align='center'><td>Phone Number</td><td> <input type='text' name=course></td></tr>";
    echo "<tr align='center'><td>Address</td><td> <input type='text' name=phno></td></tr>";
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
    $stud_id=$_GET['stud_id'];
    $stud_name=$_GET['stud_name'];
    $sem=$_GET['sem'];
    $course=$_GET['course'];
    $phno=$_GET['phno'];
    $status=$_GET['status'];
    $email=$_GET['email'];
    $password=$_GET['password'];

    require "connection.php";
    // inserting data (new data)...............................
    if(isset($_GET['submit'])) {

        // checking primary key , if it exist or not ................................
        $str='select username from student';
        $result=mysqli_query($con, $str);
        while ($row=mysqli_fetch_array($result)) {
            if($row[0]==$username || $row[1]==$stud_id )
            {
                $uflag=1;
                echo "<p style='color: red;' align='center'>Attempting to duplicate Primary Key. This Username already exist. Please fill another data</p>";
                break;
            }
        }

        $str="insert into student values('".$username."', '".$stud_id."', '".$stud_name."', ".$sem.", '".$course."', ".$phno.", '".$status."', '".$email."', '".$password."');";
        echo $str;
        mysqli_query($con, $str);
        $flag=2;
        if($flag==2 && $uflag!=1) {
            header("location:admin.php");
        }
        else {
            header('location:add.php');

        }
    }
}
?>
</center>
</body>
</html>
