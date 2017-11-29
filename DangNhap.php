<?php 
	if (!session_id())
	session_start();
	if (!isset($_SESSION["User_ID"])) {
		$_SESSION["User_ID"] = 0;
	}

	require_once 'lib/db.php';
	$show_alert = 0;
	
	if (isset($_POST["btnLogin"])) {
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$enc_password = md5($password);

		$sql = "select * from nguoidung where tenNguoiDung = '$username' and matKhau = '$enc_password'";
		$rs = load($sql);
		if ($rs->num_rows > 0) {
			$_SESSION["User"] = $rs->fetch_object();
			$_SESSION["User_ID"] = 1;
			header("Location: TrangIndex.php");
		} else {
			$show_alert = 1;
		}
	}
	
 ?>


<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
	</ul>
	<h3> Login</h3>
	<hr class="soft"/>
	
	<div class="row">	
		<div class="span4">
			<div class="well">
				<?php 
					if ($show_alert == 1) :
				 ?>
					<div class="alert alert-danger" role="alert">Username hoặc Password không nhập chính xác</div>	
				<?php endif; ?>
				<form action="" method="post">
					<div class="control-group">
						<label class="control-label" for="inputEmail1">Username</label>
						<div class="controls">
							<input class="span3" name="txtUsername" type="text" id="txtUsername" placeholder="Email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword1">Password</label>
						<div class="controls">
							<input type="password" class="span3" name="txtPassword" id="txtPassword" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="btnLogin" id="btnLogin" class="btn">Sign in</button> <a href="forgetpass.html">Forget password?</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
				<h5>CREATE YOUR ACCOUNT</h5><br/>
				Enter your e-mail address to create an account.<br/><br/><br/>
				<form action="register.html">
					<div class="control-group">
						<label class="control-label" for="inputEmail0">E-mail address</label>
						<div class="controls">
							<input class="span3"  type="text" id="inputEmail0" placeholder="Email">
						</div>
					</div>
					<div class="controls">
						<button type="submit" class="btn block">Create Your Account</button>
					</div>
				</form>
			</div>
		</div>

	</div>
	
</div>
</div></div>
</div>