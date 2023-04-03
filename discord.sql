CREATE DATABASE discord;
USE discord;

CREATE TABLE discordUser(
userID int AUTO_INCREMENT PRIMARY KEY,
username varchar(50) UNIQUE,
password varchar(50),
firstName varchar(50),
phoneNumber varChar(50),
lastName varChar(50),
email varChar(100)
);

CREATE TABLE discordServer(
serverID int AUTO_INCREMENT PRIMARY KEY,
inviteLink varChar(50),
adminID int,
FOREIGN KEY (adminID) REFERENCES discordUser(userID) ON DELETE CASCADE
);

CREATE TABLE serverMessage(
serverMessageID int AUTO_INCREMENT PRIMARY KEY,
senderID int,
serverID int,
FOREIGN KEY (senderID) REFERENCES discordUser(userID) ON DELETE CASCADE,
FOREIGN KEY (serverID) REFERENCES discordServer(serverID) ON DELETE CASCADE
);

CREATE TABLE directMessage(
messageID int AUTO_INCREMENT PRIMARY KEY,
message varChar(200),
sourceUser int,
destUser int,
FOREIGN KEY (sourceUser) REFERENCES discordUser(userID) ON DELETE CASCADE,
FOREIGN KEY (destUser) REFERENCES discordUser(userID) ON DELETE CASCADE
);

CREATE TABLE userInServer(
userID int,
serverID int,
FOREIGN KEY (userID) REFERENCES discordUser(userID) ON DELETE CASCADE,
FOREIGN KEY (serverID) REFERENCES discordServer(serverID) ON DELETE CASCADE
);

CREATE TABLE friendsList(
user1ID int,
user2ID int,
FOREIGN KEY (user1ID) REFERENCES discordUser(userID) ON DELETE CASCADE,
FOREIGN KEY (user2ID) REFERENCES discordUser(userID) ON DELETE CASCADE
);
