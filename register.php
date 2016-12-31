<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="default.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <?php
    include("includes/head.inc.php");
    ?>

</head>

<body>

<div id="wholeContainer">

    <!-- start header -->
    <div id="header" style="margin-top:  0px;">
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
    <!-- end header -->

    <!-- start page -->
    <div id="sidebar">
        <?php
        include("includes/search.inc.php");
        ?>
    </div>
    <div id="page">
        <!-- start content -->


        <div id="contentMine">

            <div class="post">
                <h1 class="title">Welcome to Registeration.</h1>

                <div class="entry">
                    <br><br>
                    <?php
                    //error message for registration
                    if (isset($_GET['error'])) {
                        echo '<font color="red">' . $_GET['error'] . '</font>';
                        echo '<br><br>';
                    }

                    //error message for invalid user
                    if (isset($_GET['errorinvaliduser'])) {
                        echo '<font color="red">' . $_GET['errorinvaliduser'] . '</font>';
                        echo '<br><br>';
                    }

                    //success message for registration
                    if (isset($_GET['ok'])) {
                        echo '<p style="font-size: 18px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">You are successfully Registered.</p>';
                        echo '<br><br>';
                    }

                    ?>

                    <table>

                        <form action="process_register.php" method="POST">
                            <tr>
                                <td><b>Full Name :&nbsp;</b></td>
                                <td><input class="form-control" placeholder="your full name"
                                           type='text' size="30" maxlength="30" name='fnm'></td>

                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>

                            <tr>
                                <td><b>User Name :</b>&nbsp;&nbsp;</td>
                                <td><input class="form-control"
                                           placeholder="your username" required type='text' size="30" maxlength="30"
                                           name='unm'></td>
                                <td>&nbsp;</td>

                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>

                            <tr>
                                <td><b>Password :</b>&nbsp;&nbsp;</td>
                                <td><input class="form-control" placeholder="********"
                                           type='password' required name='pwd' size="30">
                                </td>


                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>

                            <tr>
                                <td><b>Confirm Password:</b>&nbsp;&nbsp;</td>
                                <td><input class="form-control"
                                           placeholder="********"
                                           type='password' required name='cpwd' size="30"></td>

                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>

                            <tr>
                                <td><b>Gender:</b>&nbsp;&nbsp;</td>
                                <td><input type="radio" value="Male" name="gender" id='m'><label> Male</label>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="Female" name="gender" id='f'><label> Female</label></td>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>

                            <tr>
                                <td><b>E-mail : </b>&nbsp;&nbsp;</td>
                                <td><input class="form-control"
                                           type='email' placeholder="your email" name='mail' size="30"></td>

                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>

                            <tr>
                                <td><b>Contact No :</b>&nbsp;&nbsp;</td>
                                <td>
                                    <input class="form-control"
                                           placeholder="your mobile no(01*********)"
                                           type='text' name='contact' size="30">
                                </td>



                            </tr>



                            <tr>
                                <td>&nbsp;
                            </tr>


                            <tr>
                                <td><b>City:</b>&nbsp;&nbsp;</td>
                                <td>
                                    <select class="btn btn-info" style="width: 195px;" name="city">

                                        <option class="btn btn-danger">Dhaka
                                        <option class="btn btn-danger">Chittagong
                                        <option class="btn btn-danger">Rajshahi
                                        <option class="btn btn-danger">Khulna
                                        <option class="btn btn-danger">Barishal
                                        <option class="btn btn-danger">Sylhet

                                    </select>

                            </tr>

                            <tr>
                                <td>&nbsp;
                            </tr>


                            <tr>
                                <td colspan='2' align='center'>
                                    <input class="btn btn-lg btn-success" type='submit' value="  Sign up ">
                                </td>
                            </tr>
                        </form>
                    </table>

                </div>

            </div>


        </div>

        <!-- end content -->

        <!-- start sidebar -->

        <!-- end sidebar -->
        <div style="clear: both;">&nbsp;</div>
    </div>
    <!-- end page -->

    <!-- start footer -->
    <div id="footer" style="clear:both">
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
