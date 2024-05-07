-- Create 'users' table
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    age TINYINT UNSIGNED,
    address VARCHAR(50),
    email VARCHAR(254) NOT NULL UNIQUE,
    username VARCHAR(30) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,  -- for storing hashed passwords
    type_id INT UNSIGNED
);

-- Create 'types' table
CREATE TABLE IF NOT EXISTS types_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(50) NOT NULL
);

-- Create 'device' table
CREATE TABLE IF NOT EXISTS device(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type_id INT(6) UNSIGNED,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    imglink VARCHAR(200) NOT NULL
);

-- Create 'type_device' table
CREATE TABLE IF NOT EXISTS type_device(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(50) NOT NULL
);

-- Create 'data' table
CREATE TABLE IF NOT EXISTS data(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    device_id INT(6) UNSIGNED,
    value VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Alter tables to add foreign keys
ALTER TABLE users ADD FOREIGN KEY (type_id) REFERENCES types_users(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE device ADD FOREIGN KEY (type_id) REFERENCES type_device(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE data ADD FOREIGN KEY (device_id) REFERENCES device(id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Insert data into tables
INSERT INTO types_users (name, description) VALUES ('Admin', 'Administrator'), ('Manager', 'Sensors and Actuators Manager'), ('User', 'Regular User');
INSERT INTO users (firstname, lastname, age, address, email, username, pass, type_id) VALUES ('Admin', 'Admin', 19, 'admin', 'admin@isep.ipp.pt', 'admin', 'admin', 1);
INSERT INTO type_device (name, description) VALUES ('Actuator', 'Actuator'), ('Sensor', 'Sensor');
INSERT INTO device (type_id, name, description, imglink) VALUES (1, 'Lamp', 'Lamp', 'https://www.google.com'), (2, 'Temperature Sensor', 'Temperature Sensor', 'https://www.google.com');
INSERT INTO data (device_id, value, description) VALUES (1, 'ON', 'Lamp is ON'), (2, '25', 'Temperature is 25ºC');