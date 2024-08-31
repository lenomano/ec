<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<?php
// データベースに接続↓
$pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                'xslive230801_miz', 'livebusiness');

// ログイン状態の判定 ↓
if (isset($_SESSION['customer'])) {
    $id=$_SESSION['customer']['id'];
    // ログイン状態の場合、
    // ユーザー以外に同じIDを使っているユーザーを検索
    $sql=$pdo->prepare('select * from customer where id!=:id and login=:login');
    $sql->bindValue(':id', $id, PDO::PARAM_STR);
    $sql->bindValue(':login', $_REQUEST['login'], PDO::PARAM_STR);
    $sql->execute();
} else {
    // ログイン状態でない場合、
    // 同じログイン名を使っているユーザーを検索
    $sql=$pdo->prepare('select * from customer where login=:login');
    $sql->bindValue(':login', $_REQUEST['login'], PDO::PARAM_STR);
    $sql->execute();
}
// 検索結果が空か検索する
if (empty($sql->fetchAll())) {
    if (isset($_SESSION['customer'])) {
        // ログインしている場合には
        // データベースを更新(変更)する↓
        $sql=$pdo->prepare('update customer set 
                            name=:name,
                            address=:address,
                            login=:login,
                            password=:password where id=:id');
        // 顧客名、住所、ログイン名、パスワード、顧客番号(ID)を
        // 指定して実行する↓
        $sql->bindValue(':name', $_REQUEST['name'], PDO::PARAM_STR);
        $sql->bindValue(':address', $_REQUEST['address'], PDO::PARAM_STR);
        $sql->bindValue(':login', $_REQUEST['login'], PDO::PARAM_STR);
        $sql->bindValue(':password',  $_REQUEST['password'], PDO::PARAM_STR);
        $sql->bindValue(':id', $id, PDO::PARAM_STR);
        $sql->execute();
            
        // データベースを更新(変更)後、
        // セッションデータも最新の情報に更新する↓
        $_SESSION['customer']=[
                                'id'=>$id, 'name'=>$_REQUEST['name'],
                                'address'=>$_REQUEST['address'],
                                'login'=>$_REQUEST['login'], 
                                'password'=>$_REQUEST['password']];
        
        echo 'お客様情報を更新しました。';
    } else {
        // データベースに顧客情報を登録する↓
        $sql=$pdo->prepare('insert into 
                            customer values(null, :name, :address, :login, :password)');
        $sql->bindValue(':name', $_REQUEST['name'], PDO::PARAM_STR);
        $sql->bindValue(':address', $_REQUEST['address'], PDO::PARAM_STR);
        $sql->bindValue(':login', $_REQUEST['login'], PDO::PARAM_STR);
        $sql->bindValue(':password',$_REQUEST['password'], PDO::PARAM_STR);
        $sql->execute();
                        
        echo '<div id="thx" class="wrapper">';
        echo 'お客様情報を登録しました。';
        echo '<br>';
        echo 'ログイン画面からログインしてください。';
        echo '</div>';
        echo '<hr>';
    }
} else {
    echo '<div id="error" class="wrapper">';
    echo 'ログイン名が既に使用されていますので、変更してください。';
    echo '</div>';
    echo '<hr>';
}
?>
<?php require 'footer.php' ?>
