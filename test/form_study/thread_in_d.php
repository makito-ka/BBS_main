<?php
    session_start();

    //相対パスを変数に格納
    $path = '../../';
    
    //データベース関係
    require_once $path . 'template/db.connect.php';
    
    //入力でーたのサニタイズ
    foreach($_SESSION as $key => $value) {
        $sanitize = htmlspecialchars($_SESSION[$key]);
        $$key =  str_replace(array("\r\n","\r"), "\n", $sanitize);
    }

    //スレッドタイトルを入力=>OK
    $stmt = $mysqli->prepare('INSERT INTO thread (id, title, time) VALUES (NULL, ?, CURRENT_TIMESTAMP)');
    $stmt->bind_param('s', $threadTitle);
    $stmt->execute();
    $stmt->close();

    //threadテーブルから入力したスレッドタイトルのidを取得する=> OK
    $stmt = $mysqli->prepare('SELECT id FROM thread WHERE title = ?');
    $stmt->bind_param('s', $threadTitle);
    $stmt->bind_result($thread_id);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();
    
    $stmt = $mysqli->prepare('INSERT INTO text (id, thread_id, value, time) VALUES (NULL, ?, ?, CURRENT_TIMESTAMP)');
    $stmt->bind_param('is', $thread_id, $text);
    $stmt->execute();
    

    //データベース関係
    //入力フォームから入力された値を変数に代入
    // $threads = filter_input($db_input, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);
    //（このやり方だと改行や空欄が変換されDBに登録される。変換されて登録された）
    // $memo = filter_input($db_input, 'memo');
    // $memo = $_POST['memo'];

    //セッションの初期化
    $_SESSION = [];  //明示的に配列の要素を空にする
    session_destroy();
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