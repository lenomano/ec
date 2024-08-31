<?php session_start(); ?>

<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
				'xslive230801_miz', 'livebusiness');
$purchase_id=1;
foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id=$row['max(id)']+1;
}
$sql=$pdo->prepare('insert into purchase values(?,?)');
if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
	foreach ($_SESSION['product'] as $product_id=>$product) {
		$sql=$pdo->prepare('insert into purchase_detail values(?,?,?)');
		$sql->execute([$purchase_id, $product_id, $product['count']]);
	}
	unset($_SESSION['product']);
	echo '<div id="thx" class="wrapper">';
	echo '購入手続きが完了しました。ありがとうございます。';
	echo '</div>';
    echo '<hr>';
} else {
	echo '<div id="error" class="wrapper">';
	echo '購入手続き中にエラーが発生しました。申し訳ございません。';
	echo '</div>';
    echo '<hr>';
}
?>
<?php require 'footer.php'; ?>
