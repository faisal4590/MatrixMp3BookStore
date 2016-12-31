<?php session_start();

?>

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
    <!-- end header -->

    <?php
    //include "includes/inlineSearch.inc.php";
    ?>

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
                <h1 class="title"><?php echo $_GET['subcatnm']; ?></h1>
                <div class="entry">

                    <?php
                    $db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");


                    $cat = $_GET['subcatid'];

                    //prepare statement starts here

                    /*$totalq = $db->prepare("select count(*) \"total\" from book where b_subcat='$cat");
                    $totalq->bind_param('i',$cat);
                    $totalq->execute();
                    $totalq->bind_result($test,$cat);
                    $totalrow = $totalq->fetch();


                    $totalq->close();
                    $db->close();*/

                    //prepare statement ends here


                    $totalq = "select count(*) \"total\" from book where b_subcat='$cat'";


                    $totalres = $db->query($totalq) or die("Can not execute the query");
                    $totalrow = $totalres->fetch_array(MYSQLI_ASSOC);


                    $page_per_page = 6;

                    $page_total_rec = $totalrow['total'];

                    $page_total_page = ceil($page_total_rec / $page_per_page);


                    if (!isset($_GET['page'])) {
                        $page_current_page = 1;
                    } else {
                        $page_current_page = $_GET['page'];
                    }


                    ?>

                    <table border="5" cellpadding="10" cellspacing="3" width="100%" style="border-color:#8C82FF;">
                        <br><br><br><br><br>
                        <?php

                        $k = ($page_current_page - 1) * $page_per_page;

                        $query = "select *from book where b_subcat='$cat' LIMIT " . $k . "," . $page_per_page;

                        $res = $db->query($query) or die("Can't Execute Query...");

                        //no book available code starts here
                        $selectFromSubcat = 'select * from subcat where subcat_id=' . $_GET['subcatid'];
                        $querySelectFromSubcat = $db->query($selectFromSubcat);
                        $resultSelectFromSubcat = $querySelectFromSubcat->fetch_array(MYSQLI_ASSOC);
                        if ($res->num_rows == 0) {
                            echo '<p style="font-size: 20px;text-align: center;
                                        color:#ff5749;font-weight: bold;
                                        padding: 10px;
                                        background: #ffdeac;
                                        border: 3px solid #ffa874;"><span class="glyphicon glyphicon-alert"></span>
                                        No Book is available for ' . strtoupper($resultSelectFromSubcat['subcat_nm']) . ' category</p>';
                        }

                        $count = 0;
                        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                            if ($count == 0) {
                                echo '<tr style="padding:10px; margin-bottom: 10px;">';
                            }
                            echo '<td valign="top" width="20%" align="center" style="background: #8C82FF;
                        /*border: 3px solid #1BB1B2;*/
                        padding:10px;margin-top: 10px;">
                                <a style="text-decoration:none;
                                font-size:16px;
                                color:white;
                                " href="detail.php?id='
                                . $row['b_id'] . '&cat=' . $_GET['subcatnm'] . '">
                                <img src="' . $row['b_img'] . '" width="80" height="100">
                                <br>' . $row['b_nm'] . '</a>
													</td>';
                            $count++;

                            if ($count == 2) {
                                echo '</tr>';
                                $count = 0;
                            }
                        }
                        ?>

                    </table>


                    <br><br><br>
                    <center>
                        <?php

                        if ($page_total_page > $page_current_page) {
                            echo '<a style="text-decoration:none;
                        background:#31B6DE;
                        
                        padding:10px;
                        font-size:16px;
                        color:white;
                        border:2px solid skyblue;
                        border-radius:8px 8px;" href="booklist.php?subcatid=' . $_GET['subcatid']
                                . '&subcatnm=' . $_GET['subcatnm'] . '&page=' . ($page_current_page + 1) . '">
                            <span class="glyphicon glyphicon-circle-arrow-right"></span> Next</a>';
                        }

                        for ($i = 1; $i <= $page_total_page; $i++) {
                            echo '&nbsp;&nbsp;<a
                         style="text-decoration:none;
                         font-size:17px;" href="booklist.php?subcatid=' . $_GET['subcatid'] . '&subcatnm=' . $_GET['subcatnm'] . '&page=' . $i . '">' . $i . '</a>&nbsp;&nbsp;';
                        }

                        if ($page_current_page > 1) {
                            echo '<a
                         style="text-decoration:none;
                        background:#31B6DE;
                        padding:10px;
                        font-size:16px;
                        color:white;
                        border:2px solid skyblue;
                        border-radius:8px 8px;" 
                        href="booklist.php?subcatid=' . $_GET['subcatid']
                                . '&subcatnm=' . $_GET['subcatnm'] . '&page=' . ($page_current_page - 1) . '">
                             <span class="glyphicon glyphicon-circle-arrow-left"></span> Previous</a>';
                        }

                        ?>
                    </center>
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
