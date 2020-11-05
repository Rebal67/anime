CREATE TABLE `users` (
  `userid` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) UNIQUE,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int
);

CREATE TABLE `series` (
  `serieid` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `seasons` (
  `seasonid` int PRIMARY KEY AUTO_INCREMENT,
  `number` int,
  `serieid` int
);

CREATE TABLE `films` (
  `filmid` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `serieid` int,
  `seasonid` int,
  `episode` int,
  `video` varchar(255),
  `rating` int
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
  `rating` int
);

ALTER TABLE `seasons` ADD FOREIGN KEY (`serieid`) REFERENCES `series` (`serieid`);

ALTER TABLE `films` ADD FOREIGN KEY (`serieid`) REFERENCES `series` (`serieid`);

ALTER TABLE `films` ADD FOREIGN KEY (`seasonid`) REFERENCES `seasons` (`seasonid`);

ALTER TABLE `film_categories` ADD FOREIGN KEY (`categoryid`) REFERENCES `catogeries` (`categoryid`);

ALTER TABLE `film_categories` ADD FOREIGN KEY (`filmid`) REFERENCES `films` (`filmid`);

ALTER TABLE `user_film` ADD FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

ALTER TABLE `user_film` ADD FOREIGN KEY (`filmid`) REFERENCES `films` (`filmid`);
