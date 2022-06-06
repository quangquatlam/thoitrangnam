<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){     
    die("Không thể kết nối: " . mysqli_error());}
mysqli_select_db($conn,'thoitrangnam_framework') or die('Could not select database.');
mysqli_set_charset($conn,"utf8");
?>