<?php session_start();
if ((time() - $_SESSION['last_activity']) > 1800) // 30* 60 = 1800
{
    //current time - jokhn session create korcilam mane jokhn
    //login korcilam jodi > 30 min(1800 sec) hoy tahole
    //session destroy kore logout kore dilam...
    header("Location: logout.php");
}
require "connection/connection.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="default.css">

    <meta name="keywords" content="<?php
    //meta keywords sorted by category name starts
    $i = 1;
    $sql1 = 'select * from category';
    $query1 = $db->query($sql1) or die("can not execute query");
    $numRows1 = $query1->num_rows;
    while ($result1 = $query1->fetch_array(MYSQLI_ASSOC)) {
        if ($i != $numRows1) {
            echo $result1['cat_nm'] . ',';
            //last name er por ar comma hbena. setar condition dilam
        } else {
            echo $result1['cat_nm'];
        }
        $i++;
    }
    //meta keywords sorted by category name ends

    //meta keywords sorted by category name starts
    $i = 1;
    $sql1 = 'select * from subcat';
    $query1 = $db->query($sql1) or die("can not execute query");
    $numRows1 = $query1->num_rows;
    echo ',';
    while ($result1 = $query1->fetch_array(MYSQLI_ASSOC)) {
        if ($i != $numRows1) {
            echo $result1['subcat_nm'] . ',';
            //last name er por ar comma hbena. setar condition dilam
        } else {
            echo $result1['subcat_nm'];
        }
        $i++;
    }
    //meta keywords sorted by category name ends

    //meta keywords sorted by book name starts
    $i = 1;
    $sql1 = 'select * from book';
    $query1 = $db->query($sql1) or die("can not execute query");
    $numRows1 = $query1->num_rows;
    echo ',';
    while ($result1 = $query1->fetch_array(MYSQLI_ASSOC)) {
        if ($i != $numRows1) {
            echo $result1['b_nm'] . ',';
            //last name er por ar comma hbena. setar condition dilam
        } else {
            echo $result1['b_nm'];
        }
        $i++;
    }
    //meta keywords sorted by book name ends
    ?>">
    <meta name="description" content="book store">

    <link rel="stylesheet" href="lightbox/dist/css/lightbox.css">
    <script src="sharer.js-master/sharer.min.js"></script>
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
    <!--<div id="categoryInlineSection">
    <div id="categoryInline">
        <?php
    /*        include("includes/inlineSearch.inc.php");
            */ ?>
    </div>
</div>-->
    <!-- end header -->

    <?php
    //include 'includes/inlineSearch.inc.php';
    ?>

    <!-- start page -->

    <div id="page">
        <!-- start content -->
        <div id="content">
            <div class="post">
                <h1 class="title">Welcome,
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo '<span style="font-style: italic; color: #F27935;">' . $_SESSION["unm"] . '</span>' ;
                    } else {
                        echo 'to MATRIX and MP3';
                    }
                    ?>
                </h1>
                <div class="entry">
                    <br>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                        dolores doloribus error, esse est
                        eum fuga in itaque nesciunt numquam perspiciatis provident qui
                        quod, sunt velit vero voluptatem!
                        Provident, velit?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                        dolores doloribus error, esse est
                        eum fuga in itaque nesciunt numquam perspiciatis provident qui
                        quod, sunt velit vero voluptatem!
                        Provident, velit?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                        dolores doloribus error, esse est
                        eum fuga in itaque nesciunt numquam perspiciatis provident qui
                        quod, sunt velit vero voluptatem!
                        Provident, velit?
                    </p>
                    <br>

                    <div class="bookShowWrapper">
                        <!--<div class="bookShowerArea">-->
                        <?php
                        $id = 1;
                        $query = 'select * from book';
                        $res = $db->query($query) or die("cannot execute the query!!");
                        $num = $res->num_rows;

                        while ($id <= $num) {
                            $query = "select * from book where b_id='$id'";
                            $res1 = $db->query($query);
                            while ($row = $res1->fetch_array(MYSQLI_ASSOC)) {
                                echo '<div style="overflow:scroll;
                                height: 300px;" class="bookShowerArea">';
                                echo '<h3 style="text-align: center;">' . $row['b_nm'] . '</h3>';
                                echo "<img style='margin-top: 10px;
                            margin-left: 55px;
                            margin-bottom: 5px;' src='$row[b_img]' width='100'/>";
                                echo '</br/>';
                                echo '<a style=" margin-left: 75px;"
                            href="' . $row['b_img'] . '" rel="lightbox">
														<img src="images/zoom.gif" ></a>';
                                /*echo '<h3 style="text-align: center;
                            margin-top: 10px;">Book Description</h3><hr>';
                                echo '<p>' . $row['b_desc'] . '</p>';*/

                                //checking whether the user is logged in or not
                                if (isset($_SESSION['status'])) {
                                    echo '<a style="text-align: center;
                                text-decoration: none;
                                border:3px solid #d96417;
                                padding:8px;
                                color:white;
                                font-size: 15px;
                                border-radius:5px 5px;
                                margin-top: 5px;
                                "
                                class="btn btn-warning"
                                href="#">Click here to get the book</a>';
                                } else {
                                    echo '<p 
                                style="
                                padding:3px;
                                color:white;
                                font-size: 15px;
                                border:3px solid #F54B43;
                                border-radius:5px 5px;
                                background: lightcoral;
                                margin-top: 5px;
                                "
                                class="glyphicon glyphicon-alert"> Please login to get the book</p>';
                                }
                                echo '</div>';
                            }
                            $id++;
                        }

                        ?>

                    </div>
                </div>
                <br><br>
                <p style="font-size: 16px; clear: both">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                    dolores doloribus error, esse est
                    eum fuga in itaque nesciunt numquam perspiciatis provident qui
                    quod, sunt velit vero voluptatem!
                    Provident, velit?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                    dolores doloribus error, esse est
                    eum fuga in itaque nesciunt numquam perspiciatis provident qui
                    quod, sunt velit vero voluptatem!
                    Provident, velit?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                    dolores doloribus error, esse est
                    eum fuga in itaque nesciunt numquam perspiciatis provident qui
                    quod, sunt velit vero voluptatem!
                    Provident, velit?

                </p>
            </div>

        </div>

    </div>

    <!-- end content -->

    <!-- start sidebar -->
    <div id="sidebar">
        <?php
        include("includes/search.inc.php");
        ?>
    </div>
    <!-- end sidebar -->
    <div style="clear: both;">&nbsp;</div>
    <!-- end page -->

    <!-- start footer -->
    <div id="footer" style="clear: both">
        <?php
        include("includes/footer.inc.php");
        ?>
    </div>
    <!-- end footer -->

    <!--Move to top code starts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow18.js"></script>

    <!--Move to top code ends-->

    <!--Lightbox js code starts here-->
    <script src="lightbox/dist/js/lightbox.js"></script>
    <!--Lightbox js code ends here-->


</div>


</body>
</html>
