<?php session_start(); ?>

<?php require 'header.php' ?>
<?php require 'menu.php' ?>

<div id="customer" class="wrapper">
        <h2>お客様情報</h2>
        <div id="comment" class="wrapper">
          <p>情報変更をご希望の場合は、変更したい項目の欄に<br>
            直接新しい情報を打ち込んでください。</p>
		</div>
		<div id="customer_table" class="wrapper">
	<?php
	// 顧客情報を更新(変更)する場合、現在登録している
	// 顧客情報を表示したうえで変更が必要な箇所だけ
	// ユーザーに変更してもらう
	$name=$address=$login=$password='';
	if (isset($_SESSION['customer'])) {
		$name=$_SESSION['customer']['name'];
		$address=$_SESSION['customer']['address'];
		$login=$_SESSION['customer']['login'];
		$password=$_SESSION['customer']['password'];
	}

	echo '<form action="customer-output.php" method="post">';
	echo '<table id="customer" class="wrapper">';
	echo '<tr><th>お名前</th><td>';
	echo '<input type="text" name="name" value="', $name, '">';
	echo '</td></tr>';
	echo '<tr><th>ご住所</th><td>';
	echo '<input type="text" name="address" value="', $address, '">';
	echo '</td></tr>';
	echo '<tr><th>ログイン名</th><td>';
	echo '<input type="text" name="login" value="', $login, '">';
	echo '</td></tr>';
	echo '<tr><th>パスワード</th><td>';
	echo '<input type="password" name="password" value="', $password, '">';
	echo '</td></tr>';
	echo '</table>';
	echo '<div class="button-panel">';
	echo '<input type="submit" id="okbtn" class="wrapper" title="sigin" value="確定"></input>';
	echo '</div>';
	echo '</form>';
	?>
	</div>
</div>
</main>
<p id="page-top"><a href="#">TOP</a></p>
<?php require 'footer.php' ?>