<?php

namespace view;

class MemberForm {

	public function render($name = '', $ssn = '') {
		echo
		"
			<form method='POST' action=''>
				<input type='text' name='name' id='name' placeholder='Namn' value='$name'>
				<input type='text' name='ssn' id='ssn' placeholder='Personnummer' value='$ssn'>
				<input type='submit' name='submitMember' id='submitMember'>
			</form>
		";
	}
}