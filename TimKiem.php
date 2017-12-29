<div class="span9">
	<div class="well well-small">
		<h4>Kết quả tìm kiếm </h4>
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails">
							<?php
								$limit = 6;
								$current_page = 1;
								if (isset($_GET["page"])) {
									$current_page = $_GET["page"];
								}

								$next_page = $current_page + 1;
								$prev_page = $current_page - 1;

								$tenSP = $_GET["txtTimKiem"];
								$tenNSX = $_GET["TenNSX"];
								$tenLoai = $_GET["TenLMA"];
								$c_sql = "select count(*) as num_rows
										from sanpham
										where TenSP like '%$tenSP%'";
								$c_rs = load($c_sql);
								$c_row = $c_rs->fetch_assoc();
								$num_rows = $c_row["num_rows"];
								$num_pages = ceil($num_rows / $limit);

								if ($current_page < 1 || $current_page > $num_pages) {
									$current_page = 1;
								}

								$offset = ($current_page - 1) * $limit;
								$sql = "select *
										from sanpham
										where TenSP like '%$tenSP%' limit $offset, $limit";
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
	<div class="pagination">
		<ul>
			<?php for ($i = 1; $i <= $num_pages; $i++) : ?>	
				<li><a href="TrangTimKiem.php?txtTimKiem=<?php echo"$tenSP"; ?>&TenNSX=<?php echo"$tenNSX"; ?>&TenLMA=<?php echo"$tenLoai"; ?>&page= <?php echo"$i" ?>"><?php echo"$i"; ?></a></li>
			<?php endfor; ?>
		</ul>
	</div>
</div>







