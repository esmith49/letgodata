DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	email VARCHAR(128) NOT NULL,
	zipCode VARCHAR(10),
	userName VARCHAR(32) NOT NULL,
	UNIQUE(userName),
	UNIQUE(email),
	PRIMARY KEY(profileId)
);

CREATE TABLE product (
	productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	product VARCHAR(140) NOT NULL,
	INDEX(profileId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	PRIMARY KEY(productId)
);
INSERT INTO profile(email, zipCode, userName)
VALUES ("smith49@cnm.edu", "87111", "evansmith");

INSERT INTO profile(email, zipCode, userName)
VALUES ("jarvisg68@live.com", "85326", "geiseljarvis");

UPDATE profile SET userName = "evan smith" WHERE profileId = 1;

UPDATE profile SET userName = "Giesel Jarvis" WHERE profileId = 2;




