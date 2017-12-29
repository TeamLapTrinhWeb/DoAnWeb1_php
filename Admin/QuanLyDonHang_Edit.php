<?php 
    require_once "../lib/db.php";
    $show_alert = 0;

    if (!isset($_GET["id"])) {
        header('Location: Admin_Login.php');
    }

    $id = $_GET["id"];
    if (isset($_POST["btnEdit"])) {
        $Status = $_POST["txtStatus"];
        $u_sql = "update orderdetails set Status = '$Status' where id = '$id'";
        write($u_sql);

        $show_alert = 1;
    }
   
    $sql = "select * from orderdetails where id = $id";
    $rs = load($sql);
    while ($row = $rs->fetch_assoc()) {
        $Status = $row["Status"];
    }
 ?>

<div class="container-fluid">
    <div class="row">
        <br><br>
        <div class="col-md-5 col-md-offset-4">
            <?php if ($show_alert == 1) : ?>
                <div class="alert alert-success" role="alert">
                    <strong>Bạn đã sửa thành công!</strong>
                </div>
            <?php endif; ?>
            <form method="post" action="" name="frmEdit">
                <div class="form-group">
                    <label for="txtTenNSX">Tình trạng</label>
                    <input type="text" class="form-control" id="txtStatus" name="txtStatus" value="<?= $Status ?>">
                </div>
                <a class="btn btn-primary" href="TrangAdmin.php" role="button" title="Về thôi">
                    <span class="glyphicon glyphicon-backward"></span>
                </a>
                <button type="submit" class="btn btn-success" name="btnEdit">
                    <span class="glyphicon glyphicon-check"></span>
                    Chỉnh sửa
                </button>    
            </form>
        </div>
    </div>
</div>