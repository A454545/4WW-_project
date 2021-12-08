CREATE TABLE `trueroofs`.`user` ( 
`userID` INT(5) NOT NULL AUTO_INCREMENT ,  
`userName` VARCHAR(30) NOT NULL ,  
`password` VARCHAR(30) NOT NULL ,  
`email` VARCHAR(30) NOT NULL ,  
`joinedOn` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  
`interest` VARCHAR(30) NOT NULL DEFAULT 'browse' ,    
PRIMARY KEY  (`userID`),    
UNIQUE  `email` (`email`)
) ENGINE = InnoDB;

CREATE TABLE `trueroofs`.`listing` ( 
`id` INT(10) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(50) NOT NULL , 
`description` TEXT NOT NULL , 
`address` VARCHAR(100) NOT NULL , 
`dlat` VARCHAR(15) NOT NULL , 
`dlong` VARCHAR(15) NOT NULL , 
`source` VARCHAR(200) NOT NULL , 
`price` INT(20) NOT NULL , 
`image` BLOB NULL , 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `trueroofs`.`listing` ( `id` INT(10) NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(50) NOT NULL ,  `description` TEXT NOT NULL ,  `address` VARCHAR(100) NOT NULL ,  `dlat` VARCHAR(15) NOT NULL ,  `dlong` VARCHAR(15) NOT NULL ,  `source` VARCHAR(200) NOT NULL ,  `price` INT(20) NOT NULL ,  `image` BLOB NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

CREATE TABLE `trueroofs`.`review` (
`id` int(15) NOT NULL AUTO_INCREMENT,
`reviewerID` int(5) NOT NULL,
`locationID` int(10) NOT NULL,
`rating` float NOT NULL,
`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  
`content` text NOT NULL,
`dlat` VARCHAR(15) NOT NULL , 
`dlong` VARCHAR(15) NOT NULL , 
`image` BLOB NULL ,
`video` BLOB NULL ,
PRIMARY KEY (`id`),
KEY `location` (`locationID`),
KEY `reviewer` (`reviewerID`),
CONSTRAINT `location` FOREIGN KEY (`locationID`) REFERENCES `listing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `reviewer` FOREIGN KEY (`reviewerID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB
