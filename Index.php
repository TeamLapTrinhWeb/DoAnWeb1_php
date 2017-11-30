<div class="span9">
	<div class="well well-small">
		<h4>Sản phẩm mới nhất </h4>
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails">
							<?php
								$sql = "select * from sanpham order by id desc limit 0, 5";
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
										<h4>
											<?php 
												if ($_SESSION["User_ID"] == 1) :
											?>
												<a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">Chi tiết</a>
											<?php endif ?>
											<span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span>
										</h4>
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
					<div class="item">
						<ul class="thumbnails">
							<?php
								$sql = "select * from sanpham order by id desc limit 5, 5";
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
										<h4>
											<?php 
												if ($_SESSION["User_ID"] == 1) :
											?>
												<a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">Chi tiết</a>
											<?php endif ?>
											<span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span>
										</h4>
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
	
	<div class="well well-small">
		<h4>Sản phẩm bán chạy nhất </h4>
		<div class="row-fluid">
			<div id="featured1" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails">
							<?php
								$sql = "select * from sanpham order by soLuongBan desc limit 0, 5";
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
										<h4>
											<?php 
												if ($_SESSION["User_ID"] == 1) :
											?>
												<a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">Chi tiết</a>
											<?php endif ?>
											<span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span>
										</h4>
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
					<div class="item">
						<ul class="thumbnails">
							<?php
								$sql = "select * from sanpham order by soLuongBan desc limit 5, 5";
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
										<h4>
											<?php 
												if ($_SESSION["User_ID"] == 1) :
											?>
												<a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">Chi tiết</a>
											<?php endif ?>
											<span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span>
										</h4>
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
				<a class="left carousel-control" href="#featured1" data-slide="prev">‹</a>
				<a class="right carousel-control" href="#featured1" data-slide="next">›</a>
			</div>
		</div>
	</div>
	
	<div class="well well-small">
		<h4>Sản phẩm xem nhiều nhất </h4>
		<div class="row-fluid">
			<div id="featured2" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails">
							<?php
								$sql = "select * from sanpham order by soLuotXem desc limit 0, 5";
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
										<h4>
											<?php 
												if ($_SESSION["User_ID"] == 1) :
											?>
												<a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">Chi tiết</a>
											<?php endif ?>
											<span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span>
										</h4>
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
					<div class="item">
						<ul class="thumbnails">
							<?php
								$sql = "select * from sanpham order by soLuotXem desc limit 5, 5";
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
										<h4>
											<?php 
												if ($_SESSION["User_ID"] == 1) :
											?>
												<a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>">Chi tiết</a> 

											<?php endif ?>
											<span class="pull-right"><?= number_format($row["giaBan"]) ?> vnd</span>
										</h4>
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
				<a class="left carousel-control" href="#featured2" data-slide="prev">‹</a>
				<a class="right carousel-control" href="#featured2" data-slide="next">›</a>
			</div>
		</div>
	</div>
</div>
