CREATE DATABASE houpa;
USE houpa;
-- DROP DATABASE houpa;

CREATE TABLE IF NOT EXISTS `Item` (
  `id` int(11) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

-- INSERT INTO `Item` (`name`) VALUES ('Pedro Leonardo');
-- SELECT * FROM `Item`;