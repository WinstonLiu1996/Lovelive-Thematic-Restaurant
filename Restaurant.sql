-- Sample Data Insertion(withdatabase reseting)
-- Version: V0615
-- Author: Winston

CREATE DATABASE Restaurant;

ALTER DATABASE  Restaurant CHARACTER SET utf8;

USE Restaurant;

DROP TABLE IF EXISTS Order_From_Cook_Deliver_Dish;
DROP TABLE IF EXISTS Pay_Bill;
DROP TABLE IF EXISTS Chef;
DROP TABLE IF EXISTS Servant;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Dishlist;
DROP TABLE IF EXISTS Manager;

#DROP DATABASE Restaurant;


CREATE TABLE Chef(
   ChefID INT PRIMARY KEY,
   ChefName VARCHAR(40),
   Rank INT UNIQUE
);

CREATE TABLE Servant(
   ServantID INT primary key,
   ServantName VARCHAR(40),
   Rank INT UNIQUE
);

CREATE TABLE Customer (
   CustomerID INT PRIMARY KEY AUTO_INCREMENT,
   CustomerName VARCHAR(40),
   PhoneNumber BIGINT UNIQUE
);

CREATE TABLE Pay_Bill (
   CustomerID INT NOT NULL,

   Time VARCHAR(40),
   Date VARCHAR(40),
   PaymentMethod ENUM('Credit','Debit','Cash'),
   TotalValue FLOAT,

   PRIMARY KEY (CustomerID),
   FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
ON DELETE CASCADE
);

CREATE TABLE DishList(
   DishName VARCHAR(40) PRIMARY KEY,
   Price FLOAT
);

CREATE TABLE Order_From_Cook_Deliver_Dish(
   CustomerID INT NOT NULL,
   DishName VARCHAR(40) NOT NULL,
   ChefID INT,
   ServantID INT,

   Status ENUM('Onhold','Queued','Processing','Done'),

   PRIMARY KEY (CustomerID,DishName),
   FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
      ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (DishName) REFERENCES DishList(DishName)
      ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (ChefID) REFERENCES Chef(ChefID),
   FOREIGN KEY (ServantID) REFERENCES Servant(ServantID)
);

CREATE TABLE Manager(
   ManagerID INT PRIMARY KEY,
   ManagerName VARCHAR(40) UNIQUE
);

INSERT INTO Chef VALUES (201, 'Albert', 1);
INSERT INTO Chef VALUES (202, 'Adam', 3);
INSERT INTO Chef VALUES (203, 'Jason', 5);
INSERT INTO Chef VALUES (204, 'Rolf', 4);
INSERT INTO Chef VALUES (205, 'Sam', 2);

INSERT INTO Servant VALUES(101, 'Alma', 5);
INSERT INTO Servant VALUES(102, 'Tina', 1);
INSERT INTO Servant VALUES(103, 'Penny', 3);
INSERT INTO Servant VALUES(104, 'Wen', 2);
INSERT INTO Servant VALUES(105, 'Zoe', 4);

#First two used in Pay_Bill and DishList
INSERT INTO Customer(CustomerName,PhoneNumber) VALUES (NULL, NULL);
INSERT INTO Customer(CustomerName,PhoneNumber) VALUES ('Jenny', 7781231234);
INSERT INTO Customer(CustomerName,PhoneNumber) VALUES ('Lisa', 6047897890);

#Time: HHMM (for example: 18:05 is 1805), Day:MMDD(for example: Jun 25th is 0625), TotalValue in Euro
#Payment (method) and Totalvalue need to be updated.
#Only use first three
#Non member
INSERT INTO Pay_Bill VALUES (1, '17:29:14', '2016-11-11', 'Cash', 81.75);
#Member
INSERT INTO Pay_Bill VALUES (2, '17:29:26', '2016-11-11', 'Credit', 21.704);
INSERT INTO Pay_Bill VALUES (3, '21:39:21', '2016-11-11', 'Debit', 41.288);

INSERT INTO DishList VALUES ('Salad', 12.99);
INSERT INTO DishList VALUES ('Soup', 15.88);
INSERT INTO DishList VALUES ('Pasta', 23.99);
INSERT INTO DishList VALUES ('Steak', 32.28);
INSERT INTO DishList VALUES ('Pizza', 21.98);
INSERT INTO DishList VALUES ('Chicken Wings', 13.75);
INSERT INTO DishList VALUES ('Calamari', 14.50);
INSERT INTO DishList VALUES ('Coke', 3.50);
INSERT INTO DishList VALUES ('Juice', 5.15);

#ServantID and ChefID, status needs updated.
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (1, 'Steak', Null, Null, 'Queued');
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (1, 'Pasta', Null, Null, 'Queued');
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (1, 'Coke', 202, 102, 'Done');
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (1, 'Pizza', 201, 102, 'Done');

INSERT INTO Order_From_Cook_Deliver_Dish VALUES (2, 'Pizza', 201, 103, 'Done');
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (2, 'Juice', Null, Null, 'Onhold');

INSERT INTO Order_From_Cook_Deliver_Dish VALUES (3, 'Chicken Wings', 205, Null, 'Processing');
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (3, 'Soup', 205, 104, 'Done');
INSERT INTO Order_From_Cook_Deliver_Dish VALUES (3, 'Pizza', Null, Null, 'Queued');

INSERT INTO Manager VALUES (301, 'Dave');
INSERT INTO Manager VALUES (302, 'Ken');


SELECT * FROM Chef;
SELECT * FROM Servant;
SELECT * FROM Customer;
SELECT * FROM Pay_Bill;
SELECT * FROM DishList;
SELECT * FROM Order_From_Cook_Deliver_Dish;
SELECT * FROM Manager;