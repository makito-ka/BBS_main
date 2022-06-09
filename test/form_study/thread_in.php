<?php
    session_start();
    //相対パスを変数に格納
    $path = '../../';
    
    
    //上のやつの関数
    // if(!empty($_SESSION)) {
    //     foreach($_SESSION as $key => $value) {
    //         $$key = $_SESSION[$key];
    //     }
    // } 

    //入力フォームの値チェック（スレッド詳細ページから遷移した場合に初期化する）
    var_dump($_SESSION);
    if(isset($_SESSION['id'])) {
        $_SESSION = [];
        $threadTitle = '';
        $text = '';
    }
    var_dump($_SESSION);
    //入力フォームの値チェック
    include_once $path. 'function/check.php';
    

    // if(isset($_SESSION['text'])) {
    //     $text = $_SESSION['text'];
    // } else {
    //     $text = '';
    // }
    
    // var_dump($_SESSION['id']);
    // var_dump($_SESSION);
    // print_r($_SESSION);

    // if(!empty($_SESSION)) {
    //     foreach($_SESSION as $key => $value) {
    //         $$key = $_SESSION[$key];
    //     }
    // } else {
    //     $threadTitle = '';
    //     $text = '';
    // }
    
    // var_dump($threadTitle);
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
        <a href="./thread.php">スレッド一覧</a>
    </div>
    <br>
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