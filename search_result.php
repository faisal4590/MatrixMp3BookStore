<?php session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>
    <link href="default.css" rel="stylesheet" />

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

<div id="wholeContainer">

    <div id="header" >
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
						<span class="glyphicon glyphicon-log-out"></span> Register</a></li>';
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
    /*					include("includes/menu.inc.php");
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

    <!-- start page -->

    <div id="page">
        <!-- start content -->
        <div id="content">
            <div class="post">
                <h1 class="title"><?php /*echo $_GET['cat'];*/ ?></h1>
                <div class="entry">
                    <?php
                    $db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");

                    $search = $_GET['s'];
                    $query = "select *from book where b_nm like '%$search%'";
                    //book name er vitor search er kono part thaklei setake show korabe

                    $res = $db->query($query) or die("Can't Execute Query...");
                    ?>

                    <table width="100%" style="border:3px solid darkgrey;
										margin-top: 10px; padding: 10px;">
                        <?php
                        $count = 0;
                        $foundBooks = $res->num_rows;
                        if($foundBooks>0)
                        {
                            echo "<p
                        style='text-align: center;
                        font-size: 20px;
                        color:#4CAF50;
                        '><span class='glyphicon glyphicon-ok'></span> Found  " . $foundBooks . " items 
                         <p/>". "<br/>";
                        }

                        if ($res->num_rows == 0) {
                            echo "<tr><td style='font-size: 20px;
												font-weight: bold; text-align: center;
												color:red; padding: 5px;'><span class='glyphicon glyphicon-alert'>
													</span> Item Not Found</td></tr>";
                        } else {

                            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                if ($count == 0) {
                                    echo '<tr></tr>';
                                }

                                echo '<td style="border: 2px solid darkgrey;
													padding: 5px;"  
													valign="top" width="25%" align="center">
														<a style="text-decoration: none;
														font-size: 16px;
														font-style: normal;
														" href="detail.php?id=' . $row['b_id'] . '"> <br/>
														<img src="' . $row['b_img'] . '" width="80" 
														height="100">
														<br>' . $row['b_nm'] . '</a> 
													</td>';
                                $count++;

                                if ($count == 4) {
                                    echo '</tr>';
                                    $count = 0;
                                }
                            }
                        }
                        ?>


                    </table>
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
