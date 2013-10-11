<?php

namespace view;

class Home {

	public function render() {
		echo
		"
		<a href='?member=addMember'>Lägg till medlem</a>
		<a href='?member=listMembers'>Lista medlemmar - överblick</a>
		<a href='?member=listFullMembers'>Lista medlemmar - detalj</a>
		";
	}
}