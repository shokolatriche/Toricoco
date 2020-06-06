<?php
//1.id値を取得
$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


//3.SELECT * FROM tori_table WHERE id=:id;
$sql = "SELECT * FROM tori_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

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
  <link rel="stylesheet" href="css/style2.css">
  <title>ファイル詳細</title>
</head>
<body>

<!-- Head[Start] -->
<header class="header1">
  <div class="box1">
  <h1 class=h1>ToriCoco</h1>
  </div>
 
  <div class="f-container">
        <nav class="nav-outer">
            <div　class=nav-item><a href="select.php">ファイル一覧</a></div> 
        </nav>
  </div>

</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" enctype="multipart/form-data">   
  <div class="form-box">
   <fieldset style="border:4px dotted grey;">
    <legend class=legend>ファイル情報</legend>
     <label class=title>ファイル名：<?=$row["title"]?></label><br>
     <label class=naiyou>一言メモ：<?=$row["naiyou"]?></label><br>
     <label class=name>入力者：<?=$row["name"]?></label><br>
     <label class=file_p>参照：<?=$row["file_p"]?></label><br>
     <label class=indate>登録日：<?=$row["indate"]?></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
