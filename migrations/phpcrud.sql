CREATE DATABASE phpcrud;

use phpcrud;

CREATE TABLE personas (
  idpersonas INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  apellido VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  edad INT(3),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE roles (
  idroles INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE rolespersonas (
  idpersonas INT(11) UNSIGNED,
  idroles INT(11) UNSIGNED,
  PRIMARY KEY(idpersonas,idroles)
);

ALTER TABLE rolespersonas ADD CONSTRAINT fk_personas
FOREIGN KEY (idpersonas) REFERENCES personas(idpersonas) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION;


ALTER TABLE rolespersonas ADD CONSTRAINT fk_roles FOREIGN KEY 
(idroles) REFERENCES roles(idroles) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION;

ALTER TABLE personas ADD UNIQUE ui_email (email);

