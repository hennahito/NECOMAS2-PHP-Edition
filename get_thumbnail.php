<?php
//reruasサーバーからサムネイルを取得する
require('./api_access.php');
require('./config.php');
ini_set( 'display_errors', 0);

$query=$_GET['query'];
$res_arr=API_access::Get_Json($query,'name','.jpg,.png','code,fnx','1');
$img = file_get_contents(api_address.'get/?query='.$res_arr[1]['code']);
$enc_img=base64_encode($img);
$imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);
echo $img;
?>


