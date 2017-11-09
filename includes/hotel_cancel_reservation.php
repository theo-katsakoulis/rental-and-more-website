<?php
    include 'connection.php';
    $room_type = $room_nums = $date_arrival = $date_departure = $username = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $submit = mysqli_real_escape_string($con,$_POST['cancel_button']);     
        $reservation_id = mysqli_real_escape_string($con,$_POST['reservation_id']);     

        /* Διαγράφουμε την κράτηση που έχει επιλέξει ο χρήστης */
        $res = mysqli_query($con,"SELECT * FROM hotels_reservations");
        while($id_arr = mysqli_fetch_array($res)){
            $result = mysqli_query($con,"DELETE FROM hotels_reservations WHERE Reservation_id='$reservation_id'");
        }
        header("Location:../reservations_hotels.php");
    }