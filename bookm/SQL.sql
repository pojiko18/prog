--用意されているコマンドに関しては大文字を使う
INSERT INTO gs_an_table
    (name,email,age,naiyou,indate)
VALUES('山崎', 'test01@test.jp', 40, '備考', sysdate())

INSERT INTO gs_an_table
    (name,email,age,naiyou,indate)
VALUES('鈴木', 'test02@test.jp', 30, '備考2', sysdate())

INSERT INTO gs_an_table
    (name,email,age,naiyou,indate)
VALUES('田中', 'test03@test.jp', 20, '備考3', sysdate())

INSERT INTO gs_an_table
    (name,email,age,naiyou,indate)
VALUES('山本', 'test04@test.jp', 40, '備考4', sysdate())

INSERT INTO gs_an_table
    (name,email,age,naiyou,indate)
VALUES('佐々木', 'test05@test.jp', 30, '備考5', sysdate())

--データ取得 --DESCは降順、ASCは昇順
--最新情報をDESC
SELECT *
FROM gs_an_table
ORDER BY id DESC

SELECT name
, email
FROM gs_an_table

SELECT *
FROM gs_an_table
WHERE id=1

SELECT *
FROM gs_an_table
WHERE name='山本'

SELECT *
FROM gs_an_table
WHERE age=40

SELECT *
FROM gs_an_table
WHERE id=1 OR id=2 OR id=8 OR id=90

SELECT *
FROM gs_an_table
WHERE name LIKE '%山%'

