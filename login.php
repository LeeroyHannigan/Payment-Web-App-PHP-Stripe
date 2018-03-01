<?php
//Sanitize
$POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);

$uname = $POST['uname'];
$psw = $POST['psw'];

// check user name and password is correct
if($uname == "username" && $psw=="password"){
     setcookie("login", "accepted");//Set cookie
     header("Location: index.php");
}
else
    header("Location: index.php");

?>