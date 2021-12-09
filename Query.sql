CREATE DATABASE shopdb;

CREATE TABLE manufacturers (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(30) NOT NULL
);

CREATE TABLE goods (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(30) NOT NULL,
    Price DOUBLE NOT NULL,
    ManufacturerId INT NOT NULL,
    FOREIGN KEY (ManufacturerId) REFERENCES manufacturers(Id) ON DELETE CASCADE
);

INSERT INTO `manufacturers`(`Name`) VALUES ('Apple');
INSERT INTO `manufacturers`(`Name`) VALUES ('Samsung');

INSERT INTO `goods`(`Name`, `Price`, `ManufacturerId`) VALUES ('iPhone 13 Pro Max',39990,1);
INSERT INTO `goods`(`Name`, `Price`, `ManufacturerId`) VALUES ('iPhone 13 Pro',34990,1);
INSERT INTO `goods`(`Name`, `Price`, `ManufacturerId`) VALUES ('iPhone 13',31990,1);
INSERT INTO `goods`(`Name`, `Price`, `ManufacturerId`) VALUES ('iPhone 13 Mini',25990,1);
INSERT INTO `goods`(`Name`, `Price`, `ManufacturerId`) VALUES ('Galaxy S21 Ultra',44990,2);