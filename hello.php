<?php
function hello($event) {
	debug('event', $event);
	if (empty($event->message->text)) return;

	if (!preg_match('/こんにちは/', $event->message->text)) return;

	reply($event, 'こんにちは');
}

?>
