<?php
function history($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/�ύX����/', $event->message->text)) return;

	reply($event, '2019/03/29�쐬 \n2019/03/30�V�C \n');
}

?>
