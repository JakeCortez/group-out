SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS UserLogin CASCADE
;
DROP TABLE IF EXISTS UserLoginSources CASCADE
;

CREATE TABLE UserLogin (
	userID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	userEmail VARCHAR(64) NOT NULL,
	userRole INT UNSIGNED NOT NULL,
	userPassword CHAR(128) NOT NULL,
	userSalt CHAR(64) NOT NULL,
	userLoginSourceID INT UNSIGNED NOT NULL,
	userAuthToken CHAR(32),
	PRIMARY KEY (userID),
	UNIQUE UQ_UserLogin_userEmail(userEmail),
	INDEX IXFK_UserLogin_UserProfiles (userID ASC),
	INDEX IXFK_UserLogin_UserLoginSources (userLoginSourceID ASC)

) 
;

CREATE TABLE UserLoginSources  (
	userLoginSourceType VARCHAR(64) NOT NULL,
	userLoginSourceID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (userLoginSourceID)

) 
;

SET FOREIGN_KEY_CHECKS=1;

ALTER TABLE UserLogin ADD CONSTRAINT FK_UserLogin_UserLoginSources 
	FOREIGN KEY (userLoginSourceID) REFERENCES UserLoginSources (userLoginSourceID)
	ON DELETE NO ACTION ON UPDATE NO ACTION
;
