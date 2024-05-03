SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";

CREATE TABLE `users` (
    `uid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(16) NOT NULL UNIQUE,
    `password` VARCHAR(60) NOT NULL,
    `joined_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `email` VARCHAR(319) UNIQUE,
    PRIMARY KEY (`uid`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `about` (
    `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `content` TEXT NOT NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `uid` INT UNSIGNED NOT NULL UNIQUE,
    FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`aid`),
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `contact` (
    `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(319),
    `X` varchar(15),
    `github` varchar(39),
    `discord` varchar(39),
    `website` varchar(200),
    `uid` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`cid`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `interests` (
     `iid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
     `title` VARCHAR(80) NOT NULL UNIQUE,
     `description` VARCHAR(300) NOT NULL,
     `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
     `uid` INT UNSIGNED NOT NULL,
     FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
     PRIMARY KEY (`iid`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `blog` (
    `bid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `content` TEXT NOT NULL,
    `picture` varchar(250) DEFAULT NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `uid` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`bid`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sakuin` (
    `sid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(40) NOT NULL,
    `description` TEXT,
    `link` VARCHAR(2083) NOT NULL,
    `uid` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`sid`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sessions` (
    `token` VARCHAR(256) NOT NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `uid` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`token`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `redirect` (
    `rid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `url` VARCHAR(500) NOT NULL,
    `uid` INT UNSIGNED NOT NULL,
    UNIQUE (`name`, `uid`),
    PRIMARY KEY (`rid`),
    FOREIGN KEY (`uid`) REFERENCES `users`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


COMMIT;