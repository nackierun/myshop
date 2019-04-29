<?php

include_once('Connections/dbcon.php');
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

$pay_email = $_POST['pay_email'];
$pay_number = $_POST['pay_number'];
$pay_img = (isset($_POST['pay_img']) ? $_POST['pay_img'] : '');

$upload = $_FILES['pay_img'];
if ($upload <> '') {

    //โฟลเดอร์ที่เก็บไฟล์
    $path = "img/";
    //ตัวขื่อกับนามสกุลภาพออกจากกัน
    $type = strrchr($_FILES['pay_img']['name'], ".");
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand . $date1 . $type;

    $path_copy = $path . $newname;
    $path_link = "img/" . $newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['pay_img']['tmp_name'], $path_copy);
}
$sql = "INSERT INTO `tbl_payment`(`pay_email`, `pay_number`, `pay_img`) VALUES ('$pay_email', '$pay_number', '$newname')";




$result = mysql_db_query($database_dbcon, $sql) or die("Error in query: $sql " . mysql_error());

mysql_close();



if ($result) {

    echo "<script type='text/javascript'>";
    echo "alert('ทางเราจะติดต่อกลับไปเมื่อการตรวจสอบเสร็จสิ้น');";
    echo "window.location='index.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location='index.php';";
    echo "</script>";
}




mysql_free_result($cat);

mysql_free_result($product);
?>