<?php
   $cn = mysqli_connect("localhost", "root", "","movierec");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($cn,"select * from user where Email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['Name'];
    $_SESSION['uid'] = $row['userId'];

    $myfile = fopen("savesession.txt", "w") or die("Unable to open file!");

fwrite($myfile,$_SESSION['uid']);
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>