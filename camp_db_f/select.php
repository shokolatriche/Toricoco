<?php
// エラー表示を有効
ini_set('display_errors',1);
//1.  DB接続します 
try {
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  
//日付が新しい順に表示
$stmt = $pdo->prepare("SELECT * FROM tori_table ORDER BY indate DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  //phpの文字列の連結は「ドット」を使って行います
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p class="file">';
    // $view .="ファイル名：";
     //リンク作成
    $view .='<a href="show.php?id='.$result["id"].'">';
    $view .=$result["title"];
    $view .='</a>';
    $view .= "</p>";
    $view .= "<p>";
    $view .=$result["naiyou"];
    $view .= "</p>";
    $view .= "<p>";
    // $view .="入力者:".$result["name"]."  (".$result["indate"].")  ";
    $view .='<a href="u_view.php?id='.$result["id"].'">';
    $view .='<button class="btn_ud" type="submit" name="Update" >Update</button>  ';
    $view .='</a>';
    $view .='  ';
    $view .='<a href="delete.php?id='.$result["id"].'">';
    $view .='<button class="btn_d" type="submit" name="Delete" style="background: #dc143c;" >Delete</button>';
    $view .='</a>'."<br>";
    $view .='<p class="border">';
    $view .="-------------------";
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
<title>ここ見て表示</title>

</head>
<body id="main">

<!-- Head[Start] -->
<header class="header1">
  <div class="box1">
    <h1 class=h1>ToriCoco</h1>
  </div>

  <div class="f-container">
        <nav class="nav-outer">
            <div　class=nav-item><a href="index.php">新規ファイル登録</a></div>
        </nav>
  </div>

</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div>
<h1 class=sel_h>注）詳細はファイル名をクリック</h1>

    <div class="container_jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->
<!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>


</script>

</body>
</html>
