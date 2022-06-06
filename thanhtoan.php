<?php
include("connect.php");
if(isset($_GET['id']) && isset($_GET['p'])){
	$id=$_GET['id'];
	$p=$_GET['p'];
	$update="UPDATE hoadon SET tinhtrangthanhtoan=1 where id_cart=$id";
	mysqli_query($conn,$update);
	$sql="SELECT * from chitiet_hoadon where id_cart=$id";
	//print_r($sql);exit();
	$result=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_array($result)) {
	    $idsp=$row['id_sp'];
	    $sl=$row['sl'];
	    $up="UPDATE product SET soluong=soluong-$sl where id=$idsp";
	    //print_r($up);exit();
	    mysqli_query($conn,$up);
	}
	$url="quanlydathang.php?=".$p;
	//print_r($url);exit();
	header('location:'.$url);



	}
?>