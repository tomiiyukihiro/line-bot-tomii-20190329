<?php
define('DEBUG','debug.txt');
$input=file_get_contents('php://input');
file_put_contents(DEBUG, 'DEBUG \n');
file_put_contents(DEBUG, $input);

function city_id($text) {
	$city=[
		'北海道'=>'016010',
		'青森'=>'020010',
		'岩手'=>'030010',
		'宮城'=>'040010',
		'秋田'=>'050010',
		'山形'=>'060010',
		'福島'=>'070010',
		'茨城'=>'080010',
		'栃木'=>'090010',
		'群馬'=>'100010',
		'埼玉'=>'110010',
		'千葉'=>'120010',
		'東京'=>'130010',
		'神奈川'=>'140010',
		'新潟'=>'150010',
		'富山'=>'160010',
		'石川'=>'170010',
		'福井'=>'180010',
		'山梨'=>'190010',
		'長野'=>'200010',
		'岐阜'=>'210010',
		'静岡'=>'220010',
		'愛知'=>'230010',
		'三重'=>'240010',
		'滋賀'=>'250010',
		'京都'=>'260010',
		'大阪'=>'270000',
		'兵庫'=>'280010',
		'奈良'=>'290010',
		'和歌山'=>'300010',
		'鳥取'=>'310010',
		'島根'=>'320010',
		'岡山'=>'330010',
		'広島'=>'340010',
		'山口'=>'350010',
		'徳島'=>'360010',
		'香川'=>'370000',
		'愛媛'=>'380010',
		'高知'=>'390010',
		'福岡'=>'400010',
		'佐賀'=>'410010',
		'長崎'=>'420010',
		'熊本'=>'430010',
		'大分'=>'440010',
		'宮崎'=>'450010',
		'鹿児島'=>'460010',
		'沖縄'=>'470010',
	];
	foreach ($city as $name=>$id) {
		if (preg_match('/'.$name.'/', $text)) return $id;
file_put_contents(DEBUG, $name);
	}
}

function bot($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/天気/', $event->message->text)) {
file_put_contents(DEBUG, '!preg_match');
		return;
	}

	$id=city_id($event->message->text);
	if (empty($id)) return;

	$weather=load('http://weather.livedoor.com/forecast/webservice/json/v1?city='.$id);
file_put_contents(DEBUG, $weather);
	$text=$weather->location->city."の天気は\n";
file_put_contents(DEBUG, $text);
	foreach ($weather->forecasts as $forecast) {
		$text.=$forecast->dateLabel.' '.$forecast->telop."\n";
	}
	$text.='です。';
file_put_contents(DEBUG, $text);
	reply($event, $text);
}

?>
