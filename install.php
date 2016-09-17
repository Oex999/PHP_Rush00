<?php
	function install_db()
	{
		$db_server = "localhost";
		$db_username = "root";
		$db_password = "bakcWO0I2BBhTF4X";
		$db_name = "rush00";

		$db_conn = mysqli_connect($db_server, $db_username, $db_password);
		if (!$db_conn)
		{
			echo "Failed to connect toe MySQL Server";
			return false;
		}

		$db_create = "CREATE DATABASE IF NOT EXISTS " . $db_name;
		if (!mysqli_query($db_conn, $db_create))
			return true;
		mysqli_select_db($db_conn, $db_name);

		$db_create_users = "CREATE TABLE `rush00`.`users` ( `ID` INT NOT NULL AUTO_INCREMENT , `Level` VARCHAR(255) NOT NULL , `Title` VARCHAR(255) NOT NULL , `FirstName` VARCHAR(255) NULL , `LastName` VARCHAR(255) NOT NULL , `Username` VARCHAR(255) NOT NULL , `Passwd` VARCHAR(128) NOT NULL , `Email` VARCHAR(255) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
		if (!mysqli_query($db_conn, $db_create_users))
		{
			echo "Failed to create users tables";
			return false;
		}

		$db_create_admin_1 ="INSERT INTO `users` (`ID`, `Level`, `Title`, `FirstName`, `LastName`, `Username`, `Passwd`, `Email`) VALUES (NULL, 'admin', 'Mr.', 'Owen', 'Exall', 'oexall', '6737878874ca74805b0c39865dcead55e7642e05f26b88b1d414a34fb62ab4e53da579989377a3f93a30d899dd384f51fbc0fad35aee70dbc38438196c689cc7', 'owen@exall.za.net')";
		if (!mysqli_query($db_conn, $db_create_admin_1))
		{
			echo "Failed to create Admin.";
			return false;
		}

		mysqli_close($db_conn);
		return true;
	}
?>