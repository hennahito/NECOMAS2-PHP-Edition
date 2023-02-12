# NECOMAS2-PHP-Edition
NECOMAS2のPHPバージョン
## 初めに

これはNECOMASのPHP実装版です。

元のhtml版NECOMASになるべく手を加えないように工夫したつもりです。

変更箇所はなるべくコメントアウトで分かりやすく記述してあります。
## 実装した機能
・タイトル検索

・詳細ページ表示

## 未実装な機能
・絞り込み検索

・individualページのキャラクタータブ、スタッフタブ

・再生ボタン、ダウンロードボタン

## html版に存在しなかったファイルの詳細

・api_access.php

　RERUAS(APIサーバー)に検索リクエストを送信して帰ってきたjsonデータをオブジェクト配列に変換する。
 
・config.php

　システムの設定ファイル。現状RERUASサーバーアドレスと検索ストレージ設定を使用している。ファイル拡張子設定は削除予定。
 
 ## Deveropment
 
 現状のバージョンを帝甲会devToolに上げてみました。下記リンクからアクセス可能です。
 
 https://ejc.miznet.wjg.jp/teikoukai/development/necomas2php/?query=検索ボックスに何かワードを入れてください
 
上記devToolの注意点としてAPIにRERUASエミュレータを使用しています。
 
 RERUASエミュレータは本物のRERUASに極めて近い検索結果を返すように実装させたものになります。
 
 あくまでただのエミュレーターなので検索機能や並べ替え機能等を実装していません。
 
 なのでdevToolのNECOMASの検索ボックスに何かワードを入れて検索しても同じ結果が表示されてしまうようになります。
 
 
