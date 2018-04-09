DROP DATABASE IF EXISTS motley;
CREATE DATABASE motely;

USE GSC;

-- Create the tables

CREATE TABLE order(
  orderID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  date TIMESTAMP NOT NULL CURRENT_TIMESTAMP,
  employeeID
  FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE customer(
  customer_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  phone VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL,
  carrier VARCHAR(256) NOT NULL
);

CREATE TABLE drink(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  shots INT,
  milk VARCHAR(64),
  price FLOAT,
  whip BOOLEAN
);

CREATE TABLE employee(
  id INT UNSIGNED NOT NULL PRIMARY KEY,
  name VARCHAR(64)
);

CREATE TABLE stdDrink(
  price FLOAT NOT NULL,
  type NOT NULL VARCHAR(64), -- coffee, tea, smoothie
);
