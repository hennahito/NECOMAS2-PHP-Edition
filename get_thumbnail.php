<?php
//reruasサーバーからサムネイルを取得する
require('./api_access.php');
require('./config.php');
ini_set( 'display_errors', 0);

$query=$_GET['query'];
$res_arr=API_access::Get_Json($query,'name','.jpg,.png','code,fnx','1');
//echo $res_arr[1]['code'];
$img = file_get_contents(api_address.'get/?query='.$res_arr[1]['code']);
//$img=file_get_contents('http://192.168.11.17/NECOMAS2/image/NoImg2.jpg');

$enc_img=base64_encode($img);

$imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);

echo $img;
//echo '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'">';

/*

//MIMEタイプ指定
if($res_arr[1]['fnx']=='.jpg'){
    header('Content-type: image/jpeg');
}
else if($res_arr[1]['fnx']=='.png'){
    header('Content-type: image/png');
}
echo $img;
readfile(api_address.'get/?query='.$res_arr[1]['code']);
*/
?>


