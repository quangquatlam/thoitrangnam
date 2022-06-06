<?php
include("connect.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * FROM chitiet_hoadon WHERE id_cart=$id";
	//print_r($sql);exit();
	$result=mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý hóa đơn</title>
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
	<div class="container-fluid">
		<div class="row">
			<table class="table mt-4">
				<tr>
					<th>Mã đơn hàng</th>
					<th>Mã khách</th>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm </th>
					<th>Size </th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Thành tiền </th>
					<th>Ngày đặt hàng</th>
				</tr>
				<?php
				while($row=mysqli_fetch_array($result)){
				?>
				<tr>
					<td><?php echo $row['id_cart']?></td>
					<td><?php echo $row['id_kh']?></td>
					<td><?php echo $row['id_sp']?></td>
					<td><?php echo $row['ten_sp']?></td>
					<td><?php echo $row['size']?></td>
					<td><?php echo $row['sl']?></td>
					<td><?php echo $row['gia']?></td>
					<td><?php echo number_format($row['thanhtien']*1000,0,",",".")?> VNĐ</td>
					<td><?php echo $row['ngaydathang']?></td>
				</tr>
				<?php
				}
				?>
			</table>
			<div class="nav text-center">
		</div>
	</div>
</body>
</html>
