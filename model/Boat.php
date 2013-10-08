<?php

namespace model;

class Boat {

	public $type;
	public $length;
	public $id;
	public $memberId;

	public function set($type, $length, $id, $memberId) {
		$this->type = $type;
		$this->length = $length;
		$this->id = $id;
		$this->memberId = $memberId;
	}

	public function get($id) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM boat WHERE id='$id'");

		while($row = mysqli_fetch_array($result)) {
			$this->type = $row['type'];
			$this->length = $row['length'];
			$this->id = $row['id'];
			$this->memberId = $row['member_id'];
		}

		mysqli_close($con);
	}

	public function create($type, $length, $memberId) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($con,"INSERT INTO boat (type, length, member_id) VALUES ('$type', '$length', '$memberId')");

		mysqli_close($con);
	}

	public function delete($id) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($con, "DELETE FROM boat WHERE id='$id'");

		mysqli_close($con);
	}

	public function edit($id, $type, $length) {
		$con = mysqli_connect("localhost","root","root","workshop2");
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($con,"UPDATE boat SET type='$type', length='$length' WHERE id='$id'");

		$this->type = $type;
		$this->length = $length;

		mysqli_close($con);
	}

}