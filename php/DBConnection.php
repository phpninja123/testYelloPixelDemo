<?php
//getting database instance & connection
//pointing to other database
	function getDBConnection(){
		//if (!defined('constant')) define('constant', 'value');
		if(!defined("USERNAME")) define("USERNAME", 'root');
		if(!defined("PASSWORD")) define("PASSWORD", 'root');
		if(!defined("SERVER")) define("SERVER", '52.26.13.216');
		if(!defined("DB")) define("DB", 'yellow_pixel');
		$conn=mysqli_connect(SERVER,USERNAME,PASSWORD,DB) or die('Error in database connection');
		return $conn;
	}
?>