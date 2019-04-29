<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ชำระเงิน</title>
<?php include_once('css.php'); ?>
</head>

<body>
<?php include_once('menubar.php'); ?>
<div class="container">
<div class="row">
<fieldset><legend><h1>แจ้งชำระเงิน</h1></legend>
<form id="form1" name="form1" method="post" action="pay_db.php" enctype="multipart/form-data">
  
     <p>                          
    <label for="pay_email">emailที่ใช้ในการสั่งซื้อ</label>
    <input type="email" name="pay_email" id="pay_email" /></p>
 
  
      <p>                          
    <label for="pay_number">เบอร์โทรศัพท์ที่ใช้ในการสั่งซื้อ</label>
    <input type="text" name="pay_number" id="pay_number" /></p>

  
                             <p>   <label for="pay_img">สลิปโอนเงิน</label>
  <input type="file" name="pay_img" id="pay_img" class="form-control" /></p>
  <p><button type="submit" class="btn btn-primary" name="submit"> ส่ง</button></p>
</form>
</fieldset>
</div>
</div>

<?php include_once('footer.php'); ?>
<?php include_once('script.php'); ?>
</body>
</html>