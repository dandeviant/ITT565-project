<!DOCTYPE html>
<html>
	<head>
	<title>System Administrator</title>
	<link rel="stylesheet" href="form.css">
	</head>

	<body>
	<ul>
		<li><a class="active" href="index.html">Home</a></li>
		<li><a href="#list">Registered Staffs</a></li>
		<li><a class="separate"></a></li>
		<li><a href="#newstaff">New Staffs</a></li>
		<li><a href="#edit">Edit/Remove Staffs Data</a></li>
		
	</ul>

		<div class="content">		
			<div class="separate" >
			</div>
				
				<div id="list" style="margin-left:0px;padding:1px 16px; min-height: 1000px">
				  	<h2>Registered Staff List</h2>
				  	<table width="100%" border="1" cellpadding="10"><!-- table for database-->
				  	<tr bgcolor="grey" style="color: black;">
				  		<td><b>Staff ID</b></td>
				  		<td><b>Full Name</b></td>
				  		<td><b>Age</b></td>
				  		<td><b>Home Address</b></td>
				  	</tr>

				  	<!-- connect to database in phpmyadmin -->

				  	<?php

					  	include "connect.php";
						$query = "SELECT * FROM staff"; //You don't need a ; like you do in SQL
						$result = mysqli_query($connection, $query);

						/* list out all contents of table 'staffs' */

						while($data = mysqli_fetch_array($result)){   //Creates a loop to loop through results


					?>
						<tr>
						    <td><?php echo $data['Staff_ID']; ?></td>
						    <td><?php echo $data['Staff_Name']; ?></td>
						    <td><?php echo $data['Staff_Age']; ?></td>
						    <td><?php echo $data['Staff_Address']; ?></td>
						</tr>
					<?php
						}
					?>

						</table>

					<?php


						mysqli_close($connection); 	//Make sure to close out the database connection

				  	?>
			</div>

			<div id="newstaff" style="margin-left:0px;padding:1px 16px; min-height:1000px;">
				  	<h2>Staff Registration Form</h2>

					<form action="addstaff.php" method="POST">
						<label for="fullname">Full Name (as in ID card)</label><Br>
						<input type="text" id="name" name="name" placeholder="Your name..">
						<Br>
						<!-- 		-->
					    <label for="age">Age</label><Br>
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

						<label for="address">Current Home Address</label><Br>
						<input type="text" id="address" name="address" placeholder="Home address...">
						<Br>

						<!-- 			-->
						<input type="submit" value="Submit">
						<input type="submit" value="Clear" onclick="clear()" style="
						background-color: grey;
						">
					</form>
				</div>

		

			<div id="edit" style="margin-left:0px;padding:1px 16px; min-height: 1000px">
			 	<h3>Modify staffs' information details or<br>remove the staffs' information completely</h3>
			  	
			  	<table width="70%" border="1" cellpadding="10">
			  	<tr bgcolor="grey" style="color: black;">
			  		<td><b>Staff ID</b></td>
			  		<td><b>Full Name</b></td>
			  		<td bgcolor="#AC1B03" colspan="2"></td>
			  	</tr>

				  	<!-- connect to database in phpmyadmin -->

				  	<?php

					  	include "connect.php";

						$query = "SELECT * FROM staff"; //You don't need a ; like you do in SQL
						$result = mysqli_query($connection, $query);

						/* list out all contents of table 'staffs' */

						while($data = mysqli_fetch_array($result))
						{   //Creates a loop to loop through results
							echo "<tr>";
							    echo "<td>".$data['Staff_ID']."</td>";
							    echo "<td>".$data['Staff_Name']."</td>";
					?>
								<form action='' method='post'>
									<?php echo "<td align='center'><a href='editstaff-page.php?id=".$data['Staff_ID']."'>Edit</a>";?>
									<?php echo "<td align='center'><a href=delete.php?id=".$data['Staff_ID'].">Delete</a>";?>
								</form>

							</td>
							</tr>
					<?php
						}
						mysqli_close($connection); 	//Make sure to close out the database connection	
					?>				
					</table>
					<br><br><br><br>
					<br><br><br><br>
					<br><br><br><br>
					<br><br><br><br>
					<br><br><br><br>
					<br><br><br><br>

			</div>

		</div>
	</body>

</html>


