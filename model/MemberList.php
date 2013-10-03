<?php

namespace model;

require_once('model/Member.php');

class MemberList {

	public $memberList = array();

	public function add(\model\Member $member) {
		$newMember = new \model\Member($member->name, $member->ssn, uniqid());
		$newMember->save();
	}

	public function getMembers() {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
		  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM member");

		while($row = mysqli_fetch_array($result)) {
			$newMember = new \model\Member($row['name'], $row['ssn'], $row['id']);
			$this->memberList[] = $newMember;
		}

		mysqli_close($con);

		return $this->memberList;
	}
}