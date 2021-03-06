<?php

define('DEBUG', 'debug.txt');
require_once('tool.php');
$input=file_get_contents('php://input');
debug('input', $input);

require_once('weather.php');
require_once('hello.php');
require_once('history.php');
require_once('echo_bot.php');
require_once('kakaku.php');
require_once('image_bot.php');

if (!empty($input)) {
	$events=json_decode($input)->events;
	foreach ($events as $event) {
		weather($event);
		hello($event);
		history($event);
		kakaku($event);
		image_bot($event);

		echo_bot($event);
	}
}

?>
