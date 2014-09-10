<?php
session_start();
if($_SESSION['a'] !='user') {
    header("location:login.php");
}
?>
<!--
    this page will display all the past history analysis of the student.
    No of test he has given.
 -->


<!DOCTYPE html>
<html>
<head>
    <title>SIDE SLIDE</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
 #input_info {
    color: black;
    padding: 300px 10px;
 }
 #rules {
    padding: 70px;
 }
</style>
</head>
<body>

<font size="5" color="white">
<?php
echo "<div id='info'>Welcome : ".$_COOKIE['username']."<img src='photos/".$_COOKIE['username'].".jpg' width='75' height='75'></div>";
?>
<ul id="nav" type="none">
    <li id="home"><a class='sidelink' href="student.php">Home</a></li>
    <li><a class='sidelink' href="ranking.php">Global Ranking</a></li>
    <li><a class='sidelink' href="exam_dashboard.php">Exam Dashboard</a></li>
    <li><a class='sidelink' href="take_test.php">Take a Test</a></li>
    <li><a class='sidelink' href="edit.php">Edit Your Details</a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href="rules_and_regulations.php">Rules and Regulations</a></li>

    <li id="logout"><a class='sidelink' href="/finalProject/logout.php">Logout</a></li></ul>
</ul>
</font>
<font size='4'>
<center>
<div id='rules'>
<table width='750'> <tr><td align="center" ><h3>Rules And Regulations</h3></td></tr><td align="left">
A candidate may be prohibited from participating in this Exam if, in OnlineExam.com's sole discretion, OnlineExam.com reasonably believes that the candidate has attempted to undermine the legitimate operation of the Exam by:


<ul>
    <li>Providing false information concerning his/her identity, postal address, mail address or telephone number;</li>
    <li>Breaching any of the provisions set forth in these Terms;</li>
    <li>Threatening, harassing or interfering with the ability of other candidates to effectively participate in the Exam;</li>
    <li>Threatening, harassing or interfering with OnlineExam.com administrators or other employees;</li>
    <li>Communicating or publishing information concerning the content of the problems, or solutions to the problems, with other candidates, either directly or indirectly.</li>


</ul>
OnlineExam.com further reserves the right to disqualify any submission that it believes in its sole and unfettered discretion infringes upon or violates the rights of any third party or otherwise does not comply with these Terms.
</td></tr> </table>
</div>
</center>
</font>
</body>
</html>

