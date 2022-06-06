<?php
    //相対パスを変数に格納
    $path = '../';
    //<head>要素関係の呼び出し
    $headTitle = '簡易掲示板'; //ページタイトルを変数に格納
    include_once $path . 'template/head.php';
?>
</head>
<body>
<div class="container">
    <?php
        include_once $path . 'template/header.php';
    ?>
<!-- メインコンテンツ入力 -->
</div>
<?php
    include_once $path . 'template/footer.php';
?>  
</body>
</html>