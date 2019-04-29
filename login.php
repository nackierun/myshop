<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>login</title>

        <!-- Bootstrap -->
<?php include_once ("css.php"); ?>
        <style type="text/css">
            #btn{
                width:100%;
            }

        </style>
    </head>
    <body>
<?php include_once ("menubar.php"); ?>
        <div class="container" style="padding-top:100px">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color:#f4f4f4">
                    <h3 align="center">
                        <span class="glyphicon glyphicon-lock"> </span>
                        เข้าสู่ระบบ </h3>
                    <form  name="formlogin" method="POST" id="login" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text"  name="Username" class="form-control" required placeholder="Username" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" name="Password" class="form-control" required placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" id="btn">
                                    <span class="glyphicon glyphicon-log-in"> </span>
                                    Login </button> <a href="register.php">ยังไม่ได้เป็นสมาชิก?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--start footer-->
        <?php include_once ("footer.php"); ?>
        <!--end footer--> 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<?php include_once ("script.php"); ?> 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    </body>
</html>