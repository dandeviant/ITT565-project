<!DOCTYPE html>
<html>
	<head>
		<title>System Administrator</title>
		<style>

			a, a:visited, a:hover, a:active 
			{
				  color: inherit;
			}
			html{
				scroll-behavior: smooth;
			}

			body {
			  margin: 0;
			  background-color: black;
			  color: white;
			  font-family: Calibri;
			  font-size: 20px;
			}

			/* VERTICAL NAVIGATION BAR CSS PROPERTIES*/


			ul {
			  list-style-type: none;
			  margin: 0;
			  padding: 0;
			  width: 200px;
			  background-color: #333;
			  position: fixed;
			  height: 100%;
			  overflow: auto;
			} 

			li a {
			  display: block;
			  color: #000;
			  padding: 16px 24px;
			  text-decoration: none;
			  transition: 0.5s;
			  font-family: Consolas;
			  font-size: 24px;
			  color: white;
			}

			li a.active {
			  background-color: #0D9DC4;
			  color: white;
			  transition: 0.5s;
			}

			li a.active:hover {
			  background-color: grey;
			  color: white;
			  transition: 0.5s;
			  color: black;
			}

			li a:hover:not(.active) {
			  background-color: #AC1B03;
			  color: white;
			}

			li a.separate {
				height: 20px;
				background-color: #AC1B03 ;
			}

			/* FORM CSS PROPERTIES*/

			input[type=text], select 
			{
				width: 60%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type=submit]
			{
				width: 30%;
				background-color: #AC1B03;
				color: white;
				padding: 20px 30px;
				margin: 30px 0px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				transition: 0.5s;
				font-size: 20px;
			}

			input[type=submit]:hover
			{
				background-color: grey;
				color: white;
				transition: 0.5s;
			}

			.button
			{
				border-radius: 5px;
				background-color: #f2f2f2;
				padding: 20px;
			}

			form{
				padding:1px 16px;
			}

			.content{
				margin-left:250px;
				/*padding:1px 16px;
				 height:1000px; */
			}

			.separate{
				padding: 0px;
				background-color: red;
				display: block;
			}

		</style>
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

					  	$connection = mysqli_connect('localhost', 'root', ''); //The Blank string is the password
						mysqli_select_db($connection, 'staffs');

						if ($connection->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

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

					<form action="#" method="POST">
						<label for="fullname">Full Name (as in ID card)</label><Br>
						<input type="text" id="fname" name="firstname" placeholder="Your name..">
						<Br>
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
						<label for="address">Current Home Address</label><Br>
						<input type="text" id="address" name="address" placeholder="Home address...">
						<Br>
						<input type="submit" value="Submit">
						<input type="submit" value="Clear" onclick="clear()" style="
						background-color: grey;
						">
					</form>
				</div>

		

			<div id="edit" style="margin-left:0px;padding:1px 16px; min-height: 1000px">
			 	<h3>Modify staffs' information details or<br>remove the staffs information completely</h3>
			  	<table width="70%" border="1" cellpadding="10"><!-- table for database-->
			  	<tr bgcolor="grey" style="color: black;">
			  		<td><b>Staff ID</b></td>
			  		<td><b>Full Name</b></td>
			  		<td bgcolor="#AC1B03" colspan="2"></td>
			  	</tr>

				  	<!-- connect to database in phpmyadmin -->

				  	<?php

					  	$connection = mysqli_connect('localhost', 'root', ''); //The Blank string is the password
						mysqli_select_db($connection, 'staffs');

						if ($connection->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$query = "SELECT * FROM staff"; //You don't need a ; like you do in SQL
						$result = mysqli_query($connection, $query);

						/* list out all contents of table 'staffs' */

						while($data = mysqli_fetch_array($result)){   //Creates a loop to loop through results


					?>
						<tr>
						    <td><?php echo $data['Staff_ID']; ?></td>
						    <td><?php echo $data['Staff_Name']; ?></td>
							<td align="center">
								<button onclick="edit(<?php echo $data['Staff_ID']; ?>)">Edit</button>
							</td>
							<td align="center">
								<button onclick="remove()">Remove</button>
							</td>
						</tr>
					<?php
						}
					?>
						</table>

					<?php
						mysqli_close($connection); 	//Make sure to close out the database connection
				  	?>
			</div>

		</div>
	</body>


	<script type="text/javascript">
		function close_window()
		{
			if (confirm("Close Window?")) {
		    close();
		}

		function clear(){
			document.getElementById("myForm").reset();
		}

		function remove(){
			<?php
				header('Location:delete.php?order='.urlencode($data['id']));
			?>
		}

		function edit(){

		}
	</script>
	
}
</html>


