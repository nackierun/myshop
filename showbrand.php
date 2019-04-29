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

$colname_showproduct = "-1";
if (isset($_GET['cat_name'])) {
    $colname_showproduct = $_GET['cat_name'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_showproduct = sprintf("SELECT * FROM tbl_product WHERE cat_name = %s", GetSQLValueString($colname_showproduct, "text"));
$showproduct = mysql_query($query_showproduct, $dbcon) or die(mysql_error());
$row_showproduct = mysql_fetch_assoc($showproduct);
$totalRows_showproduct = mysql_num_rows($showproduct);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>รายการสินค้า</title>
        <!-- Bootstrap core CSS -->
        <?php include_once ("css.php"); ?>
    </head>

    <body>
        <?php include_once ("menubar.php"); ?>
        <div class="container">
            <div class="row">


                &nbsp;
                &nbsp;
                &nbsp;
                <div class="row">
                    <?php include_once ("category.php"); ?>
                    <div class="col-md-9">
                        <div>
                            <ol class="breadcrumb">
                                <li>สินค้า</li>
                            </ol>
                        </div>

                        <div class="row">



                            <?php do { ?>
                                <div class="col-xs-6 col-sm-4 col-md-3">
                                    <div class="thumbnail product-box">
                                        <img src="img/<?php echo $row_showproduct['p_img']; ?>"/>
                                        <div class="caption">
                                            <h3><a href="#"><?php echo $row_showproduct['p_name']; ?> </a></h3>
                                            <p>ราคา : <strong><?php echo $row_showproduct['p_price']; ?>  บาท</strong>  </p>
                                            <p><?php echo "<a href='cart.php?p_id=$row_showproduct[p_id]&act=add'><span class='glyphicon glyphicon-shopping-cart'> </span> เพิ่มลงตะกร้าสินค้า </a>"; ?> 
                                                <a href="product_detail.php?p_id=<?php echo $row_showproduct['p_id']; ?>" class="btn btn-primary" role="button">รายละเอียด</a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } while ($row_showproduct = mysql_fetch_assoc($showproduct)); ?>



                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!--Footer -->
        <?php include_once ("footer.php"); ?>

        <!--Core JavaScript file  -->
        <?php include_once ("script.php"); ?>
    </body>
</html>
<?php
mysql_free_result($showproduct);
?>
