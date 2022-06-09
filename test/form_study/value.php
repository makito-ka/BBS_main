<?php
    //相対パスを変数に格納
    session_start();
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    //入力フォームから入力された値を変数に代入
    
    //
    $stmt = $mysqli->prepare('SELECT * FROM text WHERE thread_id = ? ORDER BY id DESC');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    //URLパラメータに数字以外が入力された場合は、トップへ戻す。　←DBから最大のIDを取得すれば、DBに存在しないデータも処理できる？？
    if(!$id) {
        header('Location: ./thread.php');
    }
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
    <a href="./thread.php">スレッド一覧表示へ</a>
    <hr>
    <div>
        <?php while($result = $stmt->fetch()): ?>
            <h4>
                <?php
                    echo nl2br(htmlspecialchars($value,)); 
                    //↑↑入力フォームからDBへデータを渡す際にfilter_inputのフィルタオプションをかけなければ、改行が表示できるコード（未完成コード）
                    // echo nl2br(htmlspecialchars($memo['memo'],ENT_HTML5));
                    // echo htmlspecialchars($memo['memo']);
                ?>
            </h4>
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