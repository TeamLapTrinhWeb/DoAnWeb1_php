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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootshop online Shopping cart</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- Bootstrap style -->
		<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
		<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
		<link href="themes/css/base.css" rel="stylesheet" media="screen"/>
		<!-- Bootstrap style responsive -->
		<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
		<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
		<!-- Google-code-prettify -->
		<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
		<!-- fav and touch icons -->
		<link rel="shortcut icon" href="themes/images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
		<style type="text/css" id="enject"></style>
	</head>
	<body>
		<div id="header">
			<div class="container">
				<!-- Navbar ================================================== -->
				<div id="logoArea" class="navbar">
					<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-inner">
						<a class="brand" href="TrangDetail.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
						<form class="form-inline navbar-search" method="get" action="TrangTimKiem.php" id="frmTimKiem" >
							<input name="txtTimKiem" id="srchFld" class="srchTxt" type="text" />
							
							<select class="srchTxt" form="frmTimKiem" name="TenNSX">
								<?php
									$sql = "select * from nhasx";
									$rs = load($sql);
									while ($row = $rs->fetch_assoc()) :
								?>
								<option><?= $row["TenNhaSX"] ?></option>
								<?php endwhile ?>
							</select>
							<select class="srchTxt" form="frmTimKiem" name="TenLMA">
								<?php
									$sql = "select * from loaimayanh";
									$rs = load($sql);
									while ($row = $rs->fetch_assoc()) :
								?>
								<option><?= $row["tenLoaiMayAnh"] ?></option>
								<?php endwhile ?>
							</select>
							<button type="submit" id="submitButton" class="btn btn-primary">Go</button>
						</form>
						
						<ul id="topMenu" class="nav pull-right">
							<li class="">
								<a href="TrangDangNhap.php" style="padding-right:0"><span class="btn btn-large btn-success">Signin</span></a>
							</li>
							<li class="">
								<a href="TrangDangKy.php" style="padding-right:0"><span class="btn btn-large btn-success">Signup</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Header End====================================================================== -->
		<div id="mainBody">
			<div class="container">
				<div class="row">
					<!-- Sidebar ================================================== -->
					<div id="sidebar" class="span3">
						<ul id="sideManu" class="nav nav-tabs nav-stacked">
							<li class="subMenu open"><a>Nhà xản xuất</a>
							<ul>
								<?php
								$sql = "select * from nhasx";
								$rs = load($sql);
								while ($row = $rs->fetch_assoc()) :
								?>
								<li><a class="active" href="TrangProducts.php?id=<?= $row["id"] ?>"><i class="icon-chevron-right"></i><?= $row["TenNhaSX"] ?> </a></li>
								<?php endwhile ?>
							</ul>
						</li>
						<li class="subMenu"><a>Loại máy ảnh</a>
						<?php
						$sql = "select * from loaimayanh";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
						?>
						<ul style="display:none">
							<li><a href="TrangProductsCate.php?id=<?= $row["id"] ?>"><i class="icon-chevron-right"></i><?= $row["tenLoaiMayAnh"] ?></a></li>
						</ul>
						<?php endwhile ?>
					</li>
				</ul>
			</div>
			<!-- Thêm vào chỗ này -->
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
		</div>
	</div>
	<!-- <!-- Footer ================================================================== -->
	<div  id="footerSection">
		<div class="container">
			<div class="row">
				<div class="span3">
					<h5>ACCOUNT</h5>
					<a href="login.html">YOUR ACCOUNT</a>
					<a href="login.html">PERSONAL INFORMATION</a>
					<a href="login.html">ADDRESSES</a>
					<a href="login.html">DISCOUNT</a>
					<a href="login.html">ORDER HISTORY</a>
				</div>
				<div class="span3">
					<h5>INFORMATION</h5>
					<a href="contact.html">CONTACT</a>
					<a href="register.html">REGISTRATION</a>
					<a href="legal_notice.html">LEGAL NOTICE</a>
					<a href="tac.html">TERMS AND CONDITIONS</a>
					<a href="faq.html">FAQ</a>
				</div>
				<div class="span3">
					<h5>OUR OFFERS</h5>
					<a href="#">NEW PRODUCTS</a>
					<a href="#">TOP SELLERS</a>
					<a href="special_offer.html">SPECIAL OFFERS</a>
					<a href="#">MANUFACTURERS</a>
					<a href="#">SUPPLIERS</a>
				</div>
				<div id="socialMedia" class="span3 pull-right">
					<h5>SOCIAL MEDIA </h5>
					<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
					<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
					<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
				</div>
			</div>
			<p class="pull-right">&copy; Bootshop</p>
			</div><!-- Container End -->
		</div>
		<!-- Placed at the end of the document so the pages load faster ============================================= -->
		<script src="themes/js/jquery.js" type="text/javascript"></script>
		<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="themes/js/google-code-prettify/prettify.js"></script>
		
		<script src="themes/js/bootshop.js"></script>
		<script src="themes/js/jquery.lightbox-0.5.js"></script>
		
		<!-- Themes switcher section ============================================================================================= -->
		<div id="secectionBox">
			<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
			<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
			<div id="themeContainer">
				<div id="hideme" class="themeTitle">Style Selector</div>
				<div class="themeName">Oregional Skin</div>
				<div class="images style">
					<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
					<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
				</div>
				<div class="themeName">Bootswatch Skins (11)</div>
				<div class="images style">
					<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
					<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
					<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
				</div>
				<div class="themeName">Background Patterns </div>
				<div class="images patterns">
					<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
					<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
					
					<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
					
					<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
					<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
					
				</div>
			</div> -->
		</div>
		<span id="themesBtn"></span>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</html>