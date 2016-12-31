<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="default.css">
</head>

<body>


<div id="wholeContainer">

    <!-- start header -->
    <div id="header">
        <div id="menu">
            <?php
            include("includes/menu.inc.php");
            ?>
        </div>
    </div>


    <div id="logo-wrap">
        <div id="logo">
            <?php
            include("includes/logo.inc.php");
            ?>
        </div>
    </div>

    <!-- start sidebar -->
    <div id="sidebar">
        <?php
        include("includes/search.inc.php");
        ?>
    </div>
    <!-- end sidebar -->

    <!-- start page -->

    <div id="page">
        <!-- start content -->
        <div id="contentMine">
            <div class="post">
                <h1 class="title">Contact us</h1>

                <div class="entry">

                    <?php

                    //contact failed error
                    if (isset($_GET['errorforcontact'])) {
                        echo '<font>' . $_GET['errorforcontact'] . '</font>';
//                    echo '<p style="color:red;font-size: 26px; font-weight: bold;">' . $_GET['errors'] . '</p>' ;
                        echo '<br><br>';
                    }


                    //contact successfully send message
                    if (isset($_GET['okcontact'])) {
                        echo '<p style="font-size: 18px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Message Successfully sent.</p>';
                        echo '<br><br>';
                    }
                    /*var_dump($_SESSION['unm']);
                    var_dump($_POST['nm']);*/

                    ?>

                    <form action="process_contact.php" method="POST">
                        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
                        <div class="form-group">
                            <label style="font-size: 18px;" for="name">Name</label>
                            <input class="form-control" placeholder="your name" type='text' name='nm' size=35>
                        </div>

                        <div class="form-group">
                            <label style="font-size: 18px;" for="email">Email</label>
                            <input class="form-control" type='email' required  placeholder="your email" name='email' size=35>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 18px;" for="query">Query</label>
                            <textarea class="form-control" cols="40" rows="10" name='query'>
                        </textarea>

                        </div>


                        <input class="btn btn-lg btn-success" type='submit' name='btn' value='   Submit   '>


                    </form>

                </div>

            </div>

        </div>
        <!-- end content -->


        <div style="clear: both;">&nbsp;</div>
    </div>
    <!-- end page -->

    <!-- start footer -->
    <div id="footer" style="clear: both;">
        <?php
        include("includes/footer.inc.php");
        ?>
    </div>
    <!-- end footer -->

</div>


<!--Move to top code starts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow18.js"></script>

<!--Move to top code ends-->


</body>
</html>
