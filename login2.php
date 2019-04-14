<?php
ob_start();
?>

<?php


   session_start();

// Create connection
$cn = mysqli_connect("localhost", "root", "","movierec");


// Check connection
if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
}








$name=$_POST['email'];
$Pass=$_POST['password'];







$q="SELECT userId FROM user WHERE  Email = '$name' and Password = '$Pass'";
 
$records=mysqli_query($cn,$q);

$row =mysqli_fetch_assoc($records);
if((mysqli_num_rows($records))>0)


{
        
         $_SESSION['login_user'] = $name;

header('Location:dashboard1.php');










//header('Location:homepage3.php');


}


else
	{
		

	 echo("<script>alert('Enter correct login credentials!')</script>");
 echo("<script>window.location = 'index.php';</script>");
	

	}


?>
