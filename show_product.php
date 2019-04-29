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

mysql_select_db($database_dbcon, $dbcon);
$query_showproduct = "SELECT * FROM tbl_product";
$showproduct = mysql_query($query_showproduct, $dbcon) or die(mysql_error());
$row_showproduct = mysql_fetch_assoc($showproduct);
$totalRows_showproduct = mysql_num_rows($showproduct);
$query_showproduct = "SELECT * FROM tbl_product";
$showproduct = mysql_query($query_showproduct, $dbcon) or die(mysql_error());
$row_showproduct = mysql_fetch_assoc($showproduct);
$totalRows_showproduct = mysql_num_rows($showproduct);
$query_showproduct = "SELECT * FROM tbl_product";
$showproduct = mysql_query($query_showproduct, $dbcon) or die(mysql_error());
$row_showproduct = mysql_fetch_assoc($showproduct);
$totalRows_showproduct = mysql_num_rows($showproduct);

mysql_select_db($database_dbcon, $dbcon);
$query_showproduct = "SELECT * FROM tbl_product ORDER BY p_name ASC";
$showproduct = mysql_query($query_showproduct, $dbcon) or die(mysql_error());
$row_showproduct = mysql_fetch_assoc($showproduct);
?>
<?php do { ?>
    <div class="col-xs-6 col-sm-4 col-md-3">


        <div class="thumbnail product-box">
            <img src="img/<?php echo $row_showproduct['p_img']; ?>" width="100"/>
            <div class="caption">
                <h3><a href="product_detail.php?p_id=<?php echo $row_showproduct['p_id']; ?>"><?php echo $row_showproduct['p_name']; ?> </a></h3>
                <p><?php echo $row_showproduct['cat_name']; ?></p>
                <p>ราคา : <strong><?php echo $row_showproduct['p_price']; ?>  บาท</strong>  </p>
                <p><?php echo "<a href='cart.php?p_id=$row_showproduct[p_id]&act=add'><span class='glyphicon glyphicon-shopping-cart'> </span> เพิ่มลงตะกร้าสินค้า </a>"; ?> 
                    <a href="product_detail.php?p_id=<?php echo $row_showproduct['p_id']; ?>" class="btn btn-primary" role="button">รายละเอียด</a></p>
            </div>
        </div>


    </div>
<?php } while ($row_showproduct = mysql_fetch_assoc($showproduct)); ?>
<?php
mysql_free_result($showproduct);
?>
