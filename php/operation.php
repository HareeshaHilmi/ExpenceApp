<?php
	require_once("db.php");
	require_once("component.php");
	

	$con = Createdb();

	// Create button click
	if (isset($_POST['create'])) {
		createData();
	}

	// update button
	if (isset($_POST['update'])) {
		updateData();
	}
		
	// delete button
	if (isset($_POST['delete'])) {
		 deleteData();
	}

	if (isset($_POST['deleteall'])) {
		 deleteAll();
	}



	function createData(){
		$expense = textboxValue("expense");
		$amount = textboxValue("amount");
		
		if ($expense && $amount) {
			$sql = "INSERT INTO expencet(expense,amount)
					VALUES('$expense','$amount')";

		if (mysqli_query($GLOBALS['con'],$sql)) {
			TextNode("success","Record Successfully Inserted");
			
		}else{
			echo "Error";
		}

		}else{
			 TextNode("error","Provide date in the Textbox");
		}
	}

	function textboxValue($value){
		$textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
		if (empty($textbox)) {
			return false;
		}else{
			return $textbox;
		}
	}


	// messages

	function TextNode($classname,$msg){
		$element = "<h6 class ='$classname'>$msg</h6>";
		echo $element;
	}


	// get data from mysql

	function getData(){
		$sql = "SELECT * FROM expencet";

		$result = mysqli_query($GLOBALS['con'],$sql);

		if (mysqli_num_rows($result)>0) {
			return $result;
		}
	}



   /// update data
function updateData(){
	$id = textboxValue("id");
	$expense = textboxValue("expense");
	$amount = textboxValue("amount");

	if($expense && $amount){

		$sql ="UPDATE expencet SET expense='$expense' , amount='$amount' WHERE id='$id';";
			if (mysqli_query($GLOBALS['con'],$sql)) {
				TextNode("success", "Data Successfully Updated");
			}else{
				TextNode("error", "Enable to Update Data");
			}
	}
	else{
			TextNode("error", "Select the item first");

		}
}

function deleteData(){
	$id = (int)textboxValue("id");

	$sql ="DELETE FROM expencet where id=$id";

	if (mysqli_query($GLOBALS['con'],$sql)) {
		TextNode("success","Data Successfully Deleted..");
	}else{
		TextNode("error","Select Data Using Edit Icon");
	}
}


function deleteBtn(){
	$result = getData();
	$i = 0;

	if ($result) {
		while ($row = mysqli_fetch_assoc($result)){
			$i++;
			if ($i > 3) {
				buttonElement("btn-deleteall", "btn btn-danger","<i class='fas fa-trash'></i> Delete All","deleteall",    "");
					return;
			}
		}
	}
}


function deleteAll(){
	$sql = "DROP TABLE expencet";

	if (mysqli_query($GLOBALS['con'],$sql)) {
		TextNode("success","All Record deleted successfully..!");
		Createdb();
	}else{
		TextNode("error","Something went wrong record cannot deleted..!");
	}
}





?>