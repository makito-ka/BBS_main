<?php
    session_start();
    //相対パスを変数に格納
    $path = '../../';
    //スレッド詳細画面から遷移した場合にidを取得する
    $id = $_SESSION['id'];
    // $text = $_SESSION['text'];
    // echo $id;
    //入力フォームの値チェック（初期化）
    // include_once $path. 'function/check.php';
    // if(!isset($text)) {
    //     $text = '';
    // }
    if(!isset($_SESSION['text'])) {
        $text = '';
    } else {
        $text = $_SESSION['text'];
    }
    //データベース
    require_once $path . 'template/db.connect.php';
    $stmt = $mysqli->prepare('SELECT title FROM thread WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->bind_result($threadTitle);
    $stmt->execute();
    $stmt->fetch();
    $result = $threadTitle;
    $_SESSION['threadTitle'] = $result;
    print_r($_SESSION);
    
?>
<?php
    //<head>要素関係の呼び出し
    $headTitle = '新規投稿'; //ページタイトルを変数に格納
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
        <a href="./thread.php">スレッド一覧</a>
    </div>
    <br>
    <form action="post_c.php" method="POST">
        <div class="mb-3" >
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">スレッドタイトル</label>
                <input type="text" name="threadTitle" readonly="readonly" value="<?=$threadTitle ?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">     
            </div>
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