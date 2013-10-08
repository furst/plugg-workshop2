<?php

namespace view;

class SingleBoat {

	private $member;

	public function __construct(\model\Member $member) {
		$this->member = $member;
	}
	public function render() {
		$name = $this->member->name;
		$ssn = $this->member->ssn;
		$id = $this->member->id;

		echo
		"
			<h2>$name</h2>
			<p>$ssn</p>
			<p><a href='?deleteMember=$id'>Delete</a></p>
			<p><a href='?editMember=$id'>Edit</a></p>
		";
	}
}