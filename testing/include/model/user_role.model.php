<?php

class UserRole{
	
	public static function find($arr = array()){
		global $db;
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM user_role");
		}
		else if(isset($arr['id'])){
			$st = $db->prepare("SELECT * FROM user_role WHERE id=:id");
		}
		else if(isset($arr['keyword'])){
			$st = $db->prepare("SELECT * FROM user WHERE role_type like :keyword");
		}
		else{ throw new Exception("Unsupported property!");}
		$st->execute($arr);
		// Returns an array of User objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "User");
	}
	
	public static function new_role($arr = array()){
		global $db;
		$st = $db->prepare(
				"INSERT INTO user_role (role_type, description) 
				VALUES (:role_type, :description) "
		);
		$st->execute($arr);
	}
	
	public static function remove_role($arr = array()){
		global $db;
		$st = $db->prepare("DELETE from user_role WHERE id=:id");
		$st->execute($arr);
	}
	
	public static function update_role($arr = array()){
		global $db;
		$st = $db->prepare("UPDATE user_role SET role_type=:role_type, description=:description WHERE id=:id");
		$st->execute($arr);
	}
}
?>
