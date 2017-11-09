<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Μουσεία</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/museums.css" rel="stylesheet" type="text/css">
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
                <a href="javascript:void(0)" class="dropbtn" onmouseover="infoFunction()" style="background-color: limegreen;">Πληροφορίες</a>
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
            <div>
                <div id="mainContent">
                    <?php
                        include 'includes/connection.php';
                        echo "<div>";
                            echo "<table>";
                                echo    "<tr style='border-bottom: 1px solid #ddd;'>";
                                echo    "<th style='background-color: #f4f4f4;'></th>";
                                echo    "<th>Όνομα</th>";
                                echo    "<th>Διεύθυνση</th>";
                                echo    "<th>Τηλέφωνο</th>";
                                echo    "<th>Τιμή (€)</th></tr>";

                                $result = mysqli_query($con, "SELECT * FROM museums");
                                while($per = mysqli_fetch_array($result)){
                                    echo    "<tr style='border-bottom: 1px solid #ddd;'>";
                                    echo    "<td><img class='museums' src='" . $per[4] . "' alt='No Image'/></td>";
                                    echo    "<td><b>$per[0]</b></td>";
                                    echo    "<td>$per[1]</td>";
                                    echo    "<td>$per[2]</td>";
                                    echo    "<td>$per[3]</td></tr>";
                                }
                            echo "</table>";  
                        echo "</div>";     
                    ?>
                </div>  
            </div>
        </div>
    </body>
</html>
