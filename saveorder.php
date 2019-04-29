<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();  
	
/*	
	echo "<pre>";
	print_r($_SESSION);
	echo "<hr>";
	print_r($_POST);
	echo "</pre>";
*/	 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
require_once('Connections/dbcon.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

	$name = $_POST["name"]; 
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$p_qty = $_POST["p_qty"];
	$total = $_POST['total'];
	$order_date = date("Y-m-d H:i:s");
	$status = 1;

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysql_db_query($database_dbcon, "BEGIN"); 
	$sql1 = "INSERT  INTO tbl_order VALUES
	(NULL,  
	'$name',
	'$address',
	'$email',
	'$phone',
	'$status',
	'$order_date' 
	)";
	
	$query1	= mysql_db_query($database_dbcon, $sql1) or die ("Error in query: $sql1 " . mysql_error());
	

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM tbl_order  WHERE phone='$phone'";
	$query2	= mysql_db_query($database_dbcon, $sql2);
	$row = mysql_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	 
	{
		$sql3	= "SELECT * FROM tbl_product where p_id=$p_id";
		$query3 = mysql_db_query($database_dbcon, $sql3);
		$row3 = mysql_fetch_array($query3);
		$total=$row3['p_price']*$p_qty;
		
		
		$sql4	= "INSERT INTO  tbl_order_detail 
		values(null, 
		'$order_id', 
		'$p_id', 
		'$p_qty', 
		'$total')";
		$query4	= mysql_db_query($database_dbcon, $sql4);
	
	for($i=0; $i<$count; $i++){  
  $have =  $row3['p_qty']; 
  $stc = $have - $p_qty;  
  $sql5 = "UPDATE tbl_product SET  p_qty=$stc WHERE  p_id=$p_id ";
  $query9 = mysql_db_query($database_dbcon, $sql5);  
    
    }
 
 }
	
	if($query1 && $query4){
		mysql_db_query($database_dbcon, "COMMIT");
		$msg = "สั่งซื้อเรียบร้อยแล้ว กรุณาทำการชำระเงิน ";
		foreach($_SESSION['shopping_cart'] as $p_id)
		{	
			unset($_SESSION['shopping_cart']);
		}
	}
	else{
		mysql_db_query($database_dbcon, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ ";	
	}

	mysql_close($dbcon);
?>


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>


 
</body>
</html>