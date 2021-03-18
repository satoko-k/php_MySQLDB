<?php

// 1.POSTでid、name,email,naiyouを取得
    $id     = $_POST["id"];
    $name   = $_POST["name"];
    $email  = $_POST["email"];
    $naiyou = $_POST["naiyou"];


// / 2:DBに接続する（エラー処理の追加）/
try {
    $pdo = new PDO('mysql:dbname=camp_testdb; charset=utf8; host=localhost','root','');
}catch(PDOException $e){
    exit('データベースに接続できませんでした:'.$e->getMessage());
}

// UPDATE
    $sql="UPDATE camp_testan_table SET name=:name, email=:email,naiyou=:naiyou WHERE id=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); //更新したいidを渡す

    $status = $stmt->execute();

// データ登録処理後
    if($status==false){
        //SQL実行時にエラーがある場合（
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //select.phpへリダイレクト
        header("Location: select.php");
        exit;

    }



?>