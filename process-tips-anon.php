<?php
require ('smarty_setup.php');
require_once ('MDB2.php');
require_once ('db_param.php');



//load database for hot item
$db = MDB2::connect($dsn);

//check for DB error
if ( PEAR::isError( $db ) )
{
	die ( $db->getMessage() . ', ' . $db->getDebugInfo());
}

$name = 

$sql = "INSERT INTO tips_event_anon (tipsCPName, tipsCPEmail, tipsContent) VALUES ";
$sql .= "( ?,?, ?  )";
$name ="";
$email ="";
$content ="";

$name = $_POST['nama'];
$email=  $_POST['email'];
$content =  $_POST['content'];

$message = array( $name, $email, $content);


$query = $db->prepare( $sql, MDB2_PREPARE_MANIP );
$result = $query->execute($message);


if (PEAR::isError($result)) {
die ( $result->getMessage() );
}

//disconnect database
$db->disconnect();

//init smarty
$smarty = new MySmarty();
$smarty->display ('thanks.tpl');


?>