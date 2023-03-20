<?php
ini_set('display_errors', 0);
require('./api_access.php');
require('./config.php');
require('ejc_certification/user_certification.php');
//アクセス認証
session_start();
if (account_cert == 'true') {
    User_certification::accsess_cert();
}
if (User_limitation == 'true') {
    User_certification::accsess_level();
}

//Getデータ取得
$code = $_GET['query'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NECOMAS&sup2;</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- アイコンの設定 -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>



    <!--navbar-->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar bg-dark-subtle">
            <div class="container-fluid">
                <a class="navbar-brand" href="./?top=1">NECOMAS&sup2;</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo tei_url . 'dllist'; ?>" target="_blank" rel="noopener noreferrer">カート</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="bd-theme" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi theme-icon-active" width="1em" height="1em" fill="currentColor">
                                    <use href="#moon-stars-fill"></use>
                                </svg>
                                <span id="bd-theme-text"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="dropdown-item" data-bs-theme-value="light" aria-pressed="false">
                                        <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                            <use href="#sun-fill"></use>
                                        </svg>light
                                    </button></li>
                                <li><button type="button" class="dropdown-item" data-bs-theme-value="dark" aria-pressed="false">
                                        <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                            <use href="#moon-stars-fill"></use>
                                        </svg>dark
                                    </button></li>
                                <li><button type="button" class="dropdown-item active" data-bs-theme-value="auto" aria-pressed="true">
                                        <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                            <use href="#circle-half"></use>
                                        </svg>auto
                                    </button></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- api検索をしてデータを取得 -->
    <?php
    $res_arr = API_access::Get_Json($code, 'code', '.dir', 'name,key_T0,key_T1,key_T2,key_T3,key_C3,i_code', '1');
    //全コンテンツ表示モードかどうかの判定とか
    if (allBrowse == 'false' && $res_arr[1]['i_code'] == "(NULL)") {
        echo 'コンテンツを表示出来ません';
        exit;
    }
    ?>

    <!--thumbnail-->
    <section id="thumbnail">
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-lg-6">
                    <!-- サムネイル取得コード追加-->
                    <?php
                    if ($res_arr[1]['key_C3'] == "(NULL)" || $res_arr[1]['key_C3'] == "") {
                        echo '<img src="./image/Noimg5.png"alt="">';
                    } else {
                        echo '<img src="' . thumbnail_url . $res_arr[1]['key_C3'] . '" alt="">';
                    }
                    ?>


                </div>
                <div class="col-lg-6 pt-lg-0 pt-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="top-tab" data-bs-toggle="tab" data-bs-target="#top" type="button" role="tab" aria-controls="top" aria-selected="true">
                                トップ
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="characteractor-tab" data-bs-toggle="tab" data-bs-target="#characteractor" type="button" role="tab" aria-controls="characteractor" aria-selected="false">
                                キャラクタ：声優名
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="stuff-tab" data-bs-toggle="tab" data-bs-target="#stuff" type="button" role="tab" aria-controls="stuff" aria-selected="false">
                                スタッフ情報等
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="song-tab" data-bs-toggle="tab" data-bs-target="#song" type="button" role="tab" aria-controls="song" aria-selected="false">
                                主題歌
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="top" role="tabpanel" aria-labelledby="top-tab">
                            <div class="pt-2">
                                <span class="display-5 ps-1"><?php echo $res_arr[1]['name']; ?></span>
                                <p class="fs-5 ps-1"><?php echo $res_arr[1]['key_T3']; ?></p>
                                <!--リンクに飛ぶように"button"要素を"a"要素に変更-->
                                <!--hrefで帝甲会にジャンプするようにコードを追加-->
                                <a type="button" href="<?php echo tei_url . 'dllist?id=' . $code . '&target=3&query=' . $code . '&sort=name&as=asc'; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z">
                                        </path>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z">
                                        </path>
                                    </svg>
                                    Download All
                                </a>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="characteractor" role="tabpanel" aria-labelledby="characteractor-tab">
                            <div class="col-md-6 col-sm-12 pt-2">
                                <div class="flex-column">
                                    <?php
                                    $sprit = explode('*', $res_arr[1]['key_T0']);
                                    for ($i = 0; $i < count($sprit); $i++) {

                                        echo '<p class="fs-6">' . $sprit[$i] . '</p>';
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="stuff" role="tabpanel" aria-labelledby="stuff-tab">
                            <div class="col-md-6 col-sm-12 pt-2">
                                <div class="flex-column">
                                    <?php
                                    $sprit = explode('*', $res_arr[1]['key_T1']);
                                    for ($i = 0; $i < count($sprit); $i++) {
                                        echo '<p class="fs-6">' . $sprit[$i] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="song" role="tabpanel" aria-labelledby="song-tab">
                            <div class="col-md-6 col-sm-12 pt-2">
                                <div class="flex-column">
                                    <?php
                                    //特殊文字をエスケープする
                                    $escape = explode('**', char_esqape);
                                    $tmp = $res_arr[1]['key_T2'];
                                    for ($i = 0; $i < count($escape); $i++) {
                                        $tmp = str_replace(explode(':', $escape[$i])[0], explode(':', $escape[$i])[1], $tmp);
                                    }

                                    $sprit = explode('**', $tmp);
                                    for ($i = 0; $i < count($sprit); $i++) {
                                        echo '<p class="fs-6">' . $sprit[$i] . '</p>';
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!--episode-->
    <section id="episode">
        <div class="container-fluid py-5">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">エピソード</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">サイズ</th>
                            <th scope="col">再生・ダウンロード</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- エピソードを取得して表示させる-->
                        <?php
                        //API_access::Get_Json((検索ワード),'(ディレクトリ検索モード)','(動画のみ検索)','(取得する情報)',(表示件数));
                        $res_arr = API_access::Get_Json($code, 'dirlist', '.mp4,.mkv,.rnk', 'code,name,size,fnx', '100');
                        for ($i = 1; $i <= (int)$res_arr[0]['count']; $i++) {
                            //名前を分割しまくる処理
                            $tmp = explode(' 第', $res_arr[$i]['name']);
                            /*
                            if($tmp[2]!=''){
                                $row=explode('話',$tmp[2])[0];
                                
                            }
                            else{
                                $row=explode('話',$tmp[1])[0];
                            }*/
                            //話数が取得できなっかた時はファイル名をそのままサブタイトルに表示する
                            if (explode('話', $tmp[1])[0] == '') {
                                echo '<tr><th scope="row"></th>';
                                echo '<td>' . str_replace($res_arr[$i]['fnx'], '', $res_arr[$i]['name']) . '</td>';
                            }
                            //第が二つあった時は
                            else if ($tmp[2] != '') {
                                echo '<tr><th scope="row">' . explode('話', $tmp[2])[0] . '</th>';
                                echo '<td>' . explode('」', explode('「', $res_arr[$i]['name'])[1])[0] . '</td>';
                            } else {
                                echo '<tr><th scope="row">' . explode('話', $tmp[1])[0] . '</th>';
                                echo '<td>' . explode('」', explode('「', $res_arr[$i]['name'])[1])[0] . '</td>';
                            }
                            //サイズを計算する処理
                            $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
                            $e = floor(log($res_arr[$i]['size']) / log(1024));
                            echo '<td>' . sprintf('%.1f ' . $s[$e], ($res_arr[$i]['size'] / pow(1024, floor($e)))) . '</td>';
                            echo '<td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a type="button" href="' . tei_url . 'main?query=' . $res_arr[$i]['code'] . '&target=3" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">
                                        <svg src="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-play" viewBox="0 0 16 16">
                                            <path
                                                d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z">
                                            </path>
                                        </svg>
                                        Play
                                    </a>
                                    <a type="button" href="' . tei_url . 'dllist?id=' . $res_arr[$i]['code'] . '&target=4&query=' . $code . '&sort=name&as=asc" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z">
                                            </path>
                                            <path
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z">
                                            </path>
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </td>
                        </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/color-modes.js"></script>
</body>

</html>