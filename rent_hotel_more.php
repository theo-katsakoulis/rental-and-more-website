<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Ενοικιάσεις - Ξενοδοχεία</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/rent_hotel.css" rel="stylesheet" type="text/css">
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
                //include 'includes/hotel_reservation.php';
                
                $hotel_name = $_GET['hotel_name'];
                $date_min = date('Y-m-d');
                $result = mysqli_query($con, "SELECT * FROM hotels WHERE name='$hotel_name'");
                while($per = mysqli_fetch_array($result)){
                    echo "<div class='profile'>";
                        echo "<div class='photo'>";
                            echo "<img class='photoContainer' src='" . $per[7] . "' alt='No Image'/>";
                        echo "</div>";
                        echo "<div class='info'>";
                            echo "<h3><b>" . $per[0] . "</b></h3>";
                            echo "<div class='shortInfo'>";
                                echo "<span class='address'>";
                                    echo "<b>Κατηγορία :</b> ";
                                        $stars = 1;
                                        while ($stars <= $per[1]){
                                            echo "<img class='stars' src='images/rent/star.png' alt='No Image'/>";
                                            $stars++;
                                        }
                                echo "</span> <br>";
                                echo "<span class='address'>";
                                    echo "<b>Διεύθυνση :</b> " . $per[2];
                                echo "</span> <br>";
                                echo "<span class='phone'>";
                                    echo "<b>Τηλέφωνο :</b> " . $per[3];
                                echo "</span><br>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                
                
                    echo "<form action='includes/hotel_reservation.php' method='post'>";
                    
                    
                    echo "<div id='details'>";
                        echo "<div id='description'>";
                            echo "<h3 class='title' style='line-height: 100%;'><b> Ενοικίαση Δωματίων </b></h3><br>";
                        echo "</div>";
                        echo    "<table style='width: 100%;'>";
                            echo    "<tr><th>Είδος δωματίου:<th>";
                            echo    "<th>Αριθμός δωματίων</th>";
                            echo    "<th>Ημ/νία άφιξης:</th>";
                            echo    "<th>Ημ/νία αναχώρησης</th>";
                            echo    "<th></th></tr>";
                            echo    "<input type='hidden' id='hotel_name' name='hotel_name' value='$per[0]'>";
                            echo    "<tr style='text-align: center;'><td><select name='room_type'>
                                        <option value='1bed'>Μονόκλινο</option>
                                        <option value='2bed'>Δίκλινο</option>
                                        <option value='3bed'>Τρίκλινο</option>
                                      </select><td>";
                            echo    "<td><input type='text' class='room_nums' name='reservation_room_num' required></td>";
                            echo    "<td><input type='date' class='date' style='width: 81px;' name='date_arrival' min='$date_min' required></td>";
                            echo    "<td><input type='date' class='date' name='date_departure' min='$date_min' required></td>";
                            echo    "<td style='border: none;'><input type='submit' class='show_more_button' style='margin-right: 20px;' name='reserve_button' value='Κράτηση'></td></tr>";
                        echo "</table>";  
                        echo "</form>";
                    echo "</div>";
                }
            ?>   
        </div>  
    </body>
</html>