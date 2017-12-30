<?php 
	if (isset($_POST["btnCheckOut"])) {
		$o_Total = $_POST["txtTotal"];
		$o_UserID = $_SESSION["User"]->id;
		$o_OrderDate = strtotime("+7 hours", time());
		$str_OrderDate = date("Y-m-d H:i:s", $o_OrderDate);
		$sql = "insert into orders(OrderDate, UserID, Total) values('$str_OrderDate', $o_UserID, $o_Total)";
		write($sql);

		$str_sql = "select * from orders order by OrderID desc";
		$rs = load($str_sql);
		if ($rs->num_rows > 0) {
			$row = $rs->fetch_assoc();
			$o_ID = $row["OrderID"];
		}

		foreach ($_SESSION["cart"] as $proId => $q) {

			$str_sql = "select soLuongTon from sanpham where id = $proId";
			$rs = load($str_sql);
			if ($rs->num_rows > 0) {
				$row = $rs->fetch_assoc();
				$Count = $row["soLuongTon"];
				
				if ($q <= $Count) {
					$sql = "select * from sanpham where id = $proId";
					$rs = load($sql);
					$row = $rs->fetch_assoc();
					$price = $row["giaBan"];
					$amount = $q * $price;
					$d_sql = "insert into orderdetails(OrderID, ProID, Quantity, Price, Amount, Status) values($o_ID, $proId, $q, $price, $amount, 'Chưa giao hàng')";
					$update_sql = "update sanpham set soLuongBan = soLuongBan + $q, soLuongTon = soLuongTon - $q where id = $proId";
					write($d_sql);
					write($update_sql);
					$_SESSION["cart"] = array();
				}
			}	
		}
		
	}
 ?>
<!-- Sidebar end=============================================== -->
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
	</ul>
	<h3>Giỏ hàng<a href="TrangIndex.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Tiếp tục mua hàng </a></h3>
	<hr class="soft"/>
	<form id="f" method="post" action="updateCart.inc.php">
		<input type="hidden" id="txtCmd" name="txtCmd">
		<input type="hidden" id="txtDProId" name="txtDProId">
		<input type="hidden" id="txtUQ" name="txtUQ">
	</form>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Sản phẩm</th>
				<th>Giá</th>
				<th class="col-md-2">Số lượng</th>
				<th>Thành tiền</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$total = 0;
				foreach ($_SESSION["cart"] as $proId => $q) :
					$sql = "select * from sanpham where id = $proId";
					$rs = load($sql);
					if ($rs->num_rows > 0) {
						$row = $rs->fetch_assoc();
						$amount = $q * $row["giaBan"];
					}
					$total += $amount;
			?>
				<tr>
					<td><?= $row["TenSP"] ?></td>
					<td><?= number_format($row["giaBan"]) ?></td>
					<td>
						<input class="quantity-textfield" name="" id="" value="<?= $q ?>">
					</td>
					<td><?= number_format($amount) ?></td>
					<td class="text-right">
						<a class="btn btn-xs btn-danger cart-remove" data-id="<?= $proId ?>" href="javascript:;" role="button">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>
						<a class="btn btn-xs btn-primary cart-update" data-id="<?= $proId ?>" href="javascript:;" role="button">
							<i class="fa fa-check" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
			<?php
				endforeach;
			?>
		</tbody>
		<tfoot>
		<td></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="label label-important" style="display:block"> <strong><?= number_format($total) ?></td>
		<td class="text-right">
			<form method="POST" action="">
				<input type="hidden" name="txtTotal" value="<?= $total ?>">
				<button name="btnCheckOut" type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-bell"></span>
					Thanh toán
				</button>
			</form>
		</td>
		</tfoot>
	</table>
</div>