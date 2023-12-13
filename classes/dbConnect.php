<?php
class dbConnect {

	const user='phpmyadmin';
	const pass='LetMeP@ss12!';
	const database='dbWebsiteApps';
	const server='infolink.pagemfbank.com';

	public $mysqli ='';
	public $dbh;
// LastKingAngle_12!
	function get_data($qry){
		self::connect();
		$rs= mysqli_query($this->mysqli,$qry) or die (mysqli_error($this->mysqli));
		$s = array();
		while ($row = mysqli_fetch_assoc($rs)) {
			array_push($s,$row);
			$dat = true;
		}
		mysqli_close($this->mysqli);
		if (@$dat) {
			return $s;
		}else {
			return false;
		}
	}

	function get_data_multi($qry) {
		self::connect();
		$rs = mysqli_multi_query($this->mysqli, $qry) or die (mysql_error());
		$s = array();
		do {
	        if ($result = $this->mysqli->store_result()) {
	            while ($row = $result->fetch_assoc()) {
	               array_push($s,$row);
	            }
	            $result->free();
	        }
		}while ($this->mysqli->next_result());
		mysqli_close($this->mysqli);
		return $s;
	}

	function __construct() {
		self::connect();
	}

     function insert_data($qry){
     	self::connect();
		$rs= mysqli_query($this->mysqli,$qry) or die (mysqli_error($this->mysqli));;
		if ($rs) {
			$retval = mysqli_insert_id($this->mysqli);
			mysqli_close($this->mysqli);
			return $retval;
		}else {
			mysqli_close($this->mysqli);
			return false;
		}

	}

	function executeProc($qry) {
		self::connect();
		if (!mysqli_query($this->mysqli,$qry)){
			echo $this->mysqli->errno;
		}
		mysqli_close($this->mysqli);
	}

	function makeSQLStrings($theValue) {
		self::connect();
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($this->mysqli,$theValue) : mysqli_escape_string($this->mysqli,$theValue);
		$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		mysqli_close($this->mysqli);
		return $theValue;
	}

    function connect() {
        $this->mysqli = new mysqli(self::server, self::user, self::pass, self::database);
		if ($this->mysqli->connect_errno) {
			return false;
		}else {
			return true;
		}
    }

    function connectSecuredServer() {
        $this->mysqli = new mysqli(self::securedServer, self::securedServerUser, self::securedServerPass, self::securedServerDatabase);
		if ($this->mysqli->connect_errno) {
			echo $this->mysqli->connect_errno;
			return false;
		}else {
			return true;
		}
    }

}
?>
