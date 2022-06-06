<?php
include("connect.php");
session_start();
if(isset($_POST['dangnhap'])){
$username=($_POST['username']);
$password=($_POST['password']);
if (!$username || !$password) {
echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}
$password=md5($password);
$sql="SELECT* from users where name='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)!=0){
$_SESSION['username']=$username;
if($_SESSION['username']!= 'admin' ){
  if(isset($_SESSION['username'])){
    header('location:thoitrangnam.php');
  }
}else{
      header('location:viewsuaxoa.php');
  }
}
else {
  echo '<script type="text/javascript">  alert("Tài Khoản Không tồn tại");window.location="dangky.php"</script>';
}
 } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng nhập</title>
  <?php
  include("header.php");
  ?>
  <section>
   <div class="container" style="position: relative;top: 90px;">
      <div class="row">
        <legend class="text-center">
         <h2>Đăng nhập</h2>
         <span>Nếu bạn đã có tài khoản đăng nhập tại đây</span>
        </legend>
      </div>
       <form action="dangnhap.php" method="post" class="form" role="form"> 
          <div class="row"> 
            <div class="col-sm-8 col -md-4 col-xs-12 col-md-offset-2">
              <label class="labelpadding" >Tên đăng nhập</label>
              <input class="form-control" name="username" placeholder="Nhập tên đăng nhập " required="" type="text"> 
              <label  class="labelpadding">Mật khẩu</label>
              <input class="form-control" name="password" placeholder="Nhập mật khẩu của bạn" type="password">
              <div class="row" style="padding-top: 15px;padding-left: 15px;">
                <span >Bạn quên mật khẩu ? Lấy mật khẩu <a href="#">Tại đây</a></span>
              </div>   
              <div class="row" style="display: flex; margin-left: 7px;margin-top: 10px;">
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 150px;" name="dangnhap"> Đăng nhập</button>
                <span style="margin-left: 30px;">Bạn chưa có tài khoản ?<a href="dangky.php">Đăng ký</a></span>
              </div>
            </div>
          </div>
        </form>
    </div> 
  </section>
   <?php
   include("footer.php");
   ?>
</body>
</html>