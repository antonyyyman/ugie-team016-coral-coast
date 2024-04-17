DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS travel_deals;

DROP TABLE IF EXISTS flights;
DROP TABLE IF EXISTS cruises;
DROP TABLE IF EXISTS hotels;
DROP TABLE IF EXISTS insurances;
DROP TABLE IF EXISTS car_rentals;
DROP TABLE IF EXISTS translations;
DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS bookings_flights;
DROP TABLE IF EXISTS flights_travel_deals;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15),
    is_staff BOOLEAN,
    nonce VARCHAR(255),
    nonce_expiry DATETIME,
    created DATETIME,
    modified DATETIME
);
-- use seed, for controller to hash the password

CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    --     booking_id INT,
    amount DECIMAL(10,2),
    payment_method VARCHAR(50),
    status VARCHAR(50)
    --     FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

CREATE TABLE contact_forms(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15),
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    request_nature ENUM('Booking request', 'Technical issues', 'Payment issues', 'General')
    query VARCHAR(500) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
    INDEX (email),
    INDEX (created)
);


CREATE TABLE insurances (
    id INT PRIMARY KEY AUTO_INCREMENT,
    supplier VARCHAR(50),
    level VARCHAR(50),
    description VARCHAR(50),
    price DECIMAL(10,2)
);

CREATE TABLE hotels (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    location VARCHAR(50),
    telephone VARCHAR(50),
    price DECIMAL(10,2)
);

CREATE TABLE cruises (
    id INT PRIMARY KEY AUTO_INCREMENT,
    company VARCHAR(50),
    description VARCHAR(50),
    price DECIMAL(10,2)
);

CREATE TABLE translations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    language_from VARCHAR(50),
    language_to VARCHAR(50),
    description VARCHAR(50),
    price DECIMAL(10,2)
);

CREATE TABLE car_rentals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    company VARCHAR(50),
    description VARCHAR(50),
    plate VARCHAR(50),
    brand VARCHAR(50),
    price DECIMAL(10,2)
);

CREATE TABLE travel_deals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    start_date DATE,
    end_date DATE,
    description VARCHAR(50),
    total_price DECIMAL(10,2),
    insurance_id INT,
    hotel_id INT,
    cruise_id INT,
    car_rental_id INT,
    translation_id INT,
    FOREIGN KEY (insurance_id) REFERENCES insurances(id),
    FOREIGN KEY (hotel_id) REFERENCES hotels(id),
    FOREIGN KEY (car_rental_id) REFERENCES car_rentals(id),
    FOREIGN KEY (translation_id) REFERENCES translations(id),
    FOREIGN KEY (cruise_id) REFERENCES cruises(id)
);

CREATE TABLE flights_travel_deals (
    flight_id INT,
    travel_deal_id INT,
    PRIMARY KEY (flight_id, travel_deal_id)
);

CREATE TABLE flights (
    id INT PRIMARY KEY AUTO_INCREMENT,
    number VARCHAR(50),
    departure_airport VARCHAR(50),
    arrival_airport VARCHAR(50),
    departure_date DATE,
    arrival_date DATE,
    price DECIMAL(10,2)
);

CREATE TABLE bookings_flights (
    booking_id INT,
    flight_id INT,
    PRIMARY KEY (booking_id, flight_id)
);

CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    start_date DATE,
    end_date DATE,
    destination VARCHAR(50),
    hotel_id INT,
    car_rental_id INT,
    insurance_id INT,
    translation_id INT,
    payment_id INT,
    travel_deal_id INT,
    total_price DECIMAL(10,2),
    booking_status BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (insurance_id) REFERENCES insurances(id),
    FOREIGN KEY (hotel_id) REFERENCES hotels(id),
    FOREIGN KEY (car_rental_id) REFERENCES car_rentals(id),
    FOREIGN KEY (translation_id) REFERENCES translations(id),
    FOREIGN KEY (payment_id) REFERENCES payments(id),
    FOREIGN KEY (travel_deal_id) REFERENCES travel_deals(id)
);

<<<<<<< HEAD

--Sample data, first create users using Seed, then execute the following

INSERT INTO translations (id, language_from, language_to, description, price) VALUES
    (1, 'English', 'Spanish', 'English to Spanish', 50.00),
    (2, 'English', 'French', 'English to French', 50.00),
    (3, 'English', 'German', 'English to German', 50.00),
    (4, 'English', 'Italian', 'English to Italian', 50.00);

INSERT INTO hotels (id, name, location, telephone, price) VALUES
    (1, 'Hilton', 'New York', '123-456-7890', 200.00),
    (2, 'Marriott', 'Los Angeles', '123-456-7890', 150.00),
    (3, 'Sheraton', 'San Francisco', '123-456-7890', 100.00);

INSERT INTO payments (id, amount, payment_method, status) VALUES
    (1, 100.00, 'credit card', 'paid'),
    (2, 200.00, 'debit card', 'unpaid'),
    (3, 200.00, 'debit card', 'unpaid'),
    (4, 409.35, 'cash', 'paid'),
    (5, 100.00, 'credit card', 'paid'),
    (6, 200.00, 'debit card', 'unpaid'),
    (7, 409.35, 'cash', 'paid'),
    (8, 100.00, 'credit card', 'paid'),
    (9, 200.00, 'debit card', 'unpaid');

INSERT INTO insurances (id, supplier, level, description, price) VALUES
    (1, 'Allianz', 'Gold', 'Full coverage', 100.00),
    (2, 'Allianz', 'Silver', 'Partial coverage', 50.00),
    (3, 'SunCare', 'Bronze', 'Basic coverage', 25.00);

INSERT INTO flights (id, number, departure_airport, arrival_airport, departure_date, arrival_date, price) VALUES
    (1, 'AA123', 'JFK', 'LAX', '2024-01-01', '2024-01-01', 200.00),
    (2, 'UA456', 'LAX', 'SFO', '2024-01-01', '2024-01-01', 150.00),
    (3, 'DL789', 'SFO', 'JFK', '2024-01-01', '2024-01-01', 100.00),
    (4, 'AA123', 'JFK', 'LAX', '2024-02-01', '2024-02-01', 200.00),
    (5, 'UA456', 'LAX', 'SFO', '2024-02-01', '2024-02-01', 150.00),
    (6, 'DL789', 'SFO', 'JFK', '2024-02-01', '2024-02-01', 100.00),
    (7, 'AA123', 'JFK', 'LAX', '2024-03-01', '2024-03-01', 200.00),
    (8, 'UA456', 'LAX', 'SFO', '2024-03-01', '2024-03-01', 150.00),
    (9, 'DL789', 'SFO', 'JFK', '2024-03-01', '2024-03-01', 100.00),
    (10, 'AA123', 'JFK', 'LAX', '2024-04-01', '2024-04-01', 200.00),
    (11, 'UA456', 'LAX', 'SFO', '2024-04-01', '2024-04-01', 150.00),
    (12, 'DL789', 'SFO', 'JFK', '2024-04-01', '2024-04-01', 100.00),
    (13, 'AA123', 'JFK', 'LAX', '2024-05-01', '2024-05-01', 203.00);

INSERT INTO car_rentals (id, company, description, plate, brand, price) VALUES
    (1, 'Hertz', 'Compact', '123-ABC', 'Toyota', 50.00),
    (2, 'Avis', 'SUV', '456-DEF', 'Ford', 75.00),
    (3, 'Enterprise', 'Luxury', '789-GHI', 'Mercedes', 100.00),
    (4, 'Budget', 'Economy', '101-JKL', 'Chevrolet', 25.00),
    (5, 'Alamo', 'Convertible', '112-MNO', 'BMW', 125.00);

INSERT INTO cruises (id, company, description, price) VALUES
    (1, 'Royal Caribbean', 'Caribbean Cruise', 500.00),
    (2, 'Carnival', 'Bahamas Cruise', 300.00),
    (3, 'Norwegian', 'Alaska Cruise', 700.00),
    (4, 'Princess', 'Mediterranean Cruise', 600.00);

INSERT INTO travel_deals (id, start_date, end_date, description, total_price, insurance_id, hotel_id, cruise_id, car_rental_id, translation_id) VALUES
    (1, '2024-01-01', '2024-01-07', 'New Year in New York', 1000.00, 1, 1, 1, 1, 1),
    (2, '2024-02-01', '2024-02-07', 'Valentine''s Day in Los Angeles', 800.00, 2, 2, 2, 2, 2),
    (3, '2024-03-01', '2024-03-07', 'Spring Break in San Francisco', 600.00, 3, 3, 2, 3, 3),
    (4, '2024-04-01', '2024-04-07', 'Easter in New York', 1000.00, 1, 1, 1, 1, 1),
    (5, '2024-05-01', '2024-05-07', 'Mother''s Day in Los Angeles', 800.00, 2, 2, 2, 2, 2),
    (6, '2024-06-01', '2024-06-07', 'Father''s Day in San Francisco', 600.00, 3, 3, 3, 3, 3),
    (7, '2024-07-01', '2024-07-07', 'Independence Day in New York', 1000.00, 1, 1, 4, 1, 1),
    (8, '2024-08-01', '2024-08-07', 'Labor Day in Los Angeles', 800.00, 2, 2, 4, 2, 2);


INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (1, 1, '2024-01-01', '2024-01-07', 'New York', NULL, NULL, NULL, NULL, 1, NULL, 1000.00, 1);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (2, 2, '2024-02-01', '2024-02-07', 'Los Angeles', NULL, NULL, NULL, NULL, 1, NULL, 800.00, 1);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (3, 3, '2024-03-01', '2024-03-07', 'San Francisco', 3, 3, 3, 3, 2, NULL, 600.00, 1);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (4, 3, '2024-04-01', '2024-04-07', 'New York', 1, 1, 1, 1, 2, NULL, 1000.00, 1);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (5, 2, '2024-05-01', '2024-05-07', 'Los Angeles', 2, 2, 2, 2, 3, NULL, 800.00, 0);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (6, 1, '2024-06-01', '2024-06-07', 'San Francisco', NULL, 3, NULL, 4, 3, NULL, 200.00, 1);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (7, 2, '2024-07-01', '2024-07-07', 'New York', NULL, NULL, NULL, NULL, 4, 1, 1000.00, 1);
INSERT INTO bookings (id, user_id, start_date, end_date, destination, hotel_id, car_rental_id, insurance_id, translation_id, payment_id, travel_deal_id, total_price, booking_status)
VALUES (8, 1, '2024-08-01', '2024-08-07', 'Los Angeles', NULL, NULL, NULL, NULL, 5, 2, 800.00, 1);

INSERT INTO flights (id, number, departure_airport, arrival_airport, departure_date, arrival_date, price) VALUES
    (1, 'AA123', 'JFK', 'LAX', '2024-01-01', '2024-01-01', 200.00),
    (2, 'UA456', 'LAX', 'SFO', '2024-01-01', '2024-01-01', 150.00),
    (3, 'DL789', 'SFO', 'JFK', '2024-01-01', '2024-01-01', 100.00),
    (4, 'AA123', 'JFK', 'LAX', '2024-02-01', '2024-02-01', 200.00),
    (5, 'UA456', 'LAX', 'SFO', '2024-02-01', '2024-02-01', 150.00),
    (6, 'DL789', 'SFO', 'JFK', '2024-02-01', '2024-02-01', 100.00),
    (7, 'AA123', 'JFK', 'LAX', '2024-03-01', '2024-03-01', 200.00),
    (8, 'UA456', 'LAX', 'SFO', '2024-03-01', '2024-03-01', 150.00),
    (9, 'DL789', 'SFO', 'JFK', '2024-03-01', '2024-03-01', 100.00),
    (10, 'AA123', 'JFK', 'LAX', '2024-04-01', '2024-04-01', 200.00),
    (11, 'UA456', 'LAX', 'SFO', '2024-04-01', '2024-04-01', 150.00),
    (12, 'DL789', 'SFO', 'JFK', '2024-04-01', '2024-04-01', 100.00),
    (13, 'AA123', 'JFK', 'LAX', '2024-05-01', '2024-05-01', 203.00);

INSERT INTO bookings_flights (booking_id, flight_id) VALUES
    (1, 1),
    (1, 2),
    (2, 3),
    (2, 4),
    (3, 5),
    (3, 6);

INSERT INTO flights_travel_deals (flight_id, travel_deal_id) VALUES
    (1, 1),
    (2, 1),
    (3, 2),
    (4, 2),
    (5, 4),
    (6, 4),
    (7, 7),
    (8, 7);
=======
ALTER TABLE contact_forms
ADD CONSTRAINT chk_email
CHECK (email LIKE '%_@__%.__%');

ALTER TABLE contact_forms
ADD CONSTRAINT chk_phone
CHECK (phone_number IS NULL OR phone_number REGEXP '^[0-9]{10}$');

ALTER TABLE contact_forms
ADD CONSTRAINT chk_name_length
CHECK (CHAR_LENGTH(first_name) >= 1 AND CHAR_LENGTH(last_name) >= 1);
>>>>>>> c7a35e9 (initial commit of baked files)
