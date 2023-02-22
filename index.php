<!doctype html>
<html lang="ja" data-bs-theme="auto">

<?php
//api情報取得クラスロード
require('./api_access.php');
require('./config.php');
ini_set('display_errors', 0);
//http get取得
//タイトル検索
$query=$_GET['query'];
//仮で検索ヒット件数をここで指定する
$api_limit='50';
//現在のシーズン
$season="2023年冬";

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NECOMAS2</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery.min.js"></script>
    <!--<script src="./js/suggest.js"></script>-->
</head>

<body>
    <!-- アイコンの設定 -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <!--navbar-->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar bg-dark-subtle">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">NECOMAS2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="bd-theme" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi theme-icon-active" width="1em" height="1em" fill="currentColor">
                                    <use href="#moon-stars-fill"></use>
                                </svg>
                                <span id="bd-theme-text"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="dropdown-item" data-bs-theme-value="light"
                                        aria-pressed="false">
                                        <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                            <use href="#sun-fill"></use>
                                        </svg>light
                                    </button></li>
                                <li><button type="button" class="dropdown-item" data-bs-theme-value="dark"
                                        aria-pressed="false">
                                        <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                            <use href="#moon-stars-fill"></use>
                                        </svg>dark
                                    </button></li>
                                <li><button type="button" class="dropdown-item active" data-bs-theme-value="auto"
                                        aria-pressed="true">
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

    <!--infomation-->
    <section id="info">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <span class="display-4">検索してみよう</span>
                    <p>NEtwork COntents MAnegement & Sharing System mk3</p>

                </div>
            </div>
        </div>
    </section>

    <!--search-->
    <!--formタグ追加-->
    <form action = "./" method = "GET" >
        <section id="search">
            <div class="container pb-3">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <div class="input-group">
                            <div class="input-group input-group-lg">
                                <!-- 
                                    ・inputにname追加
                                    ・"input placeholder="に画面遷移後の検索ワードをテキストボックスに表示させるコードを追加
                                    ・buttonのtypeをsubmitに変更
                                -->                               
                                    <input id="searchword" type="text" name="query" placeholder="タイトル検索"<?php if($query!=''){echo ' value ="'.$query.'"';}?> class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">検索</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    

    <!--more-search-->
    <section id="more-search">
        <div class="container pb-3">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    絞り込み検索
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <select class="form-select mb-3" aria-label="Default select example">

                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <input type="text" class="form-control mb-3" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing">
                                    <select class="form-select mb-3" aria-label="Default select example">

                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <input type="text" class="form-control mb-3" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing">
                                    <button type="button" class="btn btn-outline-primary">絞り込み検索</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--index-->
    <!-- 検索結果を表示できるようにコードを追加
         API_accessクラスに検索ワードを投げて帰ってきたアレイを
         forでループさせて表示する
        -->
        
    <section id="index">
        <div class="container-fluid my-5">
            <div class="row g-3">
                <?php
                    //検索結果を取得して$res_arrに格納
                    //初回でページを開いたときに最新シーズンのタイトルを表示させる
                    if($query==''){
                        $res_arr=API_access::Get_Json($season,'key_T3','.dir','i_code,name,code,key_T3,key_C3',$api_limit);
                    }
                    else{
                        //API_access::Get_Json((検索ワード),'(検索ターゲット)','(フォルダのみ検索)','(取得する情報)',(表示件数));
                        $res_arr=API_access::Get_Json($query,'name','.dir','i_code,name,code,key_T3,key_C3',$api_limit);
                    }
                    //検索にヒットした数をint型にキャスト
                    //forでループさせる
                    for($i=1;$i<=(int)$res_arr[0]['count'];$i++){
                        //コンテンツ全表示モード関連
                        if(allBrowse=='false'){
                            //サブデータが存在しないコンテンツを弾く
                            if($res_arr[$i]['i_code']!='(NULL)'){
                                echo '<div class="col-lg-3 col-md-6"><div class="card my-3">';
                                //サムネイルが無かったらNoimg4.pngを表示させる処理
                                if($res_arr[$i]['key_C3']=="(NULL)" || $res_arr[$i]['key_C3']==""){
                                    echo '<a href="./individual.php?query='.$res_arr[$i]['code'].'"><img src="./image/Noimg4.png" calss="card-img-top" alt="#"></a><div class="card-body">';
                                }
                                else{echo '<a href="./individual.php?query='.$res_arr[$i]['code'].'"><img src="'.thumbnail_url.$res_arr[$i]['key_C3'].'" calss="card-img-top" alt="#"></a><div class="card-body">';}
                                echo '<h5 class="card-title text-truncate"><a href="./individual.php?query='.$res_arr[$i]['code'].'">'.$res_arr[$i]['name'].'</a></h5>';
                                echo '<h6 class="card-subtitle text-muted">'.$res_arr[$i]['key_T3'].'</h6>';
                                echo '</div></div></div>';
                            }
                        }
                        else if(allBrowse=='true'){
                            echo '<div class="col-lg-3 col-md-6"><div class="card my-3">';
                                //サムネイルが無かったらNoimg4.pngを表示させる処理
                                if($res_arr[$i]['key_C3']=="(NULL)" || $res_arr[$i]['key_C3']==""){
                                    echo '<a href="./individual.php?query='.$res_arr[$i]['code'].'"><img src="./image/Noimg4.png" calss="card-img-top" alt="#"></a><div class="card-body">';
                                }
                                else{echo '<a href="./individual.php?query='.$res_arr[$i]['code'].'"><img src="'.thumbnail_url.$res_arr[$i]['key_C3'].'" calss="card-img-top" alt="#"></a><div class="card-body">';}
                                echo '<h5 class="card-title text-truncate"><a href="./individual.php?query='.$res_arr[$i]['code'].'">'.$res_arr[$i]['name'].'</a></h5>';
                                echo '<h6 class="card-subtitle text-muted">'.$res_arr[$i]['key_T3'].'</h6>';
                                echo '</div></div></div>';
                        }
                    }
                ?>


                 
            </div>

        </div>

    </section>

    <!--pagination-->
    <section id="pagination">
        <div class="d-flex justify-content-center my-5">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="前">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="次">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>











    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/color-modes.js"></script>
</body>

</html>