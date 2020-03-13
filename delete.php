<?php

// まずは、タスクの一覧を読み込んでから削除する
require_once('Models/Task.php');

//データの受け取り
$id = $_POST['id'];

//DBからデータを削除する
// newがついたらインスタンス化
$task = new Task();
$task->delete([$id]);

// これで元のindex.phpに飛ぶようになる
header("location: index.php");
// このexitに何の意味があるのかわからない
exit;