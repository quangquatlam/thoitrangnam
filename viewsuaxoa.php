<?php
session_start();
include("connect.php");
$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);
$ppage=5;
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
$loc="SELECT * FROM product $paping";
$result=mysqli_query($conn,$sql);
if($_SESSION['username']!="admin")
{
	echo '<script language="javascript">alert("Xin lỗi bạn không phải là admin!");</script>';
	header("location:thoitrangnam.php");

}else {
	 if(isset($_GET['amess'])){
        echo '<script language="javascript">alert("Thêm thành công sản phẩm!");</script>';
    }
}
?>
<?php
include("header.php");
?>
<div class="container-fluid"style="position: relative;top: 90px;">
	<div class="row">
		<div class="col-md-6 col-md-6 col-xs-12">
			<h1>Quản lý sản phẩm <a href="themsp.php" style="font-size: 25px;text-decoration: none;border-radius: 25px 25px 25px 25px ;background-color: orange; padding: 8px;">Thêm sản phẩm</a></h1>
		</div>
		<div class="col-md-6 col-md-6 col-xs-12">
			<h1>Quản lý hóa đơn <a href="quanlydathang.php" style="font-size: 25px;text-decoration: none;border-radius: 25px 25px 25px 25px ;background-color: orange; padding: 8px;">Xem thông tin hóa đơn </a></h1>
		</div>
	</div>
	<div class="row text-center">
		<h2>Danh sách sản phẩm</h2>
	</div>
	<div class="row">
		<table class="table mt-4">
			<thead>
				<tr>
					<th >
						Mã sản phẩm
					</th>
					<th>Tên sản phẩm </th>
					<th>Loại sản phẩm</th>
					<th>Giá bán</th>
					<th>Giảm giá</th>
					<th>số lượng</th>
					<th>size</th>
					<th>img</th>
					<th>mô tả</th>
					<th>Sửa</th>
					<th>Xóa</th>
				</tr>
				<?php
				$sql="SELECT * FROM product";
				$result=mysqli_query($conn,$loc);
				while($row=mysqli_fetch_array($result)){
				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['id_type']?></td>
					<td><?php echo number_format($row['price']*1000,0,",",".")?> VNĐ</td>
					<td><?php echo number_format($row['price_sale']*1000,0,",",".")?> VNĐ</td>
					<td><?php echo $row['soluong']?></td>
					<td><?php echo $row['size']?></td>
					<td><img  style="height: 80px;" src=<?php echo"'img/".$row['img']."'"?>></td>
					<td><?php echo $row['mota']?></td>
					<td><a href="sua.php?id=<?php echo $row['id']?>&p=<?php echo $page?>">Sửa</a></td>
					<td><a href="deleteitem.php?id=<?php echo $row['id']?>&p=<?php echo $page?>" 
            		onclick='<?php echo "javascript: return confirm(\"Bạn có chắc chắn muốn xóa?\");"?>'>Xóa</a>
            		</td>
				</tr>
				<?php
				}
				?>
			</thead>

		</table>
		 <div class="nav text-center">
    	<?php
        	for($i=1;$i<=$maxpage;$i++){
            	if($i==$page){
                	echo "<a style = 'color:red;font-size: 20'>$i</a> " ;
            	}else{
                	if($i==$maxpage){				
                    	echo "<a href = 'viewsuaxoa.php?p=$i'>Trang cuối</a><br>" ;
                	}else if($i==1){
                    	echo "<a href = 'viewsuaxoa.php?p=$i'>Trang đầu</a> " ;
    
               		 }else{
                    	if(($i>=$page-5) AND ($i<=$page+5))
                    	echo "<a href = 'viewsuaxoa.php?p=$i'>$i</a> " ;
                		}
           		 	}
       			 }
    		?>
    </div>
	</div>
</div>
</body>
</html>
<?php
mysqli_close($conn);
unset($row,$sql,$result,$i,$paping,$page,$ppage,$start,$total,$maxpage);
?>