<?php
ob_start();
session_start();
if($_SESSION['a'] !='user') {
    header("location:login.php");
}
setcookie('exam_id', $_GET['id'], time()+60*60*8);
// insert operation ..
require "connection.php";
$str="insert into ".$_COOKIE['username']." values('".$_COOKIE['exam_id']."', 0, now(), now());";
mysqli_query($con, $str);

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
</style>
</head>
<body>

<font size="5" color="white">
<?php
echo "<div id='info'>Welcome : ".$_COOKIE['username']."<img src='photos/".$_COOKIE['username'].".jpg' width='75' height='75'></div>";
?>

<ul id="nav" type="none">
    <li id="home"><a class='sidelink' href="">Exam ID : <?php
    echo "<font color=yellow>".$_COOKIE['exam_id']."</font>";?></a></li>
    <li><a class='sidelink1' href="#Q1">Question 1</a></li>
    <li><a class='sidelink1' href="#Q2">Question 2</a></li>
    <li><a class='sidelink1' href="#Q3">Question 3</a></li>
    <li><a class='sidelink1' href="#Q4">Question 4</a></li>
    <li><a class='sidelink1' href="#Q5">Question 5</a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href=""></a></li>
    <li><a class='sidelink1' href="rules_and_regulations.php">Rules and Regulations</a></li>

    <li id="logout"><a class='sidelink' href="/finalProject/logout.php">Logout</a></li></ul>
</ul>
</font>

<center>
<font size='3'>

<form name="counter" method='GET' action=''>Time Left : <input type="text" size="8"
name="d2" >mm:ss</form>
<script>

 var sec=0
 var mins=10
 document.counter.d2.value='10:00'
function display(){
if (sec == 0 && mins == 0) {
    // document.form1.submit.value=true;
    document.form['form1']['submit'].value = 'ture';
}
 if (sec<=0){
    sec=59   // incrementing second
    mins-=1  // decrement a mins
 }

 if (mins<=-1){  // if calculation becomes negative
    sec=0
    mins+=1
 }
 else
    sec-=1
    document.counter.d2.value=mins+":"+sec
    setTimeout("display()",1000)
}
display()
</script>
<h3>Questions</h3>

<form name='form1' method='GET' action=''>

<?php
    require "connection.php";
    $table_name=$_COOKIE['exam_id'];
    // 0
    $str="select * from ".$table_name." where question_no=0;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900'>";
    // question number
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'><a name='Q1'></a>Question No : ".($row[0]+1)."</td></tr>";
    // question text
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_0' value='".$row[1]."'></td></tr>";
    // opt A and opt B
    echo "<tr>
    <td>Option A :<input type='radio' name='ans_0' value='1'>'".$row[3]."'</td>
    <td>Option B :<input type='radio' name='ans_0' value='2'>'".$row[4]."'</td></tr>";
    // opt C and opt D
    echo "<tr><td>Option C : <input type='radio' name='ans_0' value='3'>'".$row[5]."'</td><td>Option D : <input type='radio' name='ans_0' value='4'>'".$row[6]."'</td></tr>";
    echo "<br>";

    echo "</table>";
    echo "<br>";

    // 1
    $str="select * from ".$table_name." where question_no=1;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'><a name='Q2'></a>Question No : ".($row[0]+1)."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_1' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='radio' name='ans_1' value='1'>'".$row[3]."'</td><td>Option B : <input type='radio' name='ans_1' value='2'>'".$row[4]."'</td></tr>";
    echo "<tr><td>Option C : <input type='radio' name='ans_1' value='3'>'".$row[5]."'</td><td>Option D : <input type='radio' name='ans_1' value='4'>'".$row[6]."'</td></tr>";

    echo "</table>";
    echo "<br>";

    // 2
    $str="select * from ".$table_name." where question_no=2;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'><a name='Q3'></a>Question No : ".($row[0]+1)."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_2' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='radio' name='ans_2' value='1'>'".$row[3]."'</td><td>Option B : <input type='radio' name='ans_2' value='2'>'".$row[4]."'</td></tr>";
    echo "<tr><td>Option C : <input type='radio' name='ans_2' value='3'>'".$row[5]."'</td><td>Option D : <input type='radio' name='ans_2' value='4'>'".$row[6]."'</td></tr>";

    echo "</table>";
    echo "<br>";

    // 3
    $str="select * from ".$table_name." where question_no=3;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'><a name='Q4'></a>Question No : ".($row[0]+1)."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_3' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='radio' name='ans_3' value='1'>'".$row[3]."'</td><td>Option B : <input type='radio' name='ans_3' value='2'>'".$row[4]."'</td></tr>";
    echo "<tr><td>Option C : <input type='radio' name='ans_3' value='3'>'".$row[5]."'</td><td>Option D : <input type='radio' name='ans_3' value='4'>'".$row[6]."'</td></tr>";

    echo "</table>";
    echo "<br>";

    // 4
    $str="select * from ".$table_name." where question_no=4;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'><a name='Q5'></a>Question No : ".($row[0]+1)."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_4' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='radio' name='ans_4' value='1'>'".$row[3]."'</td><td>Option B : <input type='radio' name='ans_4' value='2'>'".$row[4]."'</td></tr>";
    echo "<tr><td>Option C : <input type='radio' name='ans_4' value='3'>'".$row[5]."'</td><td>Option D : <input type='radio' name='ans_4' value='4'>'".$row[6]."'</td></tr>";

    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='submit' value=''>";

    // header('location:result.php');
?>
</form>




<?php
$flag=0;
if(isset($_GET['submit'])) {
    $marks=0;
    echo $_GET['ans_0']."---". $_GET['ans_1']."---".$_GET['ans_2']."---".$_GET['ans_3']."---".$_GET['ans_4'];
    $str="select answer from ".$table_name." where question_no=0;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    if($row[0] == $_GET['ans_0'])
        $marks++;

    $str="select answer from ".$table_name." where question_no=1;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    if($row[0] == $_GET['ans_1'])
        $marks++;

    $str="select answer from ".$table_name." where question_no=2;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    if($row[0] == $_GET['ans_2'])
        $marks++;

    $str="select answer from ".$table_name." where question_no=3;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    if($row[0] == $_GET['ans_3'])
        $marks++;

    $str="select answer from ".$table_name." where question_no=4;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    if($row[0] == $_GET['ans_4'])
        $marks++;

    // update operation
    $str="update ".$_COOKIE['username']." set marks_obt=".$marks.", time_end=now() where exam_id='".$table_name."';";
    echo $str;
    mysqli_query($con, $str);
    setcookie('exam_id', $_COOKIE['exam_id'], time()-60*60*8);

    $str="location:result.php?marks=".$marks."";
    header($str);
}
?>
</body>
</html>

<?php
ob_flush();
?>
