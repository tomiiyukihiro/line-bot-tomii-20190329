<?php
function echo_bot($event) {
	if (empty($event->message->text)) return;
	reply($event->message->text);
}
?>

