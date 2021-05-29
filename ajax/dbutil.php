<?php
class DbUtil{
      public static $loginUser = "user"; 
      public static $loginPass = "pass";
      public static $host = "host"; // DB Host
      public static $schema = "schema"; // DB Schema
      
      public static function loginConnection(){
      	     $db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);
	     
		if($db->connect_errno){
				echo("Could not connect to db");
					    	$db->close();
								exit();
									}
										
											return $db;
											}
											
}
?>
