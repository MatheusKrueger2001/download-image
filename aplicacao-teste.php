<?php 

$csvFile = file('imagens.csv');
foreach ($csvFile as $line) {
$url = str_getcsv($line);
$ch = curl_init($url[0]);
$name = basename($url[0]);
if (!file_exists('images/' . $name)) {
	$fp = fopen('diretorio/' . $name, 'wb');
}
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);
}