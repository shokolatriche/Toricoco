<!-- エラー表示を有効 -->
<?php ini_set('display_errors',1);?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
  <title>ここ見て登録</title>
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
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php" enctype="multipart/form-data">   
  <div class="form-box">
   <fieldset style="border:4px dotted grey;">
    <legend class=legend>新規ファイル登録</legend>
     <label>ファイル名：<input type="text" name="title"></label><br>
     <label>一言メモ：<br><textarea class="naiyou" name="naiyou" rows="4" cols="100"></textarea></label><br>
     <label>入力者：<input type="text" name="name"></label><br>
     <label>参照：<input type="text" name="file_p" placeholder="ファイル＃・パスなど"></label><br>
     <label><input type="file" name="file"></label>
     <input type="submit" value="Send" value="upload">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
