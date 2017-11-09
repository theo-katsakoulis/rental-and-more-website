<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Κρατήσεις - Οχήματα</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/reservations_vehicles.css" rel="stylesheet" type="text/css">
        <link href="css/tipsy.css" rel="stylesheet" type="text/css">
        <script src="javascript/basic.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>   
        <ul>
            <li class="menu"><a href="index.php">Αρχική</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" onmouseover="rentFunction()">Ενοικιάσεις</a>
                <div class="dropdown-content" id="rentDropdown">
                    <a href="rent_hotel.php">Ξενοδοχεία</a>
                    <a href="rent_vehicle.php">Μεταφορικά</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" onmouseover="infoFunction()">Πληροφορίες</a>
                <div class="dropdown-content" id="infoDropdown">
                    <a href="museums.php">Μουσεία</a>
                    <a href="sights.php">Αξιοθέατα</a>
                    <a href="routes_before.php">Δρομολόγια</a>
                    <a href="travel_agencies.php">Εκδρομικά γραφεία</a>
                    <a href="companies.php">Συνεργαζόμενες εταιρίες</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" onmouseover="reservationsFunction()" style="background-color: limegreen;">Κρατήσεις Χρήστη</a>
                <div class="dropdown-content" id="reservationsDropdown">
                    <a href="reservations_hotels.php">Ξενοδοχεία</a>
                    <a href="reservations_vehicles.php">Μεταφορικά</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" onmouseover="searchFunction()">Αναζήτηση</a>
                <div class="dropdown-content" id="searchDropdown">
                    <a href="search_hotels.php">Ξενοδοχεία</a>
                    <a href="search_vehicles.php">Οχήματα</a>
                    <a href="search_travel.php">Εκδρομές</a>
                </div>
            </li>
        </ul>
        <div id="main">
            <?php
                include 'includes/connection.php';
                
                $no_res = 0;
                /* Αυτοκίνητα */
                $i = 1;
                $result = mysqli_query($con, "SELECT vehicle_reservations.*, vehicle_rental_car.*  "
                        . "FROM vehicle_reservations INNER JOIN vehicle_rental_car ON vehicle_reservations.License_plate=vehicle_rental_car.License_plate");
                if (mysqli_num_rows($result)!= 0){
                    while($car = mysqli_fetch_array($result)){
                        $no_res = 1;
                        echo "<div class='profile'>";
                        echo "<form action='includes/vehicle_cancel_reservation.php' method='post'>";
                        echo "<table>";
                            echo    "<tr style='border-bottom: 1px solid #ddd; width: 100%;'>";
                            echo    "<td style='width:20%;'><img class='photoContainer' src='" . $car[12] . "'style='border: none;' alt='No Image'/></td>";
                            echo    "<td style='width: 70%;'><p style='text-align: left; margin-left: 30px;'><b>Γραφείο ενοικίασης:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $car[4]<br>";
                            echo    "<b>Αυτοκίνητο:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $car[5]";
                            echo "<br>";
                            echo    "<b>Κατηγορία: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>";
                                if ($car[9] == 1){
                                    echo "Οικονομικό";
                                }
                                else if ($car[7] == 2){
                                    echo "Μεσαίο";
                                }
                                else if ($car[8] == 3){
                                    echo "Πολυτελείας";
                                }
                                else if ($car[9] == 4){
                                    echo "4x4";
                                }
                                else{
                                    echo "Cabrio";
                                }
                            echo    "<br><b>Ημερομηνία παραλαβής:</b>&nbsp $car[2]";
                            echo    "<br><b>Ημερομηνία παράδοσης:</b>&nbsp $car[3]";
                            echo    "<input type='hidden' name='reservation_id' value='$car[0]'>";
                            echo    "<input type='hidden' name='licence_plate' value='$car[1]'></p>";
                            echo    "</td><td style='border: none;'><input type='submit' class='show_more_button' name='cancel_button$i' value='Ακύρωση Κράτησης $i'></td></tr>";
                        echo "</table>";   
                        echo "</form>";
                        echo "</div>";
                        $i++;
                    }
                }
                
                
                /* Μοτοσυκλέτες */
                $res = mysqli_query($con, "SELECT vehicle_reservations.*, vehicle_rental_moto.*  "
                        . "FROM vehicle_reservations INNER JOIN vehicle_rental_moto ON vehicle_reservations.License_plate=vehicle_rental_moto.License_plate");
                if (mysqli_num_rows($res)!= 0){
                    while($moto = mysqli_fetch_array($res)){
                        $no_res = 1;
                        echo "<div class='profile'>";
                        echo "<form action='includes/vehicle_cancel_reservation.php' method='post'>";
                        echo "<table>";
                            echo    "<tr style='border-bottom: 1px solid #ddd; width: 100%;'>";
                            echo    "<td style='width:20%;'><img class='photoContainer' src='" . $moto[10] . "'style='border: none;' alt='No Image'/></td>";
                            echo    "<td style='width: 70%;'><p style='text-align: left; margin-left: 30px;'><b>Γραφείο ενοικίασης:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $moto[4]<br>";
                            echo    "<b>Μοτοσυκλέτα:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $moto[5]";
                            echo "<br>";
                            echo    "<b>Κατηγορία: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b> $moto[8]";
                            echo    "<br><b>Ημερομηνία παραλαβής:</b>&nbsp $moto[2]";
                            echo    "<br><b>Ημερομηνία παράδοσης:</b>&nbsp $moto[3]";
                            echo    "<input type='hidden' name='reservation_id' value='$moto[0]'>";
                            echo    "<input type='hidden' name='licence_plate' value='$moto[1]'></p>";
                            echo    "</td><td style='border: none;'><input type='submit' class='show_more_button' name='cancel_button$i' value='Ακύρωση Κράτησης $i'></td></tr>";
                        echo "</table>";   
                        echo "</form>";
                        echo "</div>";
                        $i++;
                    }
                }
                
                if ($no_res == 0) {
                    echo "<br><br><h3 style='border: 1px solid #ddd; margin-left: 30px; margin-bottom: 200px; width: 80%; padding: 10px;
                        background-color: white;'>Δεν υπάρχουν κρατήσεις μεταφορικών.</h3>";
                }
            ?>   
        </div>  
    </body>
</html>