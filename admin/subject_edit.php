<?php
ob_start();
session_start();
if($_SESSION['a'] !='admin') {
    header("location:login.php");
}
?>
<?php
$table_name=$_GET['exam_id'];
setcookie('table_name', $table_name, time()+60*60*8);
echo "
<!DOCTYPE html>
<html>
<head>
    <title>SIDE SLIDE</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

<font size='5' color='white'>";

echo "<div id='info'>Welcome : ".$_COOKIE['username']."<img src='photos/".$_COOKIE['username'].".jpg' width='75' height='75'></div>";
echo "
<ul id='nav' type='none'>
    <li id='home'><a class='sidelink' href='admin.php'>Home</a></li>
    <li><a class='sidelink' href='student_dashboard.php'>Student Menu</a></li>
    <li><a class='sidelink1' href='admin_student_add.php'>Add Student</a></li>
    <li><a class='sidelink1' href='middle_edit.php'>Edit Student</a></li>
    <li><a class='sidelink1' href='middle_delete.php'>Delete Student</a></li>
    <li><a class='sidelink' href='subject_dashboard.php'>Exam Menu</a></li>
    <li><a class='sidelink1' href='subject_add.php'>Add Subject</a></li>
    <li><a class='sidelink1' href='middle_edit_subject.php'>Edit Subject</a></li>
    <li><a class='sidelink1' href='middle_delete_subject.php'>Delete Subject</a></li>

    <li id='logout'><a class='sidelink' href='/finalProject/logout.php'>Logout</a></li></ul>
</ul>

</font>
<br><br>
<center>
<font size='3'>
<h3>Edit Questions</h3>
<form method='GET' action=''>";

require "connection.php";

    $str="select * from ".$table_name." where question_no=0;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);

    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'>Question No : ".$row[0]."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_0' value='".$row[1]."'></td></tr>";
    echo "<tr>
    <td>Option A :<input type='text' name='opt_a_0' value='".$row[3]."'></td>
    <td>Option B :<input type='text' name='opt_b_0' value='".$row[4]."'></td></tr>";
    echo "<tr><td>Option C : <input type='text' name='opt_c_0' value='".$row[5]."'></td><td>Option D : <input type='text' name='opt_d_0' value='".$row[6]."'></td></tr>";
    echo "<br>";
    echo "<tr><td>Answer : <input type='text' name='answer_0' value=".$row[2]."></td><td></td></tr>";
    echo "</table>";
    echo "<br>";

    // 1
    $str="select * from ".$table_name." where question_no=1;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'>Question No : ".$row[0]."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_1' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='text' name='opt_a_1' value='".$row[3]."'></td><td>Option B : <input type='text' name='opt_b_1' value='".$row[4]."'></td></tr>";
    echo "<tr><td>Option C : <input type='text' name='opt_c_1' value='".$row[5]."'></td><td>Option D : <input type='text' name='opt_d_1' value='".$row[6]."'></td></tr>";
    echo "<tr><td>Answer : <input type='text' name='answer_1' value=".$row[2]."></td><td></td></tr>";
    echo "</table>";
    echo "<br>";

    // 2
    $str="select * from ".$table_name." where question_no=2;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'>Question No : ".$row[0]."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_2' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='text' name='opt_a_2' value='".$row[3]."'></td><td>Option B : <input type='text' name='opt_b_2' value='".$row[4]."'></td></tr>";
    echo "<tr><td>Option C : <input type='text' name='opt_c_2' value='".$row[5]."'></td><td>Option D : <input type='text' name='opt_d_2' value='".$row[6]."'></td></tr>";
    echo "<tr><td>Answer : <input type='text' name='answer_2' value=".$row[2]."></td><td></td></tr>";
    echo "</table>";
    echo "<br>";

    // 3
    $str="select * from ".$table_name." where question_no=3;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900' >";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'>Question No : ".$row[0]."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_3' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='text' name='opt_a_3' value='".$row[3]."'></td><td>Option B : <input type='text' name='opt_b_3' value='".$row[4]."'></td></tr>";
    echo "<tr><td>Option C : <input type='text' name='opt_c_3' value='".$row[5]."'></td><td>Option D : <input type='text' name='opt_d_3' value='".$row[6]."'></td></tr>";
    echo "<tr><td>Answer : <input type='text' name='answer_3' value=".$row[2]."></td><td></td></tr>";
    echo "</table>";
    echo "<br>";

    // 4
    $str="select * from ".$table_name." where question_no=4;";
    $result=mysqli_query($con, $str);
    $row=mysqli_fetch_array($result);
    echo "<table border='1' width='900'>";
    echo "<tr align='center' bgcolor='#FFD76E'><td colspan='2'>Question No : ".$row[0]."</td></tr>";
    echo "<tr align='left'><td colspan='2'>Question : <input type='text' name='question_4' value='".$row[1]."'></td></tr>";
    echo "<tr><td>Option A :<input type='text' name='opt_a_4' value='".$row[3]."'></td><td>Option B : <input type='text' name='opt_b_4' value='".$row[4]."'></td></tr>";
    echo "<tr><td>Option C : <input type='text' name='opt_c_4' value='".$row[5]."'></td><td>Option D : <input type='text' name='opt_d_4' value='".$row[6]."'></td></tr>";
    echo "<tr><td>Answer : <input type='text' name='answer_4' value=".$row[2]."></td><td></td></tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='submit'>
    </form>";

if(isset($_GET['submit'])) {
    echo "<font color='red'>yaar submit toh ho raha hai.. </font>";
    $question_0=$_GET['question_0'];
    $answer_0=$_GET['answer_0'];
    $opt_a_0=$_GET['opt_a_0'];
    $opt_b_0=$_GET['opt_b_0'];
    $opt_c_0=$_GET['opt_c_0'];
    $opt_d_0=$_GET['opt_d_0'];
    $str="update ".$_COOKIE['table_name']." set question='".$question_0."', answer=".$answer_0.", opt_a='".$opt_a_0."', opt_b='".$opt_b_0."', opt_c='".$opt_c_0."', opt_d='".$opt_d_0."' where question_no=0;";
    mysqli_query($con, $str);
    echo $str."<br>";

    $question_1=$_GET['question_1'];
    $answer_1=$_GET['answer_1'];
    $opt_a_1=$_GET['opt_a_1'];
    $opt_b_1=$_GET['opt_b_1'];
    $opt_c_1=$_GET['opt_c_1'];
    $opt_d_1=$_GET['opt_d_1'];
    $str="update ".$_COOKIE['table_name']." set question='".$question_1."', answer=".$answer_1.", opt_a='".$opt_a_1."', opt_b='".$opt_b_1."', opt_c='".$opt_c_1."', opt_d='".$opt_d_1."' where question_no=1;";
    mysqli_query($con, $str);
    echo $str."<br>";


    $question_2=$_GET['question_2'];
    $answer_2=$_GET['answer_2'];
    $opt_a_2=$_GET['opt_a_2'];
    $opt_b_2=$_GET['opt_b_2'];
    $opt_c_2=$_GET['opt_c_2'];
    $opt_d_2=$_GET['opt_d_2'];
    $str="update ".$_COOKIE['table_name']." set question='".$question_2."', answer=".$answer_2.", opt_a='".$opt_a_2."', opt_b='".$opt_b_2."', opt_c='".$opt_c_2."', opt_d='".$opt_d_2."' where question_no=2;";
    mysqli_query($con, $str);
    echo $str."<br>";

    $question_3=$_GET['question_3'];
    $answer_3=$_GET['answer_3'];
    $opt_a_3=$_GET['opt_a_3'];
    $opt_b_3=$_GET['opt_b_3'];
    $opt_c_3=$_GET['opt_c_3'];
    $opt_d_3=$_GET['opt_d_3'];
    $str="update ".$_COOKIE['table_name']." set question='".$question_3."', answer=".$answer_3.", opt_a='".$opt_a_3."', opt_b='".$opt_b_3."', opt_c='".$opt_c_3."', opt_d='".$opt_d_3."' where question_no=3;";
    mysqli_query($con, $str);
    echo $str."<br>";

    $question_4=$_GET['question_4'];
    $answer_4=$_GET['answer_4'];
    $opt_a_4=$_GET['opt_a_4'];
    $opt_b_4=$_GET['opt_b_4'];
    $opt_c_4=$_GET['opt_c_4'];
    $opt_d_4=$_GET['opt_d_4'];
    $str="update ".$_COOKIE['table_name']." set question='".$question_4."', answer=".$answer_4.", opt_a='".$opt_a_4."', opt_b='".$opt_b_4."', opt_c='".$opt_c_4."', opt_d='".$opt_d_4."' where question_no=4;";
    mysqli_query($con, $str);

    header('location:subject_dashboard.php');
}
?>

</center>
</body>
</html>
<?php
ob_flush();
?>
