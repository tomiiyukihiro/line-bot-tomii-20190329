<?php
function hello($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/‚±‚ñ‚É‚¿‚Í/', $event->message->text)) return;

	reply($event, '‚±‚ñ‚É‚¿‚Í');
}

?>
