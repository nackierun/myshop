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

if ((isset($_POST['p_id'])) && ($_POST['p_id'] != "")) {
    $deleteSQL = sprintf("DELETE FROM tbl_product WHERE p_id=%s", GetSQLValueString($_POST['p_id'], "int"));

    mysql_select_db($database_dbcon, $dbcon);
    $Result1 = mysql_query($deleteSQL, $dbcon) or die(mysql_error());

    $deleteGoTo = "admin_product.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
        $deleteGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_showproduct = "SELECT * FROM tbl_product ORDER BY p_id ASC";
$showproduct = mysql_query($query_showproduct, $dbcon) or die(mysql_error());
$row_showproduct = mysql_fetch_assoc($showproduct);
$totalRows_showproduct = mysql_num_rows($showproduct);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>สินค้า</title>
      
        <?php include_once("css.php"); ?>

    </head>

    <body>
        <?php include_once("admin_menu.php"); ?>
        <?php include_once("admin_menuleft.php"); ?>

        <div class="container" align="center">
            <p>ทั้งหมด :<?php echo $totalRows_showproduct ?></p>
            <table border="2">
                <tr class="bg-primary">
                    <th width="100" align="center">id</th>
                    <th width="100" align="center">ชื่อแบรนด์</th>
                    <th width="100" align="center">ชื่อสินค้า</th>
                    <th width="500" align="center">รายละเอียด</th>
                    <th width="100" align="center">ราคา</th>
                    <th width="100" align="center">รูป</th>
                    <th width="100" align="center">วันที่</th>
                    <th width="100" align="center">ลบ</th>
                    <th width="100" align="center">แก้ไข</th>
                    <th>#</th>
                </tr>
                <?php do { ?>
                    <tr>
                        <td align="center"><?php echo $row_showproduct['p_id']; ?></td>
                        <td align="center"><?php echo $row_showproduct['cat_name']; ?></td>
                        <td align="center"><?php echo $row_showproduct['p_name']; ?></td>
                        <td><?php echo $row_showproduct['p_detail']; ?></td>
                      <td><?php echo $row_showproduct['p_price']; ?> บาท</td>
                        <td><img src="img/<?php echo $row_showproduct['p_img']; ?>" width="100" /></td>
                        <td><?php echo $row_showproduct['date_save']; ?></td>
                        <td><form id="form1" name="form1" action="" method="post">
                                <input name="Submit" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยัน?');" value="ลบสินค้า" /><input name="p_id" type="hidden" id="p_id" value="<?php echo $row_showproduct['p_id']; ?>" /></form></td>
                        <td><a href="form_edit.php?p_id=<?php echo $row_showproduct['p_id']; ?>" class="btn btn-warning btn-xs">แก้ไข</a></td>
                        <td>#</td>
                    </tr>
                <?php } while ($row_showproduct = mysql_fetch_assoc($showproduct)); ?>
                <?php
                mysql_free_result($showproduct);
                ?>
            </table>
            &nbsp;
          <p align="center"><a href="add_product.php" class="btn btn-primary">+สินค้า</a></p>
        </div>
        <?php include_once("script.php"); ?>

    </body>
</html>