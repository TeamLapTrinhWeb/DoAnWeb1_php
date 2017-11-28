<div class="span9">
	<div class="well well-small">
		<h4>Kết quả tìm kiếm </h4>
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails">
							<?php
								$tenSP = $_GET["txtTimKiem"];
								$tenNSX = $_GET["TenNSX"];
								$tenLoai = $_GET["TenLMA"];
								$sql = "SELECT * 
										FROM sanpham JOIN nhasx ON 'sanpham.maNSX' = 'nhasx.id' JOIN loaimayanh ON 'sanpham.maLoai' = 'loaimayanh.id'
										WHERE 'sanpham.TenSP' = '$tenSP' AND 'nhasx.TenNhaSX' = '$tenNSX' AND 'loaimayanh.tenLoaiMayAnh' = '$tenLoai'";
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
				<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
				<a class="right carousel-control" href="#featured" data-slide="next">›</a>
			</div>
		</div>
	</div>
</div>







