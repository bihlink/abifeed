<?php
$site = file_get_contents("https://twitter.xabid.com/");

$site = str_replace('http://nitter.bihlink.com/search', '/search/', $site);

echo $site;
?>
