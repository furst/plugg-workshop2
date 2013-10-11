<?php

namespace model;

class Boat {

	public $type;
	public $length;
	public $id;
	public $memberId;

	public function set($type, $length, $id, $memberId) {
		$this->type = $type;
		$this->length = $length;
		$this->id = $id;
		$this->memberId = $memberId;
	}

	public function get($id) {
		$con = BoatDAL::connect();

		$result = BoatDAL::query($con,"SELECT * FROM boat WHERE id='$id'");

		while($row = BoatDAL::fetch_array($result)) {
			$this->type = $row['type'];
			$this->length = $row['length'];
			$this->id = $row['id'];
			$this->memberId = $row['member_id'];
		}
		
		BoatDAL::close($con);
	}

	public function create($type, $length, $memberId) {
		$con = BoatDAL::connect();
	
		BoatDAL::query($con,"INSERT INTO boat (type, length, member_id) VALUES ('$type', '$length', '$memberId')");

		BoatDAL::close($con);
	}

	public function delete($id) {
		$con = BoatDAL::connect();

		BoatDAL::query($con, "DELETE FROM boat WHERE id='$id'");

		BoatDAL::close($con);
	}

	public function edit($id, $type, $length) {
		$con = BoatDAL::connect();

		BoatDAL::query($con,"UPDATE boat SET type='$type', length='$length' WHERE id='$id'");

		$this->type = $type;
		$this->length = $length;

		BoatDAL::close($con);
	}

}