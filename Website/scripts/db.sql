SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+01:00";

CREATE TABLE `data` (
  `id` int(6) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `device_id` int(6) UNSIGNED DEFAULT NULL,
  `value` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `data` (`id`, `device_id`, `value`, `description`, `date`) VALUES
(1, 1, '1', 'Lamp is ON', '2024-05-07 12:57:53'),
(2, 2, '25', 'Temperature is 25ºC', '2024-05-07 12:57:53'),
(3, 2, '27', 'Temperature is 27ºC', '2024-05-07 18:57:20'),
(4, 3, '70', 'there is 70% humidity in the room', '2024-05-24 08:05:19'),
(5, 3, '63', 'The Humidity in the room is at 63%', '2024-05-24 08:35:19');


CREATE TABLE `device` (
  `id` int(6) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_id` int(6) UNSIGNED DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `imglink` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `device` (`id`, `type_id`, `name`, `description`, `imglink`) VALUES
(1, 1, 'Lamp', 'Lamp', 'https://www.google.com'),
(2, 2, 'Temperature Sensor', 'Temperature Sensor', 'https://www.google.com'),
(3, 2, 'Humidity Sensor', 'Sensor that reads the humidity of the place that he is at', 'www.google.com');


CREATE TABLE `types_users` (
  `id` int(6) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `types_users` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Manager', 'Sensors and Actuators Manager'),
(3, 'User', 'Regular User');


CREATE TABLE `type_device` (
  `id` int(6) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `type_device` (`id`, `name`, `description`) VALUES
(1, 'Actuator', 'Actuator'),
(2, 'Sensor', 'Sensor');


CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `age` tinyint(3) UNSIGNED DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `imglink` varchar(200) DEFAULT '../img/defaultuser.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `firstname`, `lastname`, `age`, `address`, `email`, `username`, `pass`, `type_id`, `imglink`) VALUES
(1, 'Admin', 'Admin', 19, 'admin', 'admin@gmail.com', 'admin', 'admin', 1, '../img/profilepics/image.png'),
(2, 'Vasco', 'Magolo', 19, 'santa maria da feira', 'vascomagolo@gmail.com', 'vasco', '123', 3, '../img/defaultuser.png');


ALTER TABLE `data`
  ADD KEY `device_id` (`device_id`);


ALTER TABLE `device`
  ADD KEY `type_id` (`type_id`);

ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `type_id` (`type_id`);

ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
