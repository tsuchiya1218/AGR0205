<?php
// PDOでdbhに接続
require_once 'data.php';

// GETで現在のページ数を取得する（未入力の場合は1を挿入）
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

// スタートのポジションを計算する
if ($page > 1) {
    // 例：２ページ目の場合は、『(2 × 10) - 10 = 10』
    $start = ($page * 10) - 10;
} else {
    $start = 0;
}
$sql = "SELECT 
    Main.* 
FROM (
    SELECT 
        ROW_NUMBER() OVER (ORDER BY [a_Num]) AS recordnum 
        , * 
    FROM [Actor] ) AS Main
    WHERE Main.recordnum BETWEEN $start AND $start+10
    ORDER BY Main.recordnum;";


// postsテーブルから10件のデータを取得する
$posts = $dbh->prepare($sql);
$posts->execute();
$posts1 = $posts->fetchAll(PDO::FETCH_ASSOC);
foreach ($posts1 as $post) {
    echo $post['a_Num'], '：';
    echo $post['a_Name'], '<br>';
    // echo $post['name'], '<br>';
}
$sql = "SELECT COUNT(*) a_Num FROM  Actor";
// postsテーブルのデータ件数を取得する
$page_num = $dbh->prepare($sql);
$page_num->execute();
$page_num = $page_num->fetchColumn();

// ページネーションの数を取得する
$pagination = ceil($page_num / 10);

?>

<?php
for ($x = 1; $x <= $pagination; $x++) { ?>
    <a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php }

?>