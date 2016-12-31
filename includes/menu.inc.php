<!--<link href="../default.css" rel="stylesheet" />-->
<style type="text/css">
	li.current_page_item:hover
	{
		background: #F27935;
	}
	li.current_page_item{
		/*list-style: none;*/
		/*padding:10px;*/
		margin-bottom:10px;
	}
	li.current_page_item:hover{
		opacity:.6;
		-webkit-transition:1000ms ease;
		-moz-transition:1000ms ease;
		-o-transition:1000ms ease;
		transition:1000ms ease;
	}

</style>
<!--<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />-->
<ul>
			<li class="current_page_item"><a class="current_page_itemLink "  href="index.php">
				<span class="glyphicon glyphicon-home"></span>	Home</a></li>
			<!--<li><a href="register.php">Register</a></li>-->

			<?php 
					if(isset($_SESSION['status']))
					{
						
						echo '<li class="current_page_item"><a class="current_page_itemLink" href="logout.php">
						<span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
					}
					else
					{
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