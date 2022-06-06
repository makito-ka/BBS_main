<?php
session_start();

//POSTデータをSESSION配列に格納
$_SESSION = [
    'textReply' => $_POST['textReply'],
];

foreach($_POST as $key => $value) {
    $$key = $_POST[$key];
}

//<head>要素関係の呼び出し
$path = '../';
$headTitle = '確認画面'; //ページタイトルを変数に格納
include_once '../template/head.php';

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
            <form method="POST" action="./success.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <div class="form-control fixBackground">
                        返信元内容を表示する
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label test">返信内容</label>
                    <textarea readonly class="form-control" rows="5">
<?=$textReply ?>
                    </textarea>
                </div>
                <div class="mainButton">
                    <button type="submit" formaction="./reply.php" class="btn btn-primary">修正する</button>
                    <button type="submit" formaction= "<?=$path ?>post/success.php" class="btn btn-primary">完了する</button>
                </div>
            </form>
        </section>
    </div>
</div>
<!-- フッター -->
<?php
    include_once $path.     'template/footer.php';
?>
</body>
</html>
