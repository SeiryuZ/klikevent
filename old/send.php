<?php
require_once ('mail_queue_param.php');
require_once ("Mail/Queue.php");
require_once ("Mail/Queue/Container/mdb2.php");

/* How many mails could we send each time the script is called */
$max_amount_mails = 50;

/* we use the db_options and mail_options from the config again  */
$mail_queue = new Mail_Queue($container_options, $mail_options);

/* really sending the messages */
$mail_queue->sendMailsInQueue($max_amount_mails);
?>
