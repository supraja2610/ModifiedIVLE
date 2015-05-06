<?php 
header ("Location: ".$_SERVER['HTTP_REFERER']);
$matric = $_POST["Matric"];
$name = $_POST["StudentName"];
$lab = $_POST["lab"];
$project = $_POST["project"];
$email = $_POST["email"];
require_once '../../config.php'; // your PHP script(s) can access this, but the rest cannot
$db = new mysqli(db_host, db_uid, db_pwd, db_name);
if ($db->connect_errno) // are we connected properly?
  exit("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
$query = "INSERT INTO ROSTER VALUES('$matric','$name','$lab','$project','$email')";
 echo $query;
  $res = $db->query($query); // just like this, MySQL command line to PHP command
  if (!$res) // is there any error?
  {
        exit("MySQL reports " . $db->error);
   }
?>