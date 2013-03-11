<?php

//this will return the first image src in a google image search.

$query = $_GET['query'];
$query = urlencode($query);

$url = 'https://www.google.com/search?hl=en&site=&tbm=isch&q='.$query.'&biw=1229&bih=683&sei=xg89UcajC-Kh2QXDk4CYDQ';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($ch);

$imgLink = strpos($output, 'imgurl=');
$imgLink = substr($output, $imgLink + 7);

$imgLinkEnd = strpos($imgLink, '&');
$imgLink = substr($imgLink, 0, $imgLinkEnd);

print $imgLink;

curl_close($ch);

?>