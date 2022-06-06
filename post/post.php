<?php
session_start();
$path = '../';

//githubテスト用
    //ファーストコミット後にファイルを更新した
    
//SSH認証通過したかテスト

//入力フォームのvalueの値チェック関数の呼び出し
// include_once $path. 'function/check.php';
include_once $path. 'function/check.php';
//<head>要素関係の呼び出し
$headTitle = '簡易掲示板'; //ページタイトルを変数に格納
include_once $path. 'template/head.php';

?>
<!--追加で必要なモノがあれば記述-->
</head>
<body>
<div class="container">
    <?php
        include_once $path. 'template/header.php'; //<header>テンプレート呼び出し
    ?>
    <div class="mainWrapper">
        <section class="mainContent">
            <form action="./fix.php" method="POST" id="from">
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
            <div class="mainButton-test">
                <a href="<?=$path ?>reply/reply.php" class="btn btn-primary">
                    <?php
                        if(!empty($_SESSION)) {
                            $_SESSION = [];
                        }
                        echo '返信画面へ（本番時削除）';
                    ?>
                </a>
            </div>
        </section>
    </div>
</div>
<?php
    include_once $path. 'template/footer.php';//<footer>テンプレート呼び出し
?>
</body>
</html>
