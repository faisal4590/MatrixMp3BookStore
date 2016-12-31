<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="default.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <?php
    include("includes/head.inc.php");
    ?>
    <!--<script src="http://maps.google.com/maps/api/js"></script>
    <script src="js/gmaps.js"></script>-->
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
    <!--<div id="header"  style="margin-top: -8px;">
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

    <!--start main menu-->
    <?php
    //include "includes/inlineSearch.inc.php";
    ?>
    <!--end main menu-->

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
                <h1 class="title" style="color: #FE972A;">About The Matrix and MP3</h1>
                <div class="entry">

                    <div class="forWhom">
                        <h2 style="color: #FE972A; text-align: center;">For whom the bookshop is about?</h2>
                        <p>
                            The bookshop is about for those who are in need of books which are
                            not available near then and they can buy the books at a cheap price.
                        </p>
                    </div>

                    <div class="whatWeAre">
                        <h2 style="color: #FE972A; text-align: center;">What are we?</h2>
                        <p>
                            We are here to provide you quality books at a cheap price.
                            Our only aim is to provide good quality books to users.
                        </p>
                    </div>

                    <div class="whyBuy">
                        <h2 style="color: #FE972A; text-align: center;">Why buy at this bookshop?</h2>
                        <p>
                            We provide quality books which will be helpful to users. We take lot less money from
                            the actual price.
                        </p>
                    </div>

                </div>

            </div>

        </div>
        <!-- end content -->
        <div style="clear: both;">&nbsp;</div>
        <!--Google map-->
        <div class="googleMap" style="border:3px solid grey;">
            <div id="map"></div>
        </div>
        <!--Google Map ends here-->


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

<!--Google Map code here-->

<script>

    var map;
    function initMap() {
        $(document).ready(function () {
            var map = new GMaps({
                el: '#map',
                lat: 23.7398398,
                lng: 90.3871044,
                scrollwheel: false
            });

            GMaps.geolocate({
                success: function (position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                },
                error: function (error) {
                    alert('Geolocation failed: ' + error.message);
                },
                not_supported: function () {
                    alert("Your browser does not support geolocation");
                },
                always: function () {
                    alert("Google map successfully loaded!");
                }
            });
        });
    }


</script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAuzVSZfJ2Nrg-wqW_D1N_Qr2TMHplrvzk&callback=initMap"></script>
<script src="js/gmaps.js"></script>
<!--<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuzVSZfJ2Nrg-wqW_D1N_Qr2TMHplrvzk&callback=initMap">
</script>-->
</body>
</html>
