utentiCREATE database if NOT EXISTS homework;
USE homework;
DROP TABLE if exists utenti;
CREATE TABLE utenti(
username VARCHAR(255) PRIMARY key,
pass VARCHAR(255), 
email varchar(255),
data_registrazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


DROP TABLE if exists mipiace;
CREATE TABLE mipiace(
username VARCHAR(255) REFERENCES utenti(usarname),
id_foto INTEGER,
foto VARCHAR(255) ,
UNIQUE(username, id_foto)
);


DROP TABLE if exists foto;
CREATE TABLE foto(
	coll VARCHAR(255) PRIMARY key
);

INSERT INTO foto VALUE('pianeti.webp');
INSERT INTO foto VALUE('mare.webp');
INSERT INTO foto VALUE('fuxia.webp');
INSERT INTO foto VALUE('colline.jpg');
INSERT INTO foto VALUE('barca.jpg');
INSERT INTO foto VALUE('https://kinsta.com/it/wp-content/uploads/sites/2/2020/10/tipos-de-arquivo-de-imagem.png');

create table if not exists ricerche(
	user varchar(255) references utenti(username), 
	ric varchar(255),
	data_registrazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	);
	
	/*INSERT INTO ricerche(user, ric) value('', '');*/

	