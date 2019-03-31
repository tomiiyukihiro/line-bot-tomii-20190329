<?php
function image($event) {
	$cx='010352532364298676544:0xmnht5yd2c';
	$key='AIzaSyDudFRiHD_hmgxQXeD5iK5hjxcbzdewTPI';
	if(!preg_match('/画像検索$/', $event->message->text)) return;
	$keyword=preg_replace('/画像検索$/', '', $event->message->text);

	$url='https://www.googleapis.com/customsearch/v1';
	$url.='?cx='.$cx;
	$url.='&key='.$key;
	$url.='&q='.urlencode($keyword);
	$url.='&searchType=image';
	debug('url', $url);

	$items=load($url)->items;
	$item=$items[rand(0, count($items)-1)];

	$original=$item->link;
	$original=preg_replace('/^http:/', 'https:', $original);
	debug('original', $original);

	$preview=$item->image->thumbnailLink;
	$preview=preg_replace('/^http:/', 'https:', $preview);

	reply_image($event, $original, $preview);
}
?>
