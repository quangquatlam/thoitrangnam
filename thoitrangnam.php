<?php
include("connect.php");
$sql="SELECT * from product ORDER BY id ASC limit 8";
$result=mysqli_query($conn,$sql);
//print_r($result);exit();
/*if(mysqli_num_rows($result))
{
  while ($row=mysqli_fetch_array($result)) {
    print_r($row['name']);
      
  }
}
exit();
*/
 session_start();
$sale="SELECT * FROM product where price_sale>0  order by id DESC limit 8";
$spsale=mysqli_query($conn,$sale);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thời trang nam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="thoitrangnam.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="thoitrangnam.js"></script>
</head>
<body>
  <section>
    <nav class="navbar navbar-fixed-top navbar-default navbar-expand-lg">
      <div class="container-fluid" id="header-fashion">
        <div class="navbar-header" style="height: 65px;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="thoitrangnam.php">
            <img src="img/logo.png" alt="logo">
          </a>
        </div>
        <div class="collapse navbar-collapse navbar-left" id="myNavbar">
          <ul class="nav navbar-nav" id="header-fashion-content">
            <li><a href="thoitrangnam.php">Trang chủ</a></li>
            <li><a href="hangmoive.php">Hàng mới về <i class="badge bg-danger">new</i></a></li>
            <li><a href="sieusale.php">Siêu sale <i class="badge bg-danger">hot</i></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục sản phẩm  <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="loaisp.php?id=1">Áo sơ mi nam</a></li>
                <li><a href="loaisp.php?id=2">Áo khoác nam</a></li>
                <li><a href="loaisp.php?id=3">Áo thun nam</a></li>
                <li>
                  <a href="loaisp.php?id=4">Phụ kiện nam</a>
                  
                </li>
                <li><a href="loaisp.php?id=5">Quần nam</a></li>
              </ul>
            </li>
          </ul>
          <div class="navbar-right"style="background-color :white;display: flex;">
            <ul class="nav navbar-nav navbar-right" style="background-color: white;padding-top: 8px;">
              <li>
                <form action="searchsp.php" class="navbar-form navbar-left form-group" name="search" method="get"required on style="background-color: white;">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Bạn cần tìm gì ?" name="search-on">
                </div>
                <button type="submit" class="btn btn-default" name="search btn">
                <span class="glyphicon glyphicon-search"></span>
                </button>
              </form>
              </li>
              <li><a href="giohang.php" class="glyphicon glyphicon-shopping-cart" style="font-size: 25px;"></a></li>
              <li style="display: flex;"><a href="dangnhap.php"><span class=" fas fa-user-circle" style="font-size: 25px;"></span>
                <?php
                if(empty($_SESSION['username']))
                {
                  echo 'Sign up';
                }
                else{
                  echo $_SESSION['username'];
                ?>
              
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="logout.php">Đăng xuất</a></li>
                <?php
              }
                ?>
              </a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </section>
  <section>
    <div class="container-fluid" id="header-picture">
      <div class="row" id="fashion-note">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div  class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                 <div class="item active">
                  <p> <i class="fa fa-whatsapp " style="color: red;font-size: 15px;">
                      Hotline:0366514214 </i></p>
                 </div>
                  <div class="item">
                    <p>Miễn phí giao hàng toàn quốc với đơn hàng trên 500k</p>
                  </div>
                  <div class="item">
                      <p>ĐỔI HÀNG MIỄN PHÍ-Tại tất cả cửa hàng trong 15 ngày</p>
                  </div>
              </div>
            </div>
        </div>     
      </div>
      <div class="row" id="fashion-centent-picture">
        <div class="col-sm-12 col-sm-12 col-xs-12">
          <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-id" data-slide-to="1" class=""></li>
              <li data-target="#carousel-id" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                <img  alt="First slide" src="img/slideshow_1.jpg" class="picture-sile">
               </div>
                <div class="item">
                  <img alt="Second slide" src="img/g127.jpg" class="picture-sile">
                </div>
                <div class="item">
                  <img alt="Second slide" src=img/anh sile4.jpg" class="picture-sile">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
       </div>
      </div>
      <div class="row">
        <div class="col-sm-12" style="text-align: center;">
          <h3>NEW IN</h3>
        </div>
      </div>
      <div class="row">
        <?php while ($row=mysqli_fetch_array($result)) {
            ?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="chitiet.php?id=<?php echo $row['id']?>">
            <div class="card">
              <img  class="card-img-top" title="<?php echo$row['name']?>"src=<?php echo"'img/".$row['img']."'"?>>
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
        <div class="row text-center" style="height: 50px;">
          <div class="col-sm-12 col-xs-12 col-md-12">
            <a href="hangmoive.php" role="button" class="btn btn-primary">Xem thêm</a>
          </div>
        </div>
        
  </section>
  <section>
    <div class="container-fluid" id="fashion-sale">
      <div class="row">
        <div class="picture-sale" style="width: 100%;">
          <a href="sieusale.php">
            <img src="img/sale.png" alt="sale" class="img-responsive" style="width: 100%;">
          </a>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-sm-12">
          <h3>Sale up to 50%</h3>
        </div>
      </div>
      <div class="row">
        <?php while ($row=mysqli_fetch_array($spsale)) {?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="chitiet.php?id=<?php echo $row['id']?>">
            <div class="card">
              <img class="card-img-top" title="<?php echo $row['name']?>" src=<?php echo"'img/".$row['img']."'"?>>
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
        
      <div class="row text-center" style="height: 50px; padding-bottom: 10px;">
        <div class="col-sm-12 col-md-12 col-xs-12">
          <a href="sieusale.php" role="button" class="btn btn-primary">Xem thêm</a>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container-fluid" id="fashion-footer" style="margin-top: 20px;">
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
  <style>.fb-livechat, .fb-widget{display: none}.ctrlq.fb-button, .ctrlq.fb-close{position: fixed;top:500px;right:24px; cursor: pointer}.ctrlq.fb-button{z-index: 999; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff; width: 60px; height: 60px; text-align: center; bottom: 30px; border: 0; outline: 0; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; -ms-border-radius: 60px; -o-border-radius: 60px; box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16); -webkit-transition: box-shadow .2s ease; background-size: 80%; transition: all .2s ease-in-out}.ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1); box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 54px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px; border-radius: 50%;}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size: 13px;}</style><div class="fb-livechat"> <div class="ctrlq fb-overlay"></div><div class="fb-widget"> <div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/tamlong.nguyen.39" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div><div class="fb-credit"> <a href="https://www.facebook.com/" target="_blank" >Powered by TT</a> </div><div id="fb-root"></div></div><a href="https://www.facebook.com/profile.php?id=100009020516293" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"> <div class="bubble">1</div><div class="bubble-msg">Bạn cần hỗ trợ?</div></a></div><script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script>jQuery(document).ready(function($){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script>
</body>
</html>
<?php
mysqli_close($conn);
?>