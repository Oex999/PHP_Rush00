<?php
	session_start();

	if ($_SESSION['access_level'] != 1 || $_SESSION['logged_on'] == null)
	{
		echo "Place for Admin's only. Please leave this page!";
		return ;
	}

	$db_server = "localhost";
	$db_username = "root";
	$db_password ="bakcWO0I2BBhTF4X";
	$db_name = "rush00";


	if ($_POST['modify'] === 'Modify')
	{
		$s_id = $_POST['id'];
		$s_username = $_POST['login'];
		$s_access = $_POST['access'];

		$db_conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
		if (!$db_conn)
		{
			echo "Error Connection to database";
			return ;
		}

		$db_update = "UPDATE `users` SET Username='" . $s_username . "', Level='" . (($s_access === 'admin') ? "admin" : "member") . "' WHERE ID=" . $s_id . ";";
		
		if (!mysqli_query($db_conn, $db_update))
			echo "Failed to Update User.";

		mysqli_close($db_conn);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			* {
				color: #bdbdbd;
			}
			h1 {
				color: #bdbdbd;
			}

			#userModif {
				width: 100%;
				max-height: 250px;
				overflow-y: auto;
			}
		</style>
	</head>
<body>
	<h1>Users</h1>
	<ul>
		<li><h3>Delete User</h3>
		<form action="admin.php" method="POST">
			<label for="login">Username:</label>
			<input type="input" name="login" required="true" />
			<input type="submit" name="delete" value="Delete"/>
		</form></li>
		
		<li><h3>Modify Users</h3>
			<div id="userModif">
			<?php

				$db_conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
				if (!$db_conn)
				{
					echo "Error Connection to database";
					return ;
				}

				$db_query = "SELECT * FROM `users`";
				$db_result = mysqli_query($db_conn, $db_query);
				if ($db_result)
				{
					while ($row = mysqli_fetch_assoc($db_result))
					{
						echo "<form action='admin.php' method='POST'>";
						echo "<label for='id'>ID:</label>";
						echo "<input type='input' readonly='true' name='id' size='6' value=\"" . $row['ID'] . "\" />";
						echo "<label for='login'>Username:</label>";
						echo "<input type='input' name='login' value=\"" . $row['Username'] . "\"/>";
						echo "<label for='access'>Access:</label>";
						echo "<select name='access' value='Member'><option value='admin'>Admin</option><option value='member' " . (($row['Level'] === 'member') ? "selected='selected'" : "") . ">Member</option></select>";
						echo "<input type='submit' name='modify' value='Modify'/>";
						echo "</form>";
					}
				}
				else
					echo "<h1>No Users...</h1>";
				mysqli_free_result($db_result);
				mysqli_close($db_conn);
			?>
				<!--<form action="admin.php" method="POST">
					<input type="input" readonly="true" name="id" value="0"/>
					<label for="login">Username:</label>
					<input type="input" name="login" required="true" />
					<input type="submit" name="modify" value="Modify"/>
				</form>-->
			</div>
		</li>
	</ul>
	<hr/>

	<h1>Items</h1>
</body>
</html>