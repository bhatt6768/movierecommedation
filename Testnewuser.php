<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Credentials: true");
  // header("Access-Control-Allow-Methods: POST");
   header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
   header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
   header("Content-Type: application/json; charset=utf-8");


 
  


// $movie="Horror";
//$response = array();
//$foods = array("pizza", "french fries");
$result = shell_exec('python results_of_recommender.py');

//$result = shell_exec('python datascience1.py ' . base64_encode(json_encode($foods)));
echo $result;
//array_push($result);
 //$arr = explode(",", $result);

//$r = preg_replace('/(^[\"\'\,]|[\"\'\,]$)/', '', $result);
// $c = explode(",", $result);
// //echo $result;
// //print_r($c);

// foreach ($c as $value) {
//   //print_r($value);
//   // $string =trim($c, '"');
//    //echo $string;
  
//   $rr = substr($value,0,strlen($value)-8);
//    $stringtrim =ltrim($rr, '"');

//    echo $stringtrim;
//    echo "<br>";
   



  
// }



// for($i=0; $i<count($c);$i++){
//   print_r($c[i]);
// }
//echo substr("$r",0,strlen($r)-6);
//echo substr("$r",6);

// if (substr($result, -1, 1) == ',')
// {
//   $string = substr($result, 0, -1);
//echo preg_split("/\r\n|\n|\r/", $result);

// }
// echo $string;
 //echo preg_replace('/(^[\"\'\,]|[\"\'\,]$)/', '', $result);
 //echo preg_replace("/,$/", "", $result);
 // $string =rtrim($result, ',');
 // print($string);
// echo $arr;
//echo json_encode($a);
//echo $var;


//print "$var";
  //print "<script>console.log($var);</script>";
   //print "<script>JSON.parse($var);</script>";
    //$some = json_decode($var);
   // print_r($some); 
  //  echo $some[0]->movie_id;
 	
 

     // Dump all data of the Array
   //var_dump($some); // Access Array data
  
 //$obj = new stdClass;
          //array_push($result, $result1);
              //$obj->confirmation = $row['confirmation'];
//print_r (explode(" ",$result));
//array_push($response, $obj);
// $array = str_split($result);

// foreach ($array as $char) {
//  echo $char;
// }
//
//echo json_encode($result);
//print_r (explode(" ",$result));

//$command = escapeshellcmd('datascience1.py');
//$output = shell_exec('python UI.py');
//echo $output;
?>

