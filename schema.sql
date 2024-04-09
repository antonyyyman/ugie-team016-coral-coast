DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS bookings;
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
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number VARCHAR(15),
    is_staff BOOLEAN
--     nonce VARCHAR(255), -- ??
--     nonce_expiry DATETIME, --??
--     date_created DATETIME,
--     date_modified DATETIME
);


CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
--     booking_id INT,
    amount DECIMAL(10,2),
    payment_method VARCHAR(50),
    status VARCHAR(50)
--     FOREIGN KEY (booking_id) REFERENCES bookings(id)
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
    price VARCHAR(50)
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
    FOREIGN KEY (payment_id) REFERENCES translations(id),
    FOREIGN KEY (travel_deal_id) REFERENCES travel_deals(id)
);

-- ALTER TABLE bookings ADD FOREIGN KEY (userid) REFERENCES users(id);
-- ALTER TABLE bookings ADD FOREIGN KEY (insuranceid) REFERENCES Insurance(id);
-- ALTER TABLE bookings ADD FOREIGN KEY (hotelid) REFERENCES Hotel(id);
-- ALTER TABLE bookings ADD FOREIGN KEY (carrentalid) REFERENCES CarRental(id);
-- ALTER TABLE bookings ADD FOREIGN KEY (translationid) REFERENCES Translation(id);
-- ALTER TABLE bookings ADD FOREIGN KEY (flightid) REFERENCES Flight(id);
-- ALTER TABLE payments ADD FOREIGN KEY (bookingid) REFERENCES Booking(id);
-- ALTER TABLE travel_deals ADD FOREIGN KEY (insuranceid) REFERENCES Insurance(id);
-- ALTER TABLE travel_deals ADD FOREIGN KEY (hotelid) REFERENCES Hotel(id);
-- ALTER TABLE travel_deals ADD FOREIGN KEY (carrentalid) REFERENCES CarRental(id);
-- ALTER TABLE travel_deals ADD FOREIGN KEY (translationid) REFERENCES Translation(id);
-- ALTER TABLE travel_deals ADD FOREIGN KEY (flightid) REFERENCES Flight(id);
