<?php
header("Pragma: no-cache");
header("Cache-Control: s-maxage=0, max-age=0, must-revalidate, no-cache");

$str = file_get_contents('words/en.txt');
$result = explode("\n",$str);

$w1 = $result[secure_random(count($result))];

header('Content-Type: text/plain; charset=utf-8');
header('Access-Control-Allow-Origin: *');
echo $w1;


function secure_random($max){
    do{
        $result = floor($max*(hexdec(bin2hex(openssl_random_pseudo_bytes(4)))/0xffffffff));
    }while($result == $max);
    return $result;
}
?>