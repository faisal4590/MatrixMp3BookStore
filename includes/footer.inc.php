<link href="font-awesome-4.6.3/css/font-awesome.min.css">

<div id="footer-wrap">
    <div class="footerMenu" style="width:40%; float: left; margin-top: 45px;">
        <ul>
            <li class="footer_li_style"><a class="footerLinkStyle" href="index.php">
                    <span class="glyphicon glyphicon-home"></span> Home</a></li>
            <!--<li><a href="register.php">Register</a></li>-->

            <?php
            if (isset($_SESSION['status'])) {

                echo '<li class="footer_li_style"><a class="footerLinkStyle" href="logout.php">
						<span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

            } else {
                echo '<li class="footer_li_style"><a class="footerLinkStyle" href="register.php">
						<span class="glyphicon glyphicon-log-in"></span> Register</a></li>';
            }
            ?>


            <li class="footer_li_style"><a class="footerLinkStyle" href="contact.php">
                    <span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
            <li class="footer_li_style"><a class="footerLinkStyle" href="aboutus.php">
                    <span class="glyphicon glyphicon-map-marker"></span> About Us</a></li>
            <!--<li class="current_page_item"><a class="current_page_itemLink" href="viewcart.php">View Cart</a></li>-->

        </ul>
    </div>

    <div class="footerLoginAndSearch" style="float: right;">
        <ul>

            <li id="login" style="list-style-type: none;">

                <?php

                if (isset($_SESSION['status'])) {
                    echo '<ul>
                                    <li style="list-style-type: none;">
                                    
                                                    <form method="GET" action="search_result.php">
                                                        <fieldset>
                                                            <br>
                                                            <input type="text" id="s" name="s"
                                                                   placeholder="search here"/> <br>
                                                            <input type="submit" id="x" value="Search" title="Search"/>
                                                        </fieldset>
                                                    </form>
                                     </li>
                                     <h1 style="font-size: 20px; color: #FFE654; font-weight: bold;
                                     border-bottom: 2px dotted #FFE654;">Contact us</h1>
                                    <p style="color:#b2dba1;"><span class="glyphicon glyphicon-map-marker"></span>  Address: 169, Elephant Road, Dhanmondi, Dhaka</p> 
                                    <p style="color:#b2dba1;"><span class="glyphicon glyphicon-phone-alt"></span> Phone: +8801732954905</p> 
                                    <p style="color:#b2dba1;"><span class="glyphicon glyphicon-envelope"></span> Email: <a style="font-size: 12px;
                                     " href="http://info@stereoframe.com" target="_blank">info@stereoframe.com</a> </p> ';
                } else {
                    echo '<li style="list-style-type: none;">
                                        <form action="process_login.php" method="POST">
                                            
										    <b style="font-size: 18px; color: #ffe654;">Username:</b><br>
										    <input class="username1st"
										     style="padding: 5px;" type="text" name="usernm"
										      placeholder="your username"><br>

											<b style="font-size: 18px;  color: #ffe654;" >Password:</b>
											<br>
											<input class="password1st" placeholder="your password"
											 style=" padding: 5px;" type="password" name="pwd"> <br>
											
											<input class="btn btn-success" 
											type="submit" id="x" value="Login" 
											title="Login"/>
										</form>
								</li>
								
								<li style="list-style-type: none;">
                                    
                                                    <form method="GET" action="search_result.php">
                                                        <fieldset>
                                                            <br>
                                                            <input type="text" id="s" name="s"
                                                                   placeholder="search here"/> <br>
                                                            <input type="submit" id="x" value="Search" title="Search"/>
                                                        </fieldset>
                                                    </form>

                                 </li>
                                 <h1 style="font-size: 20px; color: #FFE654; font-weight: bold;
                                 border-bottom: 2px dotted #FFE654;">Contact us</h1>
                                <p style="color:#b2dba1;"><span class="glyphicon glyphicon-map-marker"></span>  Address: 169, Elephant Road, Dhanmondi, Dhaka</p> 
                                <p style="color:#b2dba1;"><span class="glyphicon glyphicon-phone-alt"></span> Phone: +8801732954905</p> 
                                <p style="color:#b2dba1;"><span class="glyphicon glyphicon-envelope"></span> Email: <a style="font-size: 12px;
                                 " href="http://info@stereoframe.com" target="_blank">info@stereoframe.com</a> </p>

								</ul>';
                }


                ?>

    </div>

    <div class="copyright" style="clear: both; background: #374550;height: 40px;">
        <p style="color: darkgrey; text-align: center;">&copy; 2016 - present. www.books.matrixmp3bd.com. All rights
            reserved</p>

    </div>

</div>