<?php
	
			//Connect DB
		//Create query based on the ID passed from you table
		//query : delete where Staff_id = $id
		// on success delete : redirect the page to original page using header() method
		// sql to delete a record
	include "connect.php";
	
	if(isset($_GET['id'])){
		$staff_id = $_GET['id'];
		$sql = "DELETE FROM Staff WHERE Staff_ID = $staff_id"; 
		$result = mysqli_query($connection, $sql);
		if($result) 
		{
		    echo "Data deleted";
		    header('location: staff-form.php#edit');
		} 
		else
		{
		    echo "Error deleting record";
		}
	}
?>