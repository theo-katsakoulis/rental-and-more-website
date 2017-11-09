<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Ενοικιάσεις - Μεταφορικά</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/rent_vehicle.css" rel="stylesheet" type="text/css">
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
                
                $result = mysqli_query($con, "SELECT * FROM vehicle_rental");
                while($per = mysqli_fetch_array($result)){
                    echo "<div class='profile'>";
                        echo "<div class='photo'>";
                            echo "<img class='photoContainer' src='" . $per[3] . "' alt='No Image'/>";
                        echo "</div>";
                        echo "<div class='info'>";
                            echo "<h3>" . $per[0] . "</h3>";
                            echo "<div class='shortInfo'>";
                                echo "<span class='address'>";
                                    echo "<b>Διεύθυνση : </b>" . $per[1];
                                echo "</span> <br>";
                                echo "<span class='phone'>";
                                    echo "<b>Τηλέφωνο : </b>" . $per[2];
                                echo "</span><br>";
                            echo "</div>";
                            echo "<div class='showMoreButton'>";
                                echo "<a class='show_more_button' href='rent_vehicle_more.php?agency_name=" . $per[0] . "'  onclick='post'>Περισσότερα</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    /*echo "<div class='agency_profile'>";
                        echo "<table>";
                            echo    "<tr style='border-bottom: 1px solid #ddd; width: 100%;'>";
                            echo    "<td><img class='photoContainer' src='" . $per[3] . "'style='border: none;' alt='No Image'/></td>";
                            echo    "<td style='width: 60%;'><h3 style='text-align: center;'>$per[0]</h3>";
                            echo    "&nbsp&nbsp<b>Διεύθυνση:</b> $per[1]<br>";
                            echo    "&nbsp&nbsp<b>Τηλέφωνο:</b> $per[2]</td>";
                            echo    "<td style='line-height: 130%; width: 100%;'>";
                            echo    "<a class='show_more_button' style='margin-top: 30%;' href='rent_vehicle_more.php?agency_name=" . $per[0] . "'  onclick='post'>Περισσότερα</a></td></tr>";
                        echo "</table>";
                    echo "</div>";*/
                }
            ?>   
        </div>  
    </body>
</html>