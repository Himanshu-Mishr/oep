<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
else {
    $flag=0;
    $username=$_GET['id'];
    require "connection.php";
    if($con) {
    $str="select status from student where username='".$username."'";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    if($row[0]=='n' || $row[0]=='') {
        // then update it to y
            $str="update student set status='y' where username='".$username."'";
            mysqli_query($con, $str);
            $flag=1;
    }
    else{ // then update it to n
            $str="update student set status='n' where username='".$username."'";
            mysqli_query($con, $str);
            $flag=1;
    }
    if($flag==1) {
        header("location:admin.php");
    }
    }
}
?>
