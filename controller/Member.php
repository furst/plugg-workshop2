<?php

namespace controller;

require_once('model/Member.php');
require_once('model/MemberList.php');

class Member {

	public function __construct() {
		if (isset($_POST['submitMember'])) {
			$newMember = new \model\Member($_POST['name'], $_POST['ssn'], uniqid());
			$newMember->save();
			$newMember->delete(1);
			$newMember->edit('2', 'tjenahoppsan2', '1234567');
		}
	}

	public function renderList() {
		$memberList = new \model\MemberList();

		$html = '<ul>';

		foreach ($memberList->getMembers() as $member) {
			$html .=
			"
				<li>$member->name</li>
			";
		}

		$html .= '</ul>';

		return $html;
	}

	public function render() {

		return
		"
			<form method='POST' action=''>
				<input type='text' name='name' id='name' placeholder='Namn'>
				<input type='text' name='ssn' id='ssn' placeholder='Personnummer'>
				<input type='submit' name='submitMember' id='submitMember'>
			</form>
		";
	}
}