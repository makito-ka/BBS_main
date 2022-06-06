<?php

//投稿内容の存在チェック
if(!empty($_SESSION)) {
    foreach($_SESSION as $key => $value) {
        $$key = $_SESSION[$key];
    }
} else {
    $threadTitle = '';
    $text = '';
}

?>
