<?php
    //相対パスを変数に格納
    $path = '../../';
    //データベース関係
    require_once $path . 'template/db.connect.php';
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
    <div>入力フォーム</div>
    <form action="input_do.php" method="POST">
        <textarea name="memo" cols="50" rows="10" placeholder="メモを入力してください"></textarea>
        <br>
        <button type="submit">登録する</button>
    </form>
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>