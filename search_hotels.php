<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Αναζήτηση - Δωμάτια</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/search.css" rel="stylesheet" type="text/css">
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
            <form action="search_hotels_more.php" method='post'>
                <fieldset class='search_field'>
                    <legend><b> Αναζήτηση Ξενοδοχείων </b></legend>
                    Επιλέξτε κατηγορία ξενοδοχείου:<br><br>
                    <input type="radio" name="hotel_category" value="1" checked>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/><br>
                    <input type="radio" name="hotel_category" value="2">
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/><br>
                    <input type="radio" name="hotel_category" value="3">
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/><br>
                    <input type="radio" name="hotel_category" value="4">    
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/><br>
                    <input type="radio" name="hotel_category" value="5">    
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/>
                        <img class='stars' src='images/rent/star.png' alt='No Image'/><br>
                    <br><br>
                    <input type="submit" class='search_button' value="Αναζήτηση">
                    <br>
                </fieldset>
            </form>
        </div>
    </body>
</html>