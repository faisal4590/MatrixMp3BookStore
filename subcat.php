<?php session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>

    <link href="default.css" rel="stylesheet"/>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

<div id="wholeContainer">

    <div id="header">
        <div id="menu">
            <ul>
                <li class="current_page_item"><a class="current_page_itemLink " href="index.php">
                        <span class="glyphicon glyphicon-home"></span> Home</a></li>
                <!--<li><a href="register.php">Register</a></li>-->

                <?php
                if (isset($_SESSION['status'])) {

                    echo '<li class="current_page_item"><a class="current_page_itemLink" href="logout.php">
						<span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li class="current_page_item"><a class="current_page_itemLink" href="register.php">
						<span class="glyphicon glyphicon-log-in"></span> Register</a></li>';
                }
                ?>


                <li class="last current_page_item"><a class="current_page_itemLink" href="contact.php">
                        <span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
                <li class="last current_page_item"><a class="current_page_itemLink" href="aboutus.php">
                        <span class="glyphicon glyphicon-map-marker"></span> About Us</a></li>
                <!--<li class="current_page_item"><a class="current_page_itemLink" href="viewcart.php">View Cart</a></li>-->

            </ul>
        </div>
    </div>

    <!-- start header -->
    <!--<div id="header">
    <div id="menu">
        <?php
    /*        include("includes/menu.inc.php");
            */ ?>
    </div>
</div>-->

    <div id="logo-wrap">
        <div id="logo">
            <?php
            include("includes/logo.inc.php");
            ?>
        </div>
    </div>
    <!-- end header -->

    <!-- start sidebar -->
    <div id="sidebar">
        <?php
        include("includes/search.inc.php");
        ?>
    </div>
    <!-- end sidebar -->

    <!--start main menu-->
    <?php
    //include "includes/inlineSearch.inc.php";
    ?>
    <!--end main menu-->

    <!-- start page -->

    <style type="text/css">
        li.subCatLiStyle {
            list-style: none;
            padding: 10px;
            margin-bottom: 7px;

        }

        li.subCatLiStyle:first-child {
            margin-top: 10px;
        }

        li.subCatLiStyle:hover {
            opacity: .7;
            -webkit-transition: 500ms ease;
            -moz-transition: 500ms ease;
            -o-transition: 500ms ease;
            transition: 500ms ease;
        }

        li a.subCatLinkStyle {
            background: #2bbbad none repeat scroll 0 0;
            border: 4px solid #27a294;
            border-radius: 5px;
            color: #f9f9ff;
            padding: 10px;
            text-decoration: none;
            display: block;
            width:300px;
            text-align: center;
        }
    </style>

    <div id="page">
        <!-- start content -->
        <div id="content">
            <div class="post">
                <!--<h1 class="title"> Subcategory under <?php /*echo $_GET['catnm']; */ ?>Category</h1>-->
                <!--Category number ar dekhabona.. tai comment out kore dilam-->
                <div class="entry">

                    <?php


                    $db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");

                    //$cat=$_GET['cat_nm'];

                    $query = "select * from subcat where parent_id = " . $_GET['cat'];
                    $res = $db->query($query) or die("Can't Execute Query..");

                    $row1 = $res->fetch_array(MYSQLI_ASSOC);

                    if ($_GET['catnm'] == $row1['subcat_nm']) {
                        header("location:booklist.php?subcatid=" . $row1['subcat_id'] . "&subcatnm=" . $row1["subcat_nm"]);

                    }



                    Do {
                        if($res->num_rows==0)
                        {
                            $categorySelect = 'select * from category where cat_id=' . $_GET['cat'];
                            $resCategorySelect = $db->query($categorySelect) or die('wrong query');
                            $rowCategorySelect = $resCategorySelect->fetch_array(MYSQLI_ASSOC);
                            echo '<p style="font-size: 20px;text-align: center;
                                        color:#ff5749;font-weight: bold;
                                        padding: 10px;
                                        background: #ffdeac;
                                        border: 3px solid #ffa874;"><span class="glyphicon glyphicon-alert"></span>
                                        No Subcategory is available for ' .strtoupper($rowCategorySelect['cat_nm'])  . ' category</p>' ;
                        }
                        else{

                            echo '<li class="subCatLiStyle"><a class="subCatLinkStyle" style="font-size: 16px;"
 												href="booklist.php?subcatid=' . $row1['subcat_id'] . '&subcatnm='
                                . $row1["subcat_nm"] . '">' . $row1['subcat_nm'] . '</a>
											</li>';
                            //&subcatnm='.$row1["subcat_nm"].'
                        }
                    } while ($row1 = $res->fetch_array(MYSQLI_ASSOC))
                    ?>

                </div>

            </div>

        </div>
        <!-- end content -->




        <div style="clear: both;">&nbsp;</div>
    </div>
    <!-- end page -->

    <!-- start footer -->
    <div id="footer" style="clear: both">
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
