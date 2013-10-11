<?php

namespace model;

require_once('model/Boat.php');
require_once('model/BoatDAL.php');

class BoatList {

	public $boatList = array();

	public function getMemberBoats($id) {
		$con = BoatDAL::connect();

		$result = BoatDAL::query($con,"SELECT * FROM boat WHERE member_id=$id");

		while($row = BoatDAL::fetch_array($result)) {
			$boat = new \model\Boat();
			$boat->set($row['type'], $row['length'], $row['id'], $row['member_id']);
			$this->boatList[] = $boat;
		}

		BoatDAL::close($con);

		return $this->boatList;
	}
}