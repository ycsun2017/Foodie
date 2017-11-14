<?php include("common/head.html"); ?>
<title>Search User</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<!--<script type="text/javascript">-->
<!--    function search_user(){-->
<!--        var shtml = 'sssssssssssssssssssssssss';-->
<!--        document.getElementById("search-result").innerHTML =  shtml;-->
<!--        alert("a");-->
<!--        $('#search_result').innerHTML = shtml;-->
<!--    }-->
<!--</script>-->
<?php
require_once("../functions.php");

if(isset($_POST['search_nickname'])){
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "SELECT email,username,birthday FROM user WHERE username='{$_POST['search_nickname']}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    $search_user_email = $row['email'];
    $search_username = $row['username'];
    $search_user_birthday = $row['birthday'];

//    echo '<script type="text/javascript">';
//    echo 'search_user();';
//    echo '</script>';
}

?>
<style type="text/css">
    .alert h4{
        font-weight: 100;
    }
    .basic-grey {
        margin-top:-30px;
        margin-left:auto;
        margin-right:auto;
        max-width: 1000px;
        background: #fff;
        padding: 25px 15px 25px 10px;
        font: 20px,"Arial";
        color: #888;
        border:0px solid #E4E4E4;
    }
    .basic-grey h1 {
        font-size: 35px;
        padding: 0px 0px 10px 40px;
        display: block;
        border-bottom:1px solid #E4E4E4;
        margin: -10px -15px 30px -10px;;
        color: #888;
    }
    .grey-button {
        background: #5f9ea0;
        border: none;
        padding: 10px 25px 10px 25px;
        color: #FFF;
        box-shadow: 1px 1px 5px #B6B6B6;
        border-radius: 3px;
        text-shadow: 1px 1px 1px #9E3F3F;
        cursor: pointer;
    }
    .grey-button:hover {
        background: #008080
    }
</style>

<div id="page-wrapper">
    <div class="basic-grey">
        <h1 style="font-size:35px;font-family:Arial">Search User
        </h1>
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="col-sm-12">
                <div class="form-group col-sm-10">
                    <div class="col-sm-3">
                        <label>Nickname:</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="search_nickname" placeholder="user's nickname you want to search" required>
                    </div>
                </div>
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-3 col-sm-offset-1">
                        <button type="button" class="btn btn-default btn-block" onclick="javascript:window.history.back();" >Return</button>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <hr><br>
            </div>

            <div class="col-sm-12">
                <div class="form-group col-sm-10">
                    <div class="col-sm-3">
                        <label>Search result:</label>
                    </div>
                    <div class="col-sm-5">
                        <?php
                        if($search_user_email){
                            echo "email :".$search_user_email."<br>";
                            echo "nickname :".$search_username."<br>";
                            echo "birthday :".$search_user_birthday."<br>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-block">Follow</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

