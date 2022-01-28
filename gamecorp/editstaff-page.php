<!DOCTYPE html>
<html>
	<head>
	<title>System Administrator</title>
	<link rel="stylesheet" href="form.css">
	</head>

	<body>
	<ul>
		<li><a class="active" href="staff-form.php#edit">Return to Staff Page</a></li>
		
	</ul>

		<div class="content">
			<br><br>
			<?php

			  	include "connect.php";

			  	$id = $_GET['id'];
				$query = "SELECT * FROM staff WHERE Staff_ID = $id"; //You don't need a ; like you do in SQL
				$result = mysqli_query($connection, $query);

				/* list out all contents of table 'staffs' */

				$data = mysqli_fetch_array($result)   //Creates a loop to loop through results


			?>

			<form action='editstaff.php?id=<?php echo $data['Staff_ID'] ?>' method='POST'>
						<label for="fullname">Staff ID: <?php echo $data['Staff_ID'] ?></label><Br>
						<label for="fullname">Current Name: <?php echo $data['Staff_Name'] ?></label><Br>
						<input type="text" id="name" name="name" value="<?php echo $data['Staff_Name'] ?>">
						<Br>
						<!-- 		-->
					    <label for="age">Current Age: <?php echo $data['Staff_Age'] ?></label><Br>
						    <select id="age" name="age">
						    	<option value="">Select age</option>
								<script type="text/javascript">
									for(let i=18; i<50;i++){
										document.write("<option value"+i+">"+i+"</option>");
									}
								</script>
							</select>
						<Br>
						<!-- 		-->
						<br>
						<label for="address">Current Home Address:<br><?php echo $data['Staff_Address'] ?></label><Br>
						<input type="text" id="address" name="address" value="<?php echo $data['Staff_Address'] ?>">
						<Br>

						<!-- 			-->
						 <a href="http://programminghead.com">
      						<input type="submit"/>
    					</a>
						<input type="submit" value="Clear" onclick="clear()" style="
						background-color: grey;">
			</form>
		</div>
	</body>

</html>


