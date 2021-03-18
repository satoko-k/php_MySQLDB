<?php

/////////////////////////
// データの抽出
///////////////////////

// 1:DBに接続する（エラー処理の追加）　insert.phpと同じ

try {
    $pdo = new PDO('mysql:dbname=camp_testdb; charset=utf8; host=localhost','root','');
}catch (PDOException $e){
    exit('DbConnectError:'.$e->getMessage());
}


//2：データ登録のSQL作成[選択]

    $stmt = $pdo->prepare("SELECT * FROM camp_testan_table");

    // SQLの実行
    $status = $stmt->execute();



// 3.データの表示
$view = "";
if($status==false){
    //execute (SQL実行時にErrorがある場合）
    $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);   //"ErrorQuery:"を日本語にしてもＯＫ「sqlエラーです」
} else {
    //Selectデータの数だけ自動でループして$resultに入れてくれる
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        // $view .= "<p>".$result["id"]."-".$result["name"]."</p>";    //「.=」で追加　「=」だと上書きしてしまう
        $view .='<p>';
        $view .='<a href="u_view.php? id='.$result["id"].'">';
        $view .= $result["indate"]." : " .$result["name"];
        $view .='</a>';
        $view .='</p>';

    }
}
    // ＄viewを表示したいところでechoする。



?>



<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>データの抽出表示</title>
  </head>
  <body>
  <div class="wrapper">
    <header>
      <nav>
        <div class="navbar-header">
          <a class="navbar-brand" href="select.php">データ一覧</a>
        </div>
      </nav>
    </header>
  <main>
      <div class="container"><?=$view?></div>
      <!-- echo〜　の省略 --> 

    </main>
   </div>
  </body>
</html>
