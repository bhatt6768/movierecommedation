<?php
   include('theCollector.php');
?>
<?php
session_start();
$error="";
$message="";

	if(isset($_POST['submit1']))
{
$conn=mysqli_connect("localhost","root", "","movierec") or die("The connection to the database has not been made");

$name=$_POST['name'];

$email=$_POST['email'];
$password=$_POST['pass1'];
$confirmpassword=$_POST['pass2'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$genre=$_POST['genre'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$contact=$_POST['contact'];

   
	
	 if(empty($error))
	{
	$sql="INSERT INTO user(Name,Email,Password,Confirmpassword,Age,Gender,Genre,Country,State,City,Zipcode,Contact) VALUES('$name','$email','$password','$confirmpassword','$age','$gender','$genre','$country','$state','$city','$zipcode','$contact')";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
	$_SESSION['name']=$name;
	$_SESSION['email']=$email;	
	
	  header("location:index.php#success");











    





















	

	//echo '<script language="javascript">';
//echo 'alert("Register succesfully please log in to continue")';
//echo '</script>';
	

	}
	}
	
	
}
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Movies Pro </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Movies Pro Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- pop-up -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popup.css" rel="stylesheet" type="text/css" media="all" />
 
       
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>

   
<!-- //pop-up -->
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--/web-fonts-->
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


     <script>

     	function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function check(str) {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mydiv").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "usercheck.php?email="+str, true);
        xmlhttp.send();
    
}
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

 <script src="main.js"></script>
    <script>
        getTopMovies();
    </script>

    <script>
    	getpopularMovies();
    </script>

    <script>
    	 getTrendingMovies();
    </script>

<!--//web-fonts-->
</head>
<body>

	
<!--/main-header-->
  <!--/banner-section-->
	<div id="demo-1" data-zs-src='["images/1.jpg", "images/3.jpg","images/4.jpg"]' data-zs-overlay="dots">
		<div class="demo-inner-content">
		<!--/header-w3l-->
			   <div class="header-w3-agileits" id="home">
			     <div class="inner-header-agile">	
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a  href="index.html"><span>M</span>ovies <span>P</span>ro</a></h1>
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
							<li class="active"><a href="index.html">Home</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Genre <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="genre.html">Action</a></li>
											<li><a href="genre.html">Biography</a></li>
											<li><a href="genre.html">Crime</a></li>
											<li><a href="genre.html">Family</a></li>
											<li><a href="horror.html">Horror</a></li>
											<li><a href="genre.html">Romance</a></li>
											<li><a href="genre.html">Sports</a></li>
											<li><a href="genre.html">War</a></li>
										</ul>
									</div>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="genre.html">Adventure</a></li>
											<li><a href="comedy.html">Comedy</a></li>
											<li><a href="genre.html">Documentary</a></li>
											<li><a href="genre.html">Fantasy</a></li>
											<li><a href="genre.html">Thriller</a></li>
										</ul>
									</div>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="genre.html">Animation</a></li>
											<li><a href="genre.html">Costume</a></li>
											<li><a href="genre.html">Drama</a></li>
											<li><a href="genre.html">History</a></li>
											<li><a href="genre.html">Musical</a></li>
											<li><a href="genre.html">Psychological</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							
						
							
							<li><a href="contact.html">Contact</a></li>
						</ul>

					</div>
					<div class="clearfix"> </div>	
				</nav>
					<div class="w3ls_search">
									<div class="cd-main-header">
										<ul class="cd-header-buttons">
											<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
										</ul> <!-- cd-header-buttons -->
									</div>
									<div id="cd-search" class="cd-search">
										<form action="#" method="post">
											<input name="Search" type="search" placeholder="Search...">
										</form>
									</div>
								</div>
	
			</div> 
<div id="success" class="popup-overlay">
        <div class="log-popup">
            <h2>Success</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>Acoount is created Successfully.Now you can login your account :)</p>
                <a href="#" class="btn-main btn-main-primary" data-toggle="modal" data-target="#myModal4">
                        Log In
                </a>
            </div>
        </div>
    </div>
			   </div>
		<!--//header-w3l-->
			<!--/banner-info-->
			   <div class="baner-info">
			      <h3>Latest <span>On</span>Line <span>Mo</span>vies</h3>
				  <h4>In space no one can hear you scream.</h4>
				 <div class="wthree_agile_login">
						     <ul>
									
									<li><a href="#" class="login"  data-toggle="modal" data-target="#myModal4">Login</a></li>
									<li><a href="#" class="login reg"  data-toggle="modal" data-target="#myModal5">Register</a></li>

								</ul>
						</div>

			   </div>
			<!--/banner-ingo-->		
		</div>
    </div>
  <!--/banner-section-->
 <!--//main-header-->
	         <!--/banner-bottom-->
			 
			<!--//banner-bottom-->
		     <!-- Modal1 -->
					<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >

							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Login</h4>
										<div class="login-form">
											<form  data-toggle="validator" method="post" action="login.php">

												
												 <div class="form-group has-feedback">
												<input type="email" name="email"  class="form-control" placeholder="E-mail"  data-error="Enter valid Email Address"required><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
												 <div class="form-group has-feedback">
												<input type="password" name="password"  class="form-control" id="myInput" placeholder="Password" data-error="Enter password" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
											<input type="checkbox" onclick="myFunction()">Show Password

												<div class="tp">
													<input type="submit" value="LOGIN NOW">
												</div>
												<div class="forgot-grid">
												      
														<div class="forgot">
															<a href="#" data-toggle="modal" data-target="#myModal2">Forgot Password?</a>
														</div>
														<div class="clearfix"></div>
													</div>
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						
				<!-- //Modal1 -->
				  <!-- Modal1 -->
					<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >

							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">

									<div class="modal-header">
										
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Register</h4>
										<div class="login-form">
											<form data-toggle="validator" method="post" action="index.php">
												
												<fieldset><div id="sf1" class="frm">
													<div class="form-group has-feedback">
											    <input type="text" name="name" placeholder="Name" class="form-control" data-error="Enter name" required> <span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												<input type="email" name="email" placeholder="E-mail" class="form-control" onkeyup="check(this.value)" data-error="Enter valid Email Address" required><font color="orange"<span id="mydiv"></span></font><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												<input type="password" data-minlength="8" class="form-control" pattern="[a-zA-Z0-9]+" name="pass1" id="inputPassword1" placeholder="Password" data-error="Minimum of 8 characters "required><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												<input type="password" name="pass2" class="form-control" placeholder="Confirm Password" data-match="#inputPassword1" data-match-error="oops! password didnt match"required><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
												
												<div class="tp">
													
													<input type="submit" id="btn" value="Next">
													
												</div>
											</div>
										</fieldset>
										<fieldset>
											<div id="sf2" class="frm">
											  
											   <select  class="form-control" placeholder="Age" name="age" data-error="Enter Age" required="">
     <option value="" selected disabled hidden>select Age</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>25</option>
    <option>26</option>
  
  </select><div class="help-block with-errors"></div><br/>
												<select type="options" class="form-control" name="gender" placeholder="Gender" id="state" required>
    <option value="" selected disabled hidden>select Gender</option>
    <option>Male</option>
    <option>Female</option>
  
  </select>
   <br/>
   <select type="options" class="form-control" name="genre" placeholder="Genre" id="s" required>
    <option value="" selected disabled hidden>Prefered Genre</option>
    <option>Crime</option>
    <option>Horror</option>
  
  </select>
   <br/>
  
  
  <select type="options" class="form-control" placeholder="Country" name="country" required>
     <option value="" selected disabled hidden>select Country</option>
    <option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
  </select>
												 <div class="form-group has-feedback">
												<input type="text" class="form-control" name="state" placeholder="State" data-error="Enter State"required=""><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
												<div class="form-group has-feedback">
												<input type="text" class="form-control" name="city" placeholder="City" data-error="Enter City"required=""><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												<input type="text" maxlength="6" class="form-control" name="zipcode" data-error="Enter 6 Digit Pincode"name="zipcode" pattern="[0-9]+" placeholder="Zipcode" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												 <input type="text" maxlength="10"  name="contact" class="form-control"  pattern="[0-9]+" name="name" data-error="Enter 10 Digit Mobile number" placeholder="Contact no." required=""><span class="glyphicon form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div>
												</div>
												 <div class="signin-rit">
												 	 <div class="form-group has-feedback">
													<span class="agree-checkbox">
														<label class="checkbox"><input type="checkbox" data-error="please accept privacy terms" name="checkbox">I agree to your <a class="w3layouts-t" href="#" target="_blank" >Terms of Use</a> and <a class="w3layouts-t" href="#" target="_blank">Privacy Policy</a></label><div class="help-block with-errors"></div>
													</span>
												</div>
												</div>
												
												<div class="tp">
													<input type="submit" class="btn-prev1" value="previous"><input type="submit" name="submit1" value="submit">
												</div>
											</div>
										</fieldset>
										<fieldset>
											<div id="sf3" class="frm">
											   
											
												
												
												<div class="tp">
													<input type="submit" class="btn-prev2" value="previous"><input type="submit" value="submit">
												</div>
											</div>
										</fieldset>
											</form>
										</div>

									</div>
								</div>
							</div>
						</div>
				<!-- //Modal1 -->
			<!--/content-inner-section-->
			
				<!--//tab-section-->	
				  <h3 class="agile_w3_title"> Top Rated <span>Movies</span></h3>
			<!--/movies-->				
			<div class="w3_agile_latest_movies">
			
				<div id="owl-demo" class="owl-carousel owl-theme">
					<div id="topratedmovies1" class="item">
						
					</div>
					<div  id="topratedmovies2" class="item">		
					</div>
					<div  id="topratedmovies3" class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="single.html" class="hvr-sweep-to-bottom"><img src="images/m7.jpg" title="Movies Pro" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Mechanic</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben one">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<div  id="topratedmovies4" class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="single.html" class="hvr-sweep-to-bottom"><img src="images/m8.jpg" title="Movies Pro" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Timeless</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben one">
								<p>NEW</p>
							</div>
						</div>
					</div>
					
					
					
					
				
					   </div>
				    </div>
				<!--//movies-->
				 <h3 class="agile_w3_title">Popular <span>Movies</span> </h3>
				<!--/requested-movies-->
				     <div class="wthree_agile-requested-movies">
										<div class="col-md-2 w3l-movie-gride-agile requested-movies" id="pop1">
															
													</div>
											<div class="col-md-2 w3l-movie-gride-agile requested-movies" id="pop2">
												
											</div>
											
											
											
											
											
											
											
											
												<div class="clearfix"></div>
						</div>
				<!--//requested-movies-->
				<!--/top-movies-->
					<h3 class="agile_w3_title">Trending<span>Movies</span> </h3>
							<div class="top_movies">
								<div class="tab_movies_agileinfo">
										<div class="w3_agile_featured_movies two">
										
										     <div class="col-md-7 wthree_agile-movies_list second-top">
														<div class="w3l-movie-gride-agile" id="trend1">
															
													</div>
														<div class="w3l-movie-gride-agile" id="trend2">
												
											</div>
												<div class="w3l-movie-gride-agile"  id="trend3">
												
											</div>
												<div class="w3l-movie-gride-agile"  id="trend4">
												
											</div>
												
												
												
												
											 </div>
											 	
											<div class="clearfix"> </div>
										  </div>
										  <div class="cleafix"></div>
									</div>	
								</div>
					
				<!--//top-movies-->
			</div>
		</div>
			<!--//content-inner-section-->
		 <div class="cleafix"></div>
	<!--/footer-bottom-->
		<div class="contact-w3ls" id="contact">
			
					<h3 class="text-center follow">Connect <span>Us</span></h3>
						<ul class="social-icons1 agileinfo">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>	
					
			 </div>
						
			</div>
			<div class="w3agile_footer_copy">
				    <p>© 2017 Movies Pro. All rights reserved </p>
			</div>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/jquery-1.11.1.min.js"></script>
	<!-- Dropdown-Menu-JavaScript -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(            
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');        
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');       
						}
					);
				});
			</script>
		<!-- //Dropdown-Menu-JavaScript -->


<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
		<!-- search-jQuery -->
				<script src="js/main.js"></script>
			<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
			<script>
				$("document").ready(function() {
					$("#video1").simplePlayer();
				});
			</script>
			<script>
				$("document").ready(function() {
					$("#video2").simplePlayer();
				});
			</script>
				<script>
				$("document").ready(function() {
					$("#video3").simplePlayer();
				});
			</script>

			<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->

			<div id="small-dialog1" class="mfp-hide">
			<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<div id="small-dialog2" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		 autoPlay: 3000, //Set AutoPlay to 3 seconds
		  autoPlay : true,
		   navigation :true,

		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>



<script type="text/javascript">
jQuery().ready(function() {
 
  var v = jQuery("#login-form").validate({
      rules: {
        name: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        pass1: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        pass2: {
          required: true,
          minlength: 6,
          equalTo: "#pass1",
        }
 
      },


    
      errorElement: "span",
      errorClass: "help-inline",
    });
 
});
</script>


<!--/script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<script type="text/javascript">
			jQuery(document).ready(function($) {

			 // Binding next button on first step
  $("#sf2").hide();
  $("#sf3").hide();
 
  $("#btn").click(function() {

      
        $(".frm").hide("fast");
        $("#sf2").show("slow");
     
   })

  $(".btn-next").click(function() {

      
        $(".frm").hide("fast");
        $("#sf3").show("slow");
     
   })
    $(".btn-prev1").click(function() {

      
        $(".frm").hide("fast");
        $("#sf1").show("slow");
     
   })
    $(".btn-prev2").click(function() {

      
        $(".frm").hide("fast");
        $("#sf2").show("slow");
     
   })


			});
</script>

<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
 <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
<!--end-smooth-scrolling-->
	<script src="js/bootstrap.js"></script>

 

</body>
</html>