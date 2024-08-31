
    <h2>カート</h2>
<div id="cart" class="wrapper">
    <?php
    if (!empty($_SESSION['product'])) {
        echo '<table id="table_cart" class="wrapper">';
        echo '<tr><th>商品番号</th><th>商品写真</th><th>商品名</th>';
        echo '<th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
        $total=0;
        foreach ($_SESSION['product'] as $id=>$product) {
            echo '<tr>';
            echo '<td>', $id, '</td>';
            echo '<td>';
            echo '<p><img alt="image" src="image/', $id, '.png"></p>';
            echo '</td>';
            echo '<td><a href="detail.php?id=', $id, '">', 
                $product['name'], '</a></td>';
            echo '<td>', $product['price'], '円', '</td>';
            echo '<td>', $product['count'], '</td>';
            $subtotal=$product['price']*$product['count'];
            $total+=$subtotal;
            echo '<td>', $subtotal, '円', '</td>';
            echo '<td><a href="cart-dalete.php?id=', $id, '">削除</a></td>';
            echo '</tr>';
        }
        echo '<tr class="total"><td>合計</td><td></td><td></td><td></td><td></td><td>', $total, '円', 
            '</td><td></td></tr>';
        echo '</table>';
    } else {
        echo '<div id="error" class="wrapper">';
        echo '<p>カートに商品はありません。</p>';
        echo '</div>';
        echo '<hr>';
    }
    ?>
</div>