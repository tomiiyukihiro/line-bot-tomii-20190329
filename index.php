<?php
define('DEBUG','debug.txt');
$input=file_get_contents('php://input');
file_put_contents(DEBUG, $input);
		'���'=>'080010',
		'�Ȗ�'=>'090010',
		'�Q�n'=>'100010',
		'���'=>'110010',
		'��t'=>'120010',
		'����'=>'130010',
		'�_�ސ�'=>'140010',
		'�V��'=>'150010',
		'�x�R'=>'160010',
		'�ΐ�'=>'170010',
		'����'=>'180010',
		'�R��'=>'190010',
		'����'=>'200010',
		'��'=>'210010',
		'�É�'=>'220010',
		'���m'=>'230010',
		'�O�d'=>'240010',
		'����'=>'250010',
		'���s'=>'260010',
		'���'=>'270000',
		'����'=>'280010',
		'�ޗ�'=>'290010',
		'�a�̎R'=>'300010',
		'����'=>'310010',
		'����'=>'320010',
		'���R'=>'330010',
		'�L��'=>'340010',
		'�R��'=>'350010',
		'����'=>'360010',
		'����'=>'370000',
		'���Q'=>'380010',
		'���m'=>'390010',
		'����'=>'400010',
		'����'=>'410010',
		'����'=>'420010',
		'�F�{'=>'430010',
		'�啪'=>'440010',
		'�{��'=>'450010',
		'������'=>'460010',
		'����'=>'470010',
	];
	foreach ($city as $name=>$id) {
		if (preg_match('/'.$name.'/', $text)) return $id;
	}
}

function bot($event) {
	if (empty($event->message->text)) return;

	if (!preg_match('/�V�C/', $event->message->text)) return;

	$id=city_id(event->message->text);
	if (empty($id)) return;

	$weather=load('http://weather.livedoor.com/forecast/webservice/json/v1?city='.$id);
	$text=$weather->location->city."�̓V�C��\n";
	foreach ($weather->forecasts as $forecast) {
		$text.=$forecast->dateLabel.' '.$forecast->telop."\n";
	}
	$text.='�ł��B';
	reply($event, $text);
}

?>

