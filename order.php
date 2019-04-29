<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยืนยัน</title>

        <!-- Bootstrap -->
        <?php include_once("css.php"); ?>
        <style type="text/css">
            #btn{
                width:80%;
            }
        </style>
    </head>
    <body>
        <?php include_once("menubar.php"); ?>
        <div class="container" style="padding-top:100px">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-5" style="background-color:#f4f4f4">
                    <h3 align="center" style="color:green">
                        <span class="glyphicon glyphicon-shopping-cart"> </span>
                        ยืนยันการสั่งซื้อ </h3>
                    <form  name="formlogin" action="" method="POST" id="login" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text"  name="name" class="form-control" required placeholder="ชื่อ-สกุล" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="address" class="form-control"  rows="3"  required placeholder="ที่อยู่ในการส่งสินค้า"></textarea> 
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text"  name="phone" class="form-control" required placeholder="เบอร์โทรศัพท์" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="email"  name="name" class="form-control" required placeholder="อีเมล์" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12" align="center">
                                <a href="confirm.php">
                                    <button type="submit" class="btn btn-primary btn-lg" id="btn">
                                        ยืนยันสั่งซื้อ </button>
                                </a>                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--start footer-->
        <?php include_once("footer.php"); ?>
        <!--end footer--> 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <?php include_once("script.php"); ?>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    </body>
</html>