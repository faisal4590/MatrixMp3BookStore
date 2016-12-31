<?php
require('../connection/connection.php');

$query="delete from book where b_id ="
    .$_GET['sid'];

$result = $db->query($query) or die("can't Execute...");

header("location:all_book.php?okdelbook=1");



?>