<?php 
    ob_start();
    require_once "../lib/db.php";
    $show_alert = 0;

    if (!isset($_GET["id"])) {
        header('Location: TrangAdmin.php');
    }

    if (isset($_POST["btnEdit"])) {
        $u_id = $_POST["txtID"];
        $u_name = $_POST["txtTenNSX"];
        $u_sql = "update nhasx set TenNhaSX = '$u_name' where id = '$u_id'";
        write($u_sql);

        $show_alert = 1;
    }

    if (isset($_POST["btnDelete"])) {
        $d_id = $_POST["txtID"];
        $d_sql = "delete from nhasx where id = $d_id";
        write($d_sql);
        header('Location: TrangAdmin.php');
    }

    $id = $_GET["id"];
    $sql = "select * from nhasx where id = $id";
    $rs = load($sql);
    while ($row = $rs->fetch_assoc()) {
        $name = $row["TenNhaSX"];
    }
    
 ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Chỉnh sửa nhà sản xuất</h3>
                </div>
                <div class="panel-body">
                    <?php if ($show_alert == 1) : ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Bạn đã sửa thành công!</strong>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="">
                        <div class="form-group">
                            <label for="txtProName" class="col-sm-2 control-label">id</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtID" name="txtID" readonly value="<?= $id ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtProName" class="col-sm-2 control-label">Tên nhà sản xuất</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtTenNSX" name="txtTenNSX" value="<?= $name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="btnEdit">
                                    <span class="glyphicon glyphicon-check"></span>
                                    Lưu
                                </button>
                                <button type="submit" class="btn btn-danger" name="btnDelete">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    Xoá luôn
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
