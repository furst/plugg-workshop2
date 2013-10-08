<?php

namespace controller;

require_once('model/Member.php');
require_once('model/MemberList.php');
require_once('view/MemberForm.php');
require_once('view/MemberList.php');
require_once('view/MemberFullList.php');
require_once('view/SingleMember.php');
require_once('controller/Redirect.php');

class Member {

	public function smallList() {
		$memberList = new \model\MemberList();
		$memberListView = new \view\MemberList($memberList);
		$memberListView->render();
	}

	public function bigList() {
		$memberList = new \model\MemberList();
		$memberFullListView = new \view\MemberFullList($memberList);
		$memberFullListView->render();
	}

	public function addMember() {
		$memberFormView = new \view\MemberForm();
		$memberFormView->render();

		if (isset($_POST['submitMember'])) {
			$newMember = new \model\Member();
			$newMember->create($_POST['name'], $_POST['ssn']);
		}
	}

	public function singleMember($id) {
		$member = new \model\Member();
		$member->get($id);

		$singleMemberView = new \view\SingleMember($member);
		$singleMemberView->render();
	}

	public function deleteMember($id) {
		$member = new \model\Member();
		$member->delete($id);

		Redirect::to('?page=listMembers');
	}

	public function editMember($id) {
		$member = new \model\Member();
		$member->get($id);

		$memberFormView = new \view\MemberForm();

		if (isset($_POST['submitMember'])) {
			$member->edit($_GET['editMember'], $_POST['name'], $_POST['ssn']);
		}

		$memberFormView->render($member->name, $member->ssn);
		\view\SingleMember::backLink($id);
	}








}