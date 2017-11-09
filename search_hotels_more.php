<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Αναζήτηση - Δωμάτια</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/search.css" rel="stylesheet" type="text/css">
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

            <?php
                include 'includes/connection.php';

                $hotel_category = '';
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $hotel_category = mysqli_real_escape_string($con,$_POST['hotel_category']);
                }
                
                echo "<div id='details'>";
                    echo "<div id='description'>";
                        echo "<h3 class='title' style='line-height: 100%;'><b> Ξενοδοχεία </b></h3><br>";
                    echo "</div>";
                
                    $result = mysqli_query($con, "SELECT * FROM hotels WHERE Category='$hotel_category'");
                    if (mysqli_num_rows($result)!= 0){
                        while($per = mysqli_fetch_array($result)){
                            echo "<div class='profile'>";
                                echo "<div class='photo'>";
                                    echo "<img class='photoContainer' src='" . $per[7] . "' alt='No Image'/>";
                                echo "</div>";
                                echo "<div class='info'>";
                                    echo "<h3>" . $per[0] . "</h3>";
                                    echo "<div class='shortInfo'>";
                                        echo "<span class='category'>";
                                            echo "<b>Κατηγορία : </b>";
                                            $stars = 1;
                                            while ($stars <= $per[1]){
                                                echo "<img class='stars' src='images/rent/star.png' alt='No Image'/>";
                                                $stars++;
                                            }
                                        echo "</span> <br>";
                                        echo "<span class='address'>";
                                            echo "<b>Διεύθυνση : </b>" . $per[2];
                                        echo "</span> <br>";
                                        echo "<span class='phone'>";
                                            echo "<b>Τηλέφωνο : </b>" . $per[3];
                                        echo "</span><br>";
                                    echo "</div>";
                                    echo "<div class='showMoreButton'>";
                                        echo "<a class='show_more_button' href='rent_hotel_more.php?hotel_name=" . $per[0] . "'  onclick='post'>Περισσότερα</a>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";   
                        }
                    }
                    else {
                         echo "<h4 style='margin-left: 30px;'>Δεν υπάρχουν διαθέσιμα ξενοδοχεία αυτής της κατηγορίας.</h4><br>";
                    }
                echo "</div>";
            ?>
        </div>  
    </body>
</html>