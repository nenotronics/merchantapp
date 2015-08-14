<?php

class MerchantType{
	
	public static function find($arr = array()){
		global $db;
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM merchant_type");
		}
		else if(isset($arr['id'])){
			$st = $db->prepare("SELECT * FROM merchant_type WHERE id=:id");
		}
		else{ throw new Exception("Unsupported property!");}
		$st->execute($arr);
		// Returns an array of User objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "User");
	}
	
	public static function new_merchant_type($arr = array()){
		global $db;
		$st = $db->prepare(
				"INSERT INTO merchant_type (merchant_code, description) 
				VALUES (:merchant_code, :description) "
		);
		$st->execute($arr);
	}
	
	public static function remove_merchant_type($arr = array()){
		global $db;
		$st = $db->prepare("DELETE from merchant_type WHERE id=:id");
		$st->execute($arr);
	}
	
	public static function update_merchant_type($arr = array()){
		global $db;
		$st = $db->prepare("UPDATE merchant_type SET merchant_code=:merchant_code, description=:description WHERE id=:id");
		$st->execute($arr);
	}
}
?>
