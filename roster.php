<?php
require_once '../../config.php' ;
$db=new mysqli(db_host,db_uid,db_pwd,db_name);


if ($db->connect_errno)
	exit("Failed to connect to MySQL: (" . $db->connect_errno . ")".$db->connect_error);
if($_POST['cmd']=="load")
	whole_class();
	
function whole_class(){
	global $db;
	
	$table_name="ROSTER";
	$query="SELECT * FROM " . $table_name . ";";
	$res=$db->query($query);
	
	if (!$res){
		exit("My SQL reports" . $db->error);
	}
	$count_rows=$res->num_rows;
	if ($count_rows!=0){
		$rows=resultToArray($res);
		$res->free();
		echo json_encode($rows);
	
	}	
	$db->close();
}

function resultToArray($result){
	$rows=array();
	while ($row=$result->fetch_assoc()){
		$rows[]=$row;
	}
	return $rows;
}
?>

