<?php  
    require_once "../lib/db.php";

    $show_alert = 0;

    if (isset($_POST["btnAdd"])) {
        $name = $_POST["txtTenNSX"];
        $sql = "insert into nhasx(TenNhaSX) values('$name')";

        load($sql);

        $show_alert = 1;
    }


 ?>

<div class="container-fluid">
    <div class="row">
        <br><br>
        <div class="col-md-5 col-md-offset-4">
        <?php if ($show_alert == 1) : ?>
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> You successfully read this important alert message.
            </div>
        <?php endif; ?>
            <form method="post" action="" name="frmAdd">
                <div class="form-group">
                    <label for="txtTenNSX">Tên nhà sản xuất</label>
                    <input type="text" class="form-control" id="txtTenNSX" name="txtTenNSX">
                </div>
                <a class="btn btn-primary" href="TrangAdmin.php" role="button" title="Về thôi">
                    <span class="glyphicon glyphicon-backward"></span>
                </a>
                <button type="submit" class="btn btn-success" name="btnAdd">
                    <span class="glyphicon glyphicon-check"></span>
                    Thêm mới
                </button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    
</script>