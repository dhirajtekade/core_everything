<?php


function__construct() {
	$this->host = 'localhost';
	$this->user = 'root';
	$this->pw = 'root';
	$this->db = 'bookdb';
	$this->auto_slashes = true;
}
class DbClass {
	const MYSQL_TYPES_NUMERIC = 'int real';
	const MYSQL_TYPES_DATE = 'datetime timestamp year date time';
	const MYSQL_TYPES_STRING = 'string blob';
	
	public $last_error;
	public $last_query;
	public $row_count;
	
	public $host;
	public $user;
	public $db;
	public $db;
	
	public $db_link; //current/last database link identifier
	public $auto_slashes; //the class will add slashes when it can
} 


 ?>