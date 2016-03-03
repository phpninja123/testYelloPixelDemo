<?php
@session_start();
@require_once("DBConnection.php");
function WriteRecords($sql){
	$result=prepareDB($sql);
	if($result){
		$_SESSION['success_message'] = 'Your record is created successfully !!!';
		return 1;
	}
	else{
		$_SESSION['error_message'] = 'Sorry, we cannot create this record right now, pls try later.';
		return 0;	
	}
}
function updateRecords($sql){
	$result=prepareDB($sql);
	if($result){
		$_SESSION['success_message'] = 'Your record is updated successfully !!!';
		return "true";
	}
	else{
		$_SESSION['error_message'] = 'Sorry, we cannot update this record right now, pls try later.';
		return "false";
	}
}

function deleteRecords($sql){
	$result=prepareDB($sql);
	if($result){
		return "true";
		$_SESSION['success_message'] = 'Your record is deleted successfully !!!';
	}
	else{
		$_SESSION['error_message'] = 'Sorry, we cannot delete this record right now, pls try later.';
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
		echo "<option value = '$row[NAME]'>" . $row['NAME'] . "</option>";
	}
}
function prepareDB($sql){
	//echo $sql;
	$conn=getDBConnection();
	$result=mysqli_query($conn,$sql) or die("error in fetching records");
	$conn=null;
	return $result;
}

?>