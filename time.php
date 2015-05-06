<?php

session_start();

if (empty($_SESSION['visit'])) {

	$_SESSION['visit'] = 1;
	$_SESSION['visittime'] = date('Y-m-d H:i:s');
	$unixtime = $_SESSION['visittime'] ;
	$_SESSION['visittime'] = date('Y-m-d H:i:s',strtotime('+0 hour ',strtotime($unixtime)));
	$time = '2010-05-24 21:00:00';
}
else {
	$_SESSION['visit']++;
	$time = $_SESSION['visittime'];
	$_SESSION['visittime'] = date('Y-m-d H:i:s');
	$unixtime = $_SESSION['visittime'] ;
	$_SESSION['visittime'] = date('Y-m-d H:i:s',strtotime('+0 hour ',strtotime($unixtime)));
  
}

echo $time;

?>