<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<main>

    <div id="product" class="wrapper">
        <h2>商品一覧</h2>

        <div id="wrap" class="wrapper">
            <form action="product.php" method="post">
                <div id="search" class="wrapper">
                    <input type="text" class="searchTerm" name="keyword" placeholder="入力し商品検索">
                    <input type="submit" class="searchButton" value="検索">
                    
                </div>
            </form>
        </div>

        <?php
        
        echo '<table id="table_box" class="wrapper">';
        echo '<tr>
                    <th>商品番号</th>
                    <th>商品写真</th>
                    <th>商品名</th>
                    <th>価格</th>
             </tr>';
    
        $pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
             'xslive230801_miz', 'livebusiness');
        if (isset($_REQUEST['keyword'])) {
            $sql=$pdo->prepare('select * from product where name like :keyword');
            $sql->bindValue(':keyword', '%'.$_REQUEST['keyword'].'%', PDO::PARAM_STR);
            $sql->execute();
        } else {
            $sql=$pdo->query('select * from product');
        }
        foreach ($sql as $row) {
            $id=$row['id'];
            echo '<tr>';
            echo '<td>', $id, '</td>';
            echo '<td>';
            echo '<p><img alt="image" src="image/', $row['id'], '.png"></p>';
            echo '</td>';
            echo '<td>';
            echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
            echo '</td>';
            echo '<td>', $row['price'], '円', '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>
</main>
<p id="page-top"><a href="#">TOP</a></p>
<?php require 'footer.php' ?>