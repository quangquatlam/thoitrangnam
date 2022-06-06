<?php
include("connect.php");
$sql="SELECT * from product where price_sale>0";
$result = mysqli_query($conn,$sql);
$total = mysqli_num_rows($result);
$ppage=12;
$maxpage = ceil($total/$ppage);
if(isset($_GET['p'])){
  $page = $_GET['p'];
  $page = (int) $page;
  if($page>$maxpage){
    $page = $maxpage;
  }else if($page<=0){
    $page = 1;
  }
}else{ 
    $page=1;
  }

$start=$ppage*($page-1);
$paping="LIMIT $start,$ppage";
$a = "SELECT * FROM product where price_sale>0 $paping";
$result = mysqli_query($conn,$a);

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Siêu sale</title>
  <?php 
  include("header.php");
  ?>
    <div class="container-fluid" id="header-picture">
      <div class="row">
        <img src="img/sale.png" class="img-responsive" style="width: 100%;">
        <h2 class="text-center">Siêu sale</h2>
      </div>
      <div class="row">
        <?php while ($row=mysqli_fetch_array($result)) {?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href=""chitiet.php?id=<?php echo $row['id']?>"">
            <div class="card">
              <img class="card-img-top" title="<?php echo $row['name']?>" src=<?php echo"'img/".$row['img']."'"?>  >
            </div>
            <div class="card-body">
                <a href="#"><?php echo $row['name']?></a>
                <p><?php echo $row['price']?> <del class="sale-del"><?php echo $row['price_sale']?></del></p>
            </div>
          </a>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="row center-block">
      <div class="pagination " style="  display:flex;justify-content: center;font-size:20px;background-color:#f4f4f4; width:200px;border-radius:8px;left: 50%;margin-left: 40%; ">
      <?php
          for($i=1;$i<=$maxpage;$i++){
            
              if($i==$page){
                  echo "<a style = 'color:orangered;font-size: 20;text-decoration: none;'><i class='fa fa-circle 'style='font-size:8px;' aria-hidden='true'></i> $i <i class='fa fa-circle 'style='font-size:8px;' aria-hidden='true'></i></a> " ;
              }else{
                  if($i==$maxpage){       
                      echo "<a href = 'sieusale.php?p=$i' style = 'text-decoration: none;' > Trang cuối</a><br>" ;
                  }else if($i==1){
                      echo "<a href = 'sieusale.php?p=$i ' style = 'text-decoration: none;'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i> Trang đầu </a> " ;
                  
                  }else{
                      if(($i>=$page-5) AND ($i<=$page+5))
                      echo "<a href = 'sieusale.php?p=$i' style = 'text-decoration: none; margin:0px 5px 0px 5px'> $i</a> " ;
                  }
              }
          }
      
      ?>
      </div>
    </div>
  </section>
  <section>
    <div class="container-fluid" id="fashion-footer">
      <div class="row">
        <div class="col-xs-6 col-md-3 col-sm-6" >
          <div class="fashion-footer-title">
            <h4>VNN Shop</h4>
          </div>
          <div class="fashion-footer-content">
            <p>VNN Shop Chuỗi cửa hàng bán lẻ thời trang nam với xu hướng thời trang hiện đại luôn luôn cập nhật nhanh nhất những trend thời trang mới trên thế giới. <br>
            Chúng tôi là đại lý phân phối các thương hiệu chính hãng như: ICON DENIM, RUNPOW, NOMOUS ESSENTIALS, ...
            </p>  
          </div>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6">
          <div class="fashion-footer-title">
           <h4>Chính sách</h4>
          </div>
          <div class="fashion-footer-ul">
            <ul>
              <li class="item-footer">
                <a href="#">Hướng dẫn đặt hàng</a>
              </li >
              <li class="item-footer">
                <a href="#">Chính sách đổi trả</a>
              </li>
              <li class="item-footer">
                <a href="#">Kiểm tra đơn hàng</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6">
          <div class="fashion-footer-title">
             <h4>Kết nối với VNN Shop</h4>
          </div>
          <div class="fashion-footer-contact">
            <ul>
              <li>
                <a href="#"><i class="fa fa-facebook-official"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-youtube"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-zalo"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6">
          <div class="fashion-footer-title">
            <h4>
              Chăm sóc khách hàng
            </h4>
          </div>
          <div class="fashion-footer-hottline">
            <p>Hotline <span class="fa fa-phone"></span> 0366514214
            </p>
            <p> Tất cả các ngày trong tuần </p>
          </div>
          
        </div>
      </div>
    </div>
  </section>
</body>
</html>