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
		else
			echo "Successfully Updated User";

		mysqli_close($db_conn);
	}
	if ($_POST['add'] == 'ADD')
	{
		$s_item = $_POST['item'];
		$s_img = $_POST['img'];
		$s_cat = $_POST['category'];
		$s_price = $_POST['price'];
		$s_stock = $_POST['stock'];
		$s_des = $_POST['description'];		


		$db_conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
		if (!$db_conn)
		{
			echo "Error Connection to database";
			return ;
		}


		$db_add = "INSERT INTO `items` (`Name`, `Img_link`, `Price`, `Stock`, `Description`) VALUES ('" . $s_item . "', '" . $s_img . "', '" . $s_price . "', '" . $s_stock . "', '" . $s_des . "')";
		if (!mysqli_query($db_conn, $db_add))
		{
			echo "Failed to add product.";
			return ;
		}

		$db_get_id = "SELECT ID FROM `items` WHERE Name='" . $s_item . "' AND Img_link='" . $s_img . "' AND Price='" . $s_price . "';";
		$db_get_cat = "SELECT ID FROM `categories` WHERE Category='" . $s_cat . "';";

		$db_item_ite_res = mysqli_fetch_assoc(mysqli_query($db_conn, $db_get_id));
		$db_item_cat_res = mysqli_fetch_assoc(mysqli_query($db_conn, $db_get_cat));

		$db_assoc_query = "INSERT INTO `assign_categories` (`ID`, `Item_ID`, `Category_ID`) VALUES (NULL, '" . $db_item_ite_res['ID'] . "', '" . $db_item_cat_res['ID'] . "');";
		if (!mysqli_query($db_conn, $db_assoc_query))
		{
			echo "Failed to Add Category";
			return ;
		}
		mysqli_free_result($db_item_ite_res);
		mysqli_free_result($db_item_cat_res);

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

			.userModif {
				width: 100%;
				max-height: 100px;
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
		
		<li>
			<h3>Modify Users</h3>
			<div class="userModif">
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
						echo "<form action='admin.php' method='POST' style='margin-bottom:10px;'>";
						echo "<label for='id'>ID:</label>";
						echo "<input type='input' readonly='true' name='id' size='6' value=\"" . $row['ID'] . "\" />";
						echo "<label for='login'>Username:</label>";
						echo "<input required='true' type='input' name='login' value=\"" . $row['Username'] . "\"/>";
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
			</div>
		</li>
	</ul>

	<hr/>
	<h1>Items</h1>

	<ul>
		<li>
			<h3>Add Item:</h3>
			<form method="POST" action="admin.php">
				<label for="item">Item Name:</label>
				<input type="input" name="item" required="true" />
				<label for="img">IMG:</label>
				<input type="input" name="img"/>
				<label for="category">Category:</label>
				<select name="category" required="true">
					<option value="Phone">Phone</option>
					<option value="Accessories">Accessories</option>
					<option value="FastFood">Fast Food</option>
					<option value="Food">Proper Food</option>
					<option value="Misc">Misc.</option>
				</select>
				<label for="price">Price: (R)</label>
				<input type="input" name="price" required="true"/>
				<label for="stock">Stock:</label>
				<input type="input" name="stock" required="true"/>
				<label for="description">Description:</label>
				<input type="input" name="description" size="50"/>
				<input type="submit" name="add" value="ADD"/>
			</form>
		</li>
		<li>
			<h3>Modify Items</h3>
			<div class="userModif">
			<?php
				$db_conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
				if (!$db_conn)
				{
					echo "Error Connection to database";
					return ;
				}

				$db_query = "SELECT * FROM `items`";
				$db_result = mysqli_query($db_conn, $db_query);
				if ($db_result)
				{
					while ($row = mysqli_fetch_assoc($db_result))
					{
						echo "<form action='admin.php' method='POST' style='margin-bottom:10px;'>";
							echo "<input size='30' name='item' value='" . $row['Name'] . "' />"
							echo "<input type='submit' name='modify' value='Modify'/>";
							echo "<input type='submit' name='remove' value='remove'/>";
						echo "</form>";
					}
				}
				else
					echo "<h1>No Users...</h1>";
				mysqli_free_result($db_result);
				mysqli_close($db_conn);
			?>
			</div>
		</li>
	</ul>
</body>
</html>