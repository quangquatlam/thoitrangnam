<?php
include("connect.php");
if(isset($_GET['id'])&&isset($_GET['p'])){
        $id = $_GET['id'];
        $p=$_GET['p'];
        //print_r($id);
}else {
  $p=$_GET['p'];
  $url="viewsuaxoa.php?p=".$p;
  echo "<script>alert('Không tồn tại bản ghi đã chọn');</script>";
}
$sql="SELECT * FROM product where id=$id";
//print_r($sql);exit();

$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['tensp'])){
  $namesp=$_POST['tensp'];
}
else {
  $namesp='';
}
if(isset($_POST['loai'])){
  $product_type=$_POST['loai'];
}
else {
  $product_type='';
}
if(isset($_POST['gia'])){
  $price=$_POST['gia'];
}
else {
  $price=0;
}
if(isset($_POST['giasale'])){
  $pricesale=$_POST['giasale'];
}
else {
  $pricesale='';
}
if(isset($_POST['soluong'])){
    $sl=$_POST['soluong'];
}
else {
    $sl='';
}
if(isset($_POST['mota'])){
    $mota=$_POST['mota'];
}
else {
    $mota='';
}
if(isset($_POST['image'])){
    $pimage=$_POST['image'];
}
else {
    $pimage='';
}
if(isset($_POST['chonsize'])){
    $size=$_POST['chonsize'];
}
else {
    $size='';
}
if(isset($_POST['id_sp'])){
        $id = $_POST['id_sp'];
}else{
        $id="";
}
if(isset($_POST['p'])){
        $p =$_POST['p'];
        $p=(String) $p;
    }else{
        $p=1;
    }
$url="Location:viewsuaxoa.php?p=".$p;
$image='';
if(isset($_POST['capnhat'])){
    if(isset($_POST['id_sp'])){
          $id = $_POST['id_sp'];
  }else{
          $id="";
  }
  print_r($id);exit();
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
  $expensions= array("jpeg","jpg","png");
  if(in_array($file_ext,$expensions)=== false){
            $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
  $image = $_FILES['image']['name'];
  $target = "images/".basename($image);
  if($image==''){
            $image=$pimage;
        }else{
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }

  if(($namesp=='')||($product_type=='')||($price=='')||($image=='')||($size=='')||($sl==''))
  {
    echo '<script language="javascript">alert("Bạn chưa điền đầy đủ thông tin!");</script>';
  }else{
    $a="SELECT * from product_type where name_category='$product_type'";
    //print_r($product_type);exit();
    $b=mysqli_query($conn,$a);
    $gt = mysqli_fetch_assoc($b);
    //print_r($gt['id_type']);exit();
    $id_type=$gt['id_type'];
    $update="UPDATE product SET name='$namesp',id_type=$id_type,price==$price,price_sale=$price_sale,soluong=$sl,size='$size',img='$image',mota='$mota' where id=$id";
    print_r($update);exit();
    if (mysqli_query($conn,$update)) {
       echo '<script language="javascript">alert("Sửa thông tin sản phẩm thành công");</script>';    
    }
    else
       {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý");window.location="sua.php";</script>';
       }
  }
}
mysqli_close($conn); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update</title>
  <?php include("header.php");?>
 
  <section>
  	<div class="container" style="position: relative;top: 90px;">
      <div class="row">
        <legend class="text-center">
         <h2>Cập nhật sản phẩm</h2>
        </legend>
        <form action="sua.php" method="post" class="form" role="form" enctype="multipart/form-data">
          <input type="hidden" name='id_sp' value="<?php echo $id?>">
          <input type="hidden" name='p' value="<?php echo $p ?>">

        	<div class="row"> 
             <div class="col-sm-8 col -md-4 col-xs-12 col-md-offset-2">
             	<div class="form-group">
	             	<label class="labelpadding">Tên sản phẩm</label>
	             	<input class="form-control" name="tensp" placeholder="Nhập tên sản phẩm" required="" type="text" value="<?php echo $row['name'] ?>">
	             </div>
             	<div class="form-group">
             		<label class="labelpadding">Loại sản phẩm</label>
             		<select class="custom-select" id="categoryname" name="categoryname" style="width: 100%;height: 30px;">
                      <option value="" ></option>
                    	<option value="Áo sơ mi nam" >Áo sơ mi nam</option>
                    	<option value="Quần nữ" >Áo khoác nam</option>
                    	<option value="Áo thun nam" >Áo thun nam</option>
                    	<option value="Phụ kiện nam">Phụ kiện nam</option>
                    	<option value="Quần nam" >Quần nam</option>                
                	</select>
             	</div>
             	<div class="form-group">
             		<label class="labelpadding">Giá bán</label>
             		<input type="number" class="form-control" onkeypress="isInputNumber(event)" min="0" value="<?php echo $row['price']?>"  name="gia">
             	</div>
              <div class="form-group">
                <label class="labelpadding">Giá sale</label>
                <input type="number" class="form-control" onkeypress="isInputNumber(event)" min="0" value="<?php echo $row['price_sale']?>"  name="giasale">
              </div>
             	<div class="form-group">
                    <label class="font-weight-bold" for="productDescription">Mô tả </label>
                    <textarea name="mota" class="form-control" rows="5" cols="50" tabindex="3" >
                    </textarea>
                </div>

                <label >Chi tiết sản phẩm </label>
                <div class="container-fluid border border-dark">
                    <div class="row ">
                        <div class="col-md-3 col-12 col-sm-3 form-inline">
                            <label  class="">Chọn kích cỡ</label>
                            <select class="custom-select" name="chonsize">
                                <option value="<?php echo $row['size']?>"></option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2XL">2XL</option>
                                <option value="3XL">3XL</option>
                            </select>
                         </div>
                        <div class="col-md-3 col-12 col-sm-3">
                            <label >Số lượng <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" onkeypress="isInputNumber(event)" min="0" value="<?php echo $row['soluong']?>" name="soluong" />
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-12 col-md-12 col-xs-12">
                    		<p style="font-weight: bold;">Ảnh</p>
                    		<input type="file" name="image" value="<?php echo $row['img']?>">
                    	</div>
                    </div>
             	</div>
            </div>
            </div>
      		<button type="submit" class="btn btn-info mt-4" name="capnhat">Cập nhật sản phẩm</button>
        </form>
    </div>
  </section>
</div>
</section>
</body>
</html>