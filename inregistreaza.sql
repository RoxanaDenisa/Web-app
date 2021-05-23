
CREATE DATABASE inregistreaza;

CREATE TABLE `conturi` (
  `Nume` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Parola` varchar(255) NOT NULL
) CHARSET=utf8mb4;


INSERT INTO `conturi` (`Nume`, `Mail`, `Parola`) VALUES
('Raduica', 'hhhh', '$2y$10$cuKtndbuWWu0PF1IhEhyAuY05Gh/msCOfnMWFA/F0kZW/ZNlDglbq'),
('Roxi', 'jhxfv', 'a22fdb6c7f5f0181196d87dd9718e8b1139ae30bf56e4d92e709e3f36f702ecbe265cc3b6df913ac115601361fe798a8f429c093f8968530d77ac3646d982958');
--COMENZI DE CURATARE--
DROP DATABASE inregistreaza;

---tabela produse---------

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `pret` int(11) NOT NULL,
  `url_imagini` varchar(255) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `nume_produs` varchar(255) NOT NULL
);


ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorie` (`categorie`,`pret`,`url_imagini`,`descriere`,`nume_produs`) USING HASH;
  
ALTER TABLE `produse` ADD PRIMARY KEY( `id`); 
  
ALTER TABLE `produse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
  ------stoc----------
  
  CREATE TABLE `stoc` (
  `id_product` int(11) NOT NULL,
  `marimea` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `stoc`
  ADD UNIQUE KEY `marimea` (`marimea`,`cantitate`);
COMMIT;