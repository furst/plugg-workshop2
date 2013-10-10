<?php

namespace view;

class Home {

	public function render() {
		echo
		"
		<a href='?member=addMember'>Lägg till medlem</a><br>
		<a href='?member=listMembers'>Lista medlemmar</a><br>
		<a href='?member=listFullMembers'>Lista medlemmar - Full vy</a><br>
		";
	}
}