<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

  function connectDb(){
      $con = mysql_connect("localhost","root","123456p");
      if (!$con)
      {
          die('Could not connect: ' . mysql_error());
      }
      return mysql_select_db("tourism", $con);
  }
  function set_login($user_name,$user_id, $user_status){
      session_start();
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_status'] = $user_status;   //1:admin 2:merchant 3:customer
  }
  function get_user_id(){
      session_start();
      if(isset($_SESSION['user_id']))
          return $_SESSION['user_id'];
      else
          return null;
  }
  function get_user_name(){
      session_start();
      if(isset($_SESSION['user_name']))
          return $_SESSION['user_name'];
      else
          return null;
  }
    function get_user_status(){
        session_start();
        if(isset($_SESSION['user_status']))
            return $_SESSION['user_status'];
        else
            return null;
    }
  function set_logout(){
      session_start();
      session_destroy();
  }


?>