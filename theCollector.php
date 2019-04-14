<?php


   $conn=mysqli_connect("localhost","root", "","movierec") or die("The connection to the database has not been made");
//collect information…
$browser =$_SERVER['HTTP_USER_AGENT']; // get the browser name
$curr_page=$_SERVER['PHP_SELF'];// get page name
$ip=$_SERVER['REMOTE_ADDR'];   // get the IP address
// $from_page=$_SERVER['HTTP_REFERER'];//  page from which visitor
$page=$_SERVER['PHP_SELF'];//get current page
//Insert the data in the table…
$query_insert  ="INSERT INTO stattracker
(browser,ip,thedate_visited,page) VALUES
('$browser','$ip',now(),'$page')" ;
$result=mysqli_query($conn,$query_insert); 



?>