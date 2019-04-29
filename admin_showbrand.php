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

$colname_showpd = "-1";
if (isset($_GET['cat_name'])) {
  $colname_showpd = $_GET['cat_name'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_showpd = sprintf("SELECT * FROM tbl_product WHERE cat_name = %s", GetSQLValueString($colname_showpd, "text"));
$showpd = mysql_query($query_showpd, $dbcon) or die(mysql_error());
$row_showpd = mysql_fetch_assoc($showpd);
$totalRows_showpd = mysql_num_rows($showpd);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>brand</title>
<?php include_once ("css.php"); ?>

    </head>
<body>
        <div class="container">
            <div class="row">

                <?php include_once ("admin_menu.php"); ?>

                <?php include_once ("admin_menuleft.php"); ?>
                <div class="container">
                    <div class="row">




                    
<table border="1" align="center">
      <tr class="bg-primary">
        <th width="100" align="center">ID</th>
        <th width="100" align="center">ชื่อสินค้า</th>
        <th width="100" align="center">แบรนด์</th>
        <th width="100" align="center">ราคา</th>
        <th width="100" align="center">รูป</th>
        <th width="500" align="center">รายละเอียด</th>
        <th width="100" align="center">วันที่เพิ่มเข้ามา</th>
      </tr>
      <?php do { ?>
        <tr>
          <td class="bg-danger"><?php echo $row_showpd['p_id']; ?></td>
          <td class="bg-info"><?php echo $row_showpd['p_name']; ?></td>
          <td class="bg-success"><?php echo $row_showpd['cat_name']; ?></td>
          <td class="bg-info"><?php echo $row_showpd['p_price']; ?></td>
          <td class="bg-success"><img src="img/<?php echo $row_showpd['p_img']; ?>" width="100" /></td>
          <td class="bg-info"><?php echo $row_showpd['p_detail']; ?></td>
          <td class="bg-success"><?php echo $row_showpd['date_save']; ?></td>
        </tr>
        <?php } while ($row_showpd = mysql_fetch_assoc($showpd)); ?>
</table>
<p>&nbsp;
&nbsp;</p>
<p align="center"><a href="admin_category.php" class="btn btn-danger">กลับ</a></p>

</div>
                </div>
                <!--Core JavaScript file  -->
                <?php include_once ("script.php"); ?>
</body>
</html>
<?php
mysql_free_result($showpd);
?>
