<?php
    //githubテスト用
    $path = './';
    $headTitle = 'スタートページ'; //ページタイトルを変数に格納
    include_once './template/head.php' ;
    
?>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
    <?php
        include_once './template/header.php' ;
    ?>
    <div class="test">
        <a href="./post/post.php">テストを開始する</a>
    </div>
</div>
<?php
    include_once './template/footer.php' ;
?>  
</body>
</html>