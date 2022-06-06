<?php
include("connect.php");
session_start();
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
}else{
        $username='unknow';
    }
if(isset($_GET['kt'])){
        $kt=$_GET['kt'];
        $kt= (int) $kt;
        if($kt==0){
            header('Location:thoitrangnam.php');
        }
        if(isset($_GET['dn'])){
            $dn=$_GET['dn'];
            $dn= (int) $dn;
            if($dn==0){
                header('location:dangnhap.php');
            }
        }
    }
$errortenkh='';$errorphone='';$errordiachi='';
if(isset($_POST['tenkh'])){
        $tenkh= $_POST['tenkh'];
    }else{
        $tenkh='';
    }
    if(empty($_POST['tenkh'])){
        $errortenkh="*";
    }
    if(isset($_POST['phone'])){
        $phone= $_POST['phone'];
    }else{
        $phone='';
    }
    if(empty($_POST['phone']) ){
        $errorphone="*";
    }
    if(isset($_POST['diachi'])){
        $diachi= $_POST['diachi'];
    }else{
        $diachi='';
    }
    if(empty($_POST['diachi'])){
        $errordiachi="*";
    }
    if(isset($_POST['ghichu'])){
        $note= $_POST['ghichu'];
    }else{
        $note='';
    }
     if(isset($_POST['btn_dathang'])){
        if($tenkh =='' || $phone==0 || $diachi==''){
            echo '<script language="javascript">alert("Bạn chưa điền đủ thông tin");</script>';
        }else{
            $date= date("Y-m-d");
            $id_kh=$username;
            $tongtien=0;
            $demsp=0;
        
            foreach($_SESSION['cart'] as $key =>$val){
                $demsp=$demsp+ $val['soluong'];
                $thanhtien= $val['price']*$val['soluong'];
                $tongtien+=$thanhtien;
            }
            $tinhtrangthanhtoan=0;
            $sql="INSERT INTO hoadon (id_kh, tenkh, sl_sp, tongtien, ngaydathang, sdt, diachi, ghichu,tinhtrangthanhtoan)
            VALUES ('$username', '$tenkh', $demsp, $tongtien, '$date', $phone, '$diachi', '$note',$tinhtrangthanhtoan)";
            //print_r($sql);exit();
            if(mysqli_query($conn,$sql)){
                $id=mysqli_insert_id($conn);
                foreach($_SESSION['cart'] as $key =>$val){
                    $namett= $val['name'];
                    $demsp= $val['soluong'];
                    $id_sp= $key;
                    $sl_sp=$val['soluong'];
                    $size_sp=$val['size'];
                    $price_sp=$val['price'];
                    $thanhtien= $val['price']*$val['soluong'];
                    $sql="INSERT INTO chitiet_hoadon (id_cart,id_kh ,id_sp, ten_sp, size, sl, gia, thanhtien, ngaydathang)
                    VALUES ($id,'$id_kh','$id_sp' ,'$namett','$size_sp','$sl_sp',$price_sp,$thanhtien,'$date')";
                    mysqli_query($conn,$sql);
                    //print_r($sql);exit();
                }
                unset($_SESSION['cart'],$id,$id_sp,$size_sp,$sl_sp,$price_sp,$thanhtien,$date);
                
                header('location:giohang.php?mess=1');
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thời trang nam</title>
  <?php
  include("header.php"); 
  ?>
<section>
	<div class="container" style="position: relative;top: 90px;">
	    <div class="row">
	      <legend class="text-center">
	       <h2>Điền thông tin vào bảng sau</h2>
	      </legend> 
	      <form action="" method="post" class="form" role="form"> 
	        <div class="row"> 
	          <div class="col-sm-8 col -md-4 col-xs-12 col-md-offset-2">
              <div class="form-group">
                <label for="" class="labelpadding" >Họ và tên</label>
                <span><?php echo $errortenkh?></span>
                <input class="form-control" name="tenkh" placeholder="Nhập họ và tên của bạn " required="" type="text">
              </div> 
              <div class="form-group">
                <label for="" class="labelpadding">Số điện thoại</label>
                <span style="color: red;font-weight: bold;"><?php echo $errorphone?></span>
                <input class="form-control" name="phone" placeholder="Số  điện thoại">
              </div>
              <div class="form-group">
                <label for="" class="labelpadding">Địa chỉ</label>
                <span style="color: red;font-weight: bold;"><?php echo $errordiachi?></span> 
                <input class="form-control" name="diachi" placeholder="Nhập địa chỉ của bạn" type="">
              </div>
              <div class="form-group">
                <label for=""class="labelpadding">Ghi chú</label>
                <input class="form-control" name="ghichu" placeholder="" type="text" style="margin-top: 10px">
              </div>
              <div class="row" style="display: flex; margin-left: 7px;margin-top: 10px;">
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 150px;" name="btn_dathang"> Đặt hàng</button>
              </div>
	          </div>
	        </div>  
	      </form> 
	    </div>
	  </div>
</section>