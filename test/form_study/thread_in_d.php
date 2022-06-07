<?php
    
    // <?php
    // //セッションの初期化
    // session_start();
    // $_SESSION = [];  //明示的に配列の要素を空にする
    // session_destroy();

    //相対パスを変数に格納
    $path = '../../';


    //データベース関係
    require_once $path . 'template/db.connect.php';
    //入力フォームから入力された値を変数に代入
    // $ = filter_input(INPUT_POST, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);
    //（このやり方だと改行や空欄が変換されDBに登録される。変換されて登録された）
    // $memo = filter_input(INPUT_POST, 'memo');
    // $memo = $_POST['memo'];


    // echo $memo;
    // //
    // $stmt = $mysqli->prepare('INSERT INTO memos(memo) VALUES (?)');
    // if(!$stmt) {
    //     die($mysqli->error);
    // }
    // $stmt->bind_param('s', $memo);
    // $ret = $stmt->execute();

    // if($ret) {
    //     echo '登録完了';
    // } else {
    //     echo $mysqli->error;
    // }
?>
<?php
//<head>要素関係の呼び出し
$path = '../../';
$headTitle = '登録完了'; //ページタイトルを変数に格納
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
        <button type="button" onclick="location.href='./thread_in.php'" class="btn btn-primary">トップへ戻る</button>
    </div>
<!-- フッター -->
<?php
    include_once $path. 'template/footer.php';
?>
<!-- <script>
    //自動ページ遷移
    setTimeout(function(){
    window.location.href = './post.php';
    }, 3*1000);
</script> -->
</body>
</html>