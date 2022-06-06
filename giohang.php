<?php
include("connect.php");
session_start();

    $tongtien=0;
    $dem=0;
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key=> $value){
            $dem++;
        }
        
    }

    if(isset($_SESSION['username'])){
        $dn=1;
    }else{
        $dn=0;
    }

    if($dem==0){
        $message="Giỏ hàng trống!";
    }else{
         $message="";
    }
    if(isset($_GET['mess'])){
        echo '<script language="javascript">alert("Đã mua hàng thành công");</script>';
        
    }
?>  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Giỏ hàng</title>
  <?php
  include("header.php");
  ?>
  <section>
    <div class="container-fluid" style="position: relative;top: 85px;">
      <h2>Giỏ hàng</h2>
      <div class="row text-center">
        <h3><?php echo $message?></h3>
      </div>
      <table class="table mt-4">
        <tr>
          <th>Tên sản phẩm</th>
          <th>Ảnh</th>
          <th>Size</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
          <th>Thành tiền</th>
          <th>Xóa</th>
        </tr>
        <?php
        $dem=0;
        if(isset($_SESSION['cart'])){
          foreach ($_SESSION['cart'] as $key=>$value) {
            $thanhtien=$value['price']*$value['soluong'];
            $tongtien+=$thanhtien;
            $dem++;
        ?>
        <tr>
          <td>
            <?php echo $value['name']?>
          </td>
          <td><img  style="width: 70px;" src=<?php echo"'img/".$value['img']."'"?>></td>
          <td><?php echo $value['size']?></td>
          <td class="input-sl" style="width: 50px;"><input type="number" value="<?php echo $value['soluong']?>"></td>
          <td><?php echo number_format($value['price']*1000,0,",",".")?>VND</td>
          <td><?php echo number_format($thanhtien*1000,0,",",".") ?>VNĐ</td>
          <td><a href="updatecart.php?id_del=<?php echo $key?>" class="btn-del">Xóa</a></td>


        </tr>
        <?php
        }
        ?>
      </table>
      <?php
        }else{
            $message="Giỏ hàng trống";
        }
        ?>
      <div class="row">
        <div class="tinhtoan col-sm-3" >
            <h1 style="background-color: white; margin-right:0">Chi tiết giá</h1>
            <p>Tổng tiền: <?php echo number_format($tongtien*1000,0,",",".")?> VNĐ</p>
            <a class="thanhtoan1" onclick="check(<?php echo $dem.','.$dn ?>)" href="dathang.php?kt=<?php echo $dem ?>&dn=<?php echo $dn?>"><b>Đặt hàng</b></a>
        </div>
        
      </div>

  
    </div>
  </section>
</body>
</html>