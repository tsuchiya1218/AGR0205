<?php
//SQL文を変数にいれる。$count_sqlはデータの件数取得に使うための変数。
$count_sql = 'SELECT COUNT(*) as cnt FROM テーブル名';

//ページ数を取得する。GETでページが渡ってこなかった時(最初のページ)のときは$pageに１を格納する。
if(isset($_GET['page']) && is_numeric($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

//最大ページ数を取得する。
//５件ずつ表示させているので、$count['cnt']に入っている件数を５で割って小数点は切りあげると最大ページ数になる。
$counts = $database -> query($count_sql);
$count = $counts -> fetch(PDO::FETCH_ASSOC);
$max_page = ceil($count['cnt'] / 5);
?>
<ul>
    <?php foreach($aryPref as $value){ ?>
    <li><?php echo $value['pref_name']; ?></li>
    <?php } ?>
</ul>

<?php echo $pageing -> html ?>