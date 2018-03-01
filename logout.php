<?php
if(isset($_COOKIE['login']))
{
    setcookie('login', null);
    header("Location: index.php");
}
else
    header("Location: index.php");
?>