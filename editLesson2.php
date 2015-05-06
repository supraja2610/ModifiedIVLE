<?php 
header ("Location: ".$_SERVER['HTTP_REFERER']);
$labt = $_POST["labt"];
$lecturet = $_POST["lecturet"];
$labd = $_POST["labd"];
$lectured = $_POST["lectured"];
$week = $_POST["week"];
require_once '../../config.php'; // your PHP script(s) can access this, but the rest cannot
$db = new mysqli(db_host, db_uid, db_pwd, db_name);
if ($db->connect_errno) // are we connected properly?
  exit("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
$query = "UPDATE lessonPlan set labTitle = '$labt', labDetails =  '$labd', lectureTitle = '$lecturet', lectureDetails = '$lectured' where weekId = ". $week;
// echo $query;
  $res = $db->query($query); // just like this, MySQL command line to PHP command
  if (!$res) // is there any error?
  {
        exit("MySQL reports " . $db->error);
   }
?>