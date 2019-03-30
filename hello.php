<?php
function hello($event) {
	if (empty($event->message->text)) return;

	if (preg_match('/こんにちは/',     $event->message->text)) reply($event, 'こんにちは');
	if (preg_match('/こんにちわ/',     $event->message->text)) reply($event, 'こんにちは');
	if (preg_match('/おはよう/',       $event->message->text)) reply($event, 'おはようございます');
	if (preg_match('/こんばんは/',     $event->message->text)) reply($event, 'こんばんは');
	if (preg_match('/こんばんわ/',     $event->message->text)) reply($event, 'こんばんは');
	if (preg_match('/おやすみなさい/', $event->message->text)) reply($event, 'おやすみなさい');

}

?>
