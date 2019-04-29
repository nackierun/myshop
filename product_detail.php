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

session_start();
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

$colname_showdata = "-1";
if (isset($_GET['p_id'])) {
    $colname_showdata = $_GET['p_id'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_showdata = sprintf("SELECT * FROM tbl_product WHERE p_id = %s", GetSQLValueString($colname_showdata, "int"));
$showdata = mysql_query($query_showdata, $dbcon) or die(mysql_error());
$row_showdata = mysql_fetch_assoc($showdata);
$totalRows_showdata = mysql_num_rows($showdata);

$colname_showdata = "-1";
if (isset($_GET['p_id'])) {
    $colname_showdata = $_GET['p_id'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_showdata = sprintf("SELECT * FROM tbl_product WHERE p_id = %s", GetSQLValueString($colname_showdata, "int"));
$showdata = mysql_query($query_showdata, $dbcon) or die(mysql_error());
$row_showdata = mysql_fetch_assoc($showdata);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style type="text/css">
            .container .row .col-xs-12.col-sm-8.col-md-9 #box {
	height: 100%;
	width: 500px;
	border: thin solid #000;
            }
            .container .row {
	height: auto;
	width: 500px;
            }
            #img {
                padding-left: 100px;
            }
        </style>
        <?php include('css.php'); ?>

    </head>
    <body>


        <?php include('menubar.php'); ?>


        <div class="col-xs-12 col-sm-4 col-md-3" id="img">
            <!-- show product img -->
            <img src="img/<?php echo $row_showdata['p_img']; ?>" />
        </div>
        <!-- start show product detail -->
        <div class="container" align="center">
            <div class="row">

                <div id="box" align="center">
                    <div class="col-xs-12 col-sm-8 col-md-9">
                        <!-- show product detail -->
                        <p>ชื่อสินค้า :<?php echo $row_showdata['p_name']; ?></p>
                        <p>Brand:<?php echo $row_showdata['cat_name']; ?></p>

                        <p> รายละเอียด</p>
                        <div id="box"><p> <?php echo $row_showdata['p_detail']; ?></p></div>
                      <p>ราคา :<?php echo $row_showdata['p_price']; ?> บาท</p>


                        <p><?php echo "<a href='cart.php?p_id=$row_showdata[p_id]&act=add'><span class='glyphicon glyphicon-shopping-cart'> </span> เพิ่มลงตะกร้าสินค้า </a>"; ?>
                        </p>

                        <p align="center"> <a href="index.php" class="btn btn-primary">กลับไปเลือกสินค้า</a> </p>
                    </div>

                </div>
            </div>
        </div>
        <?php
        mysql_free_result($showdata);
        ?>
        <?php include('footer.php'); ?>
        <?php include('script.php'); ?>

    </body>
</html>