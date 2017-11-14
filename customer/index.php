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
            <h3><strong>Welcome to foodie !</strong></h3>
            <br>
            <p>You can </p>
            <p>>><a href="myAccountDisplay.php">Manage your account and password</a></p>
            <p>>><a href="myWishList.php">Edit/delete your wish list, or create your travel plan</a></p>
            <p>>><a href="myPlan.php">View/comment your travel plan</a></p>
            <p>>><a href="myComment.php">View/edit your comments on plans/restaurants</a></p>
            <p>>><a href="myFollowing.php">View/copy your friends' plan, or add new friends</a></p>
            <p>>><a href="myNotices.php">View notices</a></p>
        </div>
    </div>
</div>



<?php include("common/foot.html"); ?>
