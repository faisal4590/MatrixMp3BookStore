<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == "admin")) {
    header("location:../index.php");
}

//require('includes/config.php');
require "../connection/connection.php";


$query = "select * from book";
$res = mysqli_query($db,$query) or die("Can't Execute Query...");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        table {
            padding: 10px;
            border: 10px solid #EB5324
        }

        td, th {
            padding: 15px
        }

    </style>
</head>
<body>
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
<!-- end header -->
<!-- start page -->

<div id="page">
    <!-- start content -->
    <div id="content">
        <div class="post">
            <h1 class="title"></h1>
            <div class="entry">

                <?php
                if (isset($_GET['okdelbook'])) {
                    echo '<p style="font-size: 25px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Book Successfully deleted</p>';
                    echo '<br><br>';
                }
                ?>

                <table border='1' WIDTH='100%'>
                    <tr>
                        <td style="text-align: center;
                            font-size: 18px; font-weight: bold;" colspan="7"><a style="text-decoration: none;"

                                           href="addbook.php">Add a new book</a></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='10%'><b>SR.NO</b></td>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='50%'><b>NAME</b></td>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='20%'><b>PUBLISHER</b></td>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='20%'><b>ISBN</b></td>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='25%'><b>PRICE</b></td>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='25%'><b>IMAGE</b></td>
                        <td style="text-align: center;color:#31B0D5;" WIDTH='25%'><b>DELETE</b></td>

                    </tr>
                    <?php
                    $count=1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo '<tr>
										<td>'.$count.'
										<td>'.$row['b_nm'].'
										<td>'.$row['b_publisher'].'
										<td>'.$row['b_isbn'].'
										<td>'.$row['b_price'];
                        echo "<td><img src='../$row[b_img]' width='50'/>";

                        //process_del_book.php

                        echo 	'<td style="text-align: center;">
                            <a href="process_del_book.php?sid='.$row['b_id'].'"><img src="images/drop.png" ></a>
                                
									</tr>';

                        $count++;
                    }
                    ?>


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
<div id="footer">
    <?php
    include("includes/footer.inc.php");
    ?>
</div>
<!-- end footer -->


<!--Move to top code starts-->
<script type="text/javascript" src="../js/jquery%203.1.1.min.js"></script>
<script type="text/javascript" src="../js/moveToTop.js"></script>
<!--Move to top code ends-->
</body>
</html>
