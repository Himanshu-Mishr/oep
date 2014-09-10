<?php
session_start();
?>
<?php
require "connection.php";
$str="select * from student where username='".$_COOKIE['username']."';";
echo $str;
$result=mysqli_query($con, $str);
$row=mysqli_fetch_array($result);
$code=uniqid();
$otp_code=substr($code, -8);
echo $otp_code;
echo $username;
$str="update student set otp_code='".$otp_code."' where username='".$_COOKIE['username']."';";
echo $str;
mysqli_query($con, $str);
// $str="location:http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himanshu.m786@gmail.com:zxcasdqwe&senderID=onlineexam&receipientno=".$phno."&dcs=0&msgtxt=Hi you opt code is ".$otp_code."&state=4 ";
header('location:otp.php');
// header($str);

// $ch = curl_init();
// $user="himanshu.m786@gmail.com:zxcasdqwe";
// $receipientno="9330337999";
// $senderID="TEST SMS";
// $msgtxt="this is test message , test";
// curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
// $buffer = curl_exec($ch);
// if(empty ($buffer))
// { echo " buffer is empty "; }
// else
// { echo $buffer; }
// curl_close($ch);


?>
