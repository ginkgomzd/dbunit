


CREATE DATABASE IF NOT EXISTS `dbunit_hellow_tests`
;

CREATE USER IF NOT EXISTS 'dbunit_hellow'@'localhost';

ALTER USER 'dbunit_hellow'@'localhost' IDENTIFIED BY '0[ebg(@VY@E,.O:F'
;

GRANT ALL ON `dbunit_hellow%`.* TO 'dbunit_hellow'@'localhost'
;

use `dbunit_hellow_tests`;

DROP TABLE IF EXISTS `ice_cream`;

CREATE TABLE `ice_cream` (
	id int NOT NULL AUTO_INCREMENT,
    flavour varchar(250) NULL,
    has_nuts boolean NOT NULL DEFAULT FALSE,
    has_chocolate boolean NOT NULL DEFAULT FALSE,
    dairy_free boolean NOT NULL DEFAULT TRUE,
    PRIMARY KEY (id)
);


