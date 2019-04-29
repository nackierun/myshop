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

mysql_select_db($database_dbcon, $dbcon);
$query_order = "SELECT * FROM tbl_order";
$order = mysql_query($query_order, $dbcon) or die(mysql_error());
$row_order = mysql_fetch_assoc($order);
$totalRows_order = mysql_num_rows($order);

mysql_select_db($database_dbcon, $dbcon);
$query_order_detail = "SELECT * FROM tbl_order_detail";
$order_detail = mysql_query($query_order_detail, $dbcon) or die(mysql_error());
$row_order_detail = mysql_fetch_assoc($order_detail);
$totalRows_order_detail = mysql_num_rows($order_detail);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>จัดการร้านค้า</title>
        <!-- Bootstrap core CSS -->

<?php include_once ("css.php"); ?>

    </head>
    <body>
        <div class="container">
            <div class="row">

                <?php include_once ("admin_menu.php"); ?>

<?php include_once ("admin_menuleft.php"); ?>
                <div class="container">
                    <div class="row">
                        <fieldset><legend>order<p>status:1=ยังไม่ได้รับการยืนยัน , 2= แจ้งโอนแล้ว, 3=ส่งของเรียบร้อยแล้ว, 4=ยกเลิก</p></legend>
                            <table border="1" align="center">
                                <tr>
                                    <th width="100">order id</th>
                                    <th width="100">ชื่อ</th>
                                    <th width="100">ที่อยู่</th>
                                    <th width="100">email</th>
                                    <th width="100">phone</th>
                                    <th width="100">สถานะสั่งซื้อ</th>
                                    <th width="100">วันที่สั่ง</th>
                                    <th>เปลี่ยนสถานะ</th>
                                </tr>
<?php do { ?>
                                    <tr>
                                        <td class="alert-success" align="center"><?php echo $row_order['order_id']; ?></td>
                                        <td class="alert-warning" align="center"><?php echo $row_order['name']; ?></td>
                                        <td class="alert-success" align="center"><?php echo $row_order['address']; ?></td>
                                        <td class="alert-warning" align="center"><?php echo $row_order['email']; ?></td>
                                        <td class="alert-success" align="center"><?php echo $row_order['phone']; ?></td>
                                        <td class="alert-warning" align="center"><?php echo $row_order['order_status']; ?></td>
                                        <td class="alert-success" align="center"><?php echo $row_order['order_date']; ?></td>
                                        <td align="center"><a href="admin_order_edit.php?order_id=<?php echo $row_order['order_id']; ?>" class="btn btn-warning btn-xs">แก้ไข</a></td>
                                    </tr>
<?php } while ($row_order = mysql_fetch_assoc($order)); ?>
                            </table>
                        </fieldset>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <fieldset><legend>Order Detail</legend>
                            <table border="1" align="center">
                                <tr>
                                    <th width="100">id</th>
                                    <th width="100">order id</th>
                                    <th width="100">สินค้า</th>
                                    <th width="100">จำนวน</th>
                                    <th width="100">ยอดรวม</th>
                                </tr>
<?php do { ?>
                                    <tr>
                                        <td class="bg-info"><?php echo $row_order_detail['d_id']; ?></td>
                                        <td class="bg-success"><?php echo $row_order_detail['order_id']; ?></td>
                                        <td class="bg-info"><?php echo $row_order_detail['p_id']; ?></td>
                                        <td class="bg-success"><?php echo $row_order_detail['p_qty']; ?></td>
                                        <td class="bg-info"><?php echo $row_order_detail['total']; ?></td>
                                    </tr>
<?php } while ($row_order_detail = mysql_fetch_assoc($order_detail)); ?>
                            </table>
                        </fieldset>
                    </div>
                    <div>

                    </div>
                </div>
                <!--Core JavaScript file  -->
<?php include_once ("script.php"); ?>
                </body>
                </html>
                <?php
                mysql_free_result($order);

                mysql_free_result($order_detail);
                ?>
