# RETO
mysql  -u campus -p
mysql> SHOW DATABASES;
mysql> USE campuslands
mysql> CREATE TABLE campers(
    -> idCamper INT PRIMARY KEY AUTO_INCREMENT KEY NOT NULL,
    -> nombreCamper VARCHAR(20),
    -> apellidoCamper VARCHAR(50),
    -> fechaNac DATE, 
    -> idReg INT);
mysql> CREATE TABLE region(
    -> idRegion INT PRIMARY KEY AUTO_INCREMENT KEY NOT NULL,
    -> nombreReg VARCHAR(50),
    -> idDep INT);
mysql> CREATE TABLE departament(
    -> idDep INT PRIMARY KEY AUTO_INCREMENT KEY NOT  NULL,
    -> nombreDep VARCHAR(50),
    -> idPais INT);
mysql> CREATE TABLE pais(
    -> idPais INT PRIMARY KEY AUTO_INCREMENT KEY NOT NULL,
    -> nombrePais INT);
mysql> SHOW TABLES;