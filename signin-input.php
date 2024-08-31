<?php require 'header.php' ?>
<?php require 'menu.php' ?>

<main>
    <div class="form-wrapper">
        <h2>新規登録</h2>
        <form action="signin-output.php" method="post">
        <div class="form-item">
                <label for="id"></label>
                <input type="taxt" name="name" required="required" placeholder="お名前"></input>
            </div>    
            <div class="form-item">
                <label for="address"></label>
                <input type="taxt" name="address" required="required" placeholder="ご住所"></input>
            </div> 
        <div class="form-item">
                <label for="id"></label>
                <input type="taxt" name="login" required="required" placeholder="ユーザーID"></input>
            </div>
            <div class="form-item">
                <label for="password"></label>
                <input type="password" name="password" required="required" placeholder="パスワード"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="sigin" value="新規登録"></input>
            </div>
        </form>
        <div class="form-footer">
            <p>会員登録がお済みの方はコチラ</p>
            <p><a href="login-input.php">ログイン</a></p>
        </div>
    </div>
</main>
<p id="page-top"><a href="#">TOP</a></p>
<?php require 'footer.php' ?>


