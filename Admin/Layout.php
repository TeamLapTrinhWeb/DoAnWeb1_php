<?php 
    session_start();
    if (!isset($_SESSION["dang_nhap_chua"])) {
        $_SESSION["dang_nhap_chua"] = 0;
    }

    if ($_SESSION["dang_nhap_chua"] == 0) {
        header("Location: Admin_Login.php");
    }
 ?>

 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ Web Bán Hàng</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="TrangAdmin.php">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Giỏ hàng</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><?= $_SESSION["current_user"]->tenNguoiDung ?></b> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Thông tin cá nhân</a></li>
                            <li><a href="#">Đổi mật khẩu</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="Admin_Logout.php">Thoát</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Danh mục</h3>
                        </div>
                        <div class="panel-body">
                            <div class="panel-heading">
                            <a href="TrangAdmin.php">
                                Danh sách các nhà sản xuất
                            </a>
                        </div>
                        <div class="panel-heading">
                            <a href="TrangAdmin_Add.php">
                                Thêm nhà sản xuất
                            </a>
                        </div>
                        <div class="panel-heading">
                            <a href="TrangAdminCate.php">
                                Danh sách các loại máy ảnh
                            </a>
                        </div>
                        <div class="panel-heading">
                            <a href="TrangAdmin_Add_Cate.php">
                                Thêm loại máy ảnh
                            </a>
                        </div>
                        <div class="panel-heading">
                            <a href="TrangAdminProducts.php">
                                Danh sách các sản phẩm
                            </a>
                        </div>
                        <div class="panel-heading">
                            <a href="TrangAdmin_Add_Products.php">
                                Thêm sản phẩm
                            </a>
                        </div>
                        <div class="panel-heading">
                            <a href="TrangQuanLyDonHang.php">
                                Quản lý đơn hàng
                            </a>
                        </div>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <?php include_once $page_body_file; ?>            
            </div>
        </div>
    </div>
	<script type="text/javascript" src="../assets/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#txtMoTa',
            menubar: false,
            toolbar1: "styleselect | bold italic | link image | alignleft aligncenter alignright | bullist numlist | fontselect | fontsizeselect | forecolor backcolor",
            // toolbar2: "",
            // plugins: 'link image textcolor',
            //height: 300,
            // encoding: "xml",
        });
    </script>
</body>
</html>