<?php
include("connect.php");
if(isset($_REQUEST['searchbtn'])){
  $search=addslashes($_GET['search-on']);
  $sql="SELECT * FROM product where name like'%$search%'";
  //print_r($sql);exit();

  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
}

?>





<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thời trang nam</title>
 <?php
 include("header.php");
 ?>
  <section>
  <div class="container-fluid" style="position: relative;top: 85px;">
    <div class="row text-center">
      <h2>
        <?php
        if(empty($search)){
        ?>
        <i class="fa fa-question-circle" aria-hidden="true" style="color:white;"></i><?php echo " Yêu cầu nhập tên sản phẩm cần tìm kiếm !"?>
        <?php
         }else {
          if ($num > 0 && $search != ""){
         ?>
         <i class="fa fa-check" aria-hidden="true" style="color:white;"></i><?php echo " Có $num sản phẩm phù hợp với từ khóa cần tìm kiếm '<b>$search</b>'";?>
      </h2>
    </div>
    <div class="row">
        <?php while ($row=mysqli_fetch_array($result)) {
            ?>
        <div class="col-md-3 col-sm-6 col-xs-6">
          <a href="chitiet.php?id=<?php echo $row['id']?>">
            <div class="card">
              <img src=<?php echo"'img/".$row['img']."'"?> class="card-img-top" title="$row['name'] ">
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
    <?php
         }
    ?>
     <?php
         }
    ?>
  </div>  

  </section>
  <section>
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