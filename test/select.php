<?php
    //相対パスを変数に格納
    $path = '../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    $records = $mysqli->query('SELECT * FROM text WHERE thread_id = 1');
    $record = $records->fetch_assoc();
    if ($records) {
        while($record = $records->fetch_assoc()){
            print $record['value'] . '<br>';
        }
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
    <div>

    </div>
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>