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
							$row = $rs->fetch_assoc();
							$amount = $q * $row["giaBan"];
							$total += $amount;
						?>
						<tr>
							<td><?= $row["TenSP"] ?></td>
							<td><?= number_format($row["giaBan"]) ?></td>
							<!-- <td><?= $q ?></td> -->
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
						<a class="btn btn-primary" href="#" role="button">
							<span class="glyphicon glyphicon-bell"></span>
							Thanh toán
						</a>
					</td>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>