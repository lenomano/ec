<!-- 呼び出し号令↓-->
<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'menu.php' ?>'

<?php
// 顧客(customer)情報を呼び出し↓
unset($_SESSION['customer']);
// PDOを使ってxslive230801_mizumotoデータベースに接続↓
$pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                'xslive230801_miz', 'livebusiness');
// ログイン名とパスワードの組み合わせを検索する為の分↓
$sql = $pdo->prepare('select * from customer where login=:login and password=:password');
$sql->bindValue(':login', $_REQUEST['login'], PDO::PARAM_STR);
$sql->bindValue(':password', $_REQUEST['password'], PDO::PARAM_STR);
$sql->execute();
foreach ($sql as $row) {
    // SESSION(=customer)に顧客情報を格納
    $_SESSION['customer']=[
        'id'=>$row['id'], 'name'=>$row['name'],
        'address'=>$row['address'], 'login'=>$row['login'],
        'password'=>$row['password']
    ];
}
if (isset($_SESSION['customer'])) {
    echo '<div id="thx" class="wrapper">';
    echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
    echo '</div>';
    echo '<hr>';
} else {
    echo '<div id="error" class="wrapper">';
    echo 'ログイン名またはパスワードが違います。'; 
    echo '</div>';
    echo '<hr>';
}
?>
<?php require 'footer.php' ?>