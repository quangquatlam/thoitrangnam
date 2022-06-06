<?php
include("connect.php");
$sql="SELECT * from product order by id";
$result = mysqli_query($conn,$sql);
$total = mysqli_num_rows($result);
$ppage=16;
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
$a = "SELECT * FROM product order by id $paping";
$result = mysqli_query($conn,$a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hàng mới về</title>
  <?php
  include("header.php"); 
  ?>
  <section>
    <div class="container-fluid" id="header-picture">
      <div class="row">
        <img src="img/newin.jpg" class="img-responsive">
        <h2 class="text-center">Sản phẩm mới về</h2>
      </div>
      <div class="row">
        <?php while ($row=mysqli_fetch_array($result)) {
            ?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="chitiet.php?id=<?php echo $row['id']?>">
            <div class="card">
              <img  class="card-img-top" title="<?php echo$row['name'] ?>" src=<?php echo"'img/".$row['img']."'"?>>
            </div>
            <div class="card-body">
                <p><?php echo $row['name']?></p>
                <p><?php echo $row['price']?></p>
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
                      echo "<a href = 'hangmoive.php?p=$i' style = 'text-decoration: none;' > Trang cuối</a><br>" ;
                  }else if($i==1){
                      echo "<a href = 'hangmoive.php?p=$i ' style = 'text-decoration: none;'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i> Trang đầu </a> " ;
                  
                  }else{
                      if(($i>=$page-5) AND ($i<=$page+5))
                      echo "<a href = 'hangmoive.php?p=$i' style = 'text-decoration: none; margin:0px 5px 0px 5px'> $i</a> " ;
                  }
              }
          }
      
      ?>
      </div>
    </div>
  </section>
  <?php
  include("footer.php");
  ?>
</body>
</html>