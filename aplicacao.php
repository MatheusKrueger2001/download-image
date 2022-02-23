<<?php 


$handle = fopen("planinha.csv", "r");

$row = 0;
while ($line = fgetcsv($handle, 0, ";", "'", "$")) {
	if ($row++ == 0) {
		continue;
	}
	
	$images[] = [
		'sku' => $line[0],
		'sku pai' => $line[1],
		'imagem 1' => $line[2],
		'imagem 2' => $line[3],
		'imagem 3' => $line[4],
		'imagem 4' => $line[5],
		'imagem 5' => $line[6],
		'imagem 6' => $line[7],
		'imagem 7' => $line[8],
		'imagem 8' => $line[9],
		'imagem 9' => $line[10],
		'imagem 10' => $line[11],
	];
}

fclose($handle);

foreach ($images as $key => $arrayImage) {
	$a = 1;
	foreach ($arrayImage as $key => $value) {
		if (!empty($key['sku'])) {	
			if( mb_strpos('imagem', $key) !== false){
				$url = $value;
				$img = '/images/'.$key['sku'].'_'.$a.'.jpg';
				file_put_contents($img, file_get_contents($url));
				$a = $a + 1;
			};
		};	
	};
	echo $arrayImage['sku'];
};

?>