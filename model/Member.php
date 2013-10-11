<?php

namespace model;

require_once('model/BoatList.php');
require_once('model/MemberDAL.php');

class Member {

	public $name;
	public $ssn;
	public $id;
	public $boats = array();

	public function set($name, $ssn, $id, $boats) {
		$this->name = $name;
		$this->ssn = $ssn;
		$this->id = $id;
		$this->boats = $boats;
	}

	public function get($id) {
		$con = MemberDAL::connect();

		$result = MemberDAL::query($con, "SELECT * FROM member WHERE id='$id'");

		while($row = MemberDAL::fetch_array($result)) {
			$this->name = $row['name'];
			$this->ssn = $row['ssn'];
			$this->id = $row['id'];

			$boatList = new \model\BoatList();
			$this->boats = $boatList->getMemberBoats($row['id']);
		}

		MemberDAL::close($con);
	}

	public function create($name, $ssn) {
		$con = MemberDAL::connect();

		MemberDAL::query($con,"INSERT INTO member (name, ssn) VALUES ('$name', '$ssn')");

		MemberDAL::close($con);
	}

	public function delete($id) {
		$con = MemberDAL::connect();

		MemberDAL::query($con, "DELETE FROM member WHERE id='$id'");

		MemberDAL::close($con);
	}

	public function edit($id, $name, $ssn) {
		$con = MemberDAL::connect();

		MemberDAL::query($con,"UPDATE member SET name='$name', ssn='$ssn' WHERE id='$id'");

		$this->name = $name;
		$this->ssn = $ssn;

		MemberDAL::close($con);
	}

}