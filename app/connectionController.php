<?php

	define("HOST", "localhost");
	define("USER", "root");
	define("PSWD", "1412");
	define("DBNM", "pelicom");

	function connect(){
		$conn = new mysqli(HOST,USER,PSWD,DBNM);
		if ($conn) {
			return $conn;
		}
		return null;
	}
?>