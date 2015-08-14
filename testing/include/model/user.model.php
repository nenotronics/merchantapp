<?php

class User{
	
	public static function find($arr = array()){
		global $db;
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM user");
		}
		else if(isset($arr['username'])){
			$st = $db->prepare("SELECT * FROM user WHERE username=:username");
		}
		else if(isset($arr['name'])){
			$st = $db->prepare("SELECT * FROM user WHERE fname=:name OR lname:=name");
		}
		else if(isset($arr['role_id'])){
			$st = $db->prepare("SELECT * FROM user WHERE role_id=:role_id");
		}
		else if(isset($arr['keyword'])){
			$st = $db->prepare("SELECT * FROM user WHERE fname like :keyword AND lname like :keyword");
		}
		else{ throw new Exception("Unsupported property!");}
		$st->execute($arr);
		// Returns an array of User objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "User");
	}
	
	public static function new_user($arr = array()){
		global $db;
		$st = $db->prepare(
				"INSERT INTO user (username, password, fname, lname, role_id) 
				VALUES (:username, :password, :fname, :lname, :role_id)"
		);
		$st->execute($arr);
	}
	
	public static function remove_user($arr = array()){
		global $db;
		$st = $db->prepare("DELETE from user WHERE username=:username");
		$st->execute($arr);
	}
	
	public static function update_user($arr = array()){
		global $db;
		$st = $db->prepare("UPDATE user SET password=:password, fname=:fname, lname=:lname, role_id=:role_id WHERE username=:username");
		$st->execute($arr);
	}
}
?>
