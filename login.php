<?php
require_once '../../config.php' ;
$db=new mysqli(db_host,db_uid,db_pwd,db_name);

if ($db->connect_errno)
	exit("Failed to connect to MySQL: (" . $db->connect_errno . ")".$db->connect_error);

login();
	
function login(){
	global $db;
	$user=trim($_POST['username']);
	$pass=trim($_POST['password']);
	if (!CheckDB($user,$pass)){
		
	}	
	else{
<<<<<<< HEAD
		session_start();
		$_SESSION['login'] = "true";
		header('Location: http://cp3101b.comp.nus.edu.sg/~suprajas/project/admin.html');

=======
		header('Location: http://www.cricinfo.com/');
>>>>>>> 04d3620f4561df5219bd58c21a37faf18aea2f00
	}
	
	
	
	
}

function CheckDB($user,$pass){
	global $db;
	$password=crypt($pass,'ab');
	$table_name="LOGIN";
	
	$query="SELECT * FROM ".$table_name.";";
	
	$result=$db->query($query);
	$count_rows=$result->num_rows;
	if ($count_rows!=0){
		$passID=resultToArray($result);
		$result->free();
		if ($user=='admin' && $password==$passID){
			return true;
		}
	}	
	else{
		
		return false;
	}
}

function resultToArray($result){
	$rows=array();
	while ($row=$result->fetch_assoc()){
		$passID=$row['PASSWORD'];
	}
	return $passID;
}



?>
<link href="loginpage.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<div class="container">
	<div class="wrapper">
<form class="form-signin" action='login.php' method="POST">
          
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" id="username"name="username" placeholder="User Id" required="" autofocus="" /><br>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""/>   <br><br>   
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
    
  </div>


    
</html>
