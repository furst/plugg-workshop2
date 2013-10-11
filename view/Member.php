<?php

namespace view;

class Member {

	/**
	 * @param \model\MemberList
	 * @return string HTML
	 */
	public function getFullMemberList(\model\MemberList $memberList) {
		
		$html = '<ul>';

		foreach ($memberList->getMembers() as $member) {
			$html .= "	<li>$member->name</li>
						<li>$member->ssn</li>
						<li>$member->id</li>";
		}

		$html .= '</ul>';

		return $html;
	}

	/**
	 * @param  \model\MemberList $memberList
	 * @return string HTML
	 */
	public function getCompactMemberList(\model\MemberList $memberList) {
		
		$html = '<ul>';

		foreach ($memberList->getMembers() as $member) {
			$html .= "	<li>$member->name</li>
						<li>$member->id</li>";
		}
		
		$html .= '</ul>';

		return $html;
	}

	public function addNewMember() {
		return
		"
			<form method='POST' action=''>
				<input type='text' name='name' id='name' placeholder='Namn'>
				<input type='text' name='ssn' id='ssn' placeholder='Personnummer'>
				<input type='submit' name='submitMember' id='submitMember'>
			</form>
		";
	}

}