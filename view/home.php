<?php

namespace view;

class Home {

	public function content() {
		return
		"
		<a href='?page=addMember'>Lägg till medlem</a><br />
		<a href='?page=listMembersFull'>Lista medlemmar - full view</a><br />
		<a href='?page=listMembersCompact'>Lista medlemmar - compact view</a><br />
		";
	}
}