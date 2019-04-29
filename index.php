<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>DDCamera</title>
        <!-- Bootstrap core CSS -->
        <?php include_once ("css.php"); ?>
    </head>

    <body>
        <?php include_once ("menubar.php"); ?>
        <div class="container">
            <div class="row">

                <?php include_once ("slideshow.php"); ?>
                &nbsp;
                &nbsp;
                &nbsp;
                <div class="row">
                    <?php include_once ("category.php"); ?>

                    <div class="col-md-9">
                        <div>
                            <ol class="breadcrumb">
                                <li>สินค้า</li>
                            </ol>
                        </div>

                        <div class="row">
                            <?php include_once ("show_product.php"); ?>  
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!--Footer -->
        <?php include_once ("footer.php"); ?>

        <!--Core JavaScript file  -->
        <?php include_once ("script.php"); ?>
    </body>
</html>
