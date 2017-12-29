<!-- Sidebar end=============================================== -->
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
	</ul>
	<h3>  Lịch sử mua hàng<a href="TrangIndex.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Tiếp tục mua hàng </a></h3>
	<hr class="soft"/>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá bán</th>
				<th>Thành tiền</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$id = $_SESSION["User"]->id;
				$sql = "select * from orderdetails join orders on orderdetails.OrderID = orders.OrderID join sanpham on sanpham.id = orderdetails.ProID where orders.UserID = $id";
				$rs = load($sql);
				if ($rs->num_rows > 0) :
					while ($row = $rs->fetch_assoc()) :
			?>
				<tr>
					<td><?= $row["TenSP"] ?></td>
					<td><?= $row["Quantity"] ?></td>
					<td><?= $row["Price"] ?></td>
					<td class="label label-important" style="display:block"> <strong><?= $row["Amount"] ?></td>
				</tr>
			<?php
					endwhile;
				endif;
			?>
		</tbody>
	</table>
</div>