<?php

namespace model;

class Member {

	public $name;
	public $ssn;
	public $id;

	public function __construct($name, $ssn, $id) {
		$this->name = $name;
		$this->ssn = $ssn;
		$this->id = $id;
	}

	public function get() {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM member WHERE id='$id'");

		while($row = mysqli_fetch_array($result)) {
			
		}

		mysqli_close($con);
	}

	public function save() {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($con,"INSERT INTO member (name, ssn) VALUES ('$this->name', '$this->ssn')");

		mysqli_close($con);
	}

	public function delete($id) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($con, "DELETE FROM member WHERE id='$id'");

		mysqli_close($con);
	}

	public function edit($id, $name, $ssn) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($con,"UPDATE member SET name='$name', ssn='$ssn' WHERE id='$id'");

		mysqli_close($con);
	}

}