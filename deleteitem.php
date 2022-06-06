<?php
include("connect.php");
if(isset($_GET['id']) && isset($_GET['p'])){
	$id=$_GET['id'];
	$id=(string)$id;
	$p=$_GET['p'];
	$sql="DELETE FROM product where id=$id";
	$url="viewsuaxoa.php?=".$p;
	if(mysqli_query($conn,$sql)){
		header('location:'.$url);
	}
	else {
		echo 'Có lỗi trong quá trình xử lý'.mysqli_error($conn);
	}
	mysqli_close($conn);
	unset($sql,$id);
}
?>