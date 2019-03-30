<?php

define('TOKEN', '2u7V1/FZXVuIE+T9DProD1ABpzdTp+tZXg9Wbm5FMWWCbrmAQVR1S/lPKCQ/mzbAYVMo/zjlHa4qKY530ifxwyrzA4ejKQTg7W7dQKjDE+BCeR/rkMKquLgnSAh2WSw7ezsrsqbHEiCjBY8gUmjw7gdB04t89/1O/w1cDnyilFU=');

if (file_exists(DEBUG)) unlink(DEBUG);
function debug($title, $text) {
	file_put_contents(DEBUG, '['.$title.']'."\n".$text."\n\n", FILE_APPEND);
}

function post($url, $object) {
	$json=json_encode($object);
	debug('output', $json);
	$curl=curl_init('https://api.line.me/v2/bot/message/'.$url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json',
		'Authorization: Bearer '.TOKEN
	]);
	$result=curl_exec($curl);
	debug('curl_exec result', $result);
	curl_close($curl);
}

function reply($event, $text) {
	$object=[
		'replyToken'=>$event->replyToken,
		'messages'=>[['type'=>'text', 'text'=>$text]]
	];
	post('reply', $object);
}

function load($file) {
	$json=file_get_contents($file);
	return json_decode($json);
}

?>
