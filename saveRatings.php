<?php
   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movierec";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    
}
if(!empty($_POST['rating'])){
 // $vid = $_COOKIE["mid"];
// $uid=$_SESSION['uid'];
	 $tt= $_COOKIE["t"];
	  $mi= $_COOKIE["m"];


 $yy= $_COOKIE["y"];
	$y='('.$yy.')';

$insertRating = "INSERT INTO movieratings (userid,movieid,movietitle,movieyear,comments,ratings) VALUES ( '".$_POST['userId']."', '$mi','$tt', '$y', '".$_POST["comment"]."','".$_POST['rating']."')";
mysqli_query($conn, $insertRating) or die("database error: ". mysqli_error($conn));
 echo("<script>alert('Ratings saved!')</script>");
}

?>