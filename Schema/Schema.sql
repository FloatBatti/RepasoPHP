CREATE DATABASE IF NOT EXISTS Orders;

USE Orders;

CREATE TABLE IF NOT EXISTS orders
(
    orderId INT NOT NULL,
    orderStatusId INT NOT NULL,
    description NVARCHAR(200) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    CONSTRAINT PK_Order PRIMARY KEY (orderId)  
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS users
(
    userId INT NOT NULL AUTO_INCREMENT,
    email NVARCHAR(100) NOT NULL,
    password NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_User PRIMARY KEY (userId)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS orderstatus
(
    orderStatusId INT NOT NULL AUTO_INCREMENT,
    description NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_OrderStatus PRIMARY KEY (orderStatusId)
)Engine=InnoDB;

INSERT INTO users
	(email, password)
VALUES 
	('user@myapp.com', '123456'),
	('final@myapp.com', '123456');


INSERT INTO orderstatus
    (description)
VALUES 
	('Pendiente'),
    ('Cancelada'),
    ('Aceptada');