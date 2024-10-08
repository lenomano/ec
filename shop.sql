-- 初期UL時

drop database if exists shop;
create database shop default character set utf8 collate utf8_general_ci;
drop user if exists 'staff'@'localhost';
create user 'staff'@'localhost' identified by 'password';
grant all on shop.* to 'staff'@'localhost';
use shop;

create table product (
	id int auto_increment primary key, 
	name varchar(200) not null, 
	price int not null
);

create table customer (
	id int auto_increment primary key, 
	name varchar(100) not null, 
	address varchar(200) not null, 
	login varchar(100) not null unique, 
	password varchar(100) not null
);

create table purchase (
	id int not null primary key, 
	customer_id int not null, 
	foreign key(customer_id) references customer(id)
);

create table purchase_detail (
	purchase_id int not null, 
	product_id int not null, 
	count int not null, 
	primary key(purchase_id, product_id), 
	foreign key(purchase_id) references purchase(id), 
	foreign key(product_id) references product(id)
);

create table favorite (
	customer_id int not null, 
	product_id int not null, 
	primary key(customer_id, product_id), 
	foreign key(customer_id) references customer(id), 
	foreign key(product_id) references product(id)
);

insert into product values(null, 'オリジナルコーヒー', 1800);
insert into product values(null, 'レギュラーコーヒー', 1600);
insert into product values(null, 'デカフェコーヒー', 2100);
insert into product values(null, 'タンブラー', 2500);
insert into product values(null, 'マグカップ(赤)', 1200);
insert into product values(null, 'マグカップ(白)', 1200);
insert into product values(null, 'トートバッグ(黒)', 3100);
insert into product values(null, 'トートバッグ(白)', 3100);
insert into product values(null, 'キーホルダー', 850);
insert into product values(null, 'チョコチップクッキー(チョコ)', 300);
insert into product values(null, 'チョコチップクッキー(プレーン)', 300);
insert into product values(null, 'チョコチップクッキー(ナッツ)', 300);

insert into customer values(null, '熊木 和夫', '東京都新宿区西新宿2-8-1', 'kumaki', 'BearTree1');
insert into customer values(null, '鳥居 健二', '神奈川県横浜市中区日本大通1', 'torii', 'BirdStay2');
insert into customer values(null, '鷺沼 美子', '大阪府大阪市中央区大手前2', 'saginuma', 'EgretPond3');
insert into customer values(null, '鷲尾 史郎', '愛知県名古屋市中区三の丸3-1-2', 'washio', 'EagleTail4');
insert into customer values(null, '牛島 大悟', '埼玉県さいたま市浦和区高砂3-15-1', 'ushijima', 'CowIsland5');
insert into customer values(null, '相馬 助六', '千葉県地足中央区市場町1-1', 'souma', 'PhaseHorse6');
insert into customer values(null, '猿飛 菜々子', '兵庫県神戸市中央区下山手通5-10-1', 'sarutobi', 'MonkeyFly7');
insert into customer values(null, '犬山 陣八', '北海道札幌市中央区北3西6', 'inuyama', 'DogMountain8');
insert into customer values(null, '猪口 一休', '福岡県福岡市博多区東公園7-7', 'inokuchi', 'BoarMouse9');
