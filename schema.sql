CREATE TABLE STAFF (
                       staff_id INT(11) NOT NULL AUTO_INCREMENT,
                       user_name VARCHAR(50) NOT NULL,
                       password VARCHAR(50) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       phone_number VARCHAR(20) NOT NULL,
                       role VARCHAR(20) NOT NULL,
                       PRIMARY KEY (staff_id)
);

CREATE TABLE CUSTOMER (
                          customer_id INT(11) NOT NULL AUTO_INCREMENT,
                          username VARCHAR(50) NOT NULL,
                          password VARCHAR(50) NOT NULL,
                          email VARCHAR(50) NOT NULL,
                          phone_number VARCHAR(20) NOT NULL,
                          PRIMARY KEY (customer_id)
);

CREATE TABLE BOOKING (
                         booking_id INT(11) NOT NULL AUTO_INCREMENT,
                         customer_id INT(11) NOT NULL,
                         start_date DATE NOT NULL,
                         end_date DATE NOT NULL,
                         PRIMARY KEY (booking_id),
                         FOREIGN KEY (customer_id) REFERENCES CUSTOMER(customer_id)
);

CREATE TABLE FLIGHT (
                        flight_id INT(11) NOT NULL AUTO_INCREMENT,
                        flight_number VARCHAR(10) NOT NULL,
                        dept_airport VARCHAR(50) NOT NULL,
                        dest_airport VARCHAR(50) NOT NULL,
                        flight_date DATE NOT NULL,
                        carrier_airline VARCHAR(50) NOT NULL,
                        price DECIMAL(10, 2) NOT NULL,
                        PRIMARY KEY (flight_id)
);

CREATE TABLE CRUISE (
                        cruise_id INT(11) NOT NULL AUTO_INCREMENT,
                        cruise_company VARCHAR(50) NOT NULL,
                        cruise_description TEXT NOT NULL,
                        cruise_price DECIMAL(10, 2) NOT NULL,
                        PRIMARY KEY (cruise_id)
);

CREATE TABLE HOTEL (
                       hotel_id INT(11) NOT NULL AUTO_INCREMENT,
                       hotel_name VARCHAR(50) NOT NULL,
                       hotel_location VARCHAR(50) NOT NULL,
                       hotel_number VARCHAR(10) NOT NULL,
                       hotel_telephone VARCHAR(20) NOT NULL,
                       hotel_price DECIMAL(10, 2) NOT NULL,
                       PRIMARY KEY (hotel_id)
);

CREATE TABLE INSURANCE (
                           insurance_id INT(11) NOT NULL AUTO_INCREMENT,
                           insurance_supplier VARCHAR(50) NOT NULL,
                           insurance_level VARCHAR(20) NOT NULL,
                           insurance_description TEXT NOT NULL,
                           insurance_price DECIMAL(10, 2) NOT NULL,
                           payment_date DATE NOT NULL,
                           PRIMARY KEY (insurance_id)
);

CREATE TABLE CAR_RENTAL (
                            rental_id INT(11) NOT NULL AUTO_INCREMENT,
                            rental_company VARCHAR(50) NOT NULL,
                            car_description TEXT NOT NULL,
                            car_plate VARCHAR(10) NOT NULL,
                            car_brand VARCHAR(50) NOT NULL,
                            rent_price DECIMAL(10, 2) NOT NULL,
                            PRIMARY KEY (rental_id)
);

CREATE TABLE TRANSLATION (
                             translation_id INT(11) NOT NULL AUTO_INCREMENT,
                             translate_from VARCHAR(50) NOT NULL,
                             translate_to VARCHAR(50) NOT NULL,
                             translate_desp TEXT NOT NULL,
                             translation_price DECIMAL(10, 2) NOT NULL,
                             PRIMARY KEY (translation_id)
);

CREATE TABLE PAYMENT (
                         payment_id INT(11) NOT NULL AUTO_INCREMENT,
                         booking_id INT(11) NOT NULL,
                         payment_method VARCHAR(50) NOT NULL,
                         status VARCHAR(20)NOT NULL,
                         amount DECIMAL(10, 2) NOT NULL,
                         PRIMARY KEY (payment_id),
                         FOREIGN KEY (booking_id) REFERENCES BOOKING(booking_id)
);

CREATE TABLE TRAVEL_DEAL (
                             package_id INT(11) NOT NULL AUTO_INCREMENT,
                             start_date DATE NOT NULL,
                             end_date DATE NOT NULL,
                             description TEXT NOT NULL,
                             total_price DECIMAL(10, 2) NOT NULL,
                             PRIMARY KEY (package_id)
);

ALTER TABLE BOOKING
    ADD COLUMN key_destination VARCHAR(50) NOT NULL,
ADD COLUMN flight_id_dept INT(11) NOT NULL,
ADD COLUMN flight_id_return INT(11) NOT NULL,
ADD COLUMN cruise_id INT(11) NOT NULL,
ADD COLUMN hotel_id INT(11) NOT NULL,
ADD COLUMN rental_id INT(11) NOT NULL,
ADD COLUMN translation_id INT(11) NOT NULL,
ADD COLUMN insurance_id INT(11) NOT NULL,
ADD COLUMN package_id INT(11) NOT NULL;

ALTER TABLE BOOKING
    ADD FOREIGN KEY (flight_id_dept) REFERENCES FLIGHT(flight_id),
ADD FOREIGN KEY (flight_id_return) REFERENCES FLIGHT(flight_id),
ADD FOREIGN KEY (cruise_id) REFERENCES CRUISE(cruise_id),
ADD FOREIGN KEY (hotel_id) REFERENCES HOTEL(hotel_id),
ADD FOREIGN KEY (rental_id) REFERENCES CAR_RENTAL(rental_id),
ADD FOREIGN KEY (translation_id) REFERENCES TRANSLATION(translation_id),
ADD FOREIGN KEY (insurance_id) REFERENCES INSURANCE(insurance_id),
ADD FOREIGN KEY (package_id) REFERENCES TRAVEL_DEAL(package_id);
