<?php
//RERUASアドレス
define('api_address','http://localhost/');
//サムネイルサーバーアドレス
//define('thumbnail_url','./image/');
define('thumbnail_url','./get_thumbnail.php?query=');
//検索ストレージ名(カンマ区切り)
define('str','D,nas-01');
//検索ファイル拡張子(カンマ区切り)
define('fnx','.mp4,.mkv');

//全コンテンツ表示モード
define('allBrowse','false');
//放送年リスト保存場所 
define('year_list','./放送年リスト.txt');
//特殊文字エスケープ
define('char_esqape','<:&lt;**>:&gt;');