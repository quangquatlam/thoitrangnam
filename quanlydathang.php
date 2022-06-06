<?php
include("connect.php");
$sql="SELECT * FROM hoadon where tinhtrangthanhtoan=0  ";
$result=mysqli_query($conn,$sql);
$ppage=15;
$total=mysqli_num_rows($result);
$maxpage=ceil($total/$ppage);
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
$hd="SELECT * FROM hoadon where tinhtrangthanhtoan=0 $paping";
$dshd=mysqli_query($conn,$hd);
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
					<th>Tên khách hàng</th>
					<th>Số lượng sản phẩm</th>
					<th>Tổng tiền </th>
					<th>Ngày đặt hàng </th>
					<th>Số điện thoại</th>
					<th>Địa chỉ</th>
					<th>Ghi chú</th>
					<th>Thanh toán</th>
					<th>Chi tiết</th>
				</tr>
				<?php
				while($row=mysqli_fetch_array($dshd)){
				?>
				<tr>
					<td><?php echo $row['id_cart']?></td>
					<td><?php echo $row['tenkh']?></td>
					<td><?php echo $row['sl_sp']?></td>
					<td><?php echo number_format($row['tongtien']*1000,0,",",".")?> VNĐ</td>
					<td><?php echo $row['ngaydathang']?></td>
					<td><?php echo $row['sdt']?></td>
					<td><?php echo $row['diachi']?></td>
					<td><?php echo $row['ghichu']?></td>
					<td><a href="thanhtoan.php?id=<?php echo $row['id_cart']?>&p=<?php echo $page?>" class"btn btn-primary"> Đã giao hàng</a></td>
					<td><a href="chitiethoadon.php?id=<?php echo $row['id_cart']?>">Xem chi tiết</a></td>
				</tr>
				<?php
				}
				?>
			</table>
			<div class="nav text-center">
    	<?php
        	for($i=1;$i<=$maxpage;$i++){
            	if($i==$page){
                	echo "<a style = 'color:red;font-size: 20'>$i</a> " ;
            	}else{
                	if($i==$maxpage){				
                    	echo "<a href = 'quanlydathang.php?p=$i'>Trang cuối</a><br>" ;
                	}else if($i==1){
                    	echo "<a href = 'quanlydathang.php?p=$i'>Trang đầu</a> " ;
    
               		 }else{
                    	if(($i>=$page-5) AND ($i<=$page+5))
                    	echo "<a href = 'quanlydathang.php?p=$i'>$i</a> " ;
                		}
           		 	}
       			 }
    		?>
    </div>
		</div>
	</div>
</body>
</html>
