<?php

namespace controller;

require_once('model/Boat.php');
require_once('view/BoatForm.php');
require_once('view/SingleBoat.php');
require_once('controller/Redirect.php');

class Boat {

	public function smallList() {
		$memberList = new \model\MemberList();
		$memberListView = new \view\MemberList($memberList);
		$memberListView->render();
	}

	public function addBoat() {
		$boatFormView = new \view\BoatForm();
		$boatFormView->render();

		if (isset($_POST['submitBoat'])) {
			$newBoat = new \model\Boat();
			$newBoat->create($_POST['type'], $_POST['length'], $_GET['viewMember']);
		}
	}

	public function deleteBoat($id, $memberId) {
		$boat = new \model\Boat();
		$boat->delete($id);

		Redirect::to("?viewMember=$memberId");
	}

	public function editBoat($id) {
		$boat = new \model\Boat();
		$boat->get($id);

		$boatFormView = new \view\BoatForm();

		if (isset($_POST['submitBoat'])) {
			$boat->edit($_GET['editBoat'], $_POST['type'], $_POST['length']);
		}

		$boatFormView->render($boat->type, $boat->length);
		\view\SingleMember::deleteBoat($_GET['editBoat'], $_GET['viewMember']);
		\view\SingleMember::backLink($_GET['viewMember']);
	}
}