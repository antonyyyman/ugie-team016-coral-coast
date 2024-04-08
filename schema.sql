CREATE TABLE User (
                      ID INT PRIMARY KEY,
                      Username VARCHAR(50) NOT NULL,
                      Password VARCHAR(50) NOT NULL,
                      Email VARCHAR(50) NOT (NULL),
    PhoneNumber VARCHAR(15),
    IsStaff BOOLEAN DEFAULT FALSE,
    Nonce VARCHAR(255),
    NonceExpiry DATETIME,
    Created DATETIME,
    Modified DATETIME,
);

CREATE TABLE Booking (
                         ID INT PRIMARY KEY,
                         UserID INT,
                         StartDate DATE,
                         EndDate DATE,
                         Destination VARCHAR(50),
                         FOREIGN KEY (UserID) REFERENCES User(ID)
);

CREATE TABLE Payment (
                         ID INT PRIMARY KEY,
                         BookingID INT,
                         Amount DECIMAL(10,2),
                         PaymentMethod VARCHAR(50),
                         Status VARCHAR(50),
                         FOREIGN KEY (BookingID) REFERENCES Booking(ID)
);

CREATE TABLE Insurance (
                           ID INT PRIMARY KEY,
                           Supplier VARCHAR(50),
                           Level VARCHAR(50),
                           Description VARCHAR(50),
                           Price DECIMAL(10,2)
);

CREATE TABLE Hotel (
                       ID INT PRIMARY KEY,
                       Name VARCHAR(50),
                       Location VARCHAR(50)
);

CREATE TABLE Cruise (
                        ID INT PRIMARY KEY,
                        Company VARCHAR(50),
                        Description VARCHAR(50),
                        Price DECIMAL(10,2),
                        HotelID INT,
                        FOREIGN KEY (HotelID) REFERENCES Hotel(ID)
);

CREATE TABLE Translation (
                             ID INT PRIMARY KEY,
                             FromLanguage VARCHAR(50),
                             ToLanguage VARCHAR(50),
                             Description VARCHAR(50),
                             Price DECIMAL(10,2)
);

CREATE TABLE Flight (
                        ID INT PRIMARY KEY,
                        Number VARCHAR(50),
                        DepartureAirport VARCHAR(50),
                        ArrivalAirport VARCHAR(50),
                        DepartureDate DATE,
                        ArrivalDate DATE,
                        Price DECIMAL(10,2)
);

CREATE TABLE CarRental (
                           ID INT PRIMARY KEY,
                           Company VARCHAR(50),
                           Description VARCHAR(50),
                           Plate VARCHAR(50),
                           Brand VARCHAR(50),
                           Price DECIMAL(10,2),
                           HotelID INT,
                           FOREIGN KEY (HotelID) REFERENCES Hotel(ID)
);

CREATE TABLE TravelDeal (
                            ID INT PRIMARY KEY,
                            StartDate DATE,
                            EndDate DATE,
                            Description VARCHAR(50),
                            TotalPrice DECIMAL(10,2),
                            InsuranceID INT,
                            HotelID INT,
                            CarRentalID INT,
                            TranslationID INT,
                            FlightID INT,
                            FOREIGN KEY (InsuranceID) REFERENCES Insurance(ID),
                            FOREIGN KEY (HotelID) REFERENCES Hotel(ID),
                            FOREIGN KEY (CarRentalID) REFERENCES CarRental(ID),
                            FOREIGN KEY (TranslationID) REFERENCES Translation(ID),
                            FOREIGN KEY (FlightID) REFERENCES Flight(ID)
);

ALTER TABLE Booking ADD FOREIGN KEY (UserID) REFERENCES User(ID);
ALTER TABLE Payment ADD FOREIGN KEY (BookingID) REFERENCES Booking(ID);
ALTER TABLE Cruise ADD FOREIGN KEY (HotelID) REFERENCES Hotel(ID);
ALTER TABLE CarRental ADD FOREIGN KEY (HotelID) REFERENCES Hotel(ID);
ALTER TABLE TravelDeal ADD FOREIGN KEY (InsuranceID) REFERENCES Insurance(ID);
ALTER TABLE TravelDeal ADD FOREIGN KEY (HotelID) REFERENCES Hotel(ID);
ALTER TABLE TravelDeal ADD FOREIGN KEY (CarRentalID) REFERENCES CarRental(ID);
ALTER TABLE TravelDeal ADD FOREIGN KEY (TranslationID) REFERENCES Translation(ID);
ALTER TABLE TravelDeal ADD FOREIGN KEY (FlightID) REFERENCES Flight(ID);
