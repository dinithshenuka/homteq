-- create db if its not exsist
CREATE DATABASE IF NOT EXISTS Homteq;

-- use the db
USE Homteq;

-- create the product table
CREATE TABLE Product (
    prodId INT(4) NOT NULL AUTO_INCREMENT,
    prodName VARCHAR(30) NOT NULL,
    prodPicNameSmall VARCHAR(100) NOT NULL,
    prodPicNameLarge VARCHAR(100) NOT NULL,
    prodDescripShort VARCHAR(1000) DEFAULT NULL,
    prodDescripLong VARCHAR(3000) DEFAULT NULL,
    prodPrice DECIMAL(6,2) NOT NULL,
    prodQuantity INT(4) NOT NULL,
    PRIMARY KEY (prodId)
);

-- insert data into the product table
INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity) VALUES
('Amazon Echo Dot', 'echo_dot_small.jpg', 'echo_dot_large.jpg', 'Amazon Echo Dot is a hands-free, voice-controlled device that uses Alexa to play music, control smart home devices, provide information, read the news, set alarms and more.', 'Amazon Echo Dot is a hands-free, voice-controlled device that uses Alexa to play music, control smart home devices, provide information, read the news, set alarms and more.', 49.99, 10),
('Amazon Echo', 'echo_small.jpg', 'echo_large.jpg', 'Amazon Echo is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports scores, weather, and more—instantly.', 'Amazon Echo is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports scores, weather, and more—instantly.', 99.99, 10),
('Amazon Echo Plus', 'echo_plus_small.jpg', 'echo_plus_large.jpg', 'Amazon Echo Plus is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports scores, weather, and more—instantly.', 'Amazon Echo Plus is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports scores, weather, and more—instantly.', 139.99, 10),
('Amazon Echo Show', 'echo_show_small.jpg', 'echo_show_large.jpg', 'Amazon Echo Show brings you everything you love about Alexa, and now she can show you things. Watch video flash briefings, Amazon Video content, see music lyrics, security cameras, photos, weather forecasts, to-do and shopping lists, browse and listen to Audible audiobooks, and more.', 'Amazon Echo Show brings you everything you love about Alexa, and now she can show you things. Watch video flash briefings, Amazon Video content, see music lyrics, security cameras, photos, weather forecasts, to-do and shopping lists, browse and listen to Audible audiobooks, and more.', 219.99, 10);



