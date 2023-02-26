<?php
//api検索処理用クラスファイル
Class API_access{

    final public static function Get_Json(string $query,string $target,string $fnx, string $fields,string $limit)
    {
        require('./config.php');
        $url=api_address.'search/?query='.$target.'**'.urlencode($query).'*and*storage**'.str.'*and*ftype**'.$fnx.'&fields='.$fields.'&sort=-name&limit='.$limit;
        $json=mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        return json_decode($json,true);
    }

    //test
    final public static function Get_API2(string $query,string $fnx, string $fields,string $sort,string $limit){
        require('./config.php');
        $url=api_address.'search/?query='.$query.'*and*storage**'.str.'*and*ftype**'.$fnx.'&fields='.$fields.'&sort='.$sort.'&limit='.$limit;
        $json=mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        return json_decode($json,true);
    }
}
?>