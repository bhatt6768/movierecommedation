
 <?php
//$title="Speed (1994)"

 if(isset($_POST['submit'])){
$t=$_POST['title'];
//$foods = array("pizza", "french fries");
//echo $title;
$result = shell_exec('python datascience1.py Speed' );
//$result = shell_exec('python datascience1.py ' . base64_encode(json_encode($foods)));

echo $result;
}
//$command = escapeshellcmd('datascience1.py');
//$output = shell_exec('python UI.py');
//echo $output;
?>