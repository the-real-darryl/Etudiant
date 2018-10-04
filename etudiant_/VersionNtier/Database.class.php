<?php
require_once('/configEtudiants.php');
class Database extends MySQLi {
	private static $instance = null ;

	private function __construct($host, $user, $password, $database){ 
		parent::__construct($host, $user, $password, $database);
	}

	public static function getInstance(){
		if (self::$instance == null){
			self::$instance = new self(Config::DB_HOST, Config::DB_USER, Config::DB_PWD, Config::DB_NAME);
		}
		return self::$instance ;
	}
}