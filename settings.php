<?php
session_start();

date_default_timezone_set("Europe/Moscow");

$api_key = "AIzaSyBwJS_02I7LvhKU6l9C07L8I1HzWLokiLM";  // insert the api key
?>
<?
    //получаем запись по id
if(isset($_GET['id'])):
	$place_id = strip_tags(htmlspecialchars(trim($_GET['id'])));
	//var_dump($place_id);
    $parameters = "key=$api_key&placeid=$place_id";
    $url = "https://maps.googleapis.com/maps/api/place/details/json?$parameters";
    $cookie="cookies.txt";
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
    curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
    $result = curl_exec ($ch);
    curl_close($ch);


    /*****  Decode the received json data into php array  *****/

    $res = json_decode($result,true);

    $reviews = ($res['result']['reviews']);
    $name = ($res['result']['name']);
    $rating = ($res['result']['rating']);
         //var_dump($res);
    $last_good = array();

     ?>
<?else:?>
    <!--<h1>Не введен id компании</h1>-->
    <?/*die(); */?>
<?endif;?>
