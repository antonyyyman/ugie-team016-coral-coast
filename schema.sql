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

CREATE TABLE insurances (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           supplier VARCHAR(50),
                           level VARCHAR(50),
                           description VARCHAR(50),
                           price DECIMAL(10,2)
);

CREATE TABLE hotels (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(50),
                       location VARCHAR(50)
);

CREATE TABLE cruises (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        company VARCHAR(50),
                        description VARCHAR(50),
                        price DECIMAL(10,2),
                        hotel_id INT
);

CREATE TABLE translations (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             from_language VARCHAR(50),
                             to_language VARCHAR(50),
                             description VARCHAR(50),
                             price DECIMAL(10,2)
);

CREATE TABLE flights (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        flight_number VARCHAR(50),
                        departure_airport VARCHAR(50),
                        arrival_airport VARCHAR(50),
                        departure_date DATE,
                        arrival_date DATE,
                        price DECIMAL(10,2)
);

CREATE TABLE car_rentals (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           company VARCHAR(50),
                           description VARCHAR(50),
                           plate VARCHAR(50),
                           brand VARCHAR(50),
                           price DECIMAL(10,2)
);

CREATE TABLE bookings (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         user_id INT,
                         start_date DATE,
                         end_date DATE,
                         destination VARCHAR(50),
                         insurance_id INT,
                         hotel_id INT,
                         car_rental_id INT,
                         translation_id INT,
                         flight_id INT,
                         FOREIGN KEY (user_id) REFERENCES users(id),
                         FOREIGN KEY (insurance_id) REFERENCES insurances(id),
                         FOREIGN KEY (hotel_id) REFERENCES hotels(id),
                         FOREIGN KEY (car_rental_id) REFERENCES car_rentals(id),
                         FOREIGN KEY (translation_id) REFERENCES translations(id),
                         FOREIGN KEY (flight_id) REFERENCES flights(id)
);

CREATE TABLE payments (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         booking_id INT,
                         amount DECIMAL(10,2),
                         payment_method VARCHAR(100),
                         status VARCHAR(50),
                         FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

CREATE TABLE travel_deals (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            start_date DATE,
                            end_date DATE,
                            description VARCHAR(50),
                            total_price DECIMAL(10,2),
                            insurance_id INT,
                            hotel_id INT,
                            car_rental_id INT,
                            translation_id INT,
                            flight_id INT,
                            FOREIGN KEY (insurance_id) REFERENCES insurances(id),
                            FOREIGN KEY (hotel_id) REFERENCES hotels(id),
                            FOREIGN KEY (car_rental_id) REFERENCES car_rentals(id),
                            FOREIGN KEY (translation_id) REFERENCES translations(id),
                            FOREIGN KEY (flight_id) REFERENCES flights(id)
);