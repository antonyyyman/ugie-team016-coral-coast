CREATE TABLE users (
                       user_id INT PRIMARY KEY,
                       user_name VARCHAR(50),
                       password VARCHAR(50),
                       email VARCHAR(50),
                       phone_number VARCHAR(15),
                       role VARCHAR(10)
);

CREATE TABLE bookings (
                          booking_id INT PRIMARY KEY,
                          user_id INT,
                          start_date DATE,
                          end_date DATE,
                          destination_id INT,
                          flight_dept_id INT,
                          flight_return_id INT,
                          payment_id INT,
                          insurance_id INT,
                          car_rental_id INT,
                          translation_id INT,
                          package_id INT,
                          FOREIGN KEY (user_id) REFERENCES users(user_id),
                          FOREIGN KEY (destination_id) REFERENCES hotels(hotel_id),
                          FOREIGN KEY (flight_dept_id) REFERENCES flights(flight_id),
                          FOREIGN KEY (flight_return_id) REFERENCES flights(flight_id),
                          FOREIGN KEY (payment_id) REFERENCES payments(payment_id),
                          FOREIGN KEY (insurance_id) REFERENCES insurances(insurance_id),
                          FOREIGN KEY (car_rental_id) REFERENCES car_rentals(rental_id),
                          FOREIGN KEY (translation_id) REFERENCES translations(translation_id),
                          FOREIGN KEY (package_id) REFERENCES travel_deals(package_id)
);

CREATE TABLE flights (
                         flight_id INT PRIMARY KEY,
                         flight_number INT,
                         dept_airport VARCHAR(50),
                         dest_airport VARCHAR(50),
                         flight_date DATE,
                         carrier_airline VARCHAR(50),
                         price DECIMAL(10, 2),
                         insurance_id INT,
                         hotel_id INT,
                         cruise_id INT,
                         car_rental_id INT,
                         translation_id INT,
                         FOREIGN KEY (insurance_id) REFERENCES insurances(insurance_id),
                         FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id),
                         FOREIGN KEY (cruise_id) REFERENCES cruises(cruise_id),
                         FOREIGN KEY (car_rental_id) REFERENCES car_rentals(rental_id),
                         FOREIGN KEY (translation_id) REFERENCES translations(translation_id)
);

CREATE TABLE hotels (
                        hotel_id INT PRIMARY KEY,
                        hotel_name VARCHAR(50),
                        hotel_location VARCHAR(50),
                        hotel_number INT,
                        hotel_telephone VARCHAR(15),
                        hotel_price DECIMAL(10, 2)
);

CREATE TABLE cruises (
                         cruise_id INT PRIMARY KEY,
                         cruise_company VARCHAR(50),
                         cruise_description VARCHAR(50),
                         cruise_price DECIMAL(10, 2)
);

CREATE TABLE insurances (
                            insurance_id INT PRIMARY KEY,
                            insurance_supplier VARCHAR(50),
                            insurance_level VARCHAR(10),
                            insurance_description VARCHAR(50),
                            insurance_price DECIMAL(10, 2),
                            payment_id INT,
                            hotel_id INT,
                            car_rental_id INT,
                            flight_id INT,
                            FOREIGN KEY (payment_id) REFERENCES payments(payment_id),
                            FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id),
                            FOREIGN KEY (car_rental_id) REFERENCES car_rentals(rental_id),
                            FOREIGN KEY (flight_id) REFERENCES flights(flight_id)
);

CREATE TABLE car_rentals (
                             rental_id INT PRIMARY KEY,
                             rental_company VARCHAR(50),
                             car_description VARCHAR(50),
                             car_plate VARCHAR(10),
                             car_brand VARCHAR(50),
                             rent_price DECIMAL(10, 2),
                             payment_id INT,
                             flight_id INT,
                             hotel_id INT,
                             FOREIGN KEY (payment_id) REFERENCES payments(payment_id),
                             FOREIGN KEY (flight_id) REFERENCES flights(flight_id),
                             FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id)
);

CREATE TABLE translations (
                              translation_id INT PRIMARY KEY,
                              translate_from VARCHAR(50),
                              translate_to VARCHAR(50),
                              translate_desp VARCHAR(50),
                              translation_price DECIMAL(10, 2),
                              payment_id INT,
                              hotel_id INT,
                              flight_id INT,
                              FOREIGN KEY (payment_id) REFERENCES payments(payment_id),
                              FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id),
                              FOREIGN KEY (flight_id) REFERENCES flights(flight_id)
);

CREATE TABLE travel_deals (
                              package_id INT PRIMARY KEY,
                              start_date DATE,
                              end_date DATE,
                              description VARCHAR(50),
                              total_price DECIMAL(10, 2),
                              flight_id INT,
                              hotel_id INT,
                              cruise_id INT,
                              car_rental_id INT,
                              translation_id INT,
                              FOREIGN KEY (flight_id) REFERENCES flights(flight_id),
                              FOREIGN KEY (hotel_id) REFERENCES hotels(hotel_id),
                              FOREIGN KEY (cruise_id) REFERENCES cruises(cruise_id),
                              FOREIGN KEY (car_rental_id) REFERENCES car_rentals(rental_id),
                              FOREIGN KEY (translation_id) REFERENCES translations(translation_id)
);

CREATE TABLE payments (
                          payment_id INT PRIMARY KEY,
                          payment_date DATE,
                          payment_method VARCHAR(50),
                          payment_status VARCHAR(50),
                          total_price DECIMAL(10, 2),
                          booking_id INT,
                          user_id INT,
                          FOREIGN KEY (booking_id) REFERENCES bookings(booking_id),
                          FOREIGN KEY (user_id) REFERENCES users(user_id)
);
