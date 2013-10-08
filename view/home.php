<?php

namespace view;

class Home {

	public function render() {
		echo
		"
		<a href='?page=addMember'>Lägg till medlem</a><br>
		<a href='?page=listMembers'>Lista medlemmar</a>
		";
	}
}