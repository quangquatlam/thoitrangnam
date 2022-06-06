<?php
session_start();

include("connect.php");
if(isset($_GET['submit'])){
        $sl= $_GET['num'];
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $sql="SELECT * FROM product WHERE id=$id";
            //print_r($sql);exit();
            $rerult=mysqli_query($conn,$sql);
            $row =mysqli_fetch_array($rerult);
            if($row['price_sale']==0)
			 {
			 	$price=$row['price'];
			 }
			 else
			 {
			 	$price=$row['price_sale'];
			 }
        } 
        if(!isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]= array(
                'name'=> $row['name'],
                'img'=> $row['img'],
                "soluong"=>$sl,
                "size"=>$row['size'],
                "price"=>$price

            );

        }else{
            $_SESSION['cart'][$id]['soluong']+=$sl;
        }
        $url="chitiet.php?id=".$id."&num=".$sl;
        echo '<script language="javascript">alert("Thêm vào giỏ hàng thành công");</script>';
        header("Location:".$url);
      }


else{if(isset($_GET['idn']) && isset($_GET['numn'])){
 $sl= $_GET['numn'];
 $id= $_GET['idn'];
 $sql= "SELECT * FROM product WHERE id=$id";
 //print_r($sql);exit();
 $rerult=mysqli_query($conn,$sql);
 $row =mysqli_fetch_array($rerult);
 if($row['price_sale']==0)
 {
 	$price=$row['price'];
 }
 else
 {
 	$price=$row['price_sale'];
 }
 //rint_r($price);exit();
 if(!isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]= array(
     'name'=> $row['name'],
     'img'=> $row['img'],
     "soluong"=>$sl,
     "size"=>$row['size'],
     "price"=>$price
      );
    
}else{
 $_SESSION['cart'][$id]['soluong']+=$sl;
}
//print_r($_SESSION['cart'][$id]);exit();
header("Location:giohang.php");
}
}

?>