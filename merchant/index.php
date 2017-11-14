<?php include("common/head.html"); ?>
    <title>Personal Center</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<style type="text/css">
    .alert h3{
        font-weight: 100;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="alert alert-success" role="alert">
            <h3><strong>Hello, dear merchant!</strong></h3>
            <br>
            <p>You can </p>
            <p>>><a href="myAccountDisplay.php">Manage your account and password</a></p>
            <p>>><a href="myRestaurantList.php">add/edit/delete your own restaurant</a></p>
            <p>>><a href="myNotices.php">view notices</a></p>
        </div>
    </div>
</div>



<?php include("common/foot.html"); ?>
