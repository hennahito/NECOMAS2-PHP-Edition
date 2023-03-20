<?php
///基本設定////////////////////////////////////////
//RERUASアドレス
define('api_address', 'http://reruas.local/');
//サムネイルサーバーアドレス
//define('thumbnail_url','./image/');
define('thumbnail_url', './get_thumbnail.php?query=');
//帝甲会アドレス
define('tei_url', 'https://teikoukai/');
//検索ストレージ名(カンマ区切り)
define('str', 'Ddrive');
//検索ファイル拡張子(カンマ区切り)
define('fnx', '.mp4,.mkv');
//全コンテンツ表示モード
define('allBrowse', 'false');
//放送年リスト保存場所 
define('year_list', './放送年リスト.txt');
//特殊文字エスケープ
define('char_esqape', '<:&lt;**>:&gt;');
//////////////////////////////////////////////////

///セキュリティ設定////////////////////////////////
//アカウント認証
define('account_cert', 'true');
//ユーザーアクセスレベル認証
define('User_limitation', 'true');
