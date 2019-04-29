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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addcat")) {
    $insertSQL = sprintf("INSERT INTO tbl_category (cat_name) VALUES (%s)", GetSQLValueString($_POST['catname'], "text"));

    mysql_select_db($database_dbcon, $dbcon);
    $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

    $insertGoTo = "admin_category.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_category = "SELECT * FROM tbl_category";
$category = mysql_query($query_category, $dbcon) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
mysql_select_db($database_dbcon, $dbcon);
$query_category = "SELECT * FROM tbl_category";
$category = mysql_query($query_category, $dbcon) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>เพิ่มหมวดหมู่</title>
<?php include_once("css.php"); ?>
    </head>

    <body>
        <?php include_once("admin_menu.php"); ?>
<?php include_once("admin_menuleft.php"); ?>

        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"> <br />
                    <h4 align="center">เพิ่มหมวดหมู่</h4>
                    <hr />

                    <form name="addcat" action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" id="addcat">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p> brand </p>
                                <input type="text" name="catname" class="form-control"  rows="3"  required placeholder="catagory"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="btnadd"> เพิ่ม </button>
                            </div>
                        </div>
                        <input type="hidden" name="MM_insert" value="addcat" />
                    </form>

                </div>
            </div>
        </div>

<?php include_once("script.php"); ?>
    </body>
</html>
<?php
mysql_free_result($category);
?>
