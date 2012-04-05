<?php

require_once ("db_param.php");

$db_name     = "meetpoint"  ;

$connect = @mysql_connect ( $db_location, $db_username, $db_password );

if ( !$connect )
    header ("Location: index.php?subscribe=fail");
    
$select = mysql_select_db ( $db_name ) or header ("Location: index.php?subscribe=fail");;

if ( !$select )
    header ("Location: index.php?subscribe=fail");

$email = mysql_real_escape_string ( $_REQUEST['email'] );

if(  !filter_var($email, FILTER_VALIDATE_EMAIL)) {

       header ("Location: index.php?subscribe=badEmail");
    }
    else
    {

$result = mysql_query ("INSERT INTO uEmail (id, email) VALUES ( null, '$email')" );

if ( !$result )
    header ("Location: index.php?subscribe=fail");
else
    header ("Location: index.php?subscribe=success");
}

?>
