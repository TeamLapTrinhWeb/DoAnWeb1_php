<?php  
    require_once "../lib/db.php";

    $show_alert = 0;

    if (isset($_POST["btnAdd"])) {
        $name = $_POST["txtLoaiMayAnh"];
        $sql = "insert into loaimayanh(tenLoaiMayAnh) values('$name')";

        load($sql);

        $show_alert = 1;
    }


 ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm loại máy ảnh</h3>
                </div>
                <div class="panel-body">
                    <?php if ($show_alert == 1) : ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Bạn đã thêm thành công!</strong> 
                        </div>
                    <?php endif; ?>
                    <form method="post" action="" name="frmAdd">
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Tên loại máy ảnh</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtLoaiMayAnh" name="txtLoaiMayAnh">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="btnAdd">
                                    <span class="glyphicon glyphicon-check"></span>
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>