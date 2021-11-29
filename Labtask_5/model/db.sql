CREATE DATABASE productTable_Labtask_5;

CREATE TABLE product_table(
    productId INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    productName VARCHAR(50) NOT NULL,
    buyingPrice FLOAT(10, 2) NOT NULL,
    sellingPrice FLOAT(10, 2) NOT NULL
);