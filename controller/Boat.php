<?php

namespace controller;

require_once('model/Boat.php');
require_once('view/BoatForm.php');
require_once('view/SingleBoat.php');
require_once('controller/Redirect.php');

class Boat {

	/**
	 * @var view\ClientObserver
 	*/

	public function smallList() {
		$memberList = new \model\MemberList();
		$memberListView = new \view\MemberList($memberList);
		$memberListView->render();
	}

	public function addBoat() {
		$client = new \view\ClientObserver();
		$boatFormView = new \view\BoatForm();
		$boatFormView->render();

		if ($client->wantsToSubmitBoat()) {
			$newBoat = new \model\Boat();
			$newBoat->create($client->setBoatType(), $client->setBoatLength(), $client->viewMember());
		}
	}

	public function deleteBoat($id, $memberId) {
		$boat = new \model\Boat();
		$boat->delete($id);

		Redirect::to("?viewMember=$memberId");
	}

	public function editBoat($id) {
		$client = new \view\ClientObserver();
		$boat = new \model\Boat();
		$boat->get($id);

		$boatFormView = new \view\BoatForm();

		if ($client->wantsToSubmitBoat()) {
			$boat->edit($client->editBoat(), $client->setBoatType(), $client->setBoatLength());
		}

		$boatFormView->render($boat->type, $boat->length);
		\view\SingleMember::deleteBoat($client->editBoat(), $client->viewMember());
		\view\SingleMember::backLink($client->viewMember());
	}
}