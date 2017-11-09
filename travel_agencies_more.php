<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Εκδρομικά Γραφεία</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/travel_agencies.css" rel="stylesheet" type="text/css">
        <link href="css/travel_agencies_more.css" rel="stylesheet" type="text/css">
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
                $name = $_GET['agency_name'];
                $result = mysqli_query($con, "SELECT * FROM travel_agencies WHERE Name='$name'");
                while($agency = mysqli_fetch_array($result)){
                    echo "<div class='profile'>";
                        echo "<div class='photo'>";
                            echo "<img class='photoContainer' src='" . $agency[3] . "' alt='No Image'/>";
                        echo "</div>";
                        echo "<div class='info'>";
                            echo "<h3>" . $agency[0] . "</h3>";
                            echo "<div class='shortInfo'>";
                                echo "<span class='address'>";
                                    echo "<b>Διεύθυνση : </b>" . $agency[1];
                                echo "</span> <br>";
                                echo "<span class='phone'>";
                                    echo "<b>Τηλέφωνο : </b>" . $agency[2];
                                echo "</span><br>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                
                echo "<div id='details'>";
                    echo "<div id='description'>";
                        echo "<h3 class='title'><b> Εκδρομές </b></h3><br>";
                    echo "</div>";
                    echo "<table>";
                    echo "<tr>";
                    $i=3;
                    $res = mysqli_query($con, "SELECT * FROM travel_agencies_tours WHERE Travel_agency_name='$name'");
                    if (mysqli_num_rows($res)!= 0){
                        while($tours = mysqli_fetch_array($res)){
                            if (($i%3) == 0){
                                echo "<tr>";
                            } 
                            $i++;

                            echo "<td><img class='tours' src='" . $tours[6] . "' alt=''/><br>";
                            echo "<h4><b>Αναχώρηση από:</b> $tours[1]</h4>";
                            echo "<h4><b>Προορισμός:</b> $tours[2]</h4>";
                            echo "<h4><b>Διανυκτερεύσεις:</b> $tours[3]</h4>";
                            echo "<h4><b>Αναχωρήσεις:</b> $tours[4]</h4>";
                            echo "<h4><b>Τιμή ανά άτομο(€):</b> $tours[5]</h4></td>";
                        }
                    }
                    else{
                        echo "<h4>Δεν υπάρχουν διαθέσιμες εκδρομές.</h4><br>";
                    }
                    echo "</tr>";
                    echo "</table>";
                echo "</div>";
                echo "<div id='details'>";
                    echo "<div id='description'>";
                        echo "<h3 class='title'><b> Πακέτα Προσφορών </b></h3><br>";
                    echo "</div>";
                    echo "<table>";
                    echo "<tr colspan='3'>";
                    $i=3;
                    $resu = mysqli_query($con, "SELECT * FROM travel_agencies_offers WHERE Travel_agency_name='$name'");
                    if (mysqli_num_rows($resu)!= 0){
                        while($offers = mysqli_fetch_array($resu)){
                            echo "<div style='border-bottom: 1px solid #ddd;'>";
                                echo "<tr><h4> $offers[1]</h4></tr>";
                            echo "</div>";
                        }
                    }
                    else{
                        echo "<h4>Δεν υπάρχουν διαθέσιμα πακέτα προσφορών.</h4><br>";
                    }
                    echo "</table>";
                echo "</div>";
            ?>
        </div>  
    </body>
</html>