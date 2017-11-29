<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li><a href="products.html">Products</a> <span class="divider">/</span></li>
		<li class="active">product Details</li>
	</ul>
	<div class="row">
		<?php
			$id = $_GET["id"];
			$sql = "select * from sanpham join loaimayanh on sanpham.maLoai = loaimayanh.id join nhasx on sanpham.maNSX = nhasx.id where sanpham.id = $id ";
			$rs = load($sql);
			if ($rs->num_rows > 0) :
				while ($row = $rs->fetch_assoc()) :
		?>
		<div id="gallery" class="span3">
			<a href="images/<?= $row["TenSP"] ?>" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="images/<?= $row["TenSP"] ?>" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
			</a>
			<div id="differentview" class="moreOptopm carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
						<a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
						<a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
					</div>
					<div class="item">
						<a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
						<a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
						<a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			
			<h3><?= $row["TenSP"]?></h3>
			<hr class="soft"/>
			<form class="form-horizontal qtyFrm">
				<div class="control-group">
					<label class="control-label"><span><?= number_format($row["giaBan"]) ?> vnd</span></label>
					<div class="controls">
						<input type="number" class="span1" placeholder="Qty."/>
						<button type="submit" class="btn btn-large btn-primary pull-right"> Thêm vào giỏ hàng <i class=" icon-shopping-cart"></i></button>
					</div>
				</div>
			</form>
		</form>
		<hr class="soft clr"/>
		<p><?= $row["moTa"] ?></p>
		
		<br class="clr"/>
		<a href="#" name="detail"></a>
		<hr class="soft"/>
	</div>
	
	<div class="span9">
		<ul id="productDetail" class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
			<li><a href="#profile" data-toggle="tab">Related Products</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="home">
				<h4>Product Information</h4>
				<table class="table table-bordered">
					<tbody>
						<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
						<tr class="techSpecRow"><td class="techSpecTD1">Nhà sản xuất: </td><td class="techSpecTD2"><?= $row["TenNhaSX"] ?></td></tr>
						<tr class="techSpecRow"><td class="techSpecTD1">Tên sản phẩm:</td><td class="techSpecTD2"><?= $row["TenSP"] ?></td></tr>
						<tr class="techSpecRow"><td class="techSpecTD1">Xuất xứ:</td><td class="techSpecTD2"><?= $row["xuatXu"] ?></td></tr>
						<tr class="techSpecRow"><td class="techSpecTD1">Loại:</td><td class="techSpecTD2"><?= $row["tenLoaiMayAnh"] ?></td></tr>
						<tr class="techSpecRow"><td class="techSpecTD1">Số lượt xem:</td><td class="techSpecTD2"><?= $row["soLuotXem"] ?></td></tr>
						<tr class="techSpecRow"><td class="techSpecTD1">Số lượng bán:</td><td class="techSpecTD2"><?= $row["soLuongBan"] ?></td></tr>
						<?php
								endwhile;
							else :
						?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							Không có sản phẩm thoả điều kiện.
						</div>
						<?php
							endif;
						?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="profile">
				<div class="tab-content">
					<div class="tab-pane active" id="blockView">
						<ul class="thumbnails">
							<div class="span9">
								<div class="well well-small">
									<h4>Sản phẩm cùng loại </h4>
									<div class="row-fluid">
										<div id="featured" class="carousel slide">
											<div class="carousel-inner">
												<div class="item active">
													<ul class="thumbnails">
														<?php
															$id = $_GET["id"];
															$sql = "select * from sanpham where maLoai = (select maLoai from sanpham where id = $id)limit 0, 5";
															$rs = load($sql);
															if ($rs->num_rows > 0) :
																while ($row = $rs->fetch_assoc()) :
														?>
														<li class="span2">
															<div class="thumbnail">
																<i class="tag"></i>
																<a href="TrangDetail.php?id=<?= $row["id"] ?>"><img src="images/<?= $row["TenSP"] ?>"/></a>
																<div class="caption">
																	<h5><?= $row["TenSP"] ?></h5>
																	<h4><a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">VIEW</a> <span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span></h4>
																</div>
															</div>
														</li>
														<?php
																endwhile;
															else :
														?>
															<div class="thumbnail">
																<div class="caption"><p>Trống </p></div>
															</div>
														<?php
															endif;
														?>
													</ul>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</ul>
						<ul class="thumbnails">
							<div class="span9">
								<div class="well well-small">
									<h4>Sản phẩm cùng nhà sản xuất </h4>
									<div class="row-fluid">
										<div id="featured" class="carousel slide">
											<div class="carousel-inner">
												<div class="item active">
													<ul class="thumbnails">
														<?php
															$id = $_GET["id"];
															$sql = "select * from sanpham where maNSX = (select maNSX from sanpham where id = $id)limit 0, 5";
															$rs = load($sql);
															if ($rs->num_rows > 0) :
																while ($row = $rs->fetch_assoc()) :
														?>
														<li class="span2">
															<div class="thumbnail">
																<i class="tag"></i>
																<a href="TrangDetail.php?id=<?= $row["id"] ?>"><img src="images/<?= $row["TenSP"] ?>"/></a>
																<div class="caption">
																	<h5><?= $row["TenSP"] ?></h5>
																	<h4><a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">VIEW</a> <span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span></h4>
																</div>
															</div>
														</li>
														<?php
																endwhile;
															else :
														?>
															<div class="thumbnail">
																<div class="caption"><p>Trống </p></div>
															</div>
														<?php
															endif;
														?>
													</ul>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div> </div>
</div>