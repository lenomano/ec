<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<main>

    <div item="item" class="wrapper">
        <h2> 商品ページ</h2>
            <?php
           $pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                            'xslive230801_miz', 'livebusiness');
            $sql=$pdo->prepare('select * from product where id=?');
            $sql->execute([$_REQUEST['id']]);
            foreach ($sql as $row) {
                echo '<div id="itemabout" class="wrapper">';

                echo '<p class="itemimg"><img alt="image" src="image/', $row['id'], '.png"></p>';
                
                echo '<div class="itemtext">';
                echo '<h3>商品詳細</h3>';
                echo '<form action="cart-insert.php" method="post">';
                echo '<p>商品番号:', $row['id'], '</p>';
                echo '<p>商品名:', $row['name'], '</p>';
                echo '<p>価格:', $row['price'], '</p>';
                echo '<div class="select-wrapper">';
                echo '<select name="count">';
                echo '<option value="" hidden>個数を選択</option>';
                for ($i=1; $i<=10; $i++) {
                    echo '<option value="', $i, '">', $i, '</option>';
                
                }
                echo '</select>';
                echo '</div>';
                echo '<input type="hidden" name="id" value="', $row['id'], '">';
                echo '<input type="hidden" name="name" value="', $row['name'], '">';
                echo '<input type="hidden" name="price" value="', $row['price'], '">';
                echo '<p><input type="submit" value="カートに追加" class="detailbtn"></p>';
                echo '</form>';

                echo '<p><a href="favorite-insert.php?id=', $row['id'],
                    '"class="detailbtn">お気に入りに追加</a></p>';

                echo '</div>';
                echo '</div>';
            } 
            ?>
        
    </div>
    
</main>
<?php require 'footer.php' ?>