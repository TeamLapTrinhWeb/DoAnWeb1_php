<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Products Name</li>
	</ul>
	<h3> Products Name </h3>
	<br class="clr"/>
	<div class="tab-content">
		<div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">
				<?php
					$limit = 6;
					$current_page = 1;
					if (isset($_GET["page"])) {
						$current_page = $_GET["page"];
					}

					$next_page = $current_page + 1;
					$prev_page = $current_page - 1;

					$idMaLoai = $_GET["id"];
					$c_sql = "select count(*) as num_rows from sanpham where maLoai = $idMaLoai";
					$c_rs = load($c_sql);
					$c_row = $c_rs->fetch_assoc();
					$num_rows = $c_row["num_rows"];
					$num_pages = ceil($num_rows / $limit);

					if ($current_page < 1 || $current_page > $num_pages) {
						$current_page = 1;
					}

					$offset = ($current_page - 1) * $limit;
					$sql = "select * from sanpham where maLoai = $idMaLoai limit $offset, $limit ";
					$rs = load($sql);
					if ($rs->num_rows > 0) :
						while ($row = $rs->fetch_assoc()) :
				?>
					<li class="span3">
						<div class="thumbnail">
							<a href="TrangDetail.php?id=<?= $row["id"] ?>"><img src="images/<?= $row["TenSP"] ?>"/></a>
							<div class="caption">
							<h5><?= $row["TenSP"] ?></h5>
							<h4 style="text-align:center"><a class="btn" href="TrangDetail.php?id=<?= $row["id"] ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?= number_format($row["giaBan"]) ?> vnd</a></h4>
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
			<hr class="soft"/>
		</div>
	</div>
	<div class="pagination">
		<ul>
			<?php for ($i = 1; $i <= $num_pages; $i++) : ?>	
				<li><a href="TrangProductsCate.php?id=<?php echo"$idMaLoai"; ?>&page= <?php echo"$i" ?>"><?php echo"$i"; ?></a></li>
			<?php endfor; ?>
		</ul>
	</div>
	<br class="clr"/>
</div>