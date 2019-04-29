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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "order_status_frm")) {
  $updateSQL = sprintf("UPDATE tbl_order SET order_status=%s WHERE order_id=%s",
                       GetSQLValueString($_POST['ord_sts'], "int"),
                       GetSQLValueString($_POST['order_id'], "int"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "admin_order_detail.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_order = "-1";
if (isset($_GET['order_id'])) {
  $colname_order = $_GET['order_id'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_order = sprintf("SELECT * FROM tbl_order WHERE order_id = %s", GetSQLValueString($colname_order, "int"));
$order = mysql_query($query_order, $dbcon) or die(mysql_error());
$row_order = mysql_fetch_assoc($order);
$totalRows_order = mysql_num_rows($order);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php include_once('css.php'); ?>
</head>

<body>
<?php include_once('admin_menu.php'); ?>
<?php include_once('admin_menuleft.php'); ?>
<fieldset><legend>1=ยังไม่ได้รับการยืนยัน , 2= แจ้งโอนแล้ว, 3=ส่งของเรียบร้อยแล้ว, 4=ยกเลิก</legend>
<form action="<?php echo $editFormAction; ?>" method="POST" name="order_status_frm" id="order_status_frm">
  <p>
    <label for="ord_sts">status</label>
    <input name="ord_sts" type="text" id="ord_sts" maxlength="1" placeholder="<?php echo $row_order['order_status']; ?>" />
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit" /> <div><a href="admin_order_detail.php">กลับ</a></div>
    <input name="order_id" type="hidden" id="order_id" value="<?php echo $row_order['order_id']; ?>" />
                        <input type="hidden" name="MM_update" value="order_status_frm" />
  </p>
</form>
</fieldset>
<?php include_once('script.php'); ?>
</body>
</html>
<?php
mysql_free_result($order);
?>
