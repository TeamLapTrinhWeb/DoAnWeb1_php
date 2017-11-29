<?php  
    require_once "lib/db.php";

    $show_alert = 0;

    if (isset($_POST["btnSubmit"])) {
        $User = $_POST["txtUsername"];
        $Pass = $_POST["txtPassword"];
        $enc_Pass = md5($Pass);
        $Date = $_POST["ngay"];
        $Month = substr($_POST["thang"], 6);
        $Year = $_POST["nam"];

        $Day = $Year."-".$Month."-".$Date;
        
        $sql = "insert into nguoidung(tenNguoiDung) values('Home')";

        write($sql);

        $show_alert = 1;
    }
 ?>


<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
	</ul>
	<h3> Registration</h3>
	<div class="well">
		<?php 
			if ($show_alert == 1) :
		 ?>
		 	<div class="alert alert-success" role="alert">Bạn đã đăng ký thành công</div>
		<?php endif; ?>
		<form class="form-horizontal" action="" name="frmDangKy" method="post" onsubmit="return kiemtra();">
			<h4>Your personal information</h4>
			<div class="control-group">
				<label class="control-label" for="inputFname1">Tên đăng nhập <sup>*</sup></label>
				<div class="controls">
					<input type="text" name="txtUsername" placeholder="First Name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword1">Mật khẩu <sup>*</sup></label>
				<div class="controls">
					<input type="password" name="txtPassword" placeholder="Password">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Ngày sinh <sup>*</sup></label>
				<div class="controls">
					<select class="span1" name="ngay">
						<?php
							for ($i=1; $i < 32; $i++) :
						?>
						<option> <?= $i ?> &nbsp;&nbsp;</option>
						<?php endfor; ?>
					</select>
					<select class="span2" name="thang">
						<?php
							for ($i=1; $i < 13; $i++) :
						?>
							<option>tháng <?= $i ?> &nbsp;&nbsp;</option>
						<?php endfor; ?>
					</select>
					<select class="span1" name="nam">
						<?php
							for ($i=2017; $i > 1950; $i--) :
						?>
						<option> <?= $i ?> &nbsp;&nbsp;</option>
						<?php endfor; ?>
					</select>
					<div id="captcha">6 + 9 = ?</div>
					<input type="text" name="txtcaptcha" placeholder="15">
				</div>
			</div>
			<p><sup>*</sup>Required field	</p>
			
			


			<div class="control-group">
				<div class="controls">
					<input type="hidden" name="email_create" value="1">
					<input type="hidden" name="is_new_customer" value="1">
					<input class="btn btn-large btn-success" type="submit" value="Register" name="btnSubmit" />
				</div>
			</div>
		</form>		
	</div>
</div>
</div>
</div>
</div>