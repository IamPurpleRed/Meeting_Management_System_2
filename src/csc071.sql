create database `meeting-system`;
USE `meeting-system`;


CREATE TABLE `使用者`(
	`使用者編號` int primary key auto_increment,
    `姓名` VARCHAR(20),
    `性別` VARCHAR(5),
    `個人電話` VARCHAR(15),
    `Email` VARCHAR(50),
	`帳號` VARCHAR(100) UNIQUE,
    `密碼` VARCHAR(100),
    `身分` VARCHAR(30),
    `管理員` varchar(50),
    `頭貼` VARCHAR(100)
)DEFAULT CHARSET=utf8;

CREATE TABLE `系助理`(
	`使用者編號` int ,
    `辦公室電話` VARCHAR(10),
    FOREIGN KEY(`使用者編號`) REFERENCES `使用者`(`使用者編號`) ON DELETE CASCADE
)DEFAULT CHARSET=utf8;

CREATE TABLE `學生代表`(
	`使用者編號` int,
    `學號` VARCHAR(10),
    `學制` VARCHAR(10),
    `班級` varchar(10),
    FOREIGN KEY(`使用者編號`) REFERENCES `使用者`(`使用者編號`) ON DELETE CASCADE
)DEFAULT CHARSET=utf8;

CREATE TABLE `系上老師`(
	`使用者編號` int ,
    `職級` VARCHAR(50),
    `辦公室電話` VARCHAR(10),
    FOREIGN KEY(`使用者編號`) REFERENCES `使用者`(`使用者編號`) ON DELETE CASCADE
)DEFAULT CHARSET=utf8;

CREATE TABLE `業界專家`(
	`使用者編號` int,
    `任職公司` VARCHAR(20),
    `職稱` VARCHAR(10),
    `辦公室電話` VARCHAR(10),
    `聯絡地址` VARCHAR(50),
    `銀行帳號` VARCHAR(20),
    FOREIGN KEY(`使用者編號`) REFERENCES `使用者`(`使用者編號`) ON DELETE CASCADE
)DEFAULT CHARSET=utf8;

CREATE TABLE `校外老師`(
	`使用者編號` int ,
    `任職學校` VARCHAR(20),
    `系所` VARCHAR(20),
    `職稱` VARCHAR(10),
    `辦公室電話` VARCHAR(10),
    `聯絡地址` VARCHAR(50),
    `銀行帳號` VARCHAR(20),
    FOREIGN KEY(`使用者編號`) REFERENCES `使用者`(`使用者編號`) ON DELETE CASCADE
)DEFAULT CHARSET=utf8;



create table `會議`(
    會議編號 int primary key auto_increment,
    會議名稱 varchar(200),
    開會地點 varchar(30),
    開會時間 varchar(100),
    主席致詞 varchar(5000),
    報告內容 varchar(5000)
)DEFAULT CHARSET=utf8;

create table `討論事項`(
    討論事項編號 int primary key auto_increment,
    會議編號 int,
    foreign key (`會議編號`) references `會議`(`會議編號`) on delete cascade,
    案由 varchar(500),
    說明 varchar(5000),
    決議事項 varchar(5000),
    執行情況 varchar(5000)
)DEFAULT CHARSET=utf8;

create table `附件`(
    附件編號 int primary key auto_increment,
    會議編號 int,
    foreign key (`會議編號`) references `會議`(`會議編號`) on delete cascade,
    附件檔案 varchar(500),
    附件名稱 varchar(500)
)DEFAULT CHARSET=utf8;

create table `參與`(
    會議編號 int ,
    foreign key (`會議編號`) references `會議`(`會議編號`) on delete cascade,
    使用者編號 int,
    foreign key (`使用者編號`) references `使用者`(`使用者編號`) on delete cascade,
    primary key (`會議編號`, `使用者編號`),
    角色 int,  /* 0: 沒參加, 1: 主席, 2: 書記, 3: 出席人員 */
    閱讀權限 boolean,
    編輯權限 boolean
)DEFAULT CHARSET=utf8;

ALTER TABLE `使用者` AUTO_INCREMENT=1;

insert into `使用者`(`姓名`,`性別`,`個人電話`,`Email`,`帳號`,`密碼`,`身分`, `管理員`,`頭貼` ) values('塗峻翔','男','0910382139','a1085541@mail.nuk.edu.tw','a1085541','123','業界專家','非管理員','src/user_photo/1.png');
insert into `使用者`(`姓名`,`性別`,`個人電話`,`Email`,`帳號`,`密碼`,`身分`, `管理員`,`頭貼` ) values('周昕瑜','女','1234567890','a1085517@mail.nuk.edu.tw','a1085517','123','系助理','管理員','src/user_photo/2.png');
insert into `使用者`(`姓名`,`性別`,`個人電話`,`Email`,`帳號`,`密碼`,`身分`, `管理員`,`頭貼`)values('柯柏熏','男','0987654321','a1081259@mail.nuk.edu.tw','a1085560','123','學生代表','非管理員','src/user_photo/3.png');
insert into `使用者`(`姓名`,`性別`,`個人電話`,`Email`,`帳號`,`密碼`,`身分`, `管理員`,`頭貼` )values('林子閎','男','1111111111','a1085516@mail.nuk.edu.tw','a1085516','123','系上老師','非管理員','src/user_photo/4.png');
insert into `使用者`(`姓名`,`性別`,`個人電話`,`Email`,`帳號`,`密碼`,`身分`, `管理員`,`頭貼` ) values('陳泓銘','男','2222222222','a1085511@mail.nuk.edu.tw','a1085511','123','校外老師','非管理員','src/user_photo/5.png');

insert into `業界專家` values(1,'大公司','大老闆','0910382139','高雄市楠梓區那條路1號','1234567890');
insert into `系助理` values(2,'0987654321');
insert into `學生代表` values(3,'A1081259','大學部','資工112');
insert into `系上老師`values(4,'教授','0912345678');
insert into `校外老師`values(5,'台大','資工所','教授','0911111111','高雄市楠梓區那條路2號','0123456789');

 --  drop database `meeting-system`;
 --  select * from `討論事項`;
-- delete from `會議` where `會議名稱` ='123';