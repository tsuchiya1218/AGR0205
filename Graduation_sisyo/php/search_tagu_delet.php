<script>
    if (window.confirm('タグを削除しますか？')) {



        return true;

    } else {
        header("Location:search_tagu2.php?tagID=" & $tagID1);
        return false;

    }
</script>


<?php
    session_start();
    require_once 'data.php';
    $DOC1 = $_SESSION["DOC"];
    echo $DOC1;
    $tagID1 = $_SESSION["tagID"];
    echo $tagID1;
    $sql = "DELETE  FROM Tagged WHERE tagID = ? AND DOC_Num = ?";
    // 削除するレコードのIDは空のまま、SQL実行の準備をする
    $stmt = $dbh->prepare($sql);
    // 削除するレコードのIDを配列に格納する
    $stmt->bindParam(1, $tagID1);
    $stmt->bindParam(2, $DOC1);
    // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
    $stmt->execute();

   // print "alert(\"削除しましたよ\")";
    $_SESSION["tagID"]=$tagID1;
    header("Location:search_tagu2.php?tagID=$tagID1");
    exit();
?> 