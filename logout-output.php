<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'menu.php' ?>

<?php
if (isset($_SESSION['customer'])) {
    // unseetを使用して顧客情報が格納された
    // ($_SESSION['customer'])を削除↓
    unset($_SESSION['customer']);
    echo '<div id="thx" class="wrapper">';
    echo 'ログアウトしました。';
    echo '</div>';
    echo '<hr>';
} else {
    echo '<div id="error" class="wrapper">';
    echo '既にログアウトしています。';
    echo '</div>';
    echo '<hr>';
}
?>
<?php require 'footer.php' ?>