<?php 
    require_once "../lib/db.php";
    if (!session_id()){
        session_start();
        if (!isset($_SESSION["dang_nhap_chua"])) {
            $_SESSION["dang_nhap_chua"] = 0;
        }

        if ($_SESSION["dang_nhap_chua"] == 0) {
            header("Location: Admin_login.php");
        }
    }

 ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên nhà sản xuất</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
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