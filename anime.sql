CREATE TABLE `users` (
  `userid` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) UNIQUE,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int DEFAULT 0,
  `ip` varchar(255) NOT NULL,
  `created_date` timestamp DEFAULT now()
);

CREATE TABLE `series` (
  `thumbnail` varchar(255),
  `serieid` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `year` year,
  `created_date` timestamp NOT NULL DEFAULT now(),
  `status` varchar(255),
  `rating` int
);

CREATE TABLE `seasons` (
  `thumbnail` varchar(255),
  `number` int,
  `serieid` int,
  PRIMARY KEY (`number`, `serieid`)
);

CREATE TABLE `films` (
  `thumbnail` varchar(255),
  `filmid` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` text,
  `serieid` int,
  `season_number` int,
  `episode` int,
  `video` varchar(255),
  `rating` int,
  `views` int,
  `year` year,
  `created_date` timestamp DEFAULT now(),
  `live` boolean,
  `type` ENUM('filler','normal','last_episode')
);

CREATE TABLE `catogeries` (
  `categoryid` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `film_categories` (
  `categoryid` int,
  `filmid` int
);

CREATE TABLE `user_film` (
  `userid` int,
  `filmid` int,
  `watched` boolean,
  `rating` int,
  `watch_later` boolean,
  `favorite` boolean
);

ALTER TABLE `seasons` ADD FOREIGN KEY (`serieid`) REFERENCES `series` (`serieid`);

ALTER TABLE `films` ADD FOREIGN KEY (`serieid`) REFERENCES `series` (`serieid`);

ALTER TABLE `films` ADD FOREIGN KEY (`season_number`) REFERENCES `seasons` (`number`);

ALTER TABLE `film_categories` ADD FOREIGN KEY (`categoryid`) REFERENCES `catogeries` (`categoryid`);

ALTER TABLE `film_categories` ADD FOREIGN KEY (`filmid`) REFERENCES `films` (`filmid`);

ALTER TABLE `user_film` ADD FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

ALTER TABLE `user_film` ADD FOREIGN KEY (`filmid`) REFERENCES `films` (`filmid`);

ALTER TABLE `user_film` ADD FOREIGN KEY (`rating`) REFERENCES `user_film` (`filmid`);


