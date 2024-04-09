CREATE TABLE users (
                      id INT PRIMARY KEY,
                      username VARCHAR(50) NOT NULL,
                      password VARCHAR(50) NOT NULL,
                      email VARCHAR(50) NOT NULL,
    phonenumber VARCHAR(15),
    isstaff TINYINT,
    nonce VARCHAR(255),
    nonceexpiry DATETIME,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE Booking (
                         id INT PRIMARY KEY,
                         userid INT,
                         startdate DATE,
                         enddate DATE,
                         destination VARCHAR(50),
                         FOREIGN KEY (userid) REFERENCES users(id),
                         FOREIGN KEY (insuranceid) REFERENCES Insurance(id),
                         FOREIGN KEY (hotelid) REFERENCES Hotel(id),
                         FOREIGN KEY (carrentalid) REFERENCES CarRental(id),
                         FOREIGN KEY (translationid) REFERENCES Translation(id),
                         FOREIGN KEY (flightid) REFERENCES Flight(id)
);

CREATE TABLE Payment (
                         id INT PRIMARY KEY,
                         bookingid INT,
                         amount DECIMAL(10,2),
                         paymentmethod VARCHAR(50),
                         status VARCHAR(50),
                         FOREIGN KEY (bookingid) REFERENCES Booking(id)
);

CREATE TABLE Insurance (
                           id INT PRIMARY KEY,
                           supplier VARCHAR(50),
                           level VARCHAR(50),
                           description VARCHAR(50),
                           price DECIMAL(10,2)
);

CREATE TABLE Hotel (
                       id INT PRIMARY KEY,
                       name VARCHAR(50),
                       location VARCHAR(50)
);

CREATE TABLE Cruise (
                        id INT PRIMARY KEY,
                        company VARCHAR(50),
                        description VARCHAR(50),
                        price DECIMAL(10,2),
                        hotelid INT
);

CREATE TABLE Translation (
                             id INT PRIMARY KEY,
                             fromlanguage VARCHAR(50),
                             tolanguage VARCHAR(50),
                             description VARCHAR(50),
                             price DECIMAL(10,2)
);

CREATE TABLE Flight (
                        id INT PRIMARY KEY,
                        number VARCHAR(50),
                        departureairport VARCHAR(50),
                        arrivalairport VARCHAR(50),
                        departuredate DATE,
                        arrivaldate DATE,
                        price DECIMAL(10,2)
);

CREATE TABLE CarRental (
                           id INT PRIMARY KEY,
                           company VARCHAR(50),
                           description VARCHAR(50),
                           plate VARCHAR(50),
                           brand VARCHAR(50),
                           price DECIMAL(10,2)
);

CREATE TABLE TravelDeal (
                            id INT PRIMARY KEY,
                            startdate DATE,
                            enddate DATE,
                            description VARCHAR(50),
                            totalprice DECIMAL(10,2),
                            insuranceid INT,
                            hotelid INT,
                            carrentalid INT,
                            translationid INT,
                            flightid INT,
                            FOREIGN KEY (insuranceid) REFERENCES Insurance(id),
                            FOREIGN KEY (hotelid) REFERENCES Hotel(id),
                            FOREIGN KEY (carrentalid) REFERENCES CarRental(id),
                            FOREIGN KEY (translationid) REFERENCES Translation(id),
                            FOREIGN KEY (flightid) REFERENCES Flight(id)
);

ALTER TABLE Booking ADD FOREIGN KEY (userid) REFERENCES users(id);
ALTER TABLE Booking ADD FOREIGN KEY (insuranceid) REFERENCES Insurance(id);
ALTER TABLE Booking ADD FOREIGN KEY (hotelid) REFERENCES Hotel(id);
ALTER TABLE Booking ADD FOREIGN KEY (carrentalid) REFERENCES CarRental(id);
ALTER TABLE Booking ADD FOREIGN KEY (translationid) REFERENCES Translation(id);
ALTER TABLE Booking ADD FOREIGN KEY (flightid) REFERENCES Flight(id);
ALTER TABLE Payment ADD FOREIGN KEY (bookingid) REFERENCES Booking(id);
ALTER TABLE TravelDeal ADD FOREIGN KEY (insuranceid) REFERENCES Insurance(id);
ALTER TABLE TravelDeal ADD FOREIGN KEY (hotelid) REFERENCES Hotel(id);
ALTER TABLE TravelDeal ADD FOREIGN KEY (carrentalid) REFERENCES CarRental(id);
ALTER TABLE TravelDeal ADD FOREIGN KEY (translationid) REFERENCES Translation(id);
ALTER TABLE TravelDeal ADD FOREIGN KEY (flightid) REFERENCES Flight(id);
