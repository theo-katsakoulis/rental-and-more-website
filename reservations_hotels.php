<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Κρατήσεις - Ξενοδοχεία</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/rent_hotel.css" rel="stylesheet" type="text/css">
        <link href="css/reservations_hotels.css" rel="stylesheet" type="text/css">
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
                
                $i = 1;
                $result = mysqli_query($con, "SELECT hotels_reservations.*, hotels.Category, hotels.Address, hotels.Phone_num, hotels.Image  FROM hotels_reservations INNER JOIN hotels ON hotels_reservations.Hotel_name=hotels.Name");
                if (mysqli_num_rows($result)!= 0){
                    while($per = mysqli_fetch_array($result)){
                        echo "<div class='profile'>";
                        echo "<form action='includes/hotel_cancel_reservation.php' method='post'>";
                        echo "<table>";
                            echo    "<tr style='border-bottom: 1px solid #ddd;'>";
                            echo    "<td><img class='photoContainer' src='" . $per[9] . "'style='border: none;' alt='No Image'/></td>";
                            echo    "<td><h3 style='text-align: center;'>$per[1]</h3>";
                            echo    "&nbsp&nbsp<b>Κατηγορία:</b> ";
                            $stars = 1;
                            while ($stars <= $per[6]){
                                echo "<img class='stars' src='images/rent/star.png' alt='No Image'/>";
                                $stars++;
                            }
                            echo "<br>";
                            echo    "&nbsp&nbsp<b>Διεύθυνση:</b> &nbsp$per[7]<br>";
                            echo    "&nbsp&nbsp<b>Τηλέφωνο:</b> &nbsp&nbsp$per[8]</td>";
                            echo    "<td style='line-height: 130%;'>&nbsp&nbsp<b>Είδος δωματίου:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ";
                            if ($per[2] == '1bed') {
                                echo "Μονόκλινο";
                            }
                            else if ($per[2] == '2bed') {
                                echo "Δίκλινο";
                            }
                            else {
                                echo "Τρίκλινο";
                            }
                            echo    "<br>&nbsp&nbsp<b>Αριθμός δωματίων:</b>&nbsp&nbsp&nbsp $per[3]<br>";
                            echo    "&nbsp&nbsp<b>Ημ/νία άφιξης:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $per[4]<br>";
                            echo    "&nbsp&nbsp<b>Ημ/νία αναχώρησης:</b>&nbsp $per[5]";
                            echo    "<input type='hidden' name='reservation_id' value='$per[0]'></td>";
                            echo    "<td style='border: none;'><input type='submit' class='show_more_button' name='cancel_button' value='Ακύρωση Κράτησης $i'></td></tr>";
                        echo "</table>";   
                        echo "</form>";
                        echo "</div>";
                        $i++;
                    }
                }
                else {
                    echo "<br><br><h3 style='border: 1px solid #ddd; margin-left: 30px; margin-bottom: 200px; width: 80%; padding: 10px;
                        background-color: white;'>Δεν υπάρχουν κρατήσεις ξενοδοχείων.</h3>";
                }
            ?>   
        </div>  
    </body>
</html>