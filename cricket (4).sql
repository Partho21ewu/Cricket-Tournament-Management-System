
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stadium` ()  NO SQL select * from stadiums$$

DELIMITER ;



CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123');


CREATE TABLE `cricket_teams` (
  `team_name` varchar(20) NOT NULL,
  `coach` varchar(20) NOT NULL,
  `team` varchar(10) NOT NULL,
  `t20_rank` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `cricket_teams` (`team_name`, `coach`, `team`, `t20_rank`) VALUES
('Australia', 'Andrew McDonald', 'AUS', '6'),
('Bangladesh', 'Rusell Domingo', 'BAN', '9'),
('India', 'Rahul Dravid', 'IND', '1'),
('New Zeland', 'Gary Stead', 'NZ', '4'),
('Srilanka', 'Phill Simons', 'SL', '8'),
('West Indies', 'Chris Silverwood', 'WI', '7');


CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `login` (`username`, `password`) VALUES
('user', '123');



CREATE TABLE `played_in` (
  `stadium_name` varchar(50) NOT NULL,
  `team_name` varchar(20) NOT NULL,
  `team` varchar(10) NOT NULL,
  `team1` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `team2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `played_in` (`stadium_name`, `team_name`, `team`, `team1`, `date`, `team2`) VALUES
('Seddon Park', 'New Zeland', 'NZ', 'NZ', '2018-12-20', 'AUS'),
('Eden Gardens', 'India', 'IND', 'IND', '2018-12-27', 'NZ'),
('MCG', 'Australia', 'AUS', 'AUS', '2018-12-28', 'WI'),
('Guyana National Stadium', 'West Indies', 'WI', 'WI', '2018-12-26', 'IND');


CREATE TABLE `player` (
  `cap_no` decimal(4,0) NOT NULL,
  `age` decimal(2,0) NOT NULL,
  `dob` date NOT NULL,
  `runs` decimal(5,0) NOT NULL,
  `wickets` decimal(3,0) NOT NULL,
  `type` varchar(20) NOT NULL,
  `no_of_matches` decimal(3,0) NOT NULL,
  `rank` decimal(3,0) NOT NULL,
  `batting_best` varchar(10) NOT NULL,
  `bowling_best` varchar(10) NOT NULL,
  `playername` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `player` (`cap_no`, `age`, `dob`, `runs`, `wickets`, `type`, `no_of_matches`, `rank`, `batting_best`, `bowling_best`, `playername`, `image`, `name`) VALUES
('17', '32', '1976-02-28', '4007', '100', 'batsman', '141', '2', '133*', '18/2', 'AB De villiers', 'img/abd.jpg', 'NZ'),
('18', '29', '1985-11-05', '4008', '125', 'batsman', '163', '1', '113*', '18/2', 'viratkohli', 'img/kholi.jpg', 'NZ'),
('43', '33', '1989-06-02', '1200', '59', 'batsman', '98', '3', '90', '20/3', 'Steven Smith', 'p.png', 'AUS'),
('87', '35', '1982-01-24', '3452', '24', 'allrounder', '145', '2', '71*', '14/8', 'Washington Sundar', 'p.png', 'IND'),
('90', '32', '1976-02-28', '4007', '100', 'allrounder', '141', '1', '133*', '18/2', 'Glenn Maxwell', 'p.png', 'AUS'),
('99', '29', '1978-11-07', '2245', '85', 'Allrounder', '20', '3', '85', '20/6', 'Umesh Yadav', 'p.png', 'IND');

DELIMITER $$
CREATE TRIGGER `update` BEFORE UPDATE ON `player` FOR EACH ROW BEGIN
IF (new.runs<old.runs) THEN SET new.runs=old.runs;
IF (new.wickets<old.wickets) THEN SET new.wickets=old.wickets;
END IF;
IF (new.no_of_matches<old.no_of_matches) THEN SET new.no_of_matches=old.no_of_matches;
END IF;
END IF;
END
$$
DELIMITER ;


CREATE TABLE `schedules` (
  `team1` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `match_no` decimal(3,0) NOT NULL,
  `team2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `schedules` (`team1`, `date`, `match_no`, `team2`) VALUES
('AUS', '2018-12-28', '4', 'WI'),
('IND', '2018-12-27', '3', 'NZ'),
('WI', '2018-12-26', '2', 'IND'),
('WI', '2019-01-01', '5', 'IND'),
('NZ', '2018-12-20', '1', 'AUS');



CREATE TABLE `selected_for` (
  `position` varchar(20) NOT NULL,
  `cap_no` decimal(4,0) NOT NULL,
  `name` varchar(30) NOT NULL,
  `team1` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `team2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `selected_for` (`position`, `cap_no`, `name`, `team1`, `date`, `team2`) VALUES
('CAPTAIN', '17', 'NZ', 'NZ', '2018-12-20', 'AUS'),
('VICE-CAPTAIN', '18', 'NZ', 'NZ', '2018-12-20', 'AUS');


CREATE TABLE `stadiums` (
  `stadium_name` varchar(50) NOT NULL,
  `capacity` decimal(6,0) NOT NULL,
  `DOI` date NOT NULL,
  `team_name` varchar(20) NOT NULL,
  `team` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `stadiums` (`stadium_name`, `capacity`, `DOI`, `team_name`, `team`) VALUES
('Seddon Park', '41000', '1996-11-20', 'New Zeland', 'NZ'),
('Eden Gardens', '84000', '1985-05-11', 'India', 'IND'),
('MCG', '25000', '1974-12-28', 'Australia', 'AUS'),
('Guyana National Stadium', '65000', '1976-11-25', 'West Indies', 'WI');

DELIMITER $$
CREATE TRIGGER `default_date` BEFORE INSERT ON `stadiums` FOR EACH ROW set new.DOI=CURRENT_DATE()
$$
DELIMITER ;


CREATE TABLE `team` (
  `rank` decimal(5,0) NOT NULL,
  `rating` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `team` (`rank`, `rating`, `name`) VALUES
('1', 6, 'AUS'),
('3', 0, 'BAN'),
('4', 0, 'IND'),
('5', 0, 'WI'),
('6', 0, 'NZ'),
('2', 1, 'SL');


--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);


ALTER TABLE `cricket_teams`
  ADD PRIMARY KEY (`team_name`,`team`);


ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);


ALTER TABLE `played_in`
  ADD PRIMARY KEY (`stadium_name`,`team_name`,`team`,`team1`,`date`,`team2`),
  ADD KEY `team1` (`team1`,`date`,`team2`);


ALTER TABLE `player`
  ADD PRIMARY KEY (`cap_no`,`name`),
  ADD KEY `name` (`name`);


ALTER TABLE `schedules`
  ADD PRIMARY KEY (`team1`,`date`,`team2`);

ALTER TABLE `selected_for`
  ADD PRIMARY KEY (`cap_no`,`name`,`team1`,`date`,`team2`),
  ADD KEY `team1` (`team1`,`date`,`team2`);


ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`stadium_name`,`team_name`,`team`),
  ADD KEY `team_name` (`team_name`,`team`);

ALTER TABLE `team`
  ADD PRIMARY KEY (`name`);


ALTER TABLE `played_in`
  ADD CONSTRAINT `played_in_ibfk_1` FOREIGN KEY (`stadium_name`,`team_name`,`team`) REFERENCES `stadiums` (`stadium_name`, `team_name`, `team`),
  ADD CONSTRAINT `played_in_ibfk_2` FOREIGN KEY (`team1`,`date`,`team2`) REFERENCES `schedules` (`team1`, `date`, `team2`);

ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`name`) REFERENCES `team` (`name`) ON DELETE CASCADE;


ALTER TABLE `selected_for`
  ADD CONSTRAINT `selected_for_ibfk_1` FOREIGN KEY (`cap_no`,`name`) REFERENCES `player` (`cap_no`, `name`),
  ADD CONSTRAINT `selected_for_ibfk_2` FOREIGN KEY (`team1`,`date`,`team2`) REFERENCES `schedules` (`team1`, `date`, `team2`) ON DELETE CASCADE;


ALTER TABLE `stadiums`
  ADD CONSTRAINT `stadiums_ibfk_1` FOREIGN KEY (`team_name`,`team`) REFERENCES `cricket_teams` (`team_name`, `team`) ON DELETE CASCADE;
COMMIT;
