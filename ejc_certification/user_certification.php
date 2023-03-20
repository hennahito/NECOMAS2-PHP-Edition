<?php
class User_certification
{
    //ユーザーアクセス認証
    final public static function accsess_cert()
    {

        if (!isset($_SESSION['EMAIL'])) {
            echo "ログインしてません";
            //echo '<meta http-equiv="refresh" content="0.5 ;URL=./">';
            exit;
        }
    }
    //ユーザーアクセスレベル認証
    final public static function accsess_level()
    {

        require('user_certification_conf.php');
        $pdo = new PDO(eDSN, eDB_USER, eDB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'select count(*) from userDeta where email = "' . $_SESSION['EMAIL'] . '" and accsess_level LIKE "%' . service_ID . '%"';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['count(*)'] != '1') {
            echo "権限がありません";
            exit;
        }
        $stmt = null;
        $pdo = null;
    }
}
