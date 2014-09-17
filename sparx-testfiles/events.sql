DROP TABLE IF EXISTS Events CASCADE
;
CREATE TABLE Events
(
	eventID INT,
	userID INT,
	eventDate VARCHAR(50),
	eventName VARCHAR(50),
	eventCity VARCHAR(50),
	eventState VARCHAR(50),
	evenZip INT,
	eventTime VARCHAR(50),
	eventDescription VARCHAR(50),
	eventDifficulty VARCHAR(50),
	routeID INT,
	eventActivity VARCHAR(50),
	privacyLevel INT

) 
;


