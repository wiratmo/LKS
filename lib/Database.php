<?php

class Database
{
	public $connection;

	function __construct($add, $usr, $pass, $db)
	{
		$this->connection = new mysqli($add, $usr, $pass, $db);
		if (mysqli_connect_errno()) {
			echo "Error";
			exit;
		}
	}

}
?>