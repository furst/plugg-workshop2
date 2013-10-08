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
				<li><a href='?viewMember=$member->id'>$member->name</a></li>
			";
		}

		$html .= '</ul>';

		echo $html;
	}
}