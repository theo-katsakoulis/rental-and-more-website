<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Αναζήτηση - Οχήματα</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/search.css" rel="stylesheet" type="text/css">
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
                <a href="javascript:void(0)" class="dropbtn" onmouseover="reservationsFunction()">Κρατήσεις Χρήστη</a>
                <div class="dropdown-content" id="reservationsDropdown">
                    <a href="reservations_hotels.php">Ξενοδοχεία</a>
                    <a href="reservations_vehicles.php">Μεταφορικά</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn" onmouseover="searchFunction()" style="background-color: limegreen;">Αναζήτηση</a>
                <div class="dropdown-content" id="searchDropdown">
                    <a href="search_hotels.php">Ξενοδοχεία</a>
                    <a href="search_vehicles.php">Οχήματα</a>
                    <a href="search_travel.php">Εκδρομές</a>
                </div>
            </li>
        </ul>
        <div id="main">
            <form action="search_vehicles_more.php" method='post'>
                <fieldset class='search_field'>
                    <legend><b> Αναζήτηση Οχημάτων </b></legend>
                        <b>Επιλέξτε είδος οχήματος:</b><br><br>
                            <input type="radio" name="vehicle_type" value="car" checked>
                                Αυτοκίνητο<br>
                            <input type="radio" name="vehicle_type" value="moto">
                                Μοτοσυκλέτα<br>
                            <br>
                        <b>Επιλέξτε τιμή (€):</b><br><br>
                            <input type='text' style='width: 80px;' name='price' required>
                            <br><br><br>
                    <input type="submit" class='search_button' value="Αναζήτηση">
                    <br>
                </fieldset>
            </form>
            
            <?php
                include 'includes/connection.php';

                $date_min = date('Y-m-d');
                $vehicle = '';
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $vehicle_type = mysqli_real_escape_string($con,$_POST['vehicle_type']);
                    $price = mysqli_real_escape_string($con,$_POST['price']);
                }
                
                if ($vehicle_type == 'car'){    /* Ενοικίαση αυτοκινήτου */
                    echo "<div id='details'>";
                        echo "<div id='description'>";
                            echo "<h3 class='title' style='line-height: 100%;'><b> Ενοικίαση Αυτοκινήτου </b></h3><br>";
                        echo "</div>";
                        $res = mysqli_query($con, "SELECT * FROM vehicle_rental_car WHERE One_day_price<='$price'");
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
                            echo "<h4>Δεν υπάρχουν διαθέσιμα αυτοκίνητα.</h4><br>";
                        }
                    echo "</div>";
                }
                else{   /* Ενοικίαση δικύκλου */
                    echo "<div id='details'>";
                        echo "<div id='description'>";
                            echo "<h3 class='title' style='line-height: 100%;'><b> Ενοικίαση Μοτοσυκλέτας </b></h3><br>";
                        echo "</div>";
                        $ress = mysqli_query($con, "SELECT * FROM vehicle_rental_moto WHERE Price_info<='$price'");
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
                            echo "<h4>Δεν υπάρχουν διαθέσιμες μοτοσυκλέτες.</h4><br>";
                        }
                    echo "</div>";
                }
            ?>
        </div>
    </body>
</html>