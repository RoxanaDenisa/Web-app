CREATE DATABASE inregistreaza;

CREATE TABLE `conturi` ( `Nume` varchar(255) NOT NULL, `Mail` varchar(255) NOT NULL, `Parola` varchar(255) NOT NULL ) CHARSET=utf8mb4 ;
	
CREATE TABLE `produse` ( `id` int(11) NOT NULL, `categorie` varchar(255) NOT NULL, `pret` int(11) NOT NULL, `url_imagini` varchar(255) NOT NULL, `descriere` varchar(255) NOT NULL, `nume_produs` varchar(255) NOT NULL );

ALTER TABLE `produse` ADD PRIMARY KEY( `id`);

ALTER TABLE `produse` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0 ;

CREATE TABLE `stoc` ( `id_product` int(11) NOT NULL, `marimea` int(11) NOT NULL, `cantitate` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `stoc` ADD UNIQUE KEY `marimea` (`marimea`,`cantitate`);