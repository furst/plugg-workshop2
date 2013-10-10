<?php

namespace view;

class ClientObserver {

	public function wantsToDeleteMember() {
		if (isset($_GET['deleteMember'])) {
			return true;
		} return false;
	}

	public function deleteMember() {
		return $_GET['deleteMember'];
	}

	public function wantsToDeleteBoat() {
		if (isset($_GET['deleteBoat'])) {
			return true;
		} return false;
	}

	public function deleteBoat() {
		return $_GET['deleteBoat'];
	}

	public function wantsToHandleMember() {
		if (isset($_GET['member'])) {
			return true;
		} return false;
	}

	public function handleMember() {
		return $_GET['member'];
	}
	
	public function wantsToHandleBoat() {
		if (isset($_GET['boat'])) {
			return true;
		} return false;
	}

	public function handleBoat() {
		return $_GET['boat'];
	}
	
	public function wantsToAddBoat() {
		if (isset($_GET['addBoat'])) {
			return true;
		} return false;
	}
	
	public function addBoat() {
		return $_GET['addBoat'];
	}
	
	public function wantsToEditBoat() {
		if (isset($_GET['editBoat'])) {
			return true;
		} return false;
	}
	
	public function editBoat() {
		return $_GET['editBoat'];
	}
	
	public function wantsToViewMember() {
		if (isset($_GET['viewMember'])) {
			return true;
		} return false;
	}

	public function viewMember() {
		return $_GET['viewMember'];
	}

	public function wantsToEditMember() {
		if (isset($_GET['editMember'])) {
			return true;
		} return false;
	}

	public function editMember() {
		return $_GET['editMember'];
	}

	public function wantsToSubmitMember(){
		if (isset($_POST['submitMember'])) {
			return true;
		} return false;
	}
	
	public function setMemberName() {
		return $_POST['name'];
	}

	public function setMemberSSN() {
		return $_POST['ssn'];
	}
	
	public function wantsToSubmitBoat() {
		if (isset($_POST['submitBoat'])) {
			return true;
		} return false;
	}

	public function setBoatType() {
		return $_POST['type'];
	}

	public function setBoatLength() {
		return $_POST['length'];
	}

}