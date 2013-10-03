<?php

namespace view;

class Home {

	public function content() {
		return
		"
		<a href='?page=addMember'>Lägg till medlem</a><br>
		<a href='?page=listMembers'>Lista medlemmar</a>
		";
	}
}