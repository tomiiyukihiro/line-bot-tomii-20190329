<?php
function history($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/•ÏX—š—ð/', $event->message->text)) return;

	reply($event, '2019/03/29ì¬');
}

?>
