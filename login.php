<?php include("common/head.html"); ?>
<title>Log In</title>
<?php include("common/header.html"); ?>
<?php
require_once('functions.php');

if ( isset( $_POST['email']) ) {
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $password = hash('sha256',$_POST['password']);
    $query = "SELECT * FROM user WHERE email ='{$_POST['email']}' AND password='{$password}'";
    $result = mysql_query($query);
    if(mysql_num_rows($result)!=0){
        $row = mysql_fetch_array($result);

        if($row['is_merchant']==1){
            set_login($row['username'],$row['user_id'],2);
            header("Location:merchant/index.php");
        }
        else{
            set_login($row['username'],$row['user_id'],3);
            header("Location:customer/index.php");
        }
        exit();
    } else {
        echo '<script type="text/javascript">'."\n";
        echo 'alert("wrong email or password !");';
        echo '</script>'."\n";
    }
}

if(isset($_GET['action'])){
    if( $_GET['action'] == "logout") {
        //if log out, destroy session
        set_logout();
//        session_start();
//        session_destroy();
    }
}
?>

<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a href="login.php">Log In</a></h1><hr>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 col-sm-6 col-md-4 col-xs-offset-1 col-sm-offset-3 col-md-offset-4">
            <a href="index.php"><< Back to home</a>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <label for="email">Email :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email" placeholder="please input your email" required>
                            </div>
                        </div>
                        <label for="password">Password :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="password" placeholder="please input your password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p>
                <span>Do not have an ID？<a href="register.php">Sign Up</a> now!</span>
            </p>
        </div>
    </div>
</div>

<?php include("common/foot.html"); ?>
