<?php
    include 'connection.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $vehicle_license = mysqli_real_escape_string($con,$_POST['vehicle_select']);
        $date_vehicle_take = mysqli_real_escape_string($con,$_POST['date_vehicle_take']);
        $date_vehicle_leave = mysqli_real_escape_string($con,$_POST['date_vehicle_leave']);
        
        /* Ελέγχουμε αν τη συγκεκριμένη ημερομηνία είναι διαθέσιμο το όχημα και αν είναι κάνουμε την κράτηση */
        $res = mysqli_query($con,"SELECT * FROM vehicle_reservations WHERE License_plate='$vehicle_license' AND"
                        . "(Date_vehicle_take<='$date_vehicle_leave' AND Date_vehicle_leave>='$date_vehicle_take') ");
        if (mysqli_num_rows($res)!= 0){
            header("Location:../reservations_error.php");
        }
        else {
            $reservations = mysqli_query($con,"INSERT INTO vehicle_reservations VALUES ('', '$vehicle_license', '$date_vehicle_take', '$date_vehicle_leave')");

            if ($reservations) {
                header("Location:../reservations_vehicles.php");
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        }
    }