DROP DATABASE proj_TM_bdd;
CREATE DATABASE IF NOT EXISTS proj_TM_bdd CHARACTER SET utf8;
USE proj_TM_bdd;

CREATE TABLE IF NOT EXISTS membre(
    nomMem VARCHAR(30) NOT NULL,
    preMem VARCHAR(30) NOT NULL,
    dateNmembre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    section varchar(10) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    ville VARCHAR(50),
    rue VARCHAR(100),
    bio VARCHAR (250), 
    sexe CHAR(1),
    telephone VARCHAR(12),
    administrateur TINYINT(1) DEFAULT 0 , 
    mdpMembre VARCHAR(30) NOT NULL,
    idMem INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (idMem)
) engine = innodb;

CREATE TABLE IF NOT EXISTS msg(
    contenu VARCHAR(500) NOT NULL,
    datePubli TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idMemDesti INT UNSIGNED NOT NULL,
    idMemExpi INT UNSIGNED NOT NULL,
    PRIMARY KEY (idMemDesti, idMemExpi, datePubli)
) engine = innodb;

CREATE TABLE IF NOT EXISTS publication(
    title VARCHAR(100) NOT NULL,
    content VARCHAR(500) NOT NULL,
    datePubli TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    compteur_like int UNSIGNED DEFAULT 0,
    idPubli int UNSIGNED NOT NULL AUTO_INCREMENT,
    idMem INT UNSIGNED NOT NULL,
    PRIMARY KEY (idPubli, datePubli, idMem)
) engine = innodb;

CREATE TABLE IF NOT EXISTS likee(
    date_like TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idPubli int UNSIGNED NOT NULL,
    idMem INT UNSIGNED NOT NULL,
    PRIMARY KEY (idMem, idPubli)
) engine = innodb;

-- statut 0 : pas amis, 1 : en demande, 2 : amis
CREATE TABLE IF NOT EXISTS ami(
    date_ami TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idMem1 int UNSIGNED NOT NULL,
    idMem2 INT UNSIGNED NOT NULL,
    statut TINYINT DEFAULT 0,
    PRIMARY KEY (idMem1, idMem2)
) engine = innodb;


-- TABLE A RAJOUTEr
CREATE TABLE `proj_tm_bdd`.`commentaire` ( `id_comment` INT(11) NOT NULL AUTO_INCREMENT , `id_auteur` INT(11) NOT NULL , `id_question` INT(11) NOT NULL , `contenu` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id_comment`)) ENGINE = InnoDB;

ALTER TABLE publication
add CONSTRAINT fkPublicationP FOREIGN KEY (idMem) REFERENCES membre(idMem);

ALTER TABLE msg
add CONSTRAINT fkMsgDesti FOREIGN KEY (idMemDesti) REFERENCES membre(idMem),
add CONstraint fkMsgExpi FOREIGN KEY (idMemExpi) REFERENCES membre(idMem);

ALTER TABLE ami
add CONSTRAINT fkAmi1 FOREIGN KEY (idMem1) REFERENCES membre(idMem),
add CONstraint fkAmi2 FOREIGN KEY (idMem2) REFERENCES membre(idMem);

ALTER TABLE likee
add CONSTRAINT fkLikeMem FOREIGN KEY (idMem) REFERENCES membre(idMem),
add CONstraint fkLikePubli FOREIGN KEY (idPubli) REFERENCES publication(idPubli);

insert into membre(nomMem, preMem, dateNmembre, section, mail, mdpMembre, sexe, telephone, administrateur) VALUES ('Oliosi', 'Ludovic', '1992-05-23', '2IG', 'mli@moi.mooi', '1234', 'G','0477974610', 1);
insert into publication(title, content, datePubli, idMem, compteur_like) VALUES ('test','Hello World, je suis grand beau et fort', '2022-03-16',1,0);