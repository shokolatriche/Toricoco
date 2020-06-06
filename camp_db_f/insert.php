<?php
// エラー表示を有効
ini_set('display_errors',1);
//1. POSTデータ取得

//indephx.phpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$title = $_POST["title"];
$naiyou = $_POST["naiyou"]; //
$name = $_POST["name"]; //
$file_p = $_POST["file_p"]; //

//2. DB接続します 
//ここから作成したDBに接続をしてデータを登録します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//テーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO tori_table( id, title, naiyou, name, file_p,
indate )VALUES(NULL, :title, :naiyou, :name, :file_p, sysdate())");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':file_p', $file_p, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいる
//   $_SESSION['message'] = "Address saved";
  header("Location: select.php");
  exit;

}
?>
