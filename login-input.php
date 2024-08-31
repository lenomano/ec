<?php require 'header.php' ?>
<?php require 'menu.php' ?>


<main>
<div id="form-wrapper" class="wrapper">
        <h2>ログイン</h2>
        <form action="login-output.php" method="post">
            <div class="form-item">
                <label for="id"></label>
                <input type="taxt" name="login" required="required" placeholder="ユーザーID"></input>
            </div>
            <div class="form-item">
                <label for="password"></label>
                <input type="password" name="password" required="required" placeholder="パスワード"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="sigin" value="ログイン"></input>
            </div>
        </form>
        <div class="form-footer">
            <p>まだ会員登録がお済みでない方はコチラ</p>
            <p><a href="signin-input.php">新規登録</a></p>
        </div>
    </div>
</main>
<p id="page-top"><a href="#">TOP</a></p>
<?php require 'footer.php' ?>
