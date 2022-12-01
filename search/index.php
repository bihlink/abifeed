<?php
$q = $_GET['q'];

$site = file_get_contents("https://twitter.xabid.com/search/?q='.$q.'");

$site = str_replace('http://nitter.bihlink.com/search', '/search/', $site);

echo $site;
?>
