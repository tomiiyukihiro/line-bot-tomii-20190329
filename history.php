<?php
function history($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/変更履歴/', $event->message->text)) return;

	$text=load('modify.txt');
	reply($event, $text[]);

	//reply($event, '2019/03/29作成 \n2019/03/30天気 \n');
}

?>
