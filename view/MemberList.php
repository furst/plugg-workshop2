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
				<li><span class='li_label'>Namn:</span><a href='?viewMember=$member->id'>$member->name</a> <span class='li_label'>Personnr:</span>$member->ssn <span class='li_label'>Antal båtar:</span>" . count($member->boats) . "</li>
			";
		}

		$html .= '</ul>';

		echo $html;
	}
}