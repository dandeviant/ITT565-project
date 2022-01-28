<?php

	include "connect.php";

	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$name = $_POST['name'];
		$age = $_POST['age'];
		$address = $_POST['address'];

		$sql = "UPDATE staff 
			SET 
			Staff_Name = '$name', 
			Staff_Age = '$age',
			Staff_Address = '$address' 
			WHERE Staff_ID = $id; ";


		$result = mysqli_query($connection, $sql);

		if($result) 
		{
		    echo "Data updated";
		    header('location: staff-form.php#edit');
		} 
		else
		{
		    echo "Error updating record". mysqli_error($connection);
		}

	}
?>	