<?php
/**
 * Created by IntelliJ IDEA.
 * User: takenakariku
 * Date: 2019-01-30
 * Time: 14:20
 */

try {

  // データベースに接続する処理
  $dbh = new PDO(
      'mysql:host=localhost;dbname=pdo_sample;charset=utf8',
      'root',
      'root',
      array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
      )
  );

  // postsテーブルから記事データを取得し$resultに格納
  $prepare = $dbh->prepare('SELECT * FROM posts');
  $prepare->execute();

  $result = $prepare->fetchAll();

} catch (PDOException $e) {
  // 上記try文中でエラーが発生した場合の処理（データベースにつながらなかった場合など）
  $error = $e->getMessage();
  var_dump($error);
}

// resultをvar_dumpで出力
// preタグをつけると見やすくなる
echo '<pre>';
var_dump($result[0]);
echo '</pre>';

// resultを多少htmlの中に格納して表示
echo '<ul>';
foreach ($result as $item) {
  echo '<li>id: ' . $item['id'] . PHP_EOL . 'タイトル: ' . $item['title'] . PHP_EOL . '内容: ' . $item['content'];
}
echo '</ul>';
