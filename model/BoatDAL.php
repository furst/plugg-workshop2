<?php

namespace model;

class BoatDAL {

	public static function connect() {
		// $con = mysqli_connect("localhost","root","root","workshop2");
		$con = mysqli_connect("workshop02-162489.mysql.binero.se","162489_bm44385","ABC123abc123","162489-workshop02");

		
		//check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return $con;
	}

	public static function query($con, $sql) {
		$result = mysqli_query($con, $sql);
		return $result;
	}

	public static function close($con) {
		return mysqli_close($con);
	}

	public static function fetch_array($result) {
		return mysqli_fetch_array($result);
	}
}