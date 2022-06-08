<?php
    //相対パスを変数に格納
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    //入力フォームから入力された値を変数に代入
    
    //
    $threads = $mysqli->query('SELECT * FROM thread');
    if(!$threads) {
        die($mysqli->error);
    }

    //SQL文置き場
    // SELECT b.title, a.value 
    //     FROM text a, thread b 
    //     WHERE a.thread_id  = 3
  	//     AND  a.thread_id = b.id
    //     （LIMIT 1）　←表示件数を制御する際に使用。実装するかは未定のため備忘録的に記述。
?>
<?php
    //<head>要素関係の呼び出し
    $headTitle = 'スレッド一覧ページ'; //ページタイトルを変数に格納
    include_once $path . 'template/head.php';
?>
</head>
<body>
<div class="container">
    <?php
        include_once $path . 'template/header.php';
    ?>
    <!-- メインコンテンツ入力 -->
    <div>
        <a href="./input.php">入力フォームへ（勉強用）</a> |
        <a href="./index.php">index.phpへ</a> |
        <a href="./thread_in.php">入力フォームへ（本番想定）</a>
    </div>
    <br>
    <h3>スレッド一覧</h3>
    <br>
    <div>
        <?php while($thread = $threads->fetch_assoc()): ?>
            <h4><a href="value.php?id=<?=$thread['id']; ?>">
                <?php
                    echo nl2br(htmlspecialchars($thread['title'],)); 
                    //↑↑入力フォームからDBへデータを渡す際にfilter_inputのフィルタオプションをかけなければ、改行が表示できるコード（未完成コード）
                    // echo nl2br(htmlspecialchars($memo['memo'],ENT_HTML5));
                    // echo htmlspecialchars($memo['memo']);
                ?>
            </a></h4>
            <time><?=htmlspecialchars($thread['time']);?></time>
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