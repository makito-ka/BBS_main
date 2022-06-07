<?php
    //相対パスを変数に格納
    $path = '../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
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
    <div>
        <!-- <?php //「query()を使用した場合」
        // $ret = $mysqli->query('INSERT INTO memos(memo) VALUES ("PHPからメモを値を入力")');
        // if($ret) {
        //     echo 'データの挿入が完了';
        // } else {
        //     echo $mysqli->error;
        // }
        ?> -->

        <?php
            $value = 'prepareを利用2';
            $stmt = $mysqli->prepare('INSERT INTO memos(memo) VALUES (?)');
            $stmt->bind_param('s', $value);
            $ret = $stmt->execute();
            if($ret) {
                echo 'データの挿入が完了';
            } else {
                echo $mysqli->error;
            }
        ?>
    </div>
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>