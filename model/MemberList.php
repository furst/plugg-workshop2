<?php

namespace model;

require_once('model/Member.php');

class MemberList {

	public $memberList = array();

	public function getMembers() {
		$con = MemberDAL::connect();

		$result = MemberDAL::query($con,"SELECT * FROM member");

		while($row = MemberDAL::fetch_array($result)) {
			$member = new \model\Member();
			$boatList = new \model\BoatList();
			$boats = $boatList->getMemberBoats($row['id']);
			$member->set($row['name'], $row['ssn'], $row['id'], $boats);
			$this->memberList[] = $member;
		}

		MemberDAL::close($con);

		return $this->memberList;
	}
}