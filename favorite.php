<main>
<div id="favorite" class="wrapper">
<h2>お気に入り</h2>
<?php
if (isset($_SESSION['customer'])) {
    echo '<table id="table_favo" class="wrapper">';
    echo '<tr><th>商品番号</th>
                    <th>商品写真</th>
                    <th>商品名</th>
                    <th>価格</th>
             </tr>';
    $pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                    'xslive230801_miz', 'livebusiness');
    $sql=$pdo->prepare(
        'select * from favorite, product '.
        'where customer_id=? and product_id=id');
    $sql->execute([$_SESSION['customer']['id']]);
    foreach ($sql as $row) {
        $id=$row['id'];
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td>';
        echo '<p><img alt="image" src="image/', $id, '.png"></p>';
        echo '</td>';
        echo '<td>';
        echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
        echo '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td><a href="fovorite-delete.php?id=', $id,
                '">削除</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<div id="favoriteabaut" class="wrapper">';
    echo 'お気に入りに商品を追加するには、ログインしてください。';
    echo '<p><a href="login-input.php" class="favobuttan">ログイン</a></p>';
    echo '<p><a href="signin-input.php" class="favobuttan">新規登録</a></p>';
    echo '</td>';
}
?>
    </div>
    </main>