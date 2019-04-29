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




                        <?php include_once("admin_product.php"); ?>



                    </div>
                </div>
                <!--Core JavaScript file  -->
                <?php include_once ("script.php"); ?>
                </body>
                </html>