<?php

namespace view;

class SingleMember {

	private $member;

	public function __construct(\model\Member $member) {
		$this->member = $member;
	}

	public function render() {
		$name = $this->member->name;
		$ssn = $this->member->ssn;
		$id = $this->member->id;

		$html = '';

		$html .=
		"
			<h2>$name</h2>
			<p>$ssn</p>
			<p><a href='?deleteMember=$id'>Ta bort</a></p>
			<p><a href='?editMember=$id'>Redigera</a></p>
			<p><a href='?viewMember=$id&addBoat'>Lägg till båt</a></p>
			<h3>Båtar</h3>
		";

		$html .=
		"
			<ul>
		";

		foreach ($this->member->boats as $boat) {
			$html .= "<li><a href='?viewMember=$id&editBoat=$boat->id'>$boat->type, $boat->length</a></li>";
		}

		$html .=
		"
			</ul>
		";

		echo $html;
	}

	public static function backLink($id) {
		echo "<a href='?viewMember=$id'>Tillbaka</a>";
	}

	public static function deleteBoat($id, $memberId) {
		echo "<a href='?viewMember=$memberId&deleteBoat=$id'>Ta bort</a>";
	}





}