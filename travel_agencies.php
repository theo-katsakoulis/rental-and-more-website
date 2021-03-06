<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Εκδρομικά Γραφεία</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/travel_agencies.css" rel="stylesheet" type="text/css">
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
            <?php
                include 'includes/connection.php';
                $result = mysqli_query($con, "SELECT * FROM travel_agencies");
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
                                echo "<a class='show_more_button' href='travel_agencies_more.php?agency_name=" . $per[0] . "'  onclick='post'>Περισσότερα</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>  
    </body>
</html>