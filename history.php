<?php
function history($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/変更履歴/', $event->message->text)) return;

	//$text=load('modify.txt');
	//reply($event, $text[0]);
	$text="2019/03/29作成"."\n";
	$text.="2019/03/30天気"."\n";
	$text.="2019/03/30変更履歴"."\n";
	$text.="2019/03/30あいさつ"."\n";
	$text.="2019/03/30オウム返し"."\n";
	$text.="2019/03/31価格検索"."\n";
	$text.="2019/03/31画像検索";

	reply($event, $text);
}

?>
