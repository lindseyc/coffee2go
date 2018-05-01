DROP DATABASE IF EXISTS motley;
CREATE DATABASE motley;
USE motley;

-- Create the tables

-- CREATE TABLE employee (
--   id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   name VARCHAR(256)
-- );

CREATE TABLE customer (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(256) NOT NULL,
  phone BIGINT NOT NULL,
  email VARCHAR(64) NOT NULL,
  carrier VARCHAR(64) NOT NULL
);

CREATE TABLE orders (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customer_id INT UNSIGNED NOT NULL,
  price FLOAT NOT NULL,
  dateCreated TIMESTAMP NOT NULL,
  timedrop INT UNSIGNED NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES customer(id)
);

CREATE TABLE drinks (
  orderId INT UNSIGNED NOT NULL,
  name VARCHAR(64) NOT NULL,
  quantity INT NOT NULL,
  customerId INT UNSIGNED NOT NULL,
  price FLOAT UNSIGNED NOT NULL,
  FOREIGN KEY (customerId) REFERENCES customer(id),
  FOREIGN KEY (orderId) REFERENCES orders(id)
);


-- CREATE TABLE drinktype (
--   id INT UNSIGNED NOT NULL,
--   name VARCHAR(64),
--   price FLOAT NOT NULL,
-- );

-- CREATE TABLE customdrink (
--   id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   order_id INT UNSIGNED NOT NULL,
--   type_id INT UNSIGNED NOT NULL,
--   quantity INT UNSIGNED NOT NULL,
--   price FLOAT NOT NULL,
--   FOREIGN KEY (order_id) REFERENCES orders(id),
-- );


-- Add drink data
-- LOAD DATA LOCAL INFILE "model/initialize.csv"
-- INTO TABLE drinktype
-- FIELDS TERMINATED BY ','
-- ENCLOSED BY '"'
-- LINES TERMINATED BY '\n'
-- IGNORE 1 ROWS;


-- /Applications/MAMP/Library/bin/mysql --host=localhost -u root -proot
