<?php 
    require_once "../lib/db.php";
 ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="panel panel-default">
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
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <table class="table table-hover">
                <tbody>
                <?php
                    $sql = "select * from loaimayanh";
                    $rs = load($sql);
                    while ($row = $rs->fetch_assoc()) :
                ?>
                        <tr>
                            <td><?= $row["tenLoaiMayAnh"] ?></td>
                            <td class="text-right">
                                <a class="btn btn-default btn-xs" href="TrangAdminCate_Edit.php?id=<?= $row["id"] ?>" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a class="btn btn-danger btn-xs" href="AdminCate_Delete.php?id=<?= $row["id"] ?>" role="button">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                <?php
                    endwhile;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>