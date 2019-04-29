<?php require_once('Connections/dbcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "addprd")) {
    $updateSQL = sprintf("UPDATE tbl_product SET p_name=%s, cat_name=%s, p_price=%s, p_detail=%s WHERE p_id=%s", GetSQLValueString($_POST['p_name'], "text"), GetSQLValueString($_POST['cat_name'], "text"), GetSQLValueString($_POST['p_price'], "double"), GetSQLValueString($_POST['p_detail'], "text"), GetSQLValueString($_POST['p_id'], "int"));

    mysql_select_db($database_dbcon, $dbcon);
    $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

    $updateGoTo = "admin_index.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
}

$colname_edit = "-1";
if (isset($_GET['p_id'])) {
    $colname_edit = $_GET['p_id'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_edit = sprintf("SELECT * FROM tbl_product WHERE p_id = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysql_query($query_edit, $dbcon) or die(mysql_error());
$row_edit = mysql_fetch_assoc($edit);
$totalRows_edit = mysql_num_rows($edit);

mysql_select_db($database_dbcon, $dbcon);
$query_cat = "SELECT * FROM tbl_category";
$cat = mysql_query($query_cat, $dbcon) or die(mysql_error());
$row_cat = mysql_fetch_assoc($cat);
$totalRows_cat = mysql_num_rows($cat);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>แก้ไขสินค้า</title>
<?php include_once ("css.php"); ?>

    </head>

    <body>
        <?php include_once ("admin_menu.php"); ?>
<?php include_once ("admin_menuleft.php"); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"> <br />
                    <h4 align="center"> ฟอร์มแก้ไขสินค้า </h4>
                    <hr />
                    <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p> ชื่อสินค้า</p>
                                <input type="text"  name="p_name" class="form-control"  placeholder="<?php echo $row_edit['p_name']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>เลือกหมวดหมู่</p>
                                <p>
                                    <select name="cat_name" id="cat_name">
<?php
do {
    ?>
                                            <option value="<?php echo $row_cat['cat_name'] ?>"<?php if (!(strcmp($row_cat['cat_name'], $row_edit['cat_name']))) {
        echo "selected=\"selected\"";
    } ?>><?php echo $row_cat['cat_name'] ?></option>
                                            <?php
                                        } while ($row_cat = mysql_fetch_assoc($cat));
                                        $rows = mysql_num_rows($cat);
                                        if ($rows > 0) {
                                            mysql_data_seek($cat, 0);
                                            $row_cat = mysql_fetch_assoc($cat);
                                        }
                                        ?>
                                    </select></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <p> รายละเอียดสินค้า </p>
                                <textarea name="p_detail" class="form-control"  rows="3"   placeholder="<?php echo $row_edit['p_detail']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <p> ราคา (บาท) </p>
                                <input type="number"  name="p_price" class="form-control"  placeholder="<?php echo $row_edit['p_price']; ?> บาท" />
                            </div>
                            <div class="col-sm-8 info">
                                <div><label>ภาพ</label>
                                    <img src="img/<?php echo $row_edit['p_img']; ?>" width="100" /></div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="btnadd"> แก้ไขสินค้า </button>
                                &nbsp;<a class="btn btn-danger" href="admin_index.php">ยกเลิก</a> </div>
                        </div><input name="p_id" type="hidden" id="p_id" value="<?php echo $row_edit['p_id']; ?>" />
                        <input type="hidden" name="MM_update" value="addprd" />

                    </form>

                </div>
            </div>
        </div>

<?php include_once ("script.php"); ?>
    </body>
</html>
        <?php
        mysql_free_result($edit);

        mysql_free_result($cat);
        ?>
