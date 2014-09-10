<?php
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
?>
<?php
    $exam_id=$_GET['exam_id'];
    // printing table ................................
    require "connection.php";
    $str="delete from subject where exam_id='".$exam_id."'";
    echo $str;
    mysqli_query($con, $str);

    $str="drop table '".$exam_id."'";
    echo $str;
    mysqli_query($con, $str);

    header("location:subject_dashboard.php");
?>
