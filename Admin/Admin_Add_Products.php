<?php  
    require_once "../lib/db.php";

    $show_alert = 0;

    if (isset($_POST["btnSave"])) {
        $TenSP = $_POST["txtTenSP"];
        $MaNSX = $_POST["MaNSX"];
        $MaLMA = $_POST["MaLMA"];
        $GiaBan = $_POST["txtGiaBan"];
        $SoLuotXem = $_POST["txtSoLuotXem"];
        $SoLuongBan = $_POST["txtSoLuongBan"];
        $MoTa = $_POST["txtMoTa"];
        $XuatXu = $_POST["txtXuatXu"];

        $sql = "insert into sanpham(TenSP, maNSX, maLoai, giaBan, soLuotXem, soLuongBan, moTa, xuatXu) values('$TenSP', $MaNSX, $MaLMA, $GiaBan, $SoLuotXem, $SoLuongBan, '$MoTa', '$XuatXu')";
        write($sql);

        $f = $_FILES["fuMain"];
        if ($f["error"] > 0) {

        } else {

            mkdir("../images");

            $tmp_name = $f["tmp_name"];
            $name = $f["name"];
            $destination = "../images/$TenSP.jpg";

            move_uploaded_file($tmp_name, $destination);
        }
    }


 ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sản phẩm mới</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtProName" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtTenSP" name="txtTenSP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selCatID" class="col-sm-2 control-label">Mã nhà sản xuất</label>
                            <div class="col-sm-10">
                                <select id="selCatID" name="MaNSX" class="form-control">
                                    <?php
                                        $sql = "select * from nhasx";
                                        $rs = load($sql);
                                        while ($row = $rs->fetch_assoc()) :
                                    ?>
                                        <option><?= $row["id"] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selCatID" class="col-sm-2 control-label">Mã loại máy ảnh</label>
                            <div class="col-sm-10">
                                <select id="selCatID" name="MaLMA" class="form-control">
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
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtGiaBan" name="txtGiaBan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Số lượt xem</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtSoLuotXem" name="txtSoLuotXem">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Số lượng bán</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtSoLuongBan" name="txtSoLuongBan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtFullDes" class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea rows="6" id="txtMoTa" name="txtMoTa" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-2 control-label">Xuất xứ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtXuatXu" name="txtXuatXu">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="fuMain" class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="fuMain" name="fuMain">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button name="btnSave" type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Lưu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>