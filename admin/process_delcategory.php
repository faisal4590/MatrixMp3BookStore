<?php

if (!empty($_POST)) {
    //$msg = array();
    $msg = '';
    if (empty($_POST['del'])) {
//        $msg[] = "Please select the category first";
        $msg .= '<p style="color:red;font-size: 23px; font-weight: bold;">Please select the category first</p>';
    }

    if (!empty($msg)) {
        /*echo '<p style="color:red;
				margin-top: 30px;
				text-align: center;
				 font-size: 22px;">
				 <b >Error:-</b></p>';

        foreach ($msg as $k) {
            echo '<li style="color:red;
				font-weight: bold;list-style: none;
				margin-bottom: 5px;
				text-align: center;">' . $k;
        }*/
        header("location:category.php?errorfordelcat=".$msg);
    } else {

        $db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");


        $delcat = $_POST['del'];


        //$id = 'select cat_id from category where cat_nm='.$delcat;

        $query = "delete from category where cat_nm ='$delcat' ";
        $db->query($query) or die("can't Execute...");


        /*function delete_subcats($id) {
            // Try to delete all the childrens first
            $res = mysql_query('SELECT cats_id FROM cats WHERE cats_parentid = '.$id);

            if ($res) {
            // Then delete the cat after all the childrens are deleted

                while ($row = mysql_fetch_assoc($res))
                    delete_subcats($row['cats_id']);
            }

            mysql_query('DELETE FROM cats WHERE cats_id = '.$id);
        }*/

        //my testing starts....

        /*function delete_subcats($delcat)
        {

            // Try to delete all the children first
            $requests = mysql_query('SELECT * FROM subcat WHERE parent_id = ' . $delcat);

            while($child = mysql_fetch_array($requests))
            {
                delete_subcats($child['subcat_id']);
            }
            $request = "DELETE FROM  subcat  WHERE parent_id= ".$delcat;
            return mysql_query($request);

            //testing ends.....
        }
        delete_subcats($delcat);*/

        mysqli_close($db);
        header("location:category.php?okdelcategory=1");
    }
} else {
    header("location:index.php");
}
?>
	
	