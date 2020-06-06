<?php
// エラー表示を有効
ini_set('display_errors',1);
// include("function.php");
//1.id値を取得
$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
return $pdo;
}



//3.SELECT * FROM tori_table WHERE id=:id;
$sql = "SELECT * FROM tori_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.データ表示
$view=" ";
if($status==false) {
//   //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
//   queryError($stmt);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>ここ見て内容＆アップデート</title>
</head>
<body>

<!-- Head[Start] -->
<header class="header1">
  <div class="box1">
  <h1 class=h1>ToriCoco</h1>
  </div>

  <div class="f-container">
        <nav class="nav-outer">
            <!-- <div　class=nav-item><a href="index.php">引き継ぎ入力</a></div> -->
            <div　class=nav-item><a href="select.php">ファイル一覧</a></div>
        </nav>
  </div>

</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" enctype="multipart/form-data">   
  <div class="form-box">
    <fieldset style="border:4px dotted grey;">
    <legend class=legend>ファイル更新</legend>
     <label>ファイル名：<input type="text" name="title" value="<?=$row["title"]?>"></label><br>
     <label>一言メモ：<br><textarea class="naiyou" name="naiyou" rows="4" cols="100"><?=$row["naiyou"]?></textarea></label><br>
     <label>入力者：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>参照：<input type="text" name="file_p" value="<?=$row["file_p"]?>"></label><br>
     <!-- <label><input type="file" name="file"></label> -->
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="Send" value="upload">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
