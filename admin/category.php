<?php session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == "admin")) {
    header("location:../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");
    ?>
    <link rel="stylesheet" href="default.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

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
                //add category error
                if (isset($_GET['errorforaddcat'])) {
                    echo '<font>' . $_GET['errorforaddcat'] . '</font>';
//                    echo '<p style="color:red;font-size: 26px; font-weight: bold;">' . $_GET['errors'] . '</p>' ;
                    echo '<br><br>';
                }

                //add sub category error
                if (isset($_GET['errorforaddsubcat'])) {
                    echo '<font>' . $_GET['errorforaddsubcat'] . '</font>';
//                    echo '<p style="color:red;font-size: 26px; font-weight: bold;">' . $_GET['errors'] . '</p>' ;
                    echo '<br><br>';
                }

                //delete category error
                if (isset($_GET['errorfordelcat'])) {
                    echo '<font>' . $_GET['errorfordelcat'] . '</font>';
//                    echo '<p style="color:red;font-size: 26px; font-weight: bold;">' . $_GET['errors'] . '</p>' ;
                    echo '<br><br>';
                }


                //add category success message
                if (isset($_GET['okaddcat'])) {
                    echo '<p style="font-size: 25px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Category Added Successfully.</p>';
                    echo '<br><br>';
                }

                //add subcategory success message
                if (isset($_GET['okaddsubcat'])) {
                    echo '<p style="font-size: 25px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Subcategory Added Successfully.</p>';
                    echo '<br><br>';
                }

                //delete category success message
                if (isset($_GET['okdelcategory'])) {
                    echo '<p style="font-size: 25px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Category deleted Successfully.</p>';
                    echo '<br><br>';
                }

                //delete subcategory success message
                if (isset($_GET['okdelsubcat'])) {
                    echo '<p style="font-size: 25px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Subcategory deleted Successfully.</p>';
                    echo '<br><br>';
                }
                ?>

                <br>
                <form action='process_addcategory.php' method='POST'>
                    <p style="background: #A9153F;color:white;font-weight: bold;
                        font-size: 20px;padding: 5px;text-align: center;">ADD CATEGORY </p>
                    <br><br>
                    <div class="form-group">

                        <label style="font-size: 18px;" for="addCategory">Add Parent Category</label>
                        <input type='text' name='cat' size='25'
                               placeholder="enter the name of parent category"
                               class="form-control inputFieldStyle">


                        <input type='submit' value='  ADD  '
                               class="btn btn-lg btn-success submitButtonStyle"
                               style="margin-top: 15px;margin-left: 350px;width: 120px;">
                    </div>

                </form>
                <hr>
                <form action='process_addsubcategory.php' method='POST'>
                    <p style="background: #A9153F;color:white;font-weight: bold;
                        font-size: 20px;padding: 5px;text-align: center;">ADD SUB-CATEGORY </p>
                    <br><br>
                    <p style="font-size: 18px;"><label for="parentCategory">Select parent category : </label></p>
                    <div class="form-group">
                        <select style="width: 170px;" name="parent"
                                class="btn btn-info form-control sel">
                            <?php

                            $link = mysql_connect("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect...");

                            mysql_select_db("matrixmp_cent_db", $link) or die("Can't Connect to Database...");

                            $query = "select * from category ";

                            $res = mysql_query($query, $link);

                            while ($row = mysql_fetch_assoc($res)) {
                                echo "<option class='btn btn-danger' value='" . $row['cat_id'] . "'>" . $row['cat_nm'];
                                //PASS ID NOT NAME
                            }

                            mysql_close($link);
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="subCategory">Add sub category</label>
                        <input type='text' name='subcat' size='25' class="form-control"
                               placeholder="enter the name of sub category">
                        <input type='submit' value='  ADD  ' class="btn btn-lg btn-success"
                               style="margin-top: 15px;margin-left: 350px;width: 120px;">
                    </div>


                    <br><br>
                </form>
                <hr>
                <form action='process_delcategory.php' method='POST'>

                    <p style="background: #A9153F;color:white;font-weight: bold;
                        font-size: 20px;padding: 5px;text-align: center;">Delete Category </p>
                    <br><br>
                    <select style="width: 170px;" name="del"
                            class="btn btn-info form-control">
                        <?php

                        $link = mysql_connect("localhost", "root", "") or die("Can't Connect...");

                        mysql_select_db("matrixmp_cent_db", $link) or die("Can't Connect to Database...");

                        $query = "select * from category ";

                        $res = mysql_query($query, $link);

                        while ($row = mysql_fetch_assoc($res)) {
                            echo "<option class='btn btn-danger'>" . $row['cat_nm'];
                        }

                        mysql_close($link);
                        ?>
                    </select>


                    <input type='submit' value='  DELETE  ' class="btn btn-warning">
                </form>

                <form action='process_delsubcategory.php' method='POST'>
                    <hr>
                    <div class="form-group">
                        <label style="font-size: 16px;">DELETE SUB CATEGORY </label> <br>
                        <select class="btn btn-info form-control" style="width: 170px;" name="subcatnm">
                            <?php

                            $link = mysql_connect("localhost", "root", "") or die("Can't Connect...");

                            mysql_select_db("matrixmp_cent_db", $link) or die("Can't Connect to Database...");

                            $query = "select * from category ";

                            $res = mysql_query($query, $link);

                            while ($row = mysql_fetch_assoc($res)) {
                                echo "<option class='btn btn-danger'
                                style='font-size: 18px; font-weight: bold;
                                color:#f0f0f0' disabled>" . $row['cat_nm'];
                                $qq = "select * from subcat where parent_id=" . $row['cat_id'];

                                $ress = mysql_query($qq, $link) or die("wrong delete subcat query..");
                                while ($roww = mysql_fetch_assoc($ress)) {
                                    echo "<option class='btn btn-danger' value='" . $roww['subcat_id'] . "'> ---> " . $roww['subcat_nm'];
                                }

                            }

                            mysql_close($link);
                            ?>
                        </select>
                    </div>


                    <input class="btn btn-warning" type='submit' value=' DELETE '>
                </form>
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
