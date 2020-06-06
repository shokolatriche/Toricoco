<?php
// エラー表示を有効
ini_set('display_errors',1);
// include("function.php");

//1.POSTでid値を取得
$id = $_POST["id"];
$title = $_POST["title"];
$naiyou = $_POST["naiyou"];
$name = $_POST["name"];
$file_p = $_POST["file_p"];
// $indate = $_POST["indate"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.UPDATE tori_table SET ....; で更新(bindValue)
$sql = "UPDATE tori_table SET title=:title, naiyou=:naiyou, name=:name, file_p=:file_p WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title',  $title,   PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou,  PDO::PARAM_STR);
$stmt->bindValue(':name',   $name,    PDO::PARAM_STR);
$stmt->bindValue(':file_p', $file_p,  PDO::PARAM_STR);
// $stmt->bindValue(':indate', $indate,    PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);    //更新したいidを渡す
$status = $stmt->execute();

//　基本的にinsert.phpの処理の流れです。xx_tableは変更してください！項目もDBの項目に合わせてください！
// $stmt = $pdo->prepare("UPDATE tori_table SET title=:title, naiyou=:naiyou, name=:name, file_p=:file_p, WHERE id=:id");

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: select.php");
  exit;

}

// ここで処理を表示されているphpに飛ばす
// if($status==false){
//   queryError($stmt);
// }else{
//   header("Location: select.php");
//   exit;
// }
?>