<?php 
header ("Location: ".$_SERVER['HTTP_REFERER']);
$readNumber=$_POST["number"];
$matric = $_POST["Matric"];
$name = $_POST["StudentName"];
$lab = $_POST["lab"];
$project = $_POST["project"];
$email = $_POST["email"];
echo $readName;

require_once '../../config.php'; // your PHP script(s) can access this, but the rest cannot
$db = new mysqli(db_host, db_uid, db_pwd, db_name);
if ($db->connect_errno) // are we connected properly?
  exit("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
$query = "UPDATE ROSTER set MATNO = '$matric', NAME =  '$name', LABNO = '$lab', PRONO = '$project', EMAIL='$email' where MATNO = '$readNumber'";
 echo $query;
  $res = $db->query($query); // just like this, MySQL command line to PHP command
  if (!$res) // is there any error?
  {
        exit("MySQL reports " . $db->error);
   }
?>