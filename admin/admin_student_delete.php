<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}

$username=$_GET['id'];
require "connection.php";
if($con) {
    // deleting the item
    $str="delete from student where username='".$username."'";
    echo $str;
    mysqli_query($con, $str);
    // drop the student marks table
    $str="drop table ".$username."";
    echo $str;
    mysqli_query($con, $str);
    header("location:student_dashboard.php");
}
?>
