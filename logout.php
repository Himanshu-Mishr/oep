<?php
session_start();
session_destroy();
            setcookie("username", $_COOKIE['username'], time()-60*60*8);
            setcookie('id', $_COOKIE['id'], time()-60*60*8);
            setcookie('name', $_COOKIE['name'], time()-60*60*8);
            setcookie('email', $_COOKIE['email'], time()-60*60*8);
            setcookie('phno', $_COOKIE['phno'], time()-60*60*8);
            setcookie('address', $_COOKIE['address'], time()-60*60*8);
            setcookie("password", $_COOKIE['password'], time()-60*60*8);
            /* task in this file:
                *delete all the cookie,
                *close the session and
                *exit to login page
            */
?>
<!DOCTYPE html=en>
<html>
<head>

</head>

<body bgcolor='#0000' text='white'>
<?php

echo "<h1>LOGOUT</h1>";
header("location:login.php");
?>

</body>
</html>
