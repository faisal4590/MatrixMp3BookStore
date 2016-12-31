
<style>
    input[type='text'].username1st, input[type='password'].password1st {
        width: 200px;
        border: 2px solid #65CAC0;
    }

    input[type='text'].username1st:hover, input[type='password'].password1st:hover {
        border: 2px solid #90EE90;
    }

    input[type='submit']:hover {
        opacity: .7;
        -webkit-transition: 1000ms ease;
        -moz-transition: 1000ms ease;
        -o-transition: 1000ms ease;
        transition: 1000ms ease;
    }
</style>


<ul>

    <li id="login">

        <?php
        if (isset($_SESSION['status'])) {
            echo '<h2><span style="color:#DFE654; font-size: 20px; font-weight: bold;">Hello : </span>  ' . $_SESSION['unm'] . '</h2>';
        } else {
            echo '<form action="process_login.php" method="POST">
                                            
										    <b style="font-size: 18px;">Username:</b>
										    <input class="username1st"
										     style="padding: 5px;" type="text" name="usernm"
										      placeholder="your username"><br>

											<b style="font-size: 18px;">Password:</b>
											<br>
											<input class="password1st" placeholder="your password"
											 style=" padding: 5px;" type="password" name="pwd">
											
											<input class="btn btn-success" 
											type="submit" id="x" value="Login" 
											/>
										</form>';
        }
        ?>
    </li>

    <style>
        #s {
            border: 2px solid #65CAC0;
            font-size: 16px;
            font-style: italic;
            width: 200px;
            margin-bottom: 10px;
        }

        #s:hover {
            border: 2px solid lightgreen;
        }

        #x:hover {
            background: #31B0D5;
        }

        li.categoryStyle {
            list-style: none;
            padding: 10px;
            margin-bottom: 10px;

        }

        li.categoryStyle:hover {
            opacity: .7;
            -webkit-transition: 1000ms ease;
            -moz-transition: 1000ms ease;
            -o-transition: 1000ms ease;
            transition: 1000ms ease;
        }

        li.categoryStyle a.categoryStyleLink {

            background: #2BBBAD;
            padding: 10px;
            text-decoration: none;
            color: #F9F9FF;
            border: 3px solid #058f81;
            border-radius: 5px 5px;
        }

    </style>


    <li>

        <form method="GET" action="search_result.php">
            <fieldset>
                <input type="text" id="s" name="s"
                       placeholder="search here"/> <br>
                <input type="submit" id="x" value="Search"/>
            </fieldset>
        </form>
    </li>
    <li>
        <h2>Categories</h2>
        <ul>
            <?php
            $db = new mysqli("localhost", "root", "", "matrixmp_cent_db") or die("Can't Connect to database");


            $query = "select * from category";

            $res = $db->query($query);

            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                echo '<li class="categoryStyle"><a class="categoryStyleLink" href="subcat.php?cat='
                    . $row['cat_id'] . '&catnm='
                    . $row["cat_id"] . '">' . $row["cat_nm"] . '</a></li>';
                //pass catid not catnm(already fixed faisal)
            }

            mysqli_close($db);
            ?>
        </ul>
    </li>

</ul>