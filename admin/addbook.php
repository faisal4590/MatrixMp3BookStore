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
    <link rel="stylesheet"
          href="includes/admin%20style.css">
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
            <p style="background: #A9153F;color:white;font-weight: bold;
                        font-size: 20px;padding: 5px;text-align: center;">ADD Books </p>
            <div class="entry">

                <?php
                //error message
                if (isset($_GET['errors'])) {
                    echo '<font>' . $_GET['errors'] . '</font>';
//                    echo '<p style="color:red;font-size: 26px; font-weight: bold;">' . $_GET['errors'] . '</p>' ;
                    echo '<br><br>';
                }

                //book successfully added message
                if (isset($_GET['okk'])) {
                    echo '<p style="font-size: 26px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">book added successfully.</p>';
                    echo '<br><br>';
                }
                ?>
                <form action='process_addbook.php'
                      method='POST'
                      enctype="multipart/form-data">
                    <br><br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookName">Book Name</label>
                        <input class="form-control" type='text' name='name' size='40'
                               placeholder="enter the book name">

                    </div>
                    <br><br>

                    <label style="font-size: 18px;" for="bookCategory">Book Category</label><br>
                    <select style="width: 200px;" name="cat" class="btn btn-success">
                        <?php

                        /* $link = mysql_connect("localhost", "matrixmp_admin", "33Up;we~ep@") or die("Can't Connect...");

                         mysql_select_db("matrixmp_cent_db", $link) or die("Can't Connect to Database...");*/

                        $link = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");

                        $query = "select * from category ";

                        $res = $link->query($query);

                        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                            echo "<option class='btn btn-danger'
                            style='color:darkgrey; fsz16px; font-weight: bold;' disabled>" . $row['cat_nm'];

                            $q2 = "select * from subcat where parent_id = " . $row['cat_id'];

                            $res2 = $link->query($q2) or die("Can't Execute Query..");
                            while ($row2 = $res2->fetch_array(MYSQLI_ASSOC)) {
                                echo '<option class="btn btn-danger" value="' . $row2['subcat_id'] . '"> ---> ' . $row2['subcat_nm'];


                            }

                        }
                        $link->close();
                        ?>
                    </select>
                    <br><br>
                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookDescription">Book Description</label><br>
                        <textarea class="form-control" cols="40" rows="6" name='description'></textarea>
                    </div>


                    <br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookpublisher">Publisher</label><br>
                        <input class="form-control" placeholder="enter the name of the publisher"
                               type='text' name='publisher' size='40'>
                    </div>

                    <br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookEdition">Edition</label><br>
                        <input class="form-control" placeholder="enter the book edition"
                               type='text' name='edition' size='40'>
                    </div>
                    <br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookISBN">ISBN</label><br>
                        <input class="form-control" placeholder="enter the ISBN number"
                               type='text' name='isbn' size='40'>
                    </div>
                    <br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookPages">Pages</label><br>
                        <input class="form-control" placeholder="enter the page number"
                               type='text' name='pages' size='40'>
                    </div>
                    <br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookPrice">Price</label><br>
                        <input class="form-control" placeholder="enter the price"
                               type='text' name='price' size='40'>
                    </div>

                    <br>

                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookImage">Upload Image</label><br>
                        <input type='file' name='img' size='35'>
                    </div>
                    <br>


                    <div class="form-group">
                        <label style="font-size: 18px;" for="bookEbook">Upload Ebook</label><br>
                        <input type='file' name='ebook' size='35'>
                    </div>
                    <br>

                    <input style="width:100px;" class="btn btn-warning btn-lg"
                           type='submit' value='Add Book'>
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
