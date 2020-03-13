<?php

require_once('Model.php');

class Task extends Model
{
    // プロパティ
    protected $table = 'tasks';

    // 新規作成に使用するメソッド
    public function create($data)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        // INSERT INTO (カラム名, ,) VALUES (値, 値, 値,)
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (title, contents, created) VALUES (?, ?, ?)');
        $stmt->execute($data);
    }

          // findByTitleを作って検索させる(findメソッド)
         // 検索機能
          public function findByTitle($date)
          {
              $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table.' WHERE title LIKE ?');
              $stmt->execute($date);
              $tasks = $stmt->fetchAll();
              return $tasks;
          }

}