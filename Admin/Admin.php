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
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <table class="table table-hover">
                <tbody>
                <?php
                    $sql = "select * from nhasx";
                    $rs = load($sql);
                    while ($row = $rs->fetch_assoc()) :
                ?>
                        <tr>
                            <td><?= $row["TenNhaSX"] ?></td>
                            <td class="text-right">
                                <a class="btn btn-default btn-xs" href="TrangAdmin_Edit.php?id=<?= $row["id"] ?>" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a class="btn btn-danger btn-xs" href="Admin_Delete.php?id=<?= $row["id"] ?>" role="button">
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