<?php include("common/head.html"); ?>
<title>Register</title>
<?php include("common/header.html"); ?>
<?php
require_once('functions.php');

if ( isset( $_POST['email']) ) {
    if($_POST['password']!=$_POST['password2']){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"The passwords you typed do not match. Please type the same password in both text boxes.\")";;
        echo "</script>";
    } else {
        if(!connectDb()){
            die('Could not connect tourism: ' . mysql_error());
        }
        $query = "SELECT * FROM user WHERE email ='{$_POST['email']}'";
        $result = mysql_query($query);
        $query1 = "SELECT * FROM user WHERE username ='{$_POST['nickname']}'";
        $result1 = mysql_query($query1);
        if(mysql_num_rows($result)!=0){
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Sorry, this email has already been registered!\")";;
            echo "</script>";
        } else if(mysql_num_rows($result1)!=0){
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Sorry, this nickname has already been registered!\")";;
            echo "</script>";
        } else {
            $password = hash('sha256',$_POST['password']);
            $query2 = "INSERT INTO user (email, username, password, birthday, phone_number)
                   VALUES ('{$_POST['email']}', '{$_POST['nickname']}', '{$password}', '{$_POST['birthday']}', '{$_POST['phone']}')";
            if(!mysql_query($query2)){
                echo "<script type=\"text/javascript\">";
                echo "alert(\"Failed to register, please try again!!\")";
                echo "</script>";
            }
            else {
                $query3 = "SELECT * FROM user WHERE email ='{$_POST['email']}' AND password='{$password}'";
                $result3 = mysql_query($query3);
                if(mysql_num_rows($result3)!=0) {
                    session_start();
                    $row = mysql_fetch_array($result3);
                    $_SESSION['user_name'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header("Location:customer/index.php");
                    exit();
                }
            }
        }
    }
}
?>

<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a href="register.php">Sign Up</a></h1><hr>
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
                                <input type="email" class="form-control" name="email" placeholder="please input your email" required>
                            </div>
                        </div>
                        <label for="email">Nickname :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nickname" placeholder="please input a nickname" required>
                            </div>
                        </div>
                        <label for="email">Birthday :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="birthday" id="birthday" placeholder="YYYY-MM-DD" required>
                            </div>
                        </div>
                        <label for="email">Phone :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="phone" placeholder="please input your phone number" required>
                            </div>
                        </div>
                        <label for="email">Password :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="password" placeholder="please input your password" required>
                            </div>
                        </div>
                        <label for="email">Confirm Password :</label>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="password2" placeholder="please input your password again" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p>
                <span>Already have an ID？<a href="login.php">Log In</a> now!</span>
            </p>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="datepicker/css/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="datepicker/js/jquery-ui-datepicker.js"></script>
<script type="text/javascript">
    window.onload = function(){
        $("#birthday").datepicker({
            minDate: '-120y',
            maxDate: 0
        });
    };
</script>
<?php include("common/foot.html"); ?>
