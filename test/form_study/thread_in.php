<?php
    // session_start();
    //相対パスを変数に格納
    $path = '../../';
    //データベースログイン
    require_once $path . 'template/db.connect.php';
    //入力フォームの値チェック（初期化）
    include_once $path. 'function/check.php';

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
        <a href="./thread.php">スレッド一覧</a> |
        <br>
        <a href="./index.php">（テストデータ一覧表示）</a>
    </div>
    <div>入力フォーム</div>
    <form action="thread_in_c.php" method="POST">
    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">スレッドタイトル<span class="badge rounded-pill bg-primary badgeAlert">必須</span></label>
                    <input type="text" name="threadTitle" value="<?=$threadTitle ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="スレッドタイトルを入力してください">     
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">本文<span class="badge rounded-pill bg-primary badgeAlert">必須</span></label>
                    <textarea name="text" required class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="本文を入力してください"><?=$text ?></textarea>

                </div>
                <div class="mainButton">
                    <button type="submit" class="btn btn-primary">確認画面へ</button>
                </div>
    </form>
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>