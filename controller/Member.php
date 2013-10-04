<?php

namespace controller;

require_once('model/Member.php');
require_once('model/MemberList.php');
require_once('view/Member.php');

class Member {

	public function __construct() {
		if (isset($_POST['submitMember'])) {
			$newMember = new \model\Member($_POST['name'], $_POST['ssn'], uniqid());
			$newMember->save();
			$newMember->delete(1);
			$newMember->edit('2', 'tjenahoppsan2', '1234567');
		}
	}

	public function renderFullList() {
		$memberView = new \view\Member();
		$memberList = new \model\MemberList();

		$content = $memberView->getFullMemberList($memberList);

		return $content;
	}

	public function renderCompactList() {
		$memberView = new \view\Member();
		$memberList = new \model\MemberList();

		$content = $memberView->getCompactMemberList($memberList);

		return $content;
	}

	public function renderForm() {
		$memberView = new \view\Member();
		
		$content = $memberView->addNewMember();

		return $content;
	}
}