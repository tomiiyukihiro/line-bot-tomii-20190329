<?php
define('DEBUG','../debug.txt');
$input=file_get_contents('php://input');
file_put_contents(DEBUG, $input);
?>
