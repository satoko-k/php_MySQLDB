<?php
//////////////////////////////
/////更新ページ　id値をゲットしてid値を元にデータ抽出する
//////////////////////////////

// 1:GETでid値を取得する POSTはidがついてこないのでNGだそう
    $id = $_GET["id"];
    echo $id;

// / 2:DBに接続する（エラー処理の追加）/
    try {
        $pdo = new PDO('mysql:dbname=camp_testdb; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('データベースに接続できませんでした:'.$e->getMessage());
    }
// 3. SQL作成　SELECT*FROM 
    $sql="SELECT * FROM camp_testan_table WHERE id=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT); //文字列の場合はPDO::PARAM_STR　にする
    //bindValue(バインド変数, 変数, dataType);

    // SQLの実行
    $status = $stmt->execute();

// 4.データ表示
    $view ="";
    if($status==false){
        //SQL実行時にエラーがある場合（
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //1データのみ抽出の場合はwhileループは使わない。
        $row = $stmt->fetch();
    
    }

?>



<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>データの登録</title>
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
      <form method="post" action="update.php">
        <div class="jumbotron">
      <!-- fieldsetは<form>タグで定義するフォームの入力項目をグループ化するためのタグ。
      グループ化するとグループ間をtabキーで移動することが可能になる -->
        <fieldset>
          <!-- <legend>タグでグループ化されたフォームにタイトルを付けられる -->
            <legend>フリーアンケート</legend>
            <label for="">名前：<input type="text" name="name" value="<?=$row["name"]?>"/></label><br />
            <label for="">Email:<input type="text" name="email" value="<?=$row["email"]?>"/></label><br />
            <label for="">
              <textarea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textarea></label
            ><br />
            <input type="hidden" name="id" value="<?=$row["id"] ?>" />
            <input type="submit" value="送信" />
          </fieldset>
        </div>
      </form>
    </main>
   </div>
  </body>
</html>
