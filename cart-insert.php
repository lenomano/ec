<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<main>

    <div id="cart-insert" class="wrapper">
    

       
            
            <?php
            $id=$_REQUEST['id'];
            // 買い物を始めた時点ではカートは空
            // カートが空かを調べる↓
            if (!isset($_SESSION['product'])) {
                // カートの中身を初期化
                $_SESSION['product']=[];
            }
            // 同じ商品をカートに追加した場合、合計処理を行う
            // issetで同じ商品が入っているかを調べる
            // 同じ商品が入っていた場合は、既に入っている商品の個数を
            // $countに代入して合計を出す
            $count=1;
            if (isset($_SESSION['product'][$id])) {
                $count=$_SESSION['product'][$id]['count'];
            }

            $_SESSION['product'][$id]=[
                // 商品名と価格はそのまま格納
                'name'=>$_REQUEST['name'],
                'price'=>$_REQUEST['price'],
                // 個数は
                // 新しく追加する場合は0+[追加した数]
                // 既に入っていて追加する場合は
                // もともとの数($countに代入された数)+[追加した数]
                'count'=>$count + (int)$_REQUEST['count']
            ];
            echo '<p>カートに追加しました。</p>';
            echo '<hr>';
            require 'cart.php';
            ?>
        </div>
    </main>   
<?php require 'footer.php' ?>