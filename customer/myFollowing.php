<?php include("common/head.html"); ?>
<title>My Following</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
$user_id = get_user_id();
$query = "SELECT user_id, email, username FROM following AS F, user AS U WHERE F.s_user_id ='{$user_id}' AND F.t_user_id = U.user_id";
$result = mysql_query($query);
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
    $user_id[$i] = $row['user_id'];
    $user_name[$i] = $row['username'];
    $user_email[$i] = $row['email'];
    $i++;
}

//if(isset($_POST['search_nickname'])){
//    $query = "SELECT email,username FROM user WHERE username='{$_POST['search_nickname']}'";
//    $result = mysql_query($query);
//    $row=mysql_fetch_assoc($result);
//    $search_user_email = $row['email'];
//    $search_username = $row['username'];
//    $search_user_age = $row['age'];
//    echo $search_user_email;
//    echo '<script type="text/javascript">';
//    echo 'search_user();';
//    echo '</script>';
//}

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
        <h1 style="font-size:35px;font-family:Arial">My Following List
        </h1>
        <input id="len" style="display: none;" value="<?php echo $len;?>">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        name
                    </th>
                    <th>
                        email
                    </th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i=0;$i<$len;$i++){
                    echo "<tr><td>".$user_name[$i];
                    echo "</td><td>".$user_email[$i];
                    echo "</td><td style='width: 15%;'><a role='button' class='btn btn-primary btn-xl'
                                 href='friends_plan.php?id=".$user_id[$i]."'>view his/her plans</a>";
                    echo "</td><td style='width: 15%;'><a role='button' class='btn btn-danger btn-xl'
                                 href='javascript:void(0);' onclick='delete_wishlist(".$restaurant_id[$i].")'>cancel following</a></td></tr>";

                }
                ?>
                </tbody>
            </table>
            <a role="button" class="btn btn-primary btn-lg" href="search_user.php" >Search User</a>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Search User</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label>Nickname:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="search_nickname" placeholder="user's nickname you want to search" required>
                        </div>
                    </div>

                <br>
                <hr>
                <div id="search_result">

                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<script type="text/javascript">
    function search_user(){
        var html = '<table class="table table-striped">'+
                   '<thead><tr><th>name</th><th>email </th> <th>age </th> <th></th> </tr> </thead> <tbody>' +
                   '<tr><td>'+ <?php echo $search_username;?> +
                   '</td><td>'+ <?php echo $search_user_email;?> +
                   '</td><td>'+ <?php echo $search_user_age;?> +
                   '</td><td>aaa</td></tr>' +
                   '</tbody></table>';
        $('#search_result').empty().html(html);
    }
</script>