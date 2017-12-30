<?php
	if (!session_id())
		session_start();
		if (!isset($_SESSION["User_ID"])) {
			$_SESSION["User_ID"] = 0;
	}
    
    if ($_SESSION["User_ID"] == 1 && isset($_POST["btnUpdate"])) {
    	$Username = $_POST["txtUsername"];
        $Password = $_POST["txtPassword"];
        $enc_Pass = md5($Password);
        $DOB = $_POST["txtDOB"];
        $id = $_SESSION["User"]->id;
        $DiaChi = $_POST["txtDiaChi"];
        $SDT = $_POST["txtSDT"];
        $sql = "update nguoidung set tenNguoiDung = '$Username', matKhau = '$enc_Pass', DOB = '$DOB', DiaChi = '$DiaChi', SDT = $SDT where id = $id";
        load($sql);
        
        $show = 1;
        
        $_SESSION["User"]->tenNguoiDung = $Username;
        $_SESSION["User"]->matKhau = $enc_Pass;
        $_SESSION["User"]->DOB = $DOB;
        $_SESSION["User"]->DiaChi = $DiaChi;
        $_SESSION["User"]->SDT = $SDT;
    }
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="TrangIndex.php">Home</a> <span class="divider">/</span></li>
	</ul>
	<div class="well">
		<!-- <?php
			if ($show == 1) :
		?>
			<div class="alert alert-success" role="alert">Cập nhật thành công</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">Không cập nhật được thông tin</div>
		<?php endif; ?> -->
		<form class="form-horizontal" method="post">
			<h4>Thông tin cá nhân</h4>
			<div class="control-group">
				<label class="control-label" for="input_email">Username <sup>*</sup></label>
				<div class="controls">
					<input type="text" id="txtUsername" name="txtUsername" value="<?= $_SESSION["User"]->tenNguoiDung ?>">
				</div>
			</div>			
			<div class="control-group">
				<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
				<div class="controls">
					<input type="password" id="txtPassword" name="txtPassword" value="<?= $_SESSION["User"]->matKhau ?>">
				</div>
			</div>			
			<div class="control-group">
				<label class="control-label">Ngày sinh <sup>*</sup></label>
				<div class="controls">
					<input type="text" id="txtDOB" name="txtDOB" value="<?= $_SESSION["User"]->DOB ?>">
				</div>
			</div>	
			<div class="control-group">
				<label class="control-label" for="input_email">Địa chỉ <sup>*</sup></label>
				<div class="controls">
					<input type="text" id="txtDiaChi" name="txtDiaChi" value="<?= $_SESSION["User"]->DiaChi ?>">
				</div>
			</div>		
			<div class="control-group">
				<label class="control-label" for="input_email">SDT <sup>*</sup></label>
				<div class="controls">
					<input type="text" id="txtSDT" name="txtSDT" value="<?= $_SESSION["User"]->SDT ?>">
				</div>
			</div>			
			<p><sup>*</sup>Required field</p>
			<div class="control-group">
				<div class="controls">
					<button type="submit" name="btnUpdate" id="btnUpdate" class="btn">Cập nhật</button>
				</div>
			</div>
		</form>
	</div>
</div>

