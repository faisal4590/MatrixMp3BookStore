<?php
session_start();
if (!(isset($_SESSION['status']) && $_SESSION['unm'] == "admin")) {
    header("location:../index.php");
}

$db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");

$query = "select * from contact";
$res = $db->query($query) or die("Can't Execute Query...");

mysqli_close($db);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include("includes/head.inc.php");

    ?>
    <link rel="stylesheet" href="default.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <style>
        table {
            padding: 10px;
            border: 10px solid #D9534F
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
                if (isset($_GET['okdeletecontact'])) {
                    echo '<p style="font-size: 25px;
                        font-weight: bold; text-align: center;
                        color: limegreen;
                        ">Message Successfully deleted</p>';
                    echo '<br><br>';
                }
                ?>


                <table border='1' WIDTH='100%' cellspacing="5">
                    <tr>
                        <td style="text-align: center;color:#EC971F;font-size: 18px;" WIDTH='10%'><b>NO</b></td>
                        <td style="text-align: center;color:#EC971F;font-size: 18px;" WIDTH='20%'><b>NAME</b></td>
                        <td style="text-align: center;color:#EC971F;font-size: 18px;" WIDTH='20%'><b>EMAIL</b></td>
                        <td style="text-align: center;color:#EC971F;font-size: 18px;" WIDTH='50%'><b>QUERY</b></td>
                        <td style="text-align: center;color:#EC971F;font-size: 18px;" WIDTH='25%'><b>DELETE</b></td>

                    </tr>
                    <?php
                    $count = 1;
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo '<tr>
										<td>' . $count . '
										<td>' . $row['con_nm'] . '
										<td>' . $row['con_email'] . '
										<td>' . $row['con_query'] . '
										<td style="text-align:center;">
										<a href="process_del_contact.php?sid=' . $row['con_id'] . '">
                                            <img src="images/drop.png" >
										</a>
												
									
									</tr>';
                        $count++;
                    }
                    ?>

                </TABLE>

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
