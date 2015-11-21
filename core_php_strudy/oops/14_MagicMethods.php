<?php

/**	__construct
	__destruct
	__call
	__get
	__set
	__isset
	__unset
	__sleep
	__wakeup
	__toString
	__set_state
	__clone
	__autoload
	are magical functions in php classes
*/



/**	__sleep is to close any db connections that the object may have commit pending data or perform similar cleanup tasks.
   the functions is useful if there are very large objects, which do not need to be saved completely
  __wakeup is to re-establish any db connections that may have been lost during serialization and perform other re-initalization tasks
 */
class Connection {
	protected $dbcon;
	private $host, $usernamee, $password;
	public function dbcon() {
		$this->connect("localhost","root","root");
	}
	private function connect($host, $username,$password) {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		
		$this->dbcon = mysql_connect($this->host, $this->username,$this->password);
		echo "The connection to MySQL established <br>";
		$this->__sleep();
	}
	
	public function __sleep() {
		mysql_close($this->dbcon);
		echo "The connection to MySQL is closed<br>";
	}
	
	public function __wakeup() {
		$this->connect("localhost", "root" , "root");
	}
}

$obj = new Connection();
$obj->dbcon();
echo "<br>The wakeup function called<br>";
$obj->__wakeup();
?>