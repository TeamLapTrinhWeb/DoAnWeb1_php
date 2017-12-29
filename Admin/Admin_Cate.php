<?php 
    require_once "../lib/db.php";
 ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên loại máy ảnh</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
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