<?php 
function write_array($file, $data) {
    $str = "<?php \nreturn " . var_export($data, true) . ";\n";
    file_put_contents($file, $str);
}
function read_csv($file) {
    $ret = array();
    $fp = fopen($file, "r");
    while(!feof($fp)) {
		$line = trim(fgets($fp));
        $ret[] = explode(',', $line);
    }
    fclose($fp);
    return $ret;
}

$file = 'd.csv';
$data = read_csv($file);

$ret = array(
    'brand' => array(),
    'series' => array(),
);
foreach ($data as $item) {
	if (isset($item[3])) {
		$b = explode('|', $item[3]);
		foreach ($b as $bb) {
			if (!isset($ret['brand'][$bb]) && !empty($bb)) {
			    $ret['brand'][$bb] = $item[2];
			}
		}
	}
	if (isset($item[1])) {
		$a = explode('|', $item[1]);
		foreach ($a as $aa) {
			if (!isset($ret['series'][$aa]) && !isset($ret['brand'][$aa]) && !empty($aa)) {
			    $ret['series'][$aa] = $item[0].'|'.$item[2];
			}
		}
	}
}

write_array(__DIR__ . '/../config/keyword.php', $ret);






