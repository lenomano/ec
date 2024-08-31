<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<main>
    <div id="cart-delete" class="wrapper">
        <?php
        unset($_SESSION['product'][$_REQUEST['id']]);
        echo 'カートから商品を削除しました。';
        echo '<hr>';
        require 'cart.php';
        ?>
    </div>
</main>
<?php require 'footer.php' ?>