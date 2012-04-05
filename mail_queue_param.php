<?php
// mail_queue db options
$container_options = array (
            'type' => 'mdb2',
            'dsn'  => 'mysql://root:@localhost/meetpoint',
            'mail_table' => 'mail_queue'
            );

// mail_queue sending options
$mail_options = array(
    'driver'   => 'smtp',
    'host'     => 'smtp.gmail.com',
    'port'     => 25,
    'auth'     => true,
    'username' => 'stvn.bu@gmail.com',
    'password' => 'password049540??',
);

?>
