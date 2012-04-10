<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
/*
require_once ("db_param.php");

$db_name     = "tips"  ;

$connect = @mysql_connect ( $db_location, $db_username, $db_password );

if ( !$connect )
    header ("Location: tips.php?tips=fail");
    
$select = mysql_select_db ( $db_name ) or header ("Location: index.php?subscribe=fail");;

if ( !$select )
    header ("Location: tips.php?tips=fail");

$email = mysql_real_escape_string ( $_REQUEST['name'] );
$email = mysql_real_escape_string ( $_REQUEST['email'] );
*/

    require_once ("Mail/Queue.php");
    require_once ("Mail/Queue/Container/mdb2.php");

     
   
    add_email ( $_POST['name'], $_POST['email'], $_POST['message'] );

    function add_email ($name, $email, $message )
    {
        //container and mail options
        require_once ("mail_queue_param.php");
        
        //initialize mail_queue
        $mail_queue = new Mail_Queue($container_options, $mail_options);
         
        //email parameters
        $from             = $email;
        $from_name        = $name;
        $recipient        = 'SeiryuZ@hotmail.com';
        $recipient_name   = 'Steven';
        $message          = $message;

        //constructing from and recipient params
        $from_params      = empty($from_name) ? '<'.$from.'>' : '"'.$from_name.'" <'.$from.'>';
        $recipient_params = empty($recipient_name) ? '<'.$recipient.'>' : '"'.$recipient_name.'" <'.$recipient.'>';

        //constructing email header
        $hdrs = array(
                        'From'    => $from_params,
                        'To'      => $recipient_params,
                        'Subject' => 'test message body'
                     );

        //create new Mail Mime Object
        $mime = new Mail_mime();

        //set the bodymessage
        $mime->setTXTBody($message);

        //get the body
        $body = $mime->get();

        //set headers
        $hdrs = $mime->headers($hdrs);  

        //mail queue config
        $seconds_to_send = 0;
        $delete_after_send = false;
       
        
        //put it to the queue
        $mail_queue->put($from, $recipient, $hdrs, $body, $seconds_to_send, $delete_after_send );
        
    }
   

?>
