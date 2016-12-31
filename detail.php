<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="lightbox/dist/css/lightbox.css">
    <link rel="stylesheet" href="default.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <?php
    include("includes/head.inc.php");
    ?>
</head>

<body>

<div id="wholeContainer">

    <div id="header" style="margin-top: 0;">
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

    <!-- start page -->

    <div id="page">
        <!-- start content -->
        <div id="content">
            <div class="post">
                <h1 class="title"></h1>
                <div class="entry">
                    <?php
                    $db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");


                    $id = $_GET['id'];

                    //prepare statement starts here
                    /*$sql = 'select * from book where b_id=?';
                    $query = $db->prepare($sql);
                    $query->bind_param('i',$id);
                    $query->execute();
                    $result = $query->get_result();
                    while($resultArray = $result->fetch_array(MYSQLI_ASSOC))
                    {
                        $row[] = $resultArray;

                    }
                    print_r($row);*/
                    //prepare statement ends here

                    $query = "select * from book where b_id=$id";

                    $res = $db->query($query) or die("Can't Execute Query..");
                    $row = $res->fetch_array(MYSQLI_ASSOC);




                    if (isset($_SESSION['status'])) {
                        $book_id = $row['b_id'];
                        $book_name = $row['b_nm'];
                        echo '<table border="0" width="100%">
												 
												 <tr align="center"
												 style="background: #D1B254;">
													 <td style="padding: 5px;
													 border:2px solid #927c3a;
													 color:#f5f5f5;
													 font-size: 16px;
													">Item Details</td>
												</tr>
												
											 </table>
											
											<table border="0"  width="100%" bgcolor="#ffffff">
												<tr> 
													
													<td width="15%" rowspan="3">
														<img style="border:3px solid lightslategrey;
														background:darkgrey;
														padding:3px;" 
														 src="' . $row['b_img'] . '" width="100">
													
													</td>
												</tr>
											
												<tr> 
													<td width="50%" height="100%">
														<table border="0"  width="100%" height="100%">
															<tr valign="top">
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right" width="10%">Name</td>
																<td style="font-weight:bold;
																font-size:15px;" width="6%">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_nm'] . '</td>
															</tr>

															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right">ISBN</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td  style="font-size:15px;" align="left">' . $row['b_isbn'] . '</td>
																
															</tr>
															
																					
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;"  align="right">Publisher </td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;"  align="left">' . $row['b_publisher'] . '</td>
																
															</tr>											
															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right"> Edition</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_edition'] . '</td>
																
															</tr>
															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right"> Pages</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_page'] . '</td>
															</tr>
															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right"> Price</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_price'] . '</td>
															</tr>
														</table>
										
														
													</td>
												</tr>
											</table>
										
												<tr valign="bottom" >
												    <!--ekhane lightbox die image zoom effect korci-->
														<a href="' . $row['b_img'] . '" rel="lightbox">
														<img src="images/zoom.gif" ></a>
													
												</tr>
												
												<tr>
												    
												    <br/>
												    <a style="text-align: center;
                                                    text-decoration: none;
                                                    border:3px solid #d96417;
                                                    padding:8px;
                                                    color:white;
                                                    font-size: 15px;
                                                    border-radius:5px 5px;
                                                    margin:10px 0;
                                                    margin-left:200px;
                                                    "
                                                    class="btn btn-warning"
                                                    href="#">Click here to get the book</a>
												</tr>
												<script src="sharer.js-master/sharer.min.js">
												</script>
												<tr>
												<br/>
												<button style="margin-top: 10px;
												margin-bottom:10px;
												margin-left:200px;" 
												class="sharer button btn btn-lg btn-success"
                                                data-sharer="facebook"
                                                data-url="http://books.matrixmp3bd.com/book_store/detail.php?id=' . $book_id . '&cat=' . $book_name . '" >
                                                    Share to Facebook 
                                                </button>
												</tr>
											
											<table border="0" width="100%" >
												 
												 <tr align="center" style="background:#D1B254;
												 ">
													 <td style="padding: 5px;
													 border:2px solid #927c3a;
													 color:#f5f5f5;
													 font-size: 16px;">DESCRIPTION</td>
												</tr>
											
																		
											 </table>
											 
											 ' . $row['b_desc'] . '

											
       </table>';
                    } else {
                        $book_id = $row['b_id'];
                        $book_name = $row['b_nm'];
                        echo '<table border="0" width="100%">
												 
												 <tr align="center"
												 style="background: #D1B254;">
													 <td style="padding: 5px;
													 border:2px solid #927c3a;
													 color:#f5f5f5;
													 font-size: 16px;
													">Item Details</td>
												</tr>
												
											 </table>
											
											<table border="0"  width="100%" bgcolor="#ffffff">
												<tr> 
													
													<td width="15%" rowspan="3">
														<img style="border:3px solid lightslategrey;
														background:darkgrey;
														padding:3px;" 
														 src="' . $row['b_img'] . '" width="100">
													
													</td>
												</tr>
											
												<tr> 
													<td width="50%" height="100%">
														<table border="0"  width="100%" height="100%">
															<tr valign="top">
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right" width="10%">NAME</td>
																<td style="font-weight:bold;
																font-size:15px;" width="6%">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_nm'] . '</td>
															</tr>

															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right">ISBN</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td  style="font-size:15px;" align="left">' . $row['b_isbn'] . '</td>
																
															</tr>
															
																					
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;"  align="right">Publisher </td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;"  align="left">' . $row['b_publisher'] . '</td>
																
															</tr>											
															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right"> Edition</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_edition'] . '</td>
																
															</tr>
															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right">  PAGES</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_page'] . '</td>
															</tr>
															
															<tr>
																<td style="font-size:16px;
																font-family:Impact, Charcoal, sans-serif	
                                                                ;" align="right"> PRICE</td>
																<td style="font-weight:bold;
																font-size:15px;">: </td>
																<td style="font-size:15px;" align="left">' . $row['b_price'] . '</td>
															</tr>
														</table>
										
														
													</td>
												</tr>
											</table>
										
												<tr valign="bottom" >
												    <!--ekhane lightbox die image zoom effect korci-->
														<a href="' . $row['b_img'] . '" rel="lightbox">
														<img src="images/zoom.gif" ></a>
													
												</tr>
												
												<tr>
												    
												    <br/>
												    <p 
                                                        style="
                                                        padding:5px;
                                                        color:white;
                                                        font-size: 15px;
                                                        border:3px solid #F54B43;
                                                        border-radius:5px 5px;
                                                        background: lightcoral;
                                                        margin-left:155px;
                                                        
                                                        "
                                                        class="glyphicon glyphicon-alert"> Please login to get the book</p>
												</tr>
												<script src="sharer.js-master/sharer.min.js">
												</script>
												<tr>
												<br/>
												<button style="margin-top: 10px;
												margin-bottom:10px;
												margin-left:200px;" 
												class="sharer button btn btn-lg btn-success"
                                                data-sharer="facebook"
                                                data-url="http://books.matrixmp3bd.com/book_store/detail.php?id=' . $book_id. '&cat=' . $book_name. '" >
                                                    Share on Facebook</button>
												</tr>
											
											<table border="0" width="100%" >
												 
												 <tr align="center" style="background:#D1B254;
												 ">
													 <td style="padding: 5px;
													 border:2px solid #927c3a;
													 color:#f5f5f5;
													 font-size: 16px;">DESCRIPTION</td>
												</tr>
											
																		
											 </table>
											 
											 ' . $row['b_desc'] . '

											
       </table>';
                    }

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





<!--Lightbox js file-->
<script src="lightbox/dist/js/lightbox-plus-jquery.js"></script>
<!--Lightbox js file ends-->

<script>
    lightbox.option({
        'resizeDuration':1000
    })
</script>


</body>
</html>