<?php require_once("functions.php") ?>
<div class="navg-strip">
    <div class="container">
        <div class="navg-main">
            <div class="top-nav">
                <span class="menu"> <img src="images/icon.png" alt=""/></span>
                <ul class="res">
                    <li><a href="index.php" class="active">Home</a></li>
                    <?php
                    if(get_user_status()==2){
                        echo '<li><a href="wishlist.php">My Restaurants</a></li>';
                    }
                    else{
                        echo '<li><a href="wishlist.php">Wish List</a></li>';
                        echo '<li><a href="plan_list.php">My Plan</a></li>';
                    }
                    ?>

                </ul>

            </div>
            <div class="header-right">
                <?php
                if (get_user_name()==null) {
                    echo '<div class="r-float">';
                    echo '<a href="login.php"><button type="button" class="btn btn-success" id="login-user-btn">Log In</button></a>';
                    echo '<a href="register.php"><button type="button" class="btn btn-default" id="signup-user-btn" style="margin-left: 20px;">Sign Up</button></a>';
                    echo '</div>';
                } else {
                    echo '<div class="r-float">';
                    if(get_user_status()==2){
                        echo "Hello, <a href=\"merchant/index.php\">".get_user_name()."</a>";
                    }
                    else{
                        echo "Hello, <a href=\"customer/index.php\">".get_user_name()."</a>";
                    }
                    echo '</div>';
                }
                ?>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>