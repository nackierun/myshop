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
$query_showcat = "SELECT * FROM tbl_category";
$showcat = mysql_query($query_showcat, $dbcon) or die(mysql_error());
$row_showcat = mysql_fetch_assoc($showcat);
$totalRows_showcat = mysql_num_rows($showcat);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>category</title>
        <style type="text/css">
            #tbl_cat table {
                margin: auto;
            }
        </style>
        <?php include_once ("css.php"); ?>
    </head>

    <body>
        <?php include_once ("admin_menu.php"); ?>
        <?php include_once ("admin_menuleft.php"); ?>
        <div id="tbl_cat"><table border="2" align="center">
                <tr>
                    <th width="100">cat_id</th>
                    <th width="100">cat_name</th>
                    <th width="100">cat_date</th>
                </tr>
                <?php do { ?>
                    <tr>
                        <td class="bg-primary"><?php echo $row_showcat['cat_id']; ?></td>
                        <td class="bg-success"><a href="admin_showbrand.php?cat_name=<?php echo $row_showcat['cat_name']; ?>" ><?php echo $row_showcat['cat_name']; ?></a></td>
                        <td class="bg-primary"><?php echo $row_showcat['cat_date']; ?></td>
                    </tr>
                <?php } while ($row_showcat = mysql_fetch_assoc($showcat)); ?>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p align="center"><a href="add_catagory.php" class="btn btn-primary">add</a></p>
        </div>
        <?php include_once ("script.php"); ?>
    </body>
</html>
<?php
mysql_free_result($showcat);
?>
