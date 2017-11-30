<?php
	if (!isset($_SESSION["User_ID"])) {
        $_SESSION["User_ID"] = 0;
    }
    $show = 0;
    if ($_SESSION["User_ID"] == 1 && isset($_POST["btnUpdate"])) {
    	$Username = $_POST["txtUsername"];
        $Password = $_POST["txtPassword"];
        $enc_Password = md5($Password);
        $DOB = $_POST["txtDOB"];
        $id = $_SESSION["User"]->id;
        $sql = "update nguoidung set tenNguoiDung = '$Username', matKhau = '$enc_Password', DOB = '$DOB' where id = $id";
        write($sql);
        $show = 1;
    }
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="TrangIndex.php">Home</a> <span class="divider">/</span></li>
	</ul>
	<div class="well">
		<?php
			if ($show == 1) :
		?>
		<div class="alert alert-success" role="alert">Thành công</div>
		<?php endif; ?>
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
			<p><sup>*</sup>Required field	</p>			
			<div class="control-group">
				<div class="controls">
					<input class="btn btn-large btn-success" type="submit" name="btnUpdate" id="btnUpdate" value="Cập nhật" />
				</div>
			</div>
		</form>
	</div>
</div>

