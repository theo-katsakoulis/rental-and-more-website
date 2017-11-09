<?php
    include 'connection.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $hotel_name = mysqli_real_escape_string($con,$_POST['hotel_name']);
        $room_type = mysqli_real_escape_string($con,$_POST['room_type']);
        $reservation_room_num = mysqli_real_escape_string($con,$_POST['reservation_room_num']);
        $date_arrival = mysqli_real_escape_string($con,$_POST['date_arrival']);
        $date_departure = mysqli_real_escape_string($con,$_POST['date_departure']);
        
        /* Παίρνουμε τον διαθέσιμο αριθμό δωματίων από το ξενοδοχείο που θέλουμε να γίνει η κράτηση */
        $res = mysqli_query($con,"SELECT * FROM hotels WHERE Name='$hotel_name'");
        while($num = mysqli_fetch_array($res)){
            if ($room_type == '1bed'){
                $total_rooms = $num[4];
            }
            if ($room_type == '2bed'){
                $total_rooms = $num[5];
            }
            if ($room_type == '3bed'){
                $total_rooms = $num[6];
            }
        }
        
        $booked_rooms = 0;
        /* Ελέγχουμε αν τη συγκεκριμένη ημερομηνία υπάρχουν διαθέσιμα δωμάτια */
        $resu = mysqli_query($con,"SELECT * FROM hotels_reservations WHERE Hotel_name='$hotel_name' AND Room_type='$room_type' AND"
                        . "(Date_arrival<='$date_departure' AND Date_departure>='$date_arrival') ");
        while($dates = mysqli_fetch_array($resu)){
            $booked_rooms = $booked_rooms + $dates[3];
        }
        
        /* Ελέγχουμε αν είναι διαθέσιμος ο αριθμός δωματίων που ζητάει ο χρήστης και αν είναι κάνουμε την κράτηση */
        if ($total_rooms - ($booked_rooms + $reservation_room_num) > 0) {
            $reservations = mysqli_query($con,"INSERT INTO hotels_reservations VALUES ('', '$hotel_name', '$room_type', '$reservation_room_num', '$date_arrival', '$date_departure')");
            if ($reservations) {
                header("Location:../reservations_hotels.php");
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        }
        else {
            header("Location:../reservations_error.php");
        }
    }