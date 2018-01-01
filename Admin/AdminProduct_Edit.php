<?php     
    require_once "../lib/db.php";
    $show_alert = 0;

    $id = $_GET["id"];

    if (!isset($_GET["id"])) {
        header('Location: TrangAdminProducts.php');
    }

    if (isset($_POST["btnEdit"])) {
        $tenSp = $_POST["txtTenSP"];
        $maNSX = $_POST["MaNSX"];
        $maLoai = $_POST["MaLMA"];
        $giaBan = $_POST["txtGiaBan"];
        $soLuotXem = $_POST["txtSoLuotXem"];
        $soLuongBan = $_POST["txtSoLuongBan"];
        $moTa = $_POST["txtMoTa"];
        $xuatXu = $_POST["txtXuatXu"];
        
        $u_sql = "update sanpham set TenSP = '$tenSp', maNSX = $maNSX, maLoai = $maLoai, giaBan = $giaBan, soLuotXem = $soLuotXem, soLuongBan = $soLuongBan, moTa = '$moTa', xuatXu = '$xuatXu' where id = '$id'";
        write($u_sql);

        $show_alert = 1;
    }

    if (isset($_POST["btnDelete"])) {
        $d_sql = "delete from sanpham where id = $id";
        write($d_sql);
        header('Location: TrangAdminProducts.php');
    }

   
    $sql = "select * from sanpham where id = $id";
    $rs = load($sql);
    $name = "";
    while ($row = $rs->fetch_assoc()) {
        $name = $row["TenSP"];
        $maNSX = $row["maNSX"];
        $maLoai = $row["maLoai"];
        $giaBan = $row["giaBan"];
        $soLuotXem = $row["soLuotXem"];
        $soLuongBan = $row["soLuongBan"];
        $moTa = $row["moTa"];
        $xuatXu = $row["xuatXu"];
    }
 ?>

<div class="container-fluid">
    <div class="row">
         <div class="col-md-12 col-lg-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Chỉnh sủa sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <?php if ($show_alert == 1) : ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Bạn đã sữa thành công!</strong>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtProName" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtTenSP" name="txtTenSP" value="<?= $name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selCatID" class="col-sm-2 control-label">Mã nhà sản xuất</label>
                            <div class="col-sm-10">
                                <!-- <select id="selCatID" name="MaNSX" class="form-control" value="<?= $maNSX ?>">
                                </select> -->
                                <input type="text" class="form-control" id="txtTenSP" name="MaNSX" value="<?= $maNSX ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selCatID" class="col-sm-2 control-label">Mã loại máy ảnh</label>
                            <div class="col-sm-10">
                                <!-- <select id="selCatID" name="MaLMA" class="form-control" value="<?= $maLoai ?>">
                                </select> -->
                                <input type="text" class="form-control" id="txtTenSP" name="MaLMA" value="<?= $maLoai ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtGiaBan" name="txtGiaBan" value="<?= $giaBan ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Số lượt xem</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtSoLuotXem" name="txtSoLuotXem" value="<?= $soLuotXem ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Số lượng bán</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtSoLuongBan" name="txtSoLuongBan" value="<?= $soLuongBan ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtFullDes" class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea rows="6" id="txtMoTa" name="txtMoTa" class="form-control" value="<?= $moTa ?>"><?= $moTa ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Xuất xứ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtXuatXu" name="txtXuatXu" value="<?= $xuatXu ?>">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="fuMain" class="col-sm-2 control-label">Hình ảnh</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="fuMain" name="fuMain">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="btnEdit" type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Chỉnh sửa
                                </button>
                                <button name="btnDelete" type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Xóa luôn
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div