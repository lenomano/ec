<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'menu.php' ?>

<?php
if (isset($_SESSION['customer'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                'xslive230801_miz', 'livebusiness');
    $sql=$pdo->prepare(
        'delete from favorite where customer_id=? and product_id=?');
    $sql->execute([$_SESSION['customer']['id'],$_REQUEST['id']]);
    echo '<div id="favodelete" class="wrapper">';
    echo 'お気に入りから削除しました。';
    echo '</div>';
    echo '<hr>';
} else {
    echo '<div id="error" class="wrapper">';
    echo 'お気に入りから削除するには、ログインしてください。';
    echo '<p><a href="login-input.php">ログイン</a></p>';
    echo '<p><a href="login-input.php">新規登録</a></p>';
    echo '</div>';
    echo '<hr>';
}
require 'favorite.php';
?>
<?php require 'footer.php' ?>