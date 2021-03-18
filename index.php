


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
      <form method="post" action="insert.php">
        <div class="jumbotron">
      <!-- fieldsetは<form>タグで定義するフォームの入力項目をグループ化するためのタグ。
      グループ化するとグループ間をtabキーで移動することが可能になる -->
        <fieldset>
          <!-- <legend>タグでグループ化されたフォームにタイトルを付けられる -->
            <legend>フリーアンケート</legend>
            <label for="">名前：<input type="text" name="name" /></label><br />
            <label for="">Email:<input type="text" name="email" /></label><br />
            <label for="">
              <textarea name="naiyou" rows="4" cols="40"></textarea></label
            ><br />
            <input type="submit" value="送信" />
          </fieldset>
        </div>
      </form>
    </main>
   </div>
  </body>
</html>
