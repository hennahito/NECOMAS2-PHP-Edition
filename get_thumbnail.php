<?php
//reruasサーバーからサムネイルを取得する
require('./api_access.php');
require('./config.php');
ini_set( 'display_errors', 1);

$query=$_GET['query'];
$res_arr=API_access::Get_Json($query,'name','.jpg,.png','code,fnx','1');
$img = file_get_contents(api_address.'get/?query='.$res_arr[1]['code']);
//MIMEタイプ指定
if($res_arr[1]['fnx']=='.jpg'){
    header('Content-type: image/jpeg');
}
else if($res_arr[1]['fnx']=='.png'){
    header('Content-type: image/png');
}
//echo $img;
readfile(api_address.'get/?query='.$res_arr[1]['code']);
?>


