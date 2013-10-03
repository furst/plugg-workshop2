<?php

namespace view;

class MainView {

	private $title;

	public function content($content) {

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
				<h1>Båtklubben glada piraten</h1>
				<hr>
				$content
				<hr>
				2013
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