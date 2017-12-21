<?php 
	if (isset($_POST["btnCheckOut"])) {
		$o_Total = $_POST["txtTotal"];
		$o_UserID = $_SESSION["User"]->id;
		$o_OrderDate = strtotime("+7 hours", time());
		$str_OrderDate = date("Y-m-d H:i:s", $o_OrderDate);
		$sql = "insert into orders(OrderDate, UserID, Total) values('$str_OrderDate', $o_UserID, $o_Total)";
		$o_ID = write($sql);

		//
		// order_details

		foreach ($_SESSION["cart"] as $proId => $q) {
			$sql = "select * from sanpham where id = $proId";
			$rs = load($sql);
			$row = $rs->fetch_assoc();
			$price = $row["giaBan"];
			$amount = $q * $price;
			$d_sql = "insert into orderdetails(OrderID, ProID, Quantity, Price, Amount) values($o_ID, $proId, $q, $price, $amount)";
			write($d_sql);
		}

		//
		// clear cart
		
		$_SESSION["cart"] = array();
	}
 ?>


<div class="span9">
	<div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Giỏ hàng của bạn</h3>
			</div>
			<div class="panel-body">
				<form id="f" method="post" action="updateCart.inc.php">
					<input type="hidden" id="txtCmd" name="txtCmd">
					<input type="hidden" id="txtDProId" name="txtDProId">
					<input type="hidden" id="txtUQ" name="txtUQ">
				</form>
				<table class="table table-hover">
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
								<input class="quantity-textfield" type="text" name="" id="" value="<?= $q ?>">
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
					<td>
						<a class="btn btn-success" href="TrangIndex.php" role="button">
							<span class="glyphicon glyphicon-backward"></span>
							Tiếp tục mua hàng
						</a>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><b><?= number_format($total) ?></b></td>
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
		</div>
	</div>


</div>