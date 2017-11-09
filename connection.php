<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
            
    $con = mysqli_connect($db_host, $db_user, $db_pass) or die ("could not connect to mysql");
    
    mysqli_query($con, "CREATE DATABASE IF NOT EXISTS olga_db");
    mysqli_select_db($con, "olga_db");
    mysqli_query($con, "SET CHARACTER SET 'utf8'");
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, "ALTER DATABASE olga_db CHARACTER SET utf8 COLLATE utf8_general_ci");
    $result = mysqli_query($con, "SHOW TABLES FROM olga_db");
    
    //if database is empty
    if(mysqli_num_rows($result) == 0){
        /* Ξενοδοχεία */
        mysqli_query($con, "CREATE TABLE hotels(Name varchar(100), Category ENUM('1', '2', '3', '4', '5'), Address varchar(100), Phone_num varchar(50), Num_1bed int, Num_2bed int, Num_3bed int, Image varchar(200))");
        mysqli_query($con, "CREATE TABLE hotels_reservations(Reservation_id INT AUTO_INCREMENT PRIMARY KEY, Hotel_name varchar(100), Room_type ENUM('1bed', '2bed', '3bed'), Room_nums INT, Date_arrival varchar(20), Date_departure varchar(20))");
      
        /* Οχήματα */
        mysqli_query($con, "CREATE TABLE vehicle_rental(Name varchar(100), Address varchar(100), Phone_num varchar(100), Logo varchar(200))");
        mysqli_query($con, "CREATE TABLE vehicle_rental_car(Rental_agency_name varchar(100), Car_name varchar(200), License_plate varchar(100), Cc varchar(50), Seats ENUM('2', '3', '4', '5'), Category ENUM('1', '2', '3', '4', '5'), One_day_price INT, Many_days_price varchar(100), Image varchar(200))");
        mysqli_query($con, "CREATE TABLE vehicle_rental_moto(Rental_agency_name varchar(100), Moto_name varchar(200), License_plate varchar(100), Cc varchar(50), Category varchar(50), Price_info INT, Image varchar(200))");
        mysqli_query($con, "CREATE TABLE vehicle_reservations(Reservation_id INT AUTO_INCREMENT PRIMARY KEY, License_plate varchar(200), Date_vehicle_take varchar(20), Date_vehicle_leave varchar(20))");

        /* Μουσεία */
        mysqli_query($con, "CREATE TABLE museums(Name varchar(100), Address varchar(100), Phone_num varchar(100), Price varchar(100), Photo varchar(200))");
        
        /* Αξιοθεατα */
        mysqli_query($con, "CREATE TABLE sights(Name varchar(100), Images varchar(100), Info varchar(10000))");
        
        /* Δρομολόγια */
        mysqli_query($con, "CREATE TABLE routes(Transport varchar(50), Routes_from varchar(200), Routes_to varchar(200), Departure_Arrival varchar(100), Scheduled_days varchar(100), Price varchar(100), Company varchar(100))");

        /* Εκδρομικά γραφεία */
        mysqli_query($con, "CREATE TABLE travel_agencies(Name varchar(100), Address varchar(100), Phone_num varchar(50), Logo varchar(200))");
        mysqli_query($con, "CREATE TABLE travel_agencies_tours(Travel_agency_name varchar(100), Starting_point varchar(200), Ending_point varchar(200), Days INT, Departure varchar(100), Price INT, Photo varchar(200))");
        mysqli_query($con, "CREATE TABLE travel_agencies_offers(Travel_agency_name varchar(100), Offer_info varchar(10000))");
        
        /* Συνεργαζόμενες εταιρίες */
        mysqli_query($con, "CREATE TABLE cooperating_agencies(Hotels varchar(100), Transport_companies varchar(100), Rental_Agencies varchar(100))");
        
        
        /* Γέμισμα των βάσεων με δεδομένα από αρχεία .csv */
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/museums.csv' INTO TABLE museums FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/rent_hotel.csv' INTO TABLE hotels FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/sights.csv' INTO TABLE sights FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/routes.csv' INTO TABLE routes FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/travel_agencies.csv' INTO TABLE travel_agencies FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/travel_agencies_tours.csv' INTO TABLE travel_agencies_tours FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/travel_agencies_offers.csv' INTO TABLE travel_agencies_offers FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/rent_vehicle_agencies.csv' INTO TABLE vehicle_rental FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/rent_vehicle_car.csv' INTO TABLE vehicle_rental_car FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");
        mysqli_query($con, "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/ptyxiaki_olga/includes/csv/rent_vehicle_moto.csv' INTO TABLE vehicle_rental_moto FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n' IGNORE 2 LINES");

    }
    
    
?>
