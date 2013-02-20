<?php

//Created by Steve Reynolds : http://www.reynoldsftw.com

$query = $_POST['query'];
$max_id = $_POST['max_id'];
$rpp = isset($_POST['rpp']) ? $_POST['rpp'] : 20;

$curl = curl_init();

//curl_setopt ($curl, CURLOPT_URL, "http://search.twitter.com/search.atom?q=" . urlencode($query) . "&amp;rpp=20&amp;max_id=" . $maxId);
if( $max_id != 0 ) {
	curl_setopt ($curl, CURLOPT_URL, "http://search.twitter.com/search.atom?q=".$query."&max_id=".$max_id."&rpp=".$rpp);
}
else {
	curl_setopt ($curl, CURLOPT_URL, "http://search.twitter.com/search.atom?q=".$query."&rpp=".$rpp);
}

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec ($curl);

curl_close ($curl);

header('Content-Type: application/xml; charset=ISO-8859-1');

print $result;

?>
