<?php
function echo($event) {
	//if (empty($event->message->text)) return;
	reply($event->message->text);
}
?>

