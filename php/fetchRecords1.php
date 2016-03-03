<?php
@session_start();
@require_once("DBConnection.php");
function WriteRecords($sql){
	$result=prepareDB($sql);
	if($result){
		return 1;
	}
	else{
		return 0;
	}
}
function updateRecords($sql){
	$result=prepareDB($sql);
	if($result){
		return "true";
	}
	else{
		return "false";
	}
}

function deleteRecords($sql){
	$result=prepareDB($sql);
	if($result){
		return "true";
	}
	else{
		return "false";
	}	
}

//reading all database records
function readRecords($sql){
	$result=prepareDB($sql);
	$returnResult=array();
	while($temp=mysqli_fetch_assoc($result)){
		$returnResult[]=$temp;
	}
	return $returnResult;
}
function getCatId($sql){
	$result=prepareDB($sql);
	if($row = mysqli_fetch_array($result)){
		return $row['ID'];
	}
	else{
		return 0;
	}
}
function getDD(){
	$sql="select NAME from category where DELETED= 0";
	$result=prepareDB($sql);
	while ($row = mysqli_fetch_array($result)){
		echo "<option>" . $row['NAME'] . "</option>";
	}
}
function prepareDB($sql){
	$conn=getDBConnection();
	$result=mysqli_query($conn,$sql) or die("error in fetching records");
	$conn=null;
	return $result;
}

?>