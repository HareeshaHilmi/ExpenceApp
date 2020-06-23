<?php
	function Createdb(){
		$servername = "localhost";
		$username = "root";
		$password ="";
		$dbname = "expcalc";


       /// create connection
		$con = mysqli_connect($servername,$username,$password);

		

       // check connection
       
		if (!$con) {
			die("connection Failed: ".mysqli_connect_error());
		}

		// create Databse
		$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

		if (mysqli_query($con,$sql)) {
			$con = mysqli_connect($servername,$username,$password,$dbname);

			$sql = "
					CREATE TABLE IF NOT EXISTS expencet(
						id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
						expense VARCHAR(20) NOT NULL,
						amount FLOAT
					);
			";

			if(mysqli_query($con, $sql)){
				
				return $con;
			}else{
				echo "Cannot Created table..";
			}


		}else{
			 "Error while creating database".mysqli_error($con);
		}
	}
?>