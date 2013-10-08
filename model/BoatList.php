<?php

namespace model;

require_once('model/Boat.php');

class BoatList {

	public $boatList = array();

	public function getMemberBoats($id) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM boat WHERE member_id=$id");

		while($row = mysqli_fetch_array($result)) {
			$boat = new \model\Boat();
			$boat->set($row['type'], $row['length'], $row['id'], $row['member_id']);
			$this->boatList[] = $boat;
		}

		mysqli_close($con);

		return $this->boatList;
	}
}