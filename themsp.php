<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){     
    die("Không thể kết nối: " . mysqli_error());}
mysqli_select_db($conn,'thoitrangnam_framework') or die('Could not select database.');
mysqli_set_charset($conn, "utf8");
if(isset($_POST['productname'])){
  $namesp=$_POST['productname'];
}
else {
  $namesp='';
}
if(isset($_POST['categoryname'])){
  $product_type=$_POST['categoryname'];
}
else {
  $product_type='';
}
if(isset($_POST['productprice'])){
  $price=$_POST['productprice'];
}
else {
  $price='';
}
if(isset($_POST['soluong'])){
    $sl=$_POST['soluong'];
}
else {
    $sl='';
}
if(isset($_POST['productpricesale'])){
    $pricesale=$_POST['productpricesale'];
  }
  else {
    $pricesale='';}
if(isset($_POST['productDescription'])){
    $mota=$_POST['productDescription'];
}
else {
    $mota='';
}
if(isset($_POST['image'])){
    $image=$_POST['image'];
}
else {
    $image='';
}
if(isset($_POST['chonsize'])){
    $size=$_POST['chonsize'];
}
else {
    $size='';
}
$errorsimg='';
if(isset($_POST['save'])){
  $file_name = $_FILES["image"]['name'];
  //print_r($file_name);exit();
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  $expensions= array("jpeg","jpg","png");
  $target = "images/".basename($image);
  if($file_size > 2097152) {
            $errorsimg='Kích thước file không được lớn hơn 2MB';
  }
  $image = $_FILES['image']['name'];
  //print_r($namesp);print_r($pricesale);exit();
  if(($namesp=='')||($product_type=='')||($price=='')||($image=='')||($size=='')||($sl=='')||($pricesale==''))
  {
    echo '<script language="javascript">alert("Bạn chưa điền đầy đủ thông tin!");</script>';
  }else{
    $sql="SELECT * from product_type where name_category='$product_type'";
    //print_r($product_type);exit();
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    //print_r($row['id_type']);exit();
    $id_type=$row["id_type"];
    $themsp="INSERT INTO product(name,id_type,price,price_sale,soluong,size,img,mota) VALUES ('$namesp','$id_type','$price','$pricesale','$sl','$size','$image','$mota')";
    //print_r($pricesale);exit();
    mysqli_query($conn,$themsp);
    //print_r($themsp);exit();
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header("location:viewsuaxoa.php?amess=1");
    }
    else
       {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý");window.location="themsp.php";</script>';
       }
  }
}
mysqli_close($conn); 









?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm sản phẩm</title>
  <?php
  include("header.php");?>
  <section>
  	<div class="container" style="position: relative;top: 90px;">
      <div class="row">
        <legend class="text-center">
         <h2>Thêm sản phẩm</h2>
        </legend>
        <form action="themsp.php" method="post" class="form" role="form" enctype="multipart/form-data">
        	<div class="row"> 
             <div class="col-sm-8 col -md-4 col-xs-12 col-md-offset-2">
             	<div class="form-group">
	             	<label class="labelpadding">Tên sản phẩm</label>
	             	<input class="form-control" name="productname" placeholder="Nhập tên sản phẩm" required="" type="text">
	             </div>
             	<div class="form-group">
             		<label class="labelpadding">Loại sản phẩm</label>
             		<select class="custom-select" id="categoryname" name="categoryname" style="width: 100%;height: 30px;">
                    	<option value="Áo sơ mi nam" >Áo sơ mi nam</option>
                    	<option value="Áo khoác nam" >Áo khoác nam</option>
                    	<option value="Áo thun nam" >Áo thun nam</option>
                    	<option value="Phụ kiện nam">Phụ kiện nam</option>
                    	<option value="Quần nam" >Quần nam</option>                
                	</select>
             	</div>
             	<div class="form-group">
             		<label class="labelpadding">Giá bán</label>
             		<input type="number" class="form-control" onkeypress="isInputNumber(event)" min="0" value="<?php echo $price?>"  name="productprice">
             	</div>
              <div class="form-group">
                <label class="labelpadding">Giá sale</label>
                <input type="number" class="form-control" min="0" name="productpricesale"onkeypress="isInputNumber(event)" value=""<?php echo $pricesale?>>
              </div>
             	<div class="form-group">
                    <label class="font-weight-bold" for="productDescription">Mô tả </label>
                    <textarea name="productDescription" class="form-control" rows="5" cols="50" tabindex="3" >                           
                    </textarea>
                </div>

                <label >Chi tiết sản phẩm </label>
                <div class="container-fluid border border-dark">
                    <div class="row ">
                        <div class="col-md-6 col-12 col-sm-6 form-group">
                            <label  class="">Kích cỡ</label>
                            <select class="custom-select" name="chonsize">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2XL">2XL</option>
                                <option value="3XL">3XL</option>
                            </select>
                         </div>
                        <div class="col-md-6 col-12 col-sm-6">
                            <label >Số lượng <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" onkeypress="isInputNumber(event)" min="0" value="<?php echo $sl ?>" name="soluong" />
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-12 col-md-12 col-xs-12">
                    		<p style="font-weight: bold;">Ảnh</p>
                    		<input type="file" name="image">
                    	</div>
                    </div>
             	</div>
            </div>
            </div>
      	 <button type="submit" class="btn btn-info mt-4" name="save">Lưu sản phẩm</button>
        </form>
    </div>
  </section>
  </body>
  </html>