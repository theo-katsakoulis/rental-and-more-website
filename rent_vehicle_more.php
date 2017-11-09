<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Ενοικιάσεις - Οχήματα</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/rent_vehicle.css" rel="stylesheet" type="text/css">
        <link href="css/rent_vehicle_more.css" rel="stylesheet" type="text/css">
        <link href="css/tipsy.css" rel="stylesheet" type="text/css">
        <script src="javascript/basic.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>   
        <ul>
            <li class="menu"><a href="index.php">Αρχική</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" onmouseover="rentFunction()" style="background-color: limegreen;">Ενοικιάσεις</a>
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
                <a href="javascript:void(0)" class="dropbtn" onmouseover="reservationsFunction()">Κρατήσεις Χρήστη</a>
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
                
                $date_min = date('Y-m-d');
                $name = $_GET['agency_name'];
                $result = mysqli_query($con, "SELECT * FROM vehicle_rental WHERE Name='$name'");
                while($agency = mysqli_fetch_array($result)){
                    echo "<div class='profile'>";
                        echo "<div class='photo'>";
                            echo "<img class='photoContainer' src='" . $agency[3] . "' alt='No Image'/>";
                        echo "</div>";
                        echo "<div class='info'>";
                            echo "<h3><b>" . $agency[0] . "</b></h3>";
                            echo "<div class='shortInfo'>";
                                echo "<span class='address'>";
                                    echo "Διεύθυνση : " . $agency[1];
                                echo "</span> <br>";
                                echo "<span class='phone'>";
                                    echo "Τηλέφωνο : " . $agency[2];
                                echo "</span><br>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                
                /* Ενοικίαση αυτοκινήτου */
                echo "<div id='details'>";
                    echo "<div id='description'>";
                        echo "<h3 class='title' style='line-height: 100%;'><b> Ενοικίαση Αυτοκινήτου </b></h3><br>";
                    echo "</div>";
                    $res = mysqli_query($con, "SELECT * FROM vehicle_rental_car WHERE Rental_agency_name='$name'");
                    if (mysqli_num_rows($res)!= 0){
                        echo "<form action='includes/vehicle_reservation.php' method='post'>";
                        echo "<table id='car'>";
                            echo "<tr><th style='border:none;'>Επιλέξτε όχημα</th>";
                            echo "<th>Εικόνα</th>";
                            echo "<th>Αυτοκίνητο</th>";
                            echo "<th>Κυβικά </th>";
                            echo "<th>Θέσεις επιβατών </th>";
                            echo "<th>Κατηγορία</th>";
                            echo "<th>Τιμή ανά ημέρα(€) </th>";
                            echo "<th>Τιμή ανά ημέρες(€) </th></tr>";
                            while($cars = mysqli_fetch_array($res)){  
                                echo "<tr><td><input type='radio' name='vehicle_select' value='" . $cars[2] . "' required></td>";
                                echo "<td><img class='car' src='" . $cars[8] . "' alt=''/></td>";
                                echo "<td>$cars[1]</td>";
                                echo "<td>$cars[3]</td>";
                                echo "<td>$cars[4]</td>";
                                echo "<td>";
                                    if ($cars[5] == 1){
                                        echo "Οικονομικό";
                                    }
                                    else if ($cars[5] == 2){
                                        echo "Μεσαίο";
                                    }
                                    else if ($cars[5] == 3){
                                        echo "Πολυτελείας";
                                    }
                                    else if ($cars[5] == 4){
                                        echo "4x4";
                                    }
                                    else{
                                        echo "Cabrio";
                                    }
                                echo "</td>";
                                echo "<td>$cars[6]</td>";
                                echo "<td>$cars[7]</td></tr>";
                            }
                        echo "</table>";

                        echo "<table id='rent'>";
                            echo "<tr><th>Ημ/νία παραλαβής</th>";
                            echo "<th>Ημ/νία παράδοσης</th>";
                            echo "<th></th></tr>";
                            echo "</tr><td><input type='date' class='date' name='date_vehicle_take' min='$date_min' required></td>";
                            echo "<td><input type='date' class='date' name='date_vehicle_leave' min='$date_min' required></td>";
                            echo "<td><input type='submit' class='show_more_button' name='reserve_button' value='Ενοικίαση'></td></tr>";
                        echo "</table>";
                        echo "</form>";
                    }
                    else{
                        echo "<h4>Δεν υπάρχουν διαθέσιμα οχήματα.</h4><br>";
                    }
                echo "</div>";
                
                /* Ενοικίαση δικύκλου */
                echo "<div id='details'>";
                    echo "<div id='description'>";
                        echo "<h3 class='title' style='line-height: 100%;'><b> Ενοικίαση Μοτοσυκλέτας </b></h3><br>";
                    echo "</div>";
                    $ress = mysqli_query($con, "SELECT * FROM vehicle_rental_moto WHERE Rental_agency_name='$name'");
                    if (mysqli_num_rows($ress)!= 0){
                        echo "<form action='includes/vehicle_reservation.php' method='post'>";
                        echo "<table id='moto'>";
                            echo "<tr><th style='border:none;'>Επιλέξτε όχημα</th>";
                            echo "<th>Εικόνα</th>";
                            echo "<th>Μοτοσυκλέτα</th>";
                            echo "<th>Κυβικά </th>";
                            echo "<th>Κατηγορία</th>";
                            echo "<th>Τιμή ανά ημέρα(€) </th></tr>";
                            while($moto = mysqli_fetch_array($ress)){  
                                echo "<tr><td><input type='radio' name='vehicle_select' value='" . $moto[2] . "' required></td>";
                                echo "<td><img class='car' src='" . $moto[6] . "' alt=''/></td>";
                                echo "<td>$moto[1]</td>";
                                echo "<td>$moto[3]</td>";
                                echo "<td>$moto[4]</td>";
                                echo "<td>$moto[5]</td></tr>";
                            }
                        echo "</table>";

                        echo "<table id='rent'>";
                            echo "<tr><th>Ημ/νία παραλαβής</th>";
                            echo "<th>Ημ/νία παράδοσης</th>";
                            echo "<th></th></tr>";
                            echo "</tr><td><input type='date' class='date' name='date_vehicle_take' min='$date_min' required></td>";
                            echo "<td><input type='date' class='date' name='date_vehicle_leave' min='$date_min' required></td>";
                            echo "<td><input type='submit' class='show_more_button' name='reserve_button' value='Ενοικίαση'></td></tr>";
                        echo "</table>";
                        echo "</form>";
                    }
                    else{
                        echo "<h4>Δεν υπάρχουν διαθέσιμα οχήματα.</h4><br>";
                    }
                echo "</div>";
            ?>
        </div>  
    </body>
</html>