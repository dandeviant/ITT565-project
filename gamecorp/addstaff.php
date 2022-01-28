<?php
	
			//Connect DB
		//Create query based on the ID passed from you table
		//query : delete where Staff_id = $id
		// on success delete : redirect the page to original page using header() method
		// sql to delete a record
	include "connect.php";

	$name = $_REQUEST['name'];
	$age = $_REQUEST['age'];
	$address = $_REQUEST['address'];
	
	$sql = "INSERT INTO staff(Staff_Name, Staff_Age, Staff_Address) VALUE ('$name', '$age', '$address')";

	$result = mysqli_query($connection, $sql);
	if($result) 
	{
	    echo "Data added";
	    header('location: staff-form.php#newstaff');
	} 
	else
	{
	    echo "Error adding record". mysqli_error($connection);
	}
?>