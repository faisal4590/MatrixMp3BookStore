<?php

$db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");


$query = "delete from contact where con_id ="
    . $_GET['sid'];

$db->query($query) or die("can't Execute...");


header("location:contact.php?okdeletecontact=1");

?>