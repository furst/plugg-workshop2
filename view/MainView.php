<?php

namespace view;

class MainView {

	private $title;

	public function header() {

		echo
		"
			<!DOCTYPE html>
			<html>
			<head>
				<title>$this->title</title>
				<meta charset='utf-8'>
				<link rel='stylesheet' href='style.css'>
			</head>
			<body>
				<h1>Glada piraten</h1>
				<hr>
		";

		return $this;
	}

	public function footer() {

		echo
		"
				<hr>
			</body>
			</html>
		";

		return $this;
	}

	public function title($title) {
		$this->title = $title;

		return $this;
	}

}