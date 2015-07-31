<?php
class ConnectDB {
	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "";
	private static $databasename = "FindMyPet";
	
	private static $conn = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	   // One connection through whole application
       if ( null == self::$conn )
       {      
	        self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$databasename);
	        self::$conn->set_charset("utf8");
	        if (self::$conn->connect_error) {
			    die("Kết nối không thành công: " . self::$conn->connect_error);
			} 
       } 
       return self::$conn;
	}
	
	public static function disconnect()
	{
		self::$conn->close();
		self::$conn = null;
	}
}
?>