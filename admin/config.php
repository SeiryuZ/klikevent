<?php
// connect to db
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('meetpoint') ) {
    die ('Can\'t use meetpoint : ' . mysql_error());
}
?>