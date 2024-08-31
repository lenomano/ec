<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=xslive230801_mizumoto;charset=utf8',
                'xslive230801_miz', 'livebusiness');
?>
<main class="main">
      <!-- スライド -->
      <div id="content" class="wrapper">
        <ul id="slider">
          <li><a href="diagnosis.php"><img src="image/bn1.png" alt=""></a></li>
          <li><img src="image/bn2.png" alt=""></li>
          <li><img src="image/bn3.png" alt=""></li>
        </ul>
      </div>
      <!-- 新入荷 -->
      <section id="newproduct" class="wrapper">
        <h2 class="section-title">新入荷</h2>
        <ul>
          <li>
            <a href="detail.php?id=4">
            <img src="image/4.png" alt="タンブラー">
            <h3 class="content-title">タンブラー</h3>
            <p>2500円</p>
            </a>
          </li>
          <li>
            <a href="detail.php?id=5">
            <img src="image/5.png" alt="マグカップ赤">
            <h3 class="content-title">マグカップ【赤】</h3>
            <p>1200円</p>
            </a>
          </li>
          <li>
            <a href="detail.php?id=8">
            <img src="image/8.png" alt="トートバッグ白">
            <h3 class="content-title">トートバッグ【白】</h3>
            <p>3100円</p>
            </a>
          </li>
        </ul>
      </section>
    </main>
    <p id="page-top"><a href="#">TOP</a></p>

<?php require 'footer.php' ?>