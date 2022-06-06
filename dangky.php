<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){     
    die("Không thể kết nối: " . mysqli_error());}
mysqli_select_db($conn,'thoitrangnam_framework') or die('Could not select database.');
mysqli_set_charset($conn, "utf8");
$error=[];
if(isset($_POST['btn_dangky'])){
    $username=($_POST['username']);
    $email=($_POST['email']);
    $phone=($_POST['phone']);
    $password=($_POST['password']);
    $repassword=$_POST['repassword'];
    if(empty($username)){
      $error['username']='Bạn chưa nhập tên đăng nhập';
    }
    if(empty($email)){
      $error['email']='Bạn chưa nhập email';
    }
    if(empty($phone)){
      $error['phone']='Bạn chưa nhập sô điện thoại';
    }
    if(empty($password)){
      $error['password']='Bạn chưa nhập mật khẩu';
    }
    if($password!=$repassword)
    {
      $error['repassword']='Mật khẩu không khớp';
    }
    if(empty($error)){
      $password=md5($password);
      $sql="select * from users where name='$username'";
      $result=mysqli_query($conn,$sql);
      //print_r($result);exit();
      print_r(mysqli_num_rows($result));
      if(mysqli_num_rows($result)>0)
      {
        echo '<script language="javascript">alert("Tài khoản đã tồi tại"); window.location="dangky.php";</script>';
      }
      else {
        $sql="INSERT INTO users (name,email,phone,password) VALUES ('$username','$email','$phone','$password')";
       //print_r($a);exit();
        if (mysqli_query($conn,$sql)){
            $_SESSION['username']=$username;
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="thoitrangnam.php";</script>';

        }else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="dangky.php";</script>';
        }
      }
    }
}
mysqli_close($conn)
?>
<?php
include("header.php");
?>
  <section>
		<div class="container" style="position: relative;top: 90px;">
	    <div class="row">
	      <legend class="text-center">
	       <h2>Đăng ký tài khoản</h2>
	       <span>Nếu bạn chưa có tài khoản điền thông tin  đăng kí tại đây</span>
	      </legend> 
	      <form action="" method="post" class="form" role="form"> 
	        <div class="row"> 
	          <div class="col-sm-8 col -md-4 col-xs-12 col-md-offset-2">
              <div class="form-group">
                <label for="" class="labelpadding" >Tên đăng ký</label>
                <span><?php echo(isset($error['username']))?$error['username']:''?></span>
                <input class="form-control" name="username" placeholder="Nhập tên " required="" type="text">
              </div> 
              <div class="form-group">
                <label for="" class="labelpadding">Email</label>
                <span style="color: red;font-weight: bold;"><?php echo(isset($error['email']))?$error['email']:''?></span>
                <input class="form-control" name="email" placeholder="Email" type="email">
              </div>
              <div class="form-group">
                <label for="" class="labelpadding">Số điện thoại</label>
                <span style="color: red;font-weight: bold;"><?php echo(isset($error['phone']))?$error['phone']:''?></span>
                <input class="form-control" name="phone" placeholder="Số  điện thoại">
              </div>
              <div class="form-group">
                <label for="" class="labelpadding">Mật khẩu</label>
                <span style="color: red;font-weight: bold;"><?php echo(isset($error['password']))?$error['password']:''?></span> 
                <input class="form-control" name="password" placeholder="Mật khẩu" type="password">
              </div>
              <div class="form-group">
                <label for=""class="labelpadding">Nhập lại mât khẩu</label>
                <span style="color: red;font-weight: bold;"><?php echo(isset($error['repassword']))?$error['repassword']:''?></span>
                <input class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" type="repassword" style="margin-top: 10px">
              </div>
              <div class="row" style="display: flex; margin-left: 7px;margin-top: 10px;">
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 150px;" name="btn_dangky"> Đăng kí</button>
                <span style="margin-left: 30px;">Bạn đã có tài khoản ? <a href="dangnhap.php">Đăng nhập</a></span>
              </div>
	          </div>
	        </div>  
	      </form> 
	    </div>
	  </div>
	</section>
<?php
include("footer.php");
?>