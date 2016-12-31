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
<div>
    <ul>
        <li class="current_page_item">
            <a href="index.php">
                <span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li  class="current_page_item"><a href="category.php">
                <span class="glyphicon glyphicon-shopping-cart"></span> Category</a></li>
        <!--        <li><a href="addbook.php">Books</a></li>-->
        <li class="current_page_item"><a href="all_book.php">
                <span class="glyphicon glyphicon-book"> Books</a></li>
        <li class="last current_page_item"><a href="contact.php">
                <span class="glyphicon glyphicon-envelope"></span> Contact</a></li>

        <?php
        if (isset($_SESSION['status']) &&
            $_SESSION['unm'] == "admin"
        )
            //username must be admin hote hobe...
            //(admin/menu.inc.php) file ei condition die dici
            //pore name change kore dibo..
            //password iccamoto dite parbe admin
        {
            echo '<li class="current_page_item"><a href="../logout.php">
            <span class="glyphicon glyphicon-log-out"></span>Logout</a></li>';
        } else {
            echo '<li class="current_page_item"><a href="../register.php">
            <span class="glyphicon glyphicon-log-in"></span> Register</a></li>';
        }
        ?>

    </ul>

</div>
