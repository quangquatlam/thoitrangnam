<?php
session_start();
include("connect.php"); 
if (isset($_SESSION['username']))
{
unset($_SESSION['username']);
}
header('location:thoitrangnam.php');   
echo '<script type="text/javascript">  alert("đăng xuất thành công"); </script>';
?>