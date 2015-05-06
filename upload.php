<?php
<<<<<<< HEAD
header ("Location: ".$_SERVER['HTTP_REFERER']);

=======
>>>>>>> 04d3620f4561df5219bd58c21a37faf18aea2f00
require_once '../../config.php' ;
$db=new mysqli(db_host,db_uid,db_pwd,db_name);

if ($db->connect_errno)
	exit("Failed to connect to MySQL: (" . $db->connect_errno . ")".$db->connect_error);

upload();
function upload(){
	global $db;
	$table_name="ROSTER";
		
	if (isset($_POST['submit'])){
			
			$pathParts=pathinfo($_FILES['filename']['name']);
			if ($pathParts['extension']=='csv'){
				$query="TRUNCATE TABLE " . $table_name . ";";
				$db->query($query);
<<<<<<< HEAD
				
				$handle=fopen($_FILES['filename']['tmp_name'],"r");
				while(($data=fgetcsv($handle,1000,","))!==FALSE){
					$import="INSERT INTO ".$table_name." VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."');";
=======
				if (is_uploaded_file($_FILES['filename']['tmp_name'])){
					echo "File ".$_FILES['filename']['name']." uploaded successfully";
				}

				$handle=fopen($_FILES['filename']['tmp_name'],"r");
				while(($data=fgetcsv($handle,1000,","))!==FALSE){
					$import="INSERT INTO ".$table_name." VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."');";
>>>>>>> 04d3620f4561df5219bd58c21a37faf18aea2f00
			
					$res=$db->query($import);
					if (!$res){
						echo 'Wrong Upload.Please try again.' ;
					
					}
			
				}

			}
			else{
				echo 'Please upload a CSV file';
			}				

		
	}

}
?>
<<<<<<< HEAD

=======
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="filename" type="file" />
    <input type="submit" name="submit" value="Submit" />
</form>
>>>>>>> 04d3620f4561df5219bd58c21a37faf18aea2f00
