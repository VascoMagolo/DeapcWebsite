-- Create 'users' table
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    age INT(6) UNSIGNED,
    address VARCHAR(50),
    email VARCHAR(50) NOT NULL UNIQUE,
    username VARCHAR(30) NOT NULL UNIQUE,
    pass VARCHAR(50) NOT NULL,
    type_id INT(6) UNSIGNED
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

-- Add foreign key to 'users' table
ALTER TABLE users ADD FOREIGN KEY (type_id) REFERENCES types_users(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE device ADD FOREIGN KEY (type_id) REFERENCES type_device(id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Insert data into 'types' table
INSERT INTO types_users (name, description) VALUES ('Admin', 'Administrator'), ('Manager', 'Sensors and Actuators Manager'), ('User', 'Regular User');
INSERT INTO users (firstname, lastname, age, address, email, username, pass, type_id) VALUES ('Admin', 'Admin', 19, 'admin@isep.ipp.pt', 'admin', 'admin', 'admin', 1);
INSERT INTO type_device (name, description) VALUES ('Actuator', 'Actuator'), ('Sensor', 'Sensor');
