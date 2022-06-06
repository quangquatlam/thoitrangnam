<?php
session_start();
include("connect.php");
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="SELECT * FROM product where id='$id'";
  //print_r($sql);exit();
  $result=mysqli_query($conn,$sql);
  if($result){
    $row=mysqli_fetch_array($result);
  }
  else{
    echo "Xảy ra lỗi khi truy vấn dữ liệu";
  }
}
if(isset($_GET['num'])){
      $num=$_GET['num'];
    }else{
      $num=1;
    }
if($row['price_sale']==0){
    $price=$row['price'];
}
else {
$price=$row['price_sale'];
}
$splienquan="SELECT * FROM product where id <>$id and price_sale=0 LIMIT 4";
//print_r($splienquan);exit();
$splienquansale="SELECT * FROM product where id<>$id and price_sale>0 LIMIT 4";
$splq=mysqli_query($conn,$splienquan);
$splqs=mysqli_query($conn,$splienquansale);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo $row['name']?></title>
  <?php
  include("header.php");
  ?>
  <section>
    <div class="container-fluid" style="position: relative;top: 100px;">
      <div class="row">
        <div class="photo-6-inf-left col-lg-6" id="zoomIn">
          
          <img class="img-fluid" class="img-fluid" src=<?php echo"'img/".$row['img']."'"?>>
        </div>
        <div class="photo-6-inf-right col-lg-6">

          <h3 class="hny-title text-left" style="color: #ff7315ce">Chi Tiết Sản Phẩm</h3>
          <form action="addcart.php" method="GET" class="signin-form mt-lg-5 mt-4">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
          <div class="product-content">
            <h4 class="title" style="padding-top: 10px;">Tên sản phẩm: <?php echo $row["name"]?></h4>
            <h4 style="padding-top: 10px;">Size: <?php echo $row['size']?></h4>
          </div>

          <div class="product-content">
          <span class="price" style="font-weight: bold;font-size: 20px;">Giá: <?php echo number_format($price*1000,0,",","."); ?> VNĐ</span>
          </div>
          <p style="font-size: 15px; font-weight: bold ;padding-top: 10px;">Số lượng: <input type="number" name="num" value="<?php echo $num   ?>" style="width: 50px;"></p>
          <h4><span> Số lượng còn trong kho <?php echo$row['soluong']?></span></h4>
          <p style="color:  #ff7315ce;padding-top: 10px;font-size: 20px;">Ghé thăm cửa hàng để xem những sáng tạo tuyệt vời từ các nhà thiết kế của chúng tôi.</p>
          <input class="addcart" type="submit" name="submit" value="Thêm vào giỏ hàng" style="border-radius: 25px 25px 25px;font-size: 25px;padding: 3px;"> 
          <a id="addnow" href="addcart.php?idn=<?php echo $row['id']?>&numn=1" class="read-more-btn" style="margin-left: 10px;">Mua Ngay</a> 
          <div class="mota">
            <label>Mô tả</label>
            <p><?php echo $row['mota']?></p>
          </div>
          </div>       
          </form>
        </div>           
          </div>
</section>
<section>
  <div class="container-fluid" style="position: relative; top: 250px;">
    <div class="row text-center">
        <h2>Có thể bạn thích</h2>
      </div>
      <div class="row">
        <?php while ($row=mysqli_fetch_array($splq)) {
            ?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="chitiet.php?id=<?php echo $row['id']?>">
            <div class="card">
              <img  class="card-img-top" title="$row['name'] "src=<?php echo"'img/".$row['img']."'"?>>
            </div>
            <div class="card-body">
                <p><?php echo $row['name']?></p>
                <p><?php echo number_format($row['price']*1000,0,",",".") ?> VND</p>
            </div>
          </a>
        </div>
        <?php
        }
        ?>
         <div class="row">
        <?php while ($row=mysqli_fetch_array($splqs)) {?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="chitiet.php?id=<?php echo $row['id']?>">
            <div class="card">
              <img class="card-img-top" title="<?php echo $row['name']?>"  src=<?php echo"'img/".$row['img']."'"?>>
            </div>
            <div class="card-body">
                <a href="#"><?php echo $row['name']?></a>
                <p><?php echo number_format($row['price_sale']*1000,0,",",".") ?> <del class="sale-del"><?php echo number_format($row['price']*1000,0,",",".") ?> VND</del></p>
            </div>
          </a>
        </div>
        <?php
        }
        ?>
        
    </div>

  </section>
</body>
</html>