CREATE TABLE IF NOT EXISTS contact (
  id BIGINT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  email VARCHAR(32),
  phone_number VARCHAR(32),
  PRIMARY KEY (id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS address (
  id BIGINT NOT NULL AUTO_INCREMENT,
  street VARCHAR(32) NOT NULL,
  flat_number VARCHAR(6),
  city VARCHAR(32) NOT NULL,
  country VARCHAR(32) NOT NULL,
  PRIMARY KEY (id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS person (
  id BIGINT NOT NULL AUTO_INCREMENT,
  email VARCHAR(64) UNIQUE,
  password VARCHAR(255),
  name VARCHAR(64),
  is_activated TINYINT NOT NULL DEFAULT 0,
  points BIGINT NOT NULL DEFAULT 0,
  contact_id BIGINT NOT NULL,
  is_agency TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (contact_id) REFERENCES contact(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS admin (
  id BIGINT NOT NULL AUTO_INCREMENT,
  email VARCHAR(64) UNIQUE,
  password VARCHAR(255),
  name VARCHAR(64) UNIQUE,
  PRIMARY KEY (id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS activation_token (
  id BIGINT NOT NULL AUTO_INCREMENT,
  token VARCHAR(64),
  person_id BIGINT NOT NULL,
  generate_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (person_id) REFERENCES person(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS forgotten_password_token (
  id BIGINT NOT NULL AUTO_INCREMENT,
  token VARCHAR(64),
  person_id BIGINT NOT NULL,
  generate_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (person_id) REFERENCES person(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS price (
  id BIGINT NOT NULL AUTO_INCREMENT,
  value INT,
  currency VARCHAR(16),
  type TINYINT UNSIGNED,
  PRIMARY KEY (id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS property (
  id BIGINT NOT NULL AUTO_INCREMENT,
  property_type TINYINT UNSIGNED,
  building_type TINYINT UNSIGNED,
  address_id BIGINT NOT NULL,
  area INT UNSIGNED,
  room_count SMALLINT UNSIGNED,
  min_person SMALLINT UNSIGNED,
  max_person SMALLINT UNSIGNED,
  floor INT,
  lift TINYINT,
  balcony TINYINT,
  furnished TINYINT,
  heating_type TINYINT,
  parking_place TINYINT,
  pets TINYINT,
  built_year INT,
  basement TINYINT,
  garden TINYINT,
  climatisation TINYINT,
  smoking TINYINT,
  PRIMARY KEY (id),
  FOREIGN KEY (address_id) REFERENCES address(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS offer (
  id BIGINT NOT NULL AUTO_INCREMENT,
  alias VARCHAR(128) UNIQUE,
  offer_type TINYINT UNSIGNED,
  fake_latitude DOUBLE NOT NULL,
  fake_longitude DOUBLE NOT NULL,
  offer_actual_to_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  add_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  active TINYINT DEFAULT 1,
  title VARCHAR(128),
  description VARCHAR(2000),
  price_id BIGINT NOT NULL,
  property_id BIGINT NOT NULL,
  person_id BIGINT NOT NULL,
  contact_id BIGINT NOT NULL,
  views BIGINT NOT NULL DEFAULT 0,
  is_consumed_by_admin TINYINT NOT NULL DEFAULT 0,
  was_ending_notified TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (price_id) REFERENCES price(id),
  FOREIGN KEY (property_id) REFERENCES property(id),
  FOREIGN KEY (person_id) REFERENCES person(id),
  FOREIGN KEY (contact_id) REFERENCES contact(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS offers_photo(
  id BIGINT NOT NULL AUTO_INCREMENT,
  property_id BIGINT NOT NULL,
  url VARCHAR(255) NOT NULL,
  thumb_url VARCHAR(255) NOT NULL,
  store_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  priority INTEGER DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (property_id) REFERENCES property(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS temporary_photo(
  id BIGINT NOT NULL AUTO_INCREMENT,
  person_id BIGINT NOT NULL,
  url VARCHAR(255) NOT NULL,
  thumb_url VARCHAR(255) NOT NULL,
  store_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (person_id) REFERENCES person(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS currency(
  currency_code VARCHAR(16)NOT NULL,
  currency_value DOUBLE NOT NULL,
  PRIMARY KEY(currency_code)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS reported_offer(
  id BIGINT NOT NULL AUTO_INCREMENT,
  offer_id BIGINT NOT NULL,
  report_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  cause VARCHAR(255),
  consumed TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (offer_id) REFERENCES offer(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS offer_accepting_history(
  id BIGINT NOT NULL AUTO_INCREMENT,
  admin_id BIGINT NOT NULL,
  reason VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (admin_id) REFERENCES admin(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS offer_report_history(
  id BIGINT NOT NULL AUTO_INCREMENT,
  admin_id BIGINT NOT NULL,
  report_id BIGINT NOT NULL,
  reason VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (admin_id) REFERENCES admin(id),
   FOREIGN KEY (report_id) REFERENCES reported_offer(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS offer_payment_activation_history(
  id BIGINT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS offer_history(
  id BIGINT NOT NULL AUTO_INCREMENT,
  offer_id BIGINT NOT NULL,
  deactivated TINYINT default NULL,
  event_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  offer_accepting_history_id BIGINT,
  offer_report_history_id BIGINT,
  offer_activation_payment_history_id BIGINT,
  PRIMARY KEY (id),
  FOREIGN KEY (offer_id) REFERENCES offer(id),
  FOREIGN KEY (offer_accepting_history_id) REFERENCES offer_accepting_history(id),
  FOREIGN KEY (offer_report_history_id) REFERENCES offer_report_history(id),
  FOREIGN KEY (offer_activation_payment_history_id) REFERENCES offer_payment_activation_history(id)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO contact(name,email,phone_number) VALUES('Dominik','firmowy@mail.com','888 888 888');

INSERT INTO person(email, password, name,contact_id) VALUES('tubedzieemail@email.com','asd','Domino Krolino',1);

INSERT INTO admin(email, password, name) VALUES('admin','admin','admin name');

INSERT INTO `address` VALUES ('1', 'Rondo Mogilskie', null, 'Kraków', 'Polska');
INSERT INTO `price` VALUES ('1', '69', 'EUR', '0');
INSERT INTO `property` VALUES ('1', '50', '51', '1', '73', '2', '0', '10', '3', '0', '1', '1', '1', '0', '1', '1995', '0', '1', '1', '0');
INSERT INTO `offer` VALUES ('1', null, '2', '140.0641833', '199.96140230000003', '2017-01-16 01:14:05', '2017-01-16 01:14:05', '1', 'Księstwo mogilskie', 'Ksiestwo mogilskie zaprasza na turnieje birpongowe w doborowym towarzystkie, można zagrać w szachy, uprać pranie w pralce, pogadać na balkonie na fajce, w lodówce mamy kapuste a kieszenie mamy puste ale uśmiech mamy na twarzy kto wie co dzi? się zdarzy. Specjalnie na potrzeby zdjęć zrobiliśmy tego syfa, utrzymanie porzadku to praca syzyfa', '1', '1', '1', '1', '13214','0','0');
INSERT INTO `offers_photo` VALUES ('1', '1', '/home/placefinder/photos/1-a.jpg', '/home/placefinder/photos/thumb/thumb1-a.jpg', '2017-01-16 01:14:05', '0');
INSERT INTO `offers_photo` VALUES ('2', '1', '/home/placefinder/photos/1-b.jpg', '/home/placefinder/photos/thumb/thumb1-b.jpg', '2017-01-16 01:14:06', '1');
INSERT INTO `offers_photo` VALUES ('3', '1', '/home/placefinder/photos/1-c.jpg', '/home/placefinder/photos/thumb/thumb1-c.jpg', '2017-01-16 01:14:06', '2');
INSERT INTO `offers_photo` VALUES ('4', '1', '/home/placefinder/photos/1-d.jpg', '/home/placefinder/photos/thumb/thumb1-d.jpg', '2017-01-16 01:14:06', '3');
INSERT INTO `offers_photo` VALUES ('5', '1', '/home/placefinder/photos/1-e.jpg', '/home/placefinder/photos/thumb/thumb1-e.jpg', '2017-01-16 01:14:06', '4');

INSERT INTO `reported_offer`(offer_id, cause) VALUES ('1','Brzydka oferta, proszę o usunięcie bo jest rasistowska i wgl usuń to bla bla bla');
