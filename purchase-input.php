<?php session_start(); ?>

<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo '<div id="error" class="wrapper">';
	echo '購入手続きを行うにはログインしてください。';
	echo '</div>';
    echo '<hr>';
} else 
if (empty($_SESSION['product'])) {
	echo '<div id="zerocart" class="wrapper">';
	echo 'カートに商品がありません。';
	echo '</div>';
	echo '<hr>';
} else {
	echo '<div id="profile" class="wrapper">';
	echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
	echo '</div>';
	echo '<hr>';
	require 'cart.php';
	echo '<hr>';
	echo '<div id="confirmation" class="wrapper">';
	echo '<p>内容をご確認いただき、購入を確定してください。</p>';
	echo '<a href="purchase-output.php" class="gobtn">購入を確定する</a>';
	echo '</div>';
}
?>
<?php require 'footer.php'; ?>
