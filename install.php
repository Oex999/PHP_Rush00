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

		/*
		Creation of Users table and one admin.
		*/

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

		/*
		Creation of category table and addition of some categories
		*/

		$db_create_categories = "CREATE TABLE `rush00`.`categories` ( `ID` INT NOT NULL AUTO_INCREMENT , `Category` VARCHAR(255) NOT NULL , `Description` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
		if (!mysqli_query($db_conn, $db_create_categories))
		{
			echo "Failed to create categories tables";
			return false;
		}

		$db_create_categories_add = "INSERT INTO `categories` (`ID`, `Category`, `Description`) VALUES (NULL, 'Electronics', 'Anything and everything to do with electronics. From watches to remote control cars. If it has a electronic chip in it, then it is probably here. Things a student can not do without.'), (NULL, 'Food', 'Food, another important part of a students life. Mainly fast food, but anything goes.')";
		if (!mysqli_query($db_conn, $db_create_categories_add))
		{
			echo "Failed to add Categories";
			return false;
		}

		/*
		Creation of the Items Table.
		*/

		$db_create_items_table = "CREATE TABLE `rush00`.`items` ( `ID` INT NOT NULL AUTO_INCREMENT , `Name` VARCHAR(255) NOT NULL , `Img_link` TEXT NOT NULL , `Price` DOUBLE NOT NULL , `Stock` INT NOT NULL , `Description` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
		if (!mysqli_query($db_conn, $db_create_items_table))
		{
			echo "Failed to create Items Table";
			return false;
		}

		/*
		Creation of assign_categories.
		*/

		$db_create_assign_categories = "CREATE TABLE `rush00`.`assign_categories` ( `ID` INT NOT NULL AUTO_INCREMENT , `Item_ID` INT NOT NULL , `Category_ID` INT NOT NULL , PRIMARY KEY (`ID`), INDEX (`Item_ID`), INDEX (`Category_ID`)) ENGINE = InnoDB;";
		if (!mysqli_query($db_conn, $db_create_assign_categories))
		{
			echo "Failed to create";
			return false;
		}

		mysqli_close($db_conn);
		return true;
	}
?>