<?php
session_start();
//相対パスを変数に格納
$path = '../../';
// POSTデータをSESSION配列に格納
$_SESSION['text'] = $_POST['text'];

// print_r($_SESSION);
var_dump($_POST);
foreach($_POST as $key => $value) {
    $$key = $_POST[$key];
}

//<head>要素関係の呼び出し
$path = '../../';
$headTitle = '確認画面'; //ページタイトルを変数に格納
include_once $path. 'template/head.php';

?>
</head>
<body>
<div class="container">
    <?php
        include_once $path. 'template/header.php';
    ?>
    <div><a href="./thread.php">スレッド一覧</a></div>
    <br>
    <div class="mainWrapper">
        <section class="mainContent">
            <form method="POST" action="./success.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">スレッドタイトル</label>
                    <input type="text" name="threadTitle" readonly="readonly" value="<?=$threadTitle ?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">     
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label test">本文</label>
                    <textarea readonly class="form-control " rows="5">
<?=$text ?>
                    </textarea>
                </div>
                <div class="mainButton">
                    <button type="submit" formaction="./post.php" class="btn btn-primary">修正する</button>
                    <button type="submit" formaction= "./post_d.php" class="btn btn-primary">完了する</button>
                </div>
            </form>
        </section>        
    </div>
</div>
<!-- フッター -->
<?php
    include_once $path. 'template/footer.php';
?>
</body>
</html>
