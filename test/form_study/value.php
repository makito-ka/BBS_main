<?php
    //相対パスを変数に格納
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    //入力フォームから入力された値を変数に代入
    
    //
    $stmt = $mysqli->prepare('SELECT * FROM text WHERE thread_id = ?');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    //URLパラメータに数字以外が入力された場合は、トップへ戻す。
    if(!$id) {
        header('Location: ./thread.php');
    }
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($id, $thread_id, $value, $time);
    
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
    <a href="./input.php">入力フォームへ</a> |
    <a href="./thread.php">スレッド一覧表示へ</a>
    <hr>
    <h2>スレッド詳細ページ</h2>
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