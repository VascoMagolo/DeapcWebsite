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
CREATE TABLE IF NOT EXISTS types (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(50) NOT NULL
);

-- Add foreign key to 'users' table
ALTER TABLE users ADD FOREIGN KEY (type_id) REFERENCES types(id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Insert data into 'types' table
INSERT INTO types (name, description) VALUES ('Admin', 'Administrator'), ('Manager', 'Sensors and Actuators Manager'), ('User', 'Regular User');
INSERT INTO users (firstname, lastname, age, address, email, username, pass, type_id) VALUES ('Admin', 'Admin', 19, 'admin@isep.ipp.pt', 'admin', 'admin', 'admin', 1);