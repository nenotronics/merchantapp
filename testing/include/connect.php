<?php
error_reporting(E_ALL);
date_default_timezone_set('Africa/Windhoek');

 $db_username = 'mdbMerchants_app';
 $db_password = 'mdbMerchants_app';

try {
    $db = new PDO('mysql:host=localhost;dbname=mdb_sample_db', $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>
