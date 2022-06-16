<?php
    session_start();
    //相対パスを変数に格納
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
    //入力フォームから入力された値を変数に代入
    $memo = filter_input(INPUT_POST, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);
    //改行や空欄が変換されDBに登録される。（&#13;&#10; など）

    //以下の二つを利用すれば、改行や空白はそのままDBへ登録される（二つは記述方法は違うが同じ動きをしている）
    // $memo = filter_input(INPUT_POST, 'memo');　←フィルタの型を設定していないため実質フィルターをかけていないことになる。
    // $memo = $_POST['memo'];


    echo $memo;
    //
    $stmt = $mysqli->prepare('INSERT INTO memos(memo) VALUES (?)');
    if(!$stmt) {
        die($mysqli->error);
    }
    $stmt->bind_param('s', $memo);
    $ret = $stmt->execute();

    if($ret) {
        echo '登録完了';
    } else {
        echo $mysqli->error;
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
    <a href="./index.php">最初に戻る</a>
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>