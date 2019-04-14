

<?php
   include('session.php');
   $con=mysqli_connect("localhost","root", "","movierec") or die("The connection to the database has not been made");
   if(isset($_POST['submit']))
  {
   
    $pid=$_SESSION['uid'];
    $FName=$_POST['name'];
    $ContactNo=$_POST['contact'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
            $state=$_POST['state'];
            $age=$_POST['age'];
        $country=$_POST['country'];
         $city=$_POST['city'];
          $pincode=$_POST['pincode'];
     $query=mysqli_query($con, "update user set Name='$FName',  Contact='$ContactNo',  Email='$email', Gender='$gender',State='$state',Country='$country',City='$city',Zipcode='$pincode',Age='$age' where userId='$pid'");
    if ($query) {
    $msg="Your profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
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
<title>Movies Pro | edit profile</title>
<link rel="icon" type="image" href="cinema.png">
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Movies Pro Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->



<script src="js/jquery-1.11.1.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- pop-up -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/zoomslider2.css" />
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--/web-fonts-->
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900" rel="stylesheet">


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="main.js"></script>
<style>



</style>

 <script>
            function getJJ() {
                $("#loaderIcon").show();

    axios.post('http://192.168.225.39:8085/Test.php')
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

             var movietitle = response.data[0];
               var n = movietitle.length;
              var res = movietitle.slice(0,n-6);
             var movietitle1 = response.data[1];
              var n = movietitle1.length;
              var res1 = movietitle1.slice(0,n-6);

             var movietitle2 = response.data[2];
              var n = movietitle2.length;
              var res2 = movietitle2.slice(0,n-6);
             var movietitle3 = response.data[3];
              var n = movietitle3.length;
              var res3 = movietitle3.slice(0,n-6);
             console.log(res);
             console.log(res1);
             console.log(res2);
             console.log(res3);


             axios.get('https://api.themoviedb.org/3/search/movie?api_key=6d79a1c4ae16e887d27509a77d40c324&query=' + res)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results[0];
             let mo = movies.id;
             console.log(mo);
            let output = '';
            let output1 = '';
           

                if (movies.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies.poster_path;
                }

                let date = movies.release_date;

                let year = date.slice(0, 4);
                output += `
                       <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div >
                                <div  onclick="movieSelected('${movies.id}')">
                                    <h6><a href="#">${movies.title}</a></h6>                            
                                </div>
                                
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                
                            </div>
                           
                `
            
            $('#searchmovies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });

        axios.get('https://api.themoviedb.org/3/search/movie?api_key=6d79a1c4ae16e887d27509a77d40c324&query=' + res1)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results[0];
            let output = '';
            let output1 = '';
           

                if (movies.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies.poster_path;
                }

                let date = movies.release_date;

                let year = date.slice(0, 4);
                output += `
                       <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div >
                                <div  onclick="movieSelected('${movies.id}')">
                                    <h6><a href="#">${movies.title}</a></h6>                            
                                </div>
                                
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                
                            </div>
                           
                `
            
            $('#searchmovies1').html(output);
        })
        .catch((error) => {
            console.log(error);
        });

        axios.get('https://api.themoviedb.org/3/search/movie?api_key=6d79a1c4ae16e887d27509a77d40c324&query=' + res2)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results[0];
            let output = '';
            let output1 = '';
            

                if (movies.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies.poster_path;
                }

                let date = movies.release_date;

                let year = date.slice(0, 4);
                output += `
                       <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div >
                                <div  onclick="movieSelected('${movies.id}')">
                                    <h6><a href="#">${movies.title}</a></h6>                            
                                </div>
                                
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                
                            </div>
                           
                `
            
            $('#searchmovies2').html(output);
        })
        .catch((error) => {
            console.log(error);
        });


        axios.get('https://api.themoviedb.org/3/search/movie?api_key=6d79a1c4ae16e887d27509a77d40c324&query=' + res3)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results[0];
            let output = '';
            let output1 = '';
            

                if (movies.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies.poster_path;
                }

                
                let date = movies.release_date;
                let year = date.slice(0, 4);

                output += `
                       <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div >
                                <div  onclick="movieSelected('${movies.id}')">
                                    <h6><a href="#">${movies.title}</a></h6>                            
                                </div>
                                
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                
                            </div>
                           
                `
            
            $('#searchmovies3').html(output);
             $("#loaderIcon").hide();

        })
        .catch((error) => {
            console.log(error);
        });







            
        })
        .catch((error) => {
            console.log(error);
        });




}







    </script>





<script>
function recommendme() {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("output").innerHTML = this.responseText;

                var searchText=  this.responseText;
                //var searchText= "True Lies";
                var e=searchText.split();
                console.log(e);
                
                console.log(searchText);

                 

                
               

            }
        };
        xmlhttp.open("POST", "Test.php", true);
        xmlhttp.send();
    
}




    </script>
    <script>



</script>
 
<!--//web-fonts-->
</head>
<body>
<!--/main-header-->
  <!--/banner-section-->
    <div id="demo-1" class="banner-inner">
     <div>
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
                            <ul class="nav navbar-nav ">
                            <li><a href="index.html">Home</a></li>
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
                      
                      

                            
                               
                                <li class="active"><a href="logout.php"><span class="glyphicon glyphicon-user"></span>logout</a></li>
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

               </div>
        <!--//header-w3l-->
        </div>
    </div>
  <!--/banner-section-->
 <!--//main-header-->
             <!--/banner-bottom-->
              
            <!--//banner-bottom-->
             <!-- Modal1 -->
             <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <b><a href="dashboard.php"><span class="glyphicon glyphicon-circle-arrow-left"></span></a><font color="black"> Back</font></b>

                </div>
            </div>
            <!-- /.row -->
        </div>        
         <br>       <!-- //Modal1 -->
                 <!-- Modal1 -->
       <div class="col-sm-12">               
 <div class="row row-sm mg-b-20 mg-lg-b-0">
          <div class="col-md-12 col-xl-7">
            <div class="card card-table-two">
              <h4 style="color:orange" class="card-title"> Update User Profile</h4>
              
              <p style="font-size:16px; color:red" align="center"> <?php if(isset($msg)){
    echo $msg;
  }  ?> </p>
 <form method="post" action="">
  <?php
$pid=$_SESSION['uid'];
$ret=mysqli_query($con,"select * from user where userId='$pid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <div class="wd-sm-600">
              <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Full Name <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter your Full Name"  name="name" required="true" value="<?php  echo $row['Name'];?>">
                </div></div><!-- form-group -->

<div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Contact Number <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter your Contact Number"  name="contact" maxlength="10" pattern="[0-9]+" required="true" value="<?php  echo $row['Contact'];?>">
                </div></div>
                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Email <span class="tx-danger">*</span></label>
                  <input type="email" class="form-control" placeholder="Enter your Email"  name="email"  required="true" value="<?php  echo $row['Email'];?>">
                </div></div>

                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Gender <span class="tx-danger">*</span></label>
                  <?php if($row['Gender']=="Male")
{?>
                      <input type="radio" id="gender" name="gender" value="Male" checked="true">Male

                     <input type="radio" name="gender" value="Female">Female
                   <?php }   if($row['Gender']=="Female") {?>
 <input type="radio" id="gender" name="gender" value="Male" >Male
  <input type="radio" name="gender" value="Female" checked="true">Female
                   <?php }?>
                </div></div>
              
                
                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Age<span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter Age"  name="age"  required="true" value="<?php  echo $row['Age'];?>">
                </div></div>
                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Country<span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter country"  name="country"  required="true" value="<?php  echo $row['Country'];?>">
                </div></div>
                 <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">State<span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter state"  name="state"  required="true" value="<?php  echo $row['State'];?>">
                </div></div>
                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">City<span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter city"  name="city"  required="true" value="<?php  echo $row['City'];?>">
                </div></div>
                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Pincode<span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter pincode"  name="pincode"  required="true" value="<?php  echo $row['Zipcode'];?>">
                </div></div>


                
                <?php } ?>

          
              <!-- d-flex -->
              <button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Update</button>
            </div>
          </form>

            </div><!-- card-dashboard-five -->
          </div>
    
        </div>
<div class="cleafix"></div>
</div>

<!-- //breadcrumb -->
            <!--/content-inner-section-->

              
                     
            <!--//content-inner-section-->
 
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
                        
            
            <div class="w3agile_footer_copy">
                    <p>© 2019 Movies Pro. </p>
            </div>
            <div class="cleafix"></div>
        <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

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
        <!-- search-jQuery -->
                <script src="js/main.js"></script>

<script type="text/javascript">
$(document).ready(() => {
    $('#searchForm').on('input', (e) => {

        let searchText = $('#searchText').val();

        if (searchText == null) {
            console.log(true);
        }

        getMovies(searchText);
        e.preventDefault();
    })
})




    </script>
            <!-- //search-jQuery -->
            

<!--/script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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