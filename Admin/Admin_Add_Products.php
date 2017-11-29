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
                <strong>Bạn đã thêm thành công!</strong>
            </div>
        <?php endif; ?>
            <form method="post" action="" name="frmAdd">
                <div class="form-group">
                    <label for="txtTenNSX">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="txtTenNSX" name="txtTenNSX">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Mã nhà sản xuất</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <?php
                                $tenSP = "frmAdd.txtTenNSX.value";
                                $sql = "select nhasx.id from sanpham join nhasx on sanpham.maNSX = nhasx.id where '$tenSP' REGEXP nhasx.TenNhaSX";
                                $rs = load($sql);
                                while ($row = $rs->fetch_assoc()) :
                            ?>
                                <option><?= $row["nhasx.id"] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Mã loại sản phẩm</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <?php
                                $sql = "select * from loaimayanh";
                                $rs = load($sql);
                                while ($row = $rs->fetch_assoc()) :
                            ?>
                                <option><?= $row["id"] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
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