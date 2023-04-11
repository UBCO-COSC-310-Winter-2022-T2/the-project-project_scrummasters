CREATE DATABASE discord;
USE discord;

CREATE TABLE discordUser(
username varchar(50) PRIMARY KEY ,
password varchar(50),
firstName varchar(50),
phoneNumber varChar(50),
lastName varChar(50),
email varChar(100)
);

CREATE TABLE discordServer(
serverName varchar(50) PRIMARY KEY,
inviteLink varChar(50),
adminUsername varchar(50),
FOREIGN KEY (adminUsername) REFERENCES discordUser(username) ON DELETE CASCADE
);

CREATE TABLE serverMessage(
serverMessageID int AUTO_INCREMENT PRIMARY KEY,
serverMessage varchar(500),
senderUsername varchar(50),
serverName varchar(50),
FOREIGN KEY (senderUsername) REFERENCES discordUser(username) ON DELETE CASCADE,
FOREIGN KEY (serverName) REFERENCES discordServer(serverName) ON DELETE CASCADE
);

CREATE TABLE directMessage(
messageID int AUTO_INCREMENT PRIMARY KEY,
message varChar(200),
sourceUsername varchar(50),
destUsername varchar(50),
FOREIGN KEY (sourceUsername) REFERENCES discordUser(username) ON DELETE CASCADE,
FOREIGN KEY (destUsername) REFERENCES discordUser(username) ON DELETE CASCADE
);

CREATE TABLE userInServer(
username varchar(50),
serverName varchar(50),
PRIMARY KEY (username, serverName),
FOREIGN KEY (username) REFERENCES discordUser(username) ON DELETE CASCADE,
FOREIGN KEY (serverName) REFERENCES discordServer(serverName) ON DELETE CASCADE
);

CREATE TABLE friendRequest(
username1 varchar(50),
username2 varchar(50),
PRIMARY KEY (username1, username2),
FOREIGN KEY (username1) REFERENCES discordUser(username) ON DELETE CASCADE,
FOREIGN KEY (username2) REFERENCES discordUser(username) ON DELETE CASCADE
);

CREATE TABLE friend(
username1 varchar(50),
username2 varchar(50),
PRIMARY KEY (username1, username2),
FOREIGN KEY (username1) REFERENCES discordUser(username) ON DELETE CASCADE,
FOREIGN KEY (username2) REFERENCES discordUser(username) ON DELETE CASCADE
);
