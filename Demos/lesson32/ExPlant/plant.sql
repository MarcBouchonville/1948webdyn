DROP DATABASE IF EXISTS plant;

CREATE DATABASE plant CHARACTER SET utf8 COLLATE utf8_general_ci;
use plant;

DROP TABLE IF EXISTS plant;
CREATE TABLE IF NOT EXISTS plant (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    familiar_name VARCHAR(64) NOT NULL,
    scientific_name VARCHAR(64),
    kind VARCHAR(64),
    high DOUBLE,
    region VARCHAR(64),
    description VARCHAR(512)
);

INSERT INTO plant VALUES (null, 'papa Meilland', '', 'hybride de thé', 50, 'France', "C'est un hybride de thé à grandes fleurs très doubles qui s'ouvrent en coupe, remarquable par sa couleur, un rouge sombre cramoisi et son parfum. Les fleurs sont solitaires sur de fortes tiges. La floraison est très soutenue d'avril à octobre.");
INSERT INTO plant VALUES (null, 'Jacinthe des bois', 'Hyacinthoides non-scripta', 'Hyacinthoideae', 30, 'Europe', "La jacinthe des bois est une vivace haute de 20 à 40 centimètres. Elle a un bulbe de la taille d'une noisette qui est muni de racines contractiles qui le font glisser plus profondément dans des couches du sol plus humides. Ses feuilles basales linéaires, par groupe de 3 ou 6, sont dressées puis recourbées. De forme lancéolée, leur limbe a une largeur de 7 à 16 millimètres.");
INSERT INTO plant VALUES (null, 'Pâquerette', 'Bellis perennis', 'Astéracées', 5, 'Europe', "La pâquerette est une plante herbacée vivace, haute de 4 à 20 centimètres. L'appareil souterrain est formé par une souche rampante ou un rhizome, de couleur brune, garni d'innombrables racines adventives fibreuses de couleur blanche. Des cicatrices sur ce rhizome indiquent l'emplacement des hampes florales et des rosettes de feuilles qui ont disparu9.");
INSERT INTO plant VALUES (null, 'Pissenlit', '', ' Asteraceae', 15, 'Europe', "Les feuilles (très riches en vitamine C et β-carotène), les fleurs et les racines des pissenlits dits « communs » ou « officinaux » sont également consommées (voir salade de barabans). On remarquera que « pissenlit commun » est également une appellation vague qui regroupe plusieurs espèces, qu'il est parfois difficile de différencier.");
INSERT INTO plant VALUES 
(null, 'Rose', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Dalia', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Chêne', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Hêtre', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Peuplier', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Bouleau', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Charme', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Jonquille', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Ronse', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Pommier', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Poirier', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Cerisier', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Aulne', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Surop', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Herbe aux gouteux', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Mélisse', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Menthe', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Thé', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Tilleul', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Platane', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Cognassier', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Rhubarbe', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Carotte', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Choux', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Petits Poids', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Haricot', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Salade', '', ' ', 15, 'Monde', "La plus fleur"),
(null, 'Céléri', '', ' ', 15, 'Monde', "La plus fleur")
;

SELECT * FROM plant;