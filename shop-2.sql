-- 更新したい内容を書き込む

UPDATE product SET name='オリジナルコーヒー', price=1800 WHERE id=1;
UPDATE product SET name='レギュラーコーヒー', price=1600 WHERE id=2;
UPDATE product SET name='デカフェコーヒー', price=2100 WHERE id=3;
UPDATE product SET name='タンブラー', price=2500 WHERE id=4;
UPDATE product SET name='マグカップ(赤)', price=1200 WHERE id=5;
UPDATE product SET name='マグカップ(白)', price=1200 WHERE id=6;
UPDATE product SET name='トートバッグ(黒)', price=3100 WHERE id=7;
UPDATE product SET name='トートバッグ(白)', price=3100 WHERE id=8;
UPDATE product SET name='キーホルダー', price=850 WHERE id=9;
UPDATE product SET name='チョコチップクッキー(チョコ)', price=300 WHERE id=10;
UPDATE product SET name='チョコチップクッキー(プレーン)', price=300 WHERE id=11;

-- 商品追加

insert into product values(null, 'チョコチップクッキー(ナッツ)', 300);