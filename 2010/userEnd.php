<?php


session_start();
$_SESSION['time'] = date('Y-m-d h:i:s');
$time = $_SESSION['time'];

if (empty($_SESSION['visitcount'])) {
  $_SESSION['visitcount'] = 1;
  $_SESSION['visittime'] = date('Y-m-d h:i:s');
  $time = '2010-05-24 21:00:00';
}
else {
  $_SESSION['visitcount']++;
  $time = $_SESSION['visittime'];
  $_SESSION['visittime'] = date('Y-m-d h:i:s');
}


require_once '../../../config.php'; // your PHP script(s) can access this, but the rest cannot
$db = new mysqli(db_host, db_uid, db_pwd, db_name);
if ($db->connect_errno) // are we connected properly?
  exit("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);

if($_POST['cmd'] == "load"){
  
  $ret1 = is_best_score();
  $ret2 = DisplayNewsContent($time);
  $retVal = array('lesson'=>$ret1, 'news'=>$ret2);
  echo json_encode($retVal);
}
        

if($_POST['cmd'] == "getweek")
        getWeek();

function is_best_score() {  
  global $db; // refer to the global variable 'db'
  $table_name = "2010_lessonPlan";
  $query = "SELECT * FROM " . $table_name . ";" ;
  $res = $db->query($query); // just like this, MySQL command line to PHP command
  if (!$res) // is there any error?
  {
        exit("MySQL reports " . $db->error);
   }
   $cnt_rows = $res->num_rows;
   if($cnt_rows != 0){
   	$rows = resultToArray($res);
	// var_dump($rows); // Array of rows
	$res->free();
   		// $row = mysqli_fetch_row($res);
   		// $results = $db->fetch_all($res,MYSQLI_ASSOC);
   		$n_col = $db->field_count;
   		return json_encode($rows);
   }
    
}

function DisplayNewsContent($timestamp) {  
  global $db; // refer to the global variable 'db'
  $table_name = "2010_news";
  $query = "SELECT * FROM " . $table_name. " WHERE newsDate > '$timestamp'";
  
  $res = $db->query($query); // just like this, MySQL command line to PHP command
  if (!$res){ // is there any error?
    exit("MySQL reports " . $db->error);
  }
  
  
  $checkempty = $res->num_rows;
  
  if($checkempty != 0){

  $rows = resultToArray($res);
  $res->free();
  return json_encode($rows);
    
  }
 

}


function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function getWeek(){
	global $db;
	$currentdate = date('Y/m/d'); 
	$query = "SELECT * FROM 2010_lessonPlan WHERE lectureDate >= '$currentdate'";
	$res = $db->query($query); // just like this, MySQL command line to PHP command
  if (!$res) // is there any error?
  {
        exit("MySQL reports " . $db->error);
   }
   $cnt_rows = $res->num_rows;
   if($cnt_rows != 0){
   	$row = mysqli_fetch_row($res);
   	echo $row[1];
   }
}
?>