<?php require_once('Connections/dbcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
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

$maxRows_showpay = 10;
$pageNum_showpay = 0;
if (isset($_GET['pageNum_showpay'])) {
  $pageNum_showpay = $_GET['pageNum_showpay'];
}
$startRow_showpay = $pageNum_showpay * $maxRows_showpay;

mysql_select_db($database_dbcon, $dbcon);
$query_showpay = "SELECT * FROM tbl_payment";
$query_limit_showpay = sprintf("%s LIMIT %d, %d", $query_showpay, $startRow_showpay, $maxRows_showpay);
$showpay = mysql_query($query_limit_showpay, $dbcon) or die(mysql_error());
$row_showpay = mysql_fetch_assoc($showpay);

if (isset($_GET['totalRows_showpay'])) {
  $totalRows_showpay = $_GET['totalRows_showpay'];
} else {
  $all_showpay = mysql_query($query_showpay);
  $totalRows_showpay = mysql_num_rows($all_showpay);
}
$totalPages_showpay = ceil($totalRows_showpay/$maxRows_showpay)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ชำระแล้ว</title>
<?php include_once('css.php'); ?>
</head>

<body>
<?php include_once('admin_menu.php'); ?>
<?php include_once('admin_menuleft.php'); ?>
<table border="1" align="center">
  <tr>
    <td width="100" class="bg-danger">pay_id</td>
    <td width="100" class="bg-success">pay_email</td>
    <td width="100" class="bg-danger">pay_เบอร์โทร</td>
    <td width="100" class="bg-success">สลิป_img</td>
    <td width="100" class="bg-danger">pay_date</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center"><?php echo $row_showpay['pay_id']; ?></td>
      <td align="center"><?php echo $row_showpay['pay_email']; ?></td>
      <td align="center"><?php echo $row_showpay['pay_number']; ?></td>
      <td align="center"><img src="img/<?php echo $row_showpay['pay_img']; ?>" width="200"/></td>
      <td align="center"><?php echo $row_showpay['pay_date']; ?></td>
    </tr>
    <?php } while ($row_showpay = mysql_fetch_assoc($showpay)); ?>
</table>



<?php include_once('script.php'); ?>
</body>
</html>
<?php
mysql_free_result($showpay);
?>
