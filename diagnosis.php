<!-- おすすめ商品診断 -->
<?php require 'header.php' ?>
<?php require 'menu.php' ?>
<main>
    <div id="diagnosis" class="wrapper">
<?php
if ($_POST) {
    
    // 診断結果 
    $msg = [
    'typeA' => '<h2>あなたにオススメのコーヒーは...</h2>
    <br>
    <div id="answer" class="wrapper">
    <h3>デカフェコーヒー</h3>
    <p><img alt="image" src="image/3.png"></p>
    <p>カフェインを気にせずコーヒーの味をお楽しみいただけます。<br>
        妊娠中の方や夜のリラックスタイムに。</p>
    <div><a href="detail.php?id=3" id="gobtn" class="wrapper">商品ページへ</a></div>
    </div>',
    
    'typeB' => '<h2>あなたにオススメのコーヒーは...</h2>
    <br>
    <div id="answer" class="wrapper">
    <h3>レギュラーコーヒー</h3>
    <p><img alt="image" src="image/2.png"></p>
    <p>苦味、酸味、コクのバランスが取れたブラジル産の豆を使用しています。<br>
    ミルクや砂糖との相性も抜群です。</p>
    <div><a href="detail.php?id=2" id="gobtn" class="wrapper">商品ページへ</a></div>
    </div>',

    'typeC' => '<h2>あなたにオススメのコーヒーは...</h2>
    <br>
    <div id="answer" class="wrapper">
    <h3>オリジナルコーヒー</h3>
    <p><img alt="image" src="image/1.png"></p>
    <p>バリスタが厳選した豆を使用しています。<br>
    アイスもホットもご家庭でお楽しみいただけます。</p>
    <div><a href="detail.php?id=1" id="gobtn" class="wrapper">商品ページへ</a></div>
    </div>',
    ];

    // 顧客の回答を入れる箱↓
    $ans_count = ['typeA'=>0, 'typeB'=>0, 'typeC'=>0];
    // 質問に対する回答
    $a01 = filter_input(INPUT_POST, 'q01');
    $a02 = filter_input(INPUT_POST, 'q02');
    $a03 = filter_input(INPUT_POST, 'q03');
    // 回答の集計結果を入れる箱
    $ans = [];

    // 顧客が質問に回答していない(null)の場合
    // 未回答の問題がありますのエラーメッセージ表示
    $isdecafe=false;
    if (isset($a01)) {
        $ans = array_merge($ans, explode(' ', $a01));
    } else {
        $errmsg = '未回答の問題があります';
    }
    if (isset($a02)) {
        $ans = array_merge($ans, explode(' ', $a02));

        foreach($ans as $value) {
            if ($value=='typeA') {
                $isdecafe=true;
                break;
            }
        }
    } else {
        
        $errmsg = '未回答の問題があります';
    }
    if (isset($a03)) {
        $ans = array_merge($ans, explode(' ', $a03));
    } else {
        $errmsg = '未回答の問題があります';
    }
    if (isset($errmsg)) {
        printf('<div id="error" class="wrapper">%s</div>', $errmsg);
    } else {
    // 未回答がなければ集計スタート↓
    if ($isdecafe){
        $result='typeA';
    }else{
        foreach (array_count_values($ans) as $key=>$val) { $ans_count[$key] = $val; }
        // print_r($ans_count);
        
            // typeBよりtypeAが多い
        if (($ans_count['typeA'] >= $ans_count['typeB'])&&
            // typeCよりtypeAが多い
            ($ans_count['typeA'] >= $ans_count['typeC'])) {
            // 結果Aが多い
            $result = 'typeA';
        } else if
            // typeAよりtypeBが多い
            (($ans_count['typeB'] >= $ans_count['typeA'])&&
            // typeCよりtypeBが多い
            ($ans_count['typeB'] >= $ans_count['typeC'])) {
            // 結果Bが多い
            $result = 'typeB';
        } else if 
            // typeAよりtypeCが多い
            // typeBよりtypeCが多い
            (($ans_count['typeC'] >= $ans_count['typeA'])&&
            ($ans_count['typeC'] >= $ans_count['typeB'])) {
            $result = 'typeC';
            }
        }
        
        printf('<div class="result">%s</div>', $msg[$result]);
    }
    
    print '<div id="goback" class="wrapper"><a href="" class="backbtn">戻る</a></div>';
    exit;
    }
?>

<div id="question" class="wrapper">
<h2>あなた好みのコーヒーを診断</h2>
<div id="question_about" class="wrapper">
<form action="" method="post" class="wrapper">
<ul>
<li>
<span>Q1. コーヒーを飲むとき、カフェイン摂取量が気になる</span>
<label><input type="radio" name="q01" value="typeA"> YES</label>
<label><input type="radio" name="q01" value="typeB typeC"> NO</label>
</li>
<li>
<span>Q2. ブラックコーヒーを好んで飲む</span>
<label><input type="radio" name="q02" value="typeB"> YES</label>
<label><input type="radio" name="q02" value="typeC"> NO</label>
</li>
<li>
<span>Q3. 日中だけでなく、夜もコーヒーを楽しみたい</span>
<label><input type="radio" name="q03" value="typeA"> YES</label>
<label><input type="radio" name="q03" value="typeB typeC"> NO</label>
</li>
</ul>
<div class="button-panel">
<input type="submit" id="donebtn" class="wrapper" value="診断する"></input>
</div>
</form>
</div>
</div>
</div>
</main>

<?php require 'footer.php' ?>