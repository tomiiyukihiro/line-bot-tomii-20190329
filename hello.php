<?php
function hello($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/����ɂ���/', $event->message->text)) return;

	reply($event, '����ɂ���');
}

?>
