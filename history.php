<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<main>
<div id="history" class="wrapper">
<h2>購入履歴</h2>
<div id="historyabout" class="wrapper">
<?php
if (isset($_SESSION['customer'])) {
	$pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                'xslive230801_miz', 'livebusiness');
	$sql_purchase=$pdo->prepare(
		'select * from purchase where customer_id=? order by id desc');
	$sql_purchase->execute([$_SESSION['customer']['id']]);
	foreach ($sql_purchase as $row_purchase) {
		$sql_detail=$pdo->prepare(
			'select * from purchase_detail,product '.
			'where purchase_id=? and product_id=id');
		$sql_detail->execute([$row_purchase['id']]);
		echo '<table id="table_history" class="wrapper">';
        echo '<tr><th>商品番号</th><th>商品写真</th><th>商品名</th>';
        echo '<th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
		$total=0;
		foreach ($sql_detail as $row_detail) {
			echo '<tr>';
			echo '<td>', $row_detail['id'], '</td>';
			echo '<td>';
            echo '<p><img alt="image" src="image/', $row_detail['id'], '.png"></p>';
            echo '</td>';
			echo '<td><a href="detail.php?id=', $row_detail['id'], '">', 
				$row_detail['name'], '</a></td>';
			echo '<td>', $row_detail['price'], '</td>';
			echo '<td>', $row_detail['count'], '</td>';
			$subtotal=$row_detail['price']*$row_detail['count'];
			$total+=$subtotal;
			echo '<td>', $subtotal, '円', '</td>';
			echo '</tr>';
		}
		echo '<tr class="total"><td>合計</td><td></td><td></td><td></td><td></td><td>', 
			$total, '円', '</td></tr>';
		echo '</table>';
		echo '<hr>';
	}
} else {
	echo '<div id="historyin" class="wrapper">';
	echo '購入履歴を表示するには、ログインしてください。';
	echo '</div>';
    echo '<hr>';
}
?>
</div>
</div>
</main>
<?php require 'footer.php'; ?>
