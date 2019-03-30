<?php

define('DEBUG', 'debug.txt');
require_once('tool.php');
$input=file_get_contents('php://input');
debug('input', $input);

require_once('weather.php');
require_once('hello.php');

if (!empty($input)) {
	$events=json_decode($input)->events;
	foreach ($events as $event) {
		//if (preg_match('/“V‹C/', $event->message->text)) weather($event);
		weather($event);
		//bot($event);
		hello($event);
	}
}

?>
