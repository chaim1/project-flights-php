# Flights project

##tabel pilot

CREATE TABLE pilot(id int(11) AUTO_INCREMENT PRIMARY KEY,
                   name varchar(100) NOT null,
                   level int(11),
                   picture_src varchar(100))

## table `country`

CREATE TABLE country (id int(11)AUTO_INCREMENT PRIMARY KEY,
                      name varchar(100))                   



## table `airport`

CREATE TABLE airport (id int(11) AUTO_INCREMENT PRIMARY KEY,
name varchar(100) NOT null,
contry_id int(11),
FOREIGN KEY (contry_id) REFERENCES country(id))

## table `flight`

CREATE TABLE flight (id int(11) AUTO_INCREMENT PRIMARY KEY,
                     no varchar(12),
                     flight_datetime datetime,
                     flight_from int(11),
                     flight_to int(11),
                     pilot_id int(11),
                     FOREIGN KEY (flight_from) REFERENCES airport(id),                    
                     FOREIGN KEY (flight_to) REFERENCES airport(contry_id),                     
                     FOREIGN KEY (pilot_id) REFERENCES pilot(id)
                    )