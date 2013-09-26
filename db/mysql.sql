DROP TABLE cms_users;
CREATE TABLE cms_users (
	id int auto_increment primary key,
	firstname varchar(200),
	lastname varchar(200),
	userid varchar(200),
	password varchar(32), 
	email varchar(200)
);
INSERT INTO cms_users() VALUES(NULL,'Niclas', 'Magnusson', 'niclas', 'cc8c1499a23f4f3f7f7d880f131a28b4', 'niclas@orch.se');
