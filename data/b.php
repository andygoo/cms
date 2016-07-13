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

$file = 'b.csv';
$data = read_csv($file);

$ret = array();
foreach ($data as $item) {
    $a = strtolower($item[0]);
    $a = str_replace(' ', '', $a);
    $l = mb_strlen($a);
    for ($i=1; $i<=$l; $i++) {
        $sa = mb_substr($a, 0, $i);
        if (!isset($ret[$sa])) {
            $ret[$sa] = array();
        }
        $ret[$sa][] = $item[0];
    }
    
    $a = strtolower($item[1]);
    $a = str_replace(' ', '', $a);
    $l = mb_strlen($a);
    for ($i=1; $i<=$l; $i++) {
        $sa = mb_substr($a, 0, $i);
        if (!isset($ret[$sa])) {
            $ret[$sa] = array();
        }
        $ret[$sa][] = $item[0];
    }
}

write_array(__DIR__ . '/../config/suggest.php', $ret);







