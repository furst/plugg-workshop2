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
		$client = new \view\ClientObserver();
		$memberFormView = new \view\MemberForm();
		$memberFormView->render();

		if ($client->wantsToSubmitMember()) {
			$newMember = new \model\Member();
			$newMember->create($client->setMemberName(), $client->setMemberSSN());
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

		Redirect::to('?member=listMembers');
	}

	public function editMember($id) {
		$client = new \view\ClientObserver();
		$member = new \model\Member();
		$member->get($id);

		$memberFormView = new \view\MemberForm();

		if ($client->wantsToSubmitMember()) {
			$member->edit($client->editMember(), $client->setMemberName(), $client->setMemberSSN());
		}

		$memberFormView->render($member->name, $member->ssn);
		\view\SingleMember::backLink($id);
	}
}