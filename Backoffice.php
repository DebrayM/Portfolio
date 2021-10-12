
<?php
$db_host = "localhost";
$db_name = "backoffice";
$db_user = "root";
$db_pwd = "";

try {
    /*$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pwd);*/ 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connected successfully";*/ 
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
    
?>
