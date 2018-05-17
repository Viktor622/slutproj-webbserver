CREATE DATABASE shop;
USE shop;

CREATE TABLE produkter(id int(8) PRIMARY KEY AUTO_INCREMENT,
namn varchar(32),
pris float,
bild varchar(64),
beskrivning text);

CREATE TABLE lager(produkt_id int(8),
antal int(8),
FOREIGN KEY (produkt_id) REFERENCES produkter(id)
);

CREATE TABLE users(
	UserId int(8) PRIMARY KEY AUTO_INCREMENT,
	Username varchar(64),
	Adress varchar(64),
	Mail varchar(64),
	Password varchar(64)
);


INSERT INTO produkter (namn,pris,bild,beskrivning)
VALUES
("Tröja",99,"troja.png","En mycket fin tröja"),
("T-shirt",199,"t-shirt.png","En mycket fin t-shirt"),
("Strumpor",49,"strumpor.png","Mycket fina strumpor"),
("Kalsonger",9,"kalsonger.png","Kvalitétskallingar");


INSERT INTO lager VALUES
(1,10),
(2,5),
(3,100),
(4,2);


INSERT INTO produkter (namn,pris,bild,beskrivning)
VALUES
("Mössa",299,"mossa.png","En mycket fin mössa"),
("Jacka",699,"jacka.png","En mycket fin jacka"),
("Jeans",449,"jeans.png","Mycket fina jeans");
