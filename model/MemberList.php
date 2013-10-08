<?php

namespace model;

require_once('model/Member.php');

class MemberList {

	public $memberList = array();

	public function getMembers() {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM member");

		while($row = mysqli_fetch_array($result)) {
			$member = new \model\Member();
			$boatList = new \model\BoatList();
			$boats = $boatList->getMemberBoats($row['id']);
			$member->set($row['name'], $row['ssn'], $row['id'], $boats);
			$this->memberList[] = $member;
		}

		mysqli_close($con);

		return $this->memberList;
	}
}