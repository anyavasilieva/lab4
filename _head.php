<?php
ini_set('display_errors', 'Off');
$file_shop_base = 'shop_base.xml';

$xml = simplexml_load_file($file_shop_base);

if (!$xml->products) $xml->addChild('products');


?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Интернет-магазин</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
	HTML, BODY { padding:0; margin:0; border:0 }
	header { background:#cde; text-align:center; padding:15px; }
	footer { background:#edc; text-align:center; padding:15px; }
	content { display:block; width:90%; min-width:330px; max-width:1260px; margin:30px auto; }
	.but { position:relative; display:inline-block; background:#d80; color:#fff; padding:10px 20px; border:0; border-radius:5px; text-decoration:none; cursor:pointer; margin:0 10px 10px 0 }
	INPUT[type=text], TEXTAREA { min-width:250px; width:50%; padding:4px 6px; }
	.err { margin:15px 0; color:red; font-size:110% }
	.info { margin:15px 0; padding:15px; font-size:110%; background:#fe8; border:1px solid #ba6 }
	.product { margin:15px 0; padding:15px; background:#eee }
	.price { margin:10px 0; font-size:125%; color:#048 }
</style>

</head>
<body>

<header>
	<h1>Интернет-магазин</h1>
</header>

<content>
