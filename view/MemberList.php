<?php

namespace view;

class MemberList {

	private $memberList;

	public function __construct(\model\MemberList $memberList) {
		$this->memberList = $memberList;
	}

	public function render() {
		$html = '<ul>';

		foreach ($this->memberList->getMembers() as $member) {
			$html .=
			"
				<li>Namn: <a href='?viewMember=$member->id'>$member->name</a>, Personnr: $member->ssn, Antal båtar: " . count($member->boats) . "</li>
			";
		}

		$html .= '</ul>';

		echo $html;
	}
}