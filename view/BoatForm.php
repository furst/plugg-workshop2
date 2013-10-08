<?php

namespace view;

class BoatForm {

	public function render($type = '', $length = '') {

		$option1 = $this->getOption('Segelbåt', $type);
		$option2 = $this->getOption('Motorseglare', $type);
		$option3 = $this->getOption('Motorbåt', $type);
		$option4 = $this->getOption('Kajak', $type);
		$option5 = $this->getOption('Övrigt', $type);

		echo
		"
			<form method='POST' action=''>
				<select name='type'>
				  	$option1
				  	$option2
				  	$option3
				  	$option4
				  	$option5
				</select>
				<input type='text' name='length' id='length' placeholder='Längd' value='$length'>
				<input type='submit' name='submitBoat' id='submitBoat'>
			</form>
		";
	}

	public function getOption($value, $type) {
		$option = "<option value='$value'>$value</option>";
		if ($type == $value) {
			$option = "<option selected value='$value'>$value</option>";
		}

		return $option;
	}











}