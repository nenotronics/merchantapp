<?php

class Mechant{
	
	public static function find($arr = array()){
		global $db;
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM merchant");
		}
		else if(isset($arr['id'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE id=:id");
		}
		else if(isset($arr['status'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE status=:status");
		}
		else if(isset($arr['institution_id'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE institution_id=:institution_id");
		}
		else if(isset($arr['merchant_type_id'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE merchant_type_id=:merchant_type_id");
		}
		else if(isset($arr['state_code'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE state_code=:state_code");
		}
		else if(isset($arr['country_code'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE country_code=:country_code");
		}
		else if(isset($arr['keyword'])){
			$st = $db->prepare("SELECT * FROM merchant WHERE name like :keyword");
		}
		else{ throw new Exception("Unsupported property!");}
		$st->execute($arr);
		// Returns an array of User objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "User");
	}
	
	public static function new_merchant($arr = array()){
		global $db;
		$st = $db->prepare(
				"INSERT INTO merchant (name,status, addtional_reg, vat_reg_no, institution_id, merchant_type_id, 
				                       head_card_acceptor, key_name, any_terminals, physical_address, state_code,
				                       country_code, postal_address, telephone, cellphone, fax, email, website, 
				                       contact_person, bank_account_holder_name, bank_name, bank_branch_name, 
				                       bank_branch_code, bank_account_number, bank_account_type, bank_card_pan, 
				                       bank_card_expiry_date, bank_card_cvv2, tresury_reference, opened_date, 
				                       closed_date, closed_reason, narrative_msg_type) 
				VALUES ()"
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
