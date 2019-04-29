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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addprd")) {
    $insertSQL = sprintf("INSERT INTO tbl_product (cat_name) VALUES (%s)", GetSQLValueString($_POST['cat_name'], "text"));

    mysql_select_db($database_dbcon, $dbcon);
    $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

    $insertGoTo = "admin_index.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_cat = "SELECT * FROM tbl_category";
$cat = mysql_query($query_cat, $dbcon) or die(mysql_error());
$row_cat = mysql_fetch_assoc($cat);
$totalRows_cat = mysql_num_rows($cat);

mysql_select_db($database_dbcon, $dbcon);
$query_product = "SELECT * FROM tbl_product";
$product = mysql_query($query_product, $dbcon) or die(mysql_error());
$row_product = mysql_fetch_assoc($product);
$totalRows_product = mysql_num_rows($product);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ฟอร์มเพิ่มสินค้า</title>
        <?php include_once("css.php"); ?>
    </head>

    <body>
        <?php include_once("admin_menu.php"); ?>
        <?php include_once("admin_menuleft.php"); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"> <br />
                    <h4 align="center"> ฟอร์มเพิ่มสินค้า </h4>
                    <hr />
                    <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">

                        <div class="form-group">
                            <div class="col-sm-12">
                                <p> ชื่อสินค้า</p>
                                <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">

                                <p><select name="cat_name" id="cat_name">
                                        <?php
                                        do {
                                            ?>
                                            <option value="<?php echo $row_cat['cat_name'] ?>"<?php if (!(strcmp($row_cat['cat_name'], $row_product['cat_name']))) {
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

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> รายละเอียดสินค้า </p>
                                    <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <p> ราคา (บาท) </p>
                                    <input type="number"  name="p_price" class="form-control" required placeholder="ราคา" />
                                </div>
                                <div class="col-sm-8 info">
                                    <p> ภาพสินค้า </p>
                                    <input type="file" name="p_img" id="p_img" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" name="btnadd" formaction="admin_addproduct_db.php"> + เพิ่มสินค้า </button>
                                </div>
                            </div>
                            <input type="hidden" name="MM_insert" value="addprd" />

                    </form>

                </div>
            </div>
        </div>


<?php include_once("script.php"); ?>
    </body>
</html>
<?php
mysql_free_result($cat);

mysql_free_result($product);
?>
