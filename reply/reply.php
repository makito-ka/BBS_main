<?php
session_start();
$path = '../';

if(!empty($_SESSION['textReply'])) {
    $textReply = $_SESSION['textReply'];
} else {
    $textReply = '';
}

//入力フォームのvalueの値チェック関数の呼び出し
include_once $path. 'function/check.php';

//<head>要素関係の呼び出し
$headTitle = '返信入力画面'; //ページタイトルを変数に格納
include_once $path. 'template/head.php';

?>
<!--追加で必要なモノがあれば記述-->
</head>
<body>
<div class="container">
    <?php
        include_once $path. 'template/header.php';
    ?>
    <div class="mainWrapper">
        <section class="mainContent">
            <form action="./fix.php" method="POST" id="from">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <div class="form-control fixBackground">
                        返信元内容を表示する
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">返信内容<span class="badge rounded-pill bg-primary badgeAlert">必須</span></label>
                    <textarea name="textReply" required class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="本文を入力してください"><?=$textReply?></textarea>

                </div>
                <div class="mainButton">
                    <button type="submit" class="btn btn-primary">確認画面へ</button>
                </div>
            </form>
            <div class="mainButton-test">
                <a href="../post/post.php" class="btn btn-primary">
                    <?php
                        if(!empty($_SESSION)) {
                            $_SESSION = [];
                        }
                        echo '新規投稿画面（本番時削除）';
                    ?>
                </a>
            </div>
        </section>
    </div>
</div>
<?php
    include_once $path. 'template/footer.php';
?>
</body>
</html>
