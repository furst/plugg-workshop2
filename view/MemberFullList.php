<?php

namespace view;

class MemberFullList {

	private $memberList;

	public function __construct(\model\MemberList $memberList) {
		$this->memberList = $memberList;
	}

	public function render() {

		$html = "";

		foreach ($this->memberList->getMembers() as $member) {
			$html .= "<div class='row'>";

			$html .=
			"
				<h3><a href='?viewMember=$member->id'>$member->name</a></h3>
				<p>personnummer: $member->ssn</p>
				<p>id: $member->id</p>
				<h4>Båtar</h4>
				<p>
			";

			foreach ($member->boats as $boat) {
				$html .= "$boat->type, $boat->length<br>";
			}

			$html .= "</p>";

			$html .= '<hr></div>';
		}

		echo $html;
	}
}