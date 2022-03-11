<?php
 session_start();
 $sessID = session_id();

try{
    //学籍番号は自分のものに変更すること
    $dsn = 'sqlsrv:server=10.42.129.3;database=20gr25';
    $user = '20gr25'; 
    $password = '20gr25';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // print"接続成功、おめでとうございます！";
	//print "データベースに接続<br>\n";
} catch (Exception $e){
    print 'データベースへのアクセスにエラーが発生しました。';
    print $e;
    exit();
}



?> 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="check_user.php" method="GET"> 
        
        名前：<input type="text"  name="a_Name"><br>
        <?php
            if (isset($_SESSION["err1"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err1"] . '</p>';
                unset($_SESSION["err1"]);
            }
        ?> 
        ふりかな：<input type="text"  name="a_Furigana"><br>
        <?php
            if (isset($_SESSION["err2"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err2"] . '</p>';
                unset($_SESSION["err2"]);
            }
        ?> 
        電話番号：<input type="text" name="a_TelNum">ハイフン付き<br>
        <?php
            if (isset($_SESSION["err10"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err10"] . '</p>';
                unset($_SESSION["err10"]);
            }
        ?> 
        住所：<input type="text" name="a_Address"><br>
        <?php
            if (isset($_SESSION["err3"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err3"] . '</p>';
                unset($_SESSION["err3"]);
            }
        ?> 
        住所ふりかな：<input type="text"  name="a_AFrigana"><br> 
        <?php
            if (isset($_SESSION["err4"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err4"] . '</p>';
                unset($_SESSION["err4"]);
            }
        ?> 
        郵便番号：<input type="text"  name="a_ANum"><br>
        <?php
            if (isset($_SESSION["err5"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err5"] . '</p>';
                unset($_SESSION["err5"]);
            }
        ?> 
        パスワード：<input type="password"  name="a_pass"><br>
        <?php
            if (isset($_SESSION["err6"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err6"] . '</p>';
                unset($_SESSION["err6"]);
            }
        ?> 
        もう一度パスワード：<input type="password"  name="a_pass1"><br>
        <?php
            if (isset($_SESSION["err7"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err7"] . '</p>';
                unset($_SESSION["err7"]);
            }else if (isset($_SESSION["err8"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err8"] . '</p>';
                unset($_SESSION["err8"]);
            }
        ?> 
        メールアドレス：<input type="text" name="a_Mail"><br>
        <?php
            if (isset($_SESSION["err9"])) {
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err9"] . '</p>';
                unset($_SESSION["err9"]);
            }
        ?> 
        <input type="submit" value="登録">
    </form>
</body>
</html>