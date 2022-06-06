<?php
    //相対パスを変数に格納
    $path = '../';
    //データベース接続
    require_once $path . 'template/db.connect.php';
    $result = $mysqli->query('SELECT COUNT(*) FROM thread');
    $test = $result->fetch_assoc();
    print_r($test);
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

    </div>
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>