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
				<th>STT</th>
				<th>Ngày tháng</th>
				<th>Tổng tiền</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 0;
				$id = $_SESSION["User"]->id;
				$sql = "select * from orders where UserID = $id order by OrderID desc";
				$rs = load($sql);
				if ($rs->num_rows > 0) :
					while ($row = $rs->fetch_assoc()) :
			?>
				<tr>
					<td><?= $i = $i + 1 ?></td>
					<td><?= $row["OrderDate"] ?></td>
					<td><?= $row["Total"] ?></td>
				</tr>
			<?php
					endwhile;
				endif;
			?>
		</tbody>
	</table>
</div>