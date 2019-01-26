<?php
/**
 * Created by IntelliJ IDEA.
 * User: takenakariku
 * Date: 2019-01-26
 * Time: 18:39
 */
// データベースに記事を保存する処理

$post_data = $_POST;

try {

  $dbh = new PDO(
      'mysql:host=localhost;dbname=pdo_sample;charset=utf8',
      'root',
      'root',
      array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
      )
  );

  // ここに記述してください
  $prepare = $dbh->prepare('SELECT * FROM posts');
  $prepare->execute();

  $result = $prepare->fetch();
  print_r($result);

} catch (PDOException $e) {

  $error = $e->getMessage();
  var_dump($error);

}

