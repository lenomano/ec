<?php session_start(); ?>

<?php require 'header.php' ?>
<?php require 'menu.php' ?>

<?php
// ログイン状態かチェック
if (isset($_SESSION['customer'])) {
    // ログイン状態の場合
    $pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                    'xslive230801_miz', 'livebusiness');
    // // 既にお気に入りに登録されているか確認
    // // 顧客IDと商品IDが一致するものがあるか検索
    $sql=$pdo->prepare(
		'select * from favorite where customer_id = ? AND product_id = ?');
    $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);


    if(!empty($sql->fetchAll())) {
        // データが存在する場合
        echo '<div id="thx" class="wrapper">';
        echo '既にお気に入りに登録されています。';
        echo '</div>';
        echo '<hr>';
    } else {
        // データが存在しない場合（未登録）
        // 登録処理
        $sql=$pdo->prepare('insert into favorite values(?,?)');
        $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
        echo '<div id="thx" class="wrapper">';
        echo 'お気に入りに商品を追加しました。';
        echo '</div>';
        echo '<hr>';
    }
    require 'favorite.php';
} else {
    // 未ログイン状態の場合
    echo 'お気に入りに商品を追加するには、ログインしてください。';
    echo '<p><a href="login-input.php">ログイン</a></p>';
    echo '<p><a href="signin-input.php">新規登録</a></p>';
}
?>
