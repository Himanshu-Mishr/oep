<?php
session_start();
if($_SESSION['a'] !='user') {
    header("location:login.php");
}
?>
<?php
$name=$_POST['name'];

$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","PNG","GIF");
$extension = end(explode(".", $_FILES["file"]["name"])); // getting the suffix

// checking file type
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/PNG")
|| ($_FILES["file"]["type"] == "image/GIF")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 6000000)  // limiting the file size, .. 600kb
&& in_array($extension, $allowedExts))  // blocking certain file type
  {
  if ($_FILES["file"]["error"] > 0) // error checking in file
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

	$photo=$name.".".$extension;   // adding the extension


    if (file_exists("photos/" . $photo)) // avoiding duplicate
      {
      echo $photo. " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "photos/".$photo); // moving file
	  echo $photo." uploaded in the system";
      require "connection.php";
      $path="photos/".$photo;
      $str="insert into ".$_COOKIE['username']."_photo ('".$path."');";
      mysqli_query($con, $str);
      }
    }
  }
else
  {
  echo "Invalid photo file";
  }
?>
