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
        <div class="col-md-12 col-lg-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Chỉnh sửa đơn hàng</h3>
                </div>
                <div class="panel-body">
                    <?php if ($show_alert == 1) : ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Bạn đã sửa thành công!</strong>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="">
                        <div class="form-group">
                            <label for="txtProName" class="col-sm-2 control-label">Tình trạng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtStatus" name="txtStatus" value="<?= $Status ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="btnEdit">
                                    <span class="glyphicon glyphicon-check"></span>
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