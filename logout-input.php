<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<!-- <p>ログアウトしますか？</p>
<a href="logout-output.php">ログアウト</a> -->

<main>
    <div id="form-wrapper" class="wrapper">
        <h2>ログアウト</h2>
        <form class="logoutform">
            <div class="logout">
                <p>本当にログアウトしますか？</p>
            </div>
            <div id="outbtn" class="wrapper">
                <a href="logout-output.php">ログアウト</a>         
            </div>
        </form>
        <div class="form-footer">
          <p><a href="index.php">ホームに戻る</a></p>
        </div>
    </div>
</main>
    <p id="page-top"><a href="#">TOP</a></p>
<?php require 'footer.php' ?>