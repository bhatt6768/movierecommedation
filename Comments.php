<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

<?php
$vid = $_COOKIE["vid"];
$vid = $_COOKIE["vid"];
$ar1 = '> C:\xampp\htdocs\moviepro\comments.txt';
$ar2 = '> C:\xampp\htdocs\moviepro\TextToString.txt';
$result1 = shell_exec('python CommentTrialFivewithoutUsername.py --videoid=' .$vid .$ar1);
$result2 = shell_exec('python TextToString.py' .$ar2);
$result = shell_exec('python SentimentAnalysisTrialOne.py');
echo $result;
													
?>