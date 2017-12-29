<?php
    require_once "../lib/db.php";
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Tình trạng</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
     <?php
        $sql = "select * from orderdetails join orders on orderdetails.OrderID = orders.OrderID join sanpham on sanpham.id = orderdetails.ProID";
        $rs = load($sql);
        if ($rs->num_rows > 0) :
            while ($row = $rs->fetch_assoc()) :
    ?>
            <tr>
                <td><?= $row["TenSP"] ?></td>
                <td><?= $row["Price"] ?></td>
                <td><?= $row["Quantity"] ?></td>
                <td><?= $row["Amount"] ?></td>
                <?php 
                    if ($row["Status"] == 'Đã giao') :
                 ?>
                    <td style="background-color: green; color: yellow"><?= $row["Status"] ?></td>
                <?php else: ?>
                    <td><?= $row["Status"] ?></td>
                <?php endif; ?>    
                <td class="text-right">
                    <a class="btn btn-default btn-xs" href="TrangQuanLyDonHang_Edit?id=<?= $row["ID"] ?>" role="button">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
    <?php
            endwhile;
        endif;
    ?>
    </tbody>
</table>
