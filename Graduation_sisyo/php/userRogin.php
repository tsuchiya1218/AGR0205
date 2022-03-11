<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>名前：</th>
            <th>
                <?php
                echo $_GET['a_Name'];
                ?>
            </th>
        </tr>
        <tr>
            <th>ふりかな：</th>
            <th>
                <?php
                echo $_GET['a_Furigana'];
                ?>
            </th>
        </tr>
        <tr>
            <th>電話番号：</th>
            <th>
                <?php
                echo $_GET['a_TelNum'];
                ?>
            </th>
        </tr>
        <tr>
            <th>住所：</th>
            <th>
                <?php
                echo $_GET['a_Address'];
                ?>
            </th>
        </tr>
        <tr>
            <th>住所ふりかな：</th>
            <th>
                <?php
                echo $_GET['a_AFrigana'];
                ?>
            </th>
        </tr>
        <tr>
            <th>郵便番号：</th>
            <th>
                <?php
                echo $_GET['a_ANum'];
                ?>
            </th>
        </tr>
        <tr>
            <th>パスワード：</th>
            <th>********</th>
        </tr>
        <tr>
            <th>メールアドレス：</th>
            <th>
                <?php
                echo $_GET['a_Mail'];
                ?>
            </th>
        </tr>
    </table>
    <p>
        <a href="01.php">戻る</a>
        <?php
        $a_Name = $_GET['a_Name'];
        $a_Furigana = $_GET['a_Furigana'];
        $a_TelNum = $_GET['a_TelNum'];
        $a_Address = $_GET['a_Address'];
        $a_AFrigana = $_GET['a_AFrigana'];
        $a_ANum = $_GET['a_ANum'];
        $a_pass = $_GET['a_pass'];
        $a_Mail = $_GET['a_Mail'];
        echo '<a href="userRogin1.php?' . "a_Name" . '=' . $a_Name .
            "&a_Furigana" . '=' . $a_Furigana .
            "&a_TelNum" . '=' . $a_TelNum .
            "&a_Address" . '=' . $a_Address .
            "&a_AFrigana" . '=' . $a_AFrigana .
            "&a_ANum" . '=' . $a_ANum .
            "&a_pass" . '=' . $a_pass .
            "&a_Mail" . '=' . $a_Mail .
            '">登録</a>';
        ?>

    </p>
</body>

</html>