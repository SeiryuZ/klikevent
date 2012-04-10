<?php

require_once ("db_param.php");
require_once ('MDB2.php');


//load database for hot item
$db = MDB2::connect($dsn);

    //check for DB error
if ( PEAR::isError( $db ) )
{
	header ('Location: subscribe.php?res=er');
    die ( $db->getMessage() . ', ' . $db->getDebugInfo());
}

   
   //create query
$email = $_POST['email'];
if(  !filter_var($email, FILTER_VALIDATE_EMAIL)) {

	   header ('Location: subscribe.php?res=be');
       echo "bad-email";
}
else
{

	$email = mysql_real_escape_string ( $email );
	$sql = "INSERT INTO uEmail (id, email) VALUES ( null, '$email')";

	$res = $db->exec ( $sql );

    if ( PEAR::isError ( $res ) )
    {
    	die ( $res->getMessage() );
    	header ('Location: subscribe.php?res=er');
        echo "fail";
    }else
    {
    	
    	header ('Location: subscribe.php?res=ok');
    	echo "success";
    }

}



?>
