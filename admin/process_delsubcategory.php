<?php

	if(empty($_POST['subcatnm']))
		{
			echo "No Selected Category";
		}
		else
		{

			$db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");


			$cid=$_POST['subcatnm'];
			
			$query="delete from subcat where subcat_id = $cid";
			
			$db->query($query) or die("Can't Execute DELETE SUB CATEGORY....");
			
			$query = "delete from book where b_subcat = ".$cid;
			$db->query($query);
			
			header("location:category.php?okdelsubcat=1");
		}
?>
	
	