<?php
session_start();
?>
<style type="text/css">
    .head {
        font-size: 30px;
    }
    .head small {
        font-size: 20px;
    }
    .nav-text {
        font-size: 20px;
    }
    .nav-container {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
    <div class="container nav-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Foodie</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand head" href="../index.php">Foodie <small>-- Never fail to live up to delicacy and love</small></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="scroll-link nav-text" href="../index.php">Discovery</a></li>
                <li><a class="scroll-link nav-text" href="#">Planning</a></li>
                <li><a class="scroll-link nav-text" href="#">Sharing</a></li>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" id="nav-user" data-type="1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (!$_SESSION['user_name']) {
                                header("Location:../login.php");
                            }
                            else
                                echo $_SESSION['user_name'];
                            ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Personal Information</a></li>
                            <li><a href="myPlan.php">My Restaurants</a></li>
                            <li><a href="#">New Notices</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../login.php?action=logout">Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </ul>
        </div>
    </div>

    <div class="sidebar page-sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-list-alt fa-fw"></i> Overview
                    </a>
                </li>
                <li>
                    <a href="myRestaurantList.php"><i class="fa fa-list fa-fw"></i> My Restaurants
                    </a>
                </li>
                <li>
                    <a href="myNotices.php"><i class="fa fa-list fa-fw"></i> My Notices
                    </a>
                </li>
                <li>
                    <a href="myAccountDisplay.php"><i class="fa fa-user fa-fw"></i> Account
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>