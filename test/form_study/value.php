<?php
    //相対パスを変数に格納
    session_start();
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    
    // 〜URLパラメータチェック〜　ここから
    //数字のみ受付
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    //DBの存在チェック
    $stmt = $mysqli->prepare('SELECT id FROM `thread` WHERE EXISTS (SELECT * FROM thread WHERE id = ? )');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($exists);
    $stmt->fetch();
    $stmt->close();

    if(!$id || !$exists) {
        header('Location: ./thread.php');
    }
    // 〜URLパラメータチェック〜　ここまで

    //データを取得し変数に渡す
    $stmt = $mysqli->prepare('SELECT * FROM text WHERE thread_id = ? ORDER BY id DESC');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($id, $thread_id, $value, $time);
    
    //新規投稿用にidを渡す
    $_SESSION['id'] = $id;
?>
<?php
    //<head>要素関係の呼び出し
    $headTitle = 'スレッドの内容表示'; //ページタイトルを変数に格納
    include_once $path . 'template/head.php';
?>
</head>
<body>
<div class="container">
    <?php
        include_once $path . 'template/header.php';
        //ページのタイトル部（簡易掲示板の所）を変更
    ?>
    <!-- メインコンテンツ入力 -->
    <a href="./post.php">新規投稿</a> |
    <a href="./thread_in.php">スレッド新規作成</a> |
    <!-- <a href="./thread.php">スレッド一覧表示へ</a> -->
    <hr>
    <div>
        <?php 
        while($result = $stmt->fetch()):
        ?>
            <h4>
                <?php
                    //DBからの取得データをサニタイズしてから改行をする
                    echo nl2br(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
                ?>
            </h4>
            <!-- 改行が不要なためこのコードにしている -->
            <time><?=htmlspecialchars($time);?></time>
        <hr>
        <?php endwhile;
        ?>
    
    </div>
</div>
<?php
    include_once $path . 'template/footer.php';
?>

</body>
</html>