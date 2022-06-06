<?php
    //セッションの初期化
    session_start();
    $_SESSION = [];  //明示的に配列の要素を空にする
    session_destroy();

    //<head>要素関係の呼び出し
    $path = '../';
    $headTitle = '完了画面'; //ページタイトルを変数に格納
    include_once $path. 'template/head.php';

?>
</head>
<body>
    <div class="container">
        <?php
            include_once $path. 'template/header.php';
        ?>
        <p>投稿が完了しました
            <br>３秒後にトップページへ戻ります。戻らない場合は、下部ボタンを押してください。
        </p>
        <button type="button" onclick="location.href='./post.php'" class="btn btn-primary">トップへ戻る</button>
    </div>
<!-- フッター -->
<?php
    include_once $path. 'template/footer.php';
?>
<script>
    //自動ページ遷移
    setTimeout(function(){
    window.location.href = './post.php';
    }, 3*1000);
</script>
</body>
</html>