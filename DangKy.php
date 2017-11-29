<?php
require_once "lib/db.php";
$show_alert = 0;
$show_recaptcha = 0;

if(isset($_POST["btnSubmit"]))
{
	if (empty($_POST["txtUsername"]) || strlen($_POST["txtUsername"]) > 255) 
	{
		$show_alert = 3;
	}
	elseif (empty($_POST["txtPassword"]) || strlen($_POST["txtPassword"]) < 6) 
	{
		$show_alert = 4;
	}
	elseif (!empty($_POST["txtUsername"]))
	{
		$User = $_POST["txtUsername"];
	
		$secretKey = "6LdW4DoUAAAAAK_PTnxBv08YLHrnl045gPRc2wTo";
		$responseKey = $_POST["g-recaptcha-response"];
		$userIP = $_SERVER['REMOTE_ADDR'];
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
		$response = file_get_contents($url);
		$response = json_decode($response);
		if ($response->success) 
		{
			$sql = "select * from nguoidung where tenNguoiDung = '$User'";
			$rs = load($sql);
				
			if ($rs->num_rows > 0) 
			{
					$show_alert = 2;
			}else
			{
				$Pass = $_POST["txtPassword"];
				$enc_Pass = md5($Pass);
				$Day = $_POST["ngay"];
				$Month = substr($_POST["thang"], 6);
				$Year = $_POST["nam"];
				$Date = $Year."-".$Month."-".$Day;
				
				$sql = "insert into nguoidung(tenNguoiDung, matKhau, DOB, quyen) values('$User', '$enc_Pass', '$Date', '0')";
				load($sql);
				
				$show_alert = 1;
			}
		}
		else
		{
			$show_recaptcha = 2;
		}
	}		
}
?>


<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
	</ul>
	<h3> Đăng ký</h3>
	<div class="well">
		<?php
			if ($show_recaptcha == 2) :
		?>
		<div class="alert alert-danger" role="alert">Bạn chưa check recaptcha</div>
		<?php endif; ?>
		<?php
			if ($show_alert == 1) :
		?>
		<div class="alert alert-success" role="alert">Bạn đã đăng ký thành công</div>
		<?php endif; ?>
		<?php
			if ($show_alert == 2) :
		?>
		<div class="alert alert-danger">
			<strong>Username đã tồn tại!</strong>
		</div>
		<?php endif; ?>
		<?php
			if ($show_alert == 3) :
		?>
		<div class="alert alert-danger">
			<strong>Username trống hoặc dài quá 255 ký tự!</strong>
		</div>
		<?php endif; ?>
		<?php
			if ($show_alert == 4) :
		?>
		<div class="alert alert-danger">
			<strong>Password trống hoặc ít dưới 6 ký tự!</strong>
		</div>
		<?php endif; ?>
		<form class="form-horizontal" action="" name="frmDangKy" method="post">
			<h4>Thông tin cá nhân</h4>
			<div class="control-group">
				<label class="control-label" for="inputFname1">Tên đăng nhập <sup>*</sup></label>
				<div class="controls">
					<input type="text" name="txtUsername">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword1">Mật khẩu <sup>*</sup></label>
				<div class="controls">
					<input type="password" name="txtPassword">
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
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="g-recaptcha" data-sitekey="6LdW4DoUAAAAADbGk1x33Tk7TlBZ8P7qBwTlHmC5"></div>
				</div>
			</div>
			
			<p><sup>*</sup>Required field	</p>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-large btn-success" name="btnSubmit">
					Đăng ký
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
