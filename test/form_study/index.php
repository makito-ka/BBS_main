<?php
    //相対パスを変数に格納
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    //入力フォームから入力された値を変数に代入
    
    //
    $memos = $mysqli->query('SELECT * FROM memos ORDER BY id DESC');
    if(!$memos) {
        die($mysqli->error);
    }

?>
<?php
    //<head>要素関係の呼び出し
    $headTitle = 'SELECT関係テスト'; //ページタイトルを変数に格納
    include_once $path . 'template/head.php';
?>
</head>
<body>
<div class="container">
    <?php
        include_once $path . 'template/header.php';
    ?>
    <!-- メインコンテンツ入力 -->
    <a href="./input.php">入力フォームへ</a> |
    <a href="./thread.php">スレッド一覧表示へ</a>
    <h3>メモ一覧</h3>
    <div>
        <?php while($memo = $memos->fetch_assoc()): ?>
            <h4><a href="#">
                <?php
                    // echo nl2br(htmlspecialchars($memo['memo'],));

                    $test = str_replace('&#13;&#10;', '\n', $memo['memo'], $cnt);
                    // echo $test;
                    echo nl2br($test);
                    // $test = nl2br(htmlspecialchars($memo['memo'],));


                    // echo htmlspecialchars($memo['memo'],);
                    // echo nl2br($memo['memo']); 
                    
                    //↑↑入力フォームからDBへデータを渡す際にfilter_inputのフィルタオプションをかけなければ、改行が表示できるコード（未完成コード）
                    // echo nl2br(htmlspecialchars($memo['memo'],ENT_HTML5));
                    // echo htmlspecialchars($memo['memo']);
                ?>
            </a></h4>
            <time><?=htmlspecialchars($memo['created']);?></time>
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