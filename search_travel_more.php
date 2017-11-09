<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Αναζήτηση - Εκδρομές</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/search.css" rel="stylesheet" type="text/css">
        <link href="css/travel_agencies_more.css" rel="stylesheet" type="text/css">
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
            <form action="search_travel_more.php" method='post' onsubmit="return validateForm();">
                <fieldset class='search_field'>
                    <legend><b> Αναζήτηση Εκδρομών </b></legend>
                        <b>Επιλέξτε τιμή (€):</b><br><br>
                            <input type='text' style='width: 80px;' name='price' id="priceID"><br><br>
                        <b>Επιλέξτε μέγιστες διανυκτερεύσεις:</b><br><br>
                            <input type='text' style='width: 80px;' name='days' id="daysID">
                            <br><br><br>
                    <input type="submit" class='search_button' value="Αναζήτηση">
                    <br>
                </fieldset>
            </form>
            
            <?php
                include 'includes/connection.php';
                
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $price = mysqli_real_escape_string($con,$_POST['price']);
                    $days = mysqli_real_escape_string($con,$_POST['days']);
                }                
                
                echo "<div id='details'>";
                    echo "<div id='description'>";
                        echo "<h3 class='title'><b> Εκδρομές </b></h3><br>";
                    echo "</div>";
                    echo "<table>";
                    echo "<tr>";
                    $i=3;
                    
                    if ($price!='' && $days!=''){
                        $res = mysqli_query($con, "SELECT * FROM travel_agencies_tours WHERE Price<='$price' AND Days<='$days'");
                    }
                    else if ($price!='' && $days==''){
                        $res = mysqli_query($con, "SELECT * FROM travel_agencies_tours WHERE Price<='$price'");
                    }
                    else if ($price=='' && $days!=''){
                        $res = mysqli_query($con, "SELECT * FROM travel_agencies_tours WHERE Days<='$days'");
                    }
                    else{
                        $res = mysqli_query($con, "SELECT * FROM travel_agencies_tours");
                    }
                    if (mysqli_num_rows($res)!= 0){
                        while($tours = mysqli_fetch_array($res)){
                            if (($i%3) == 0){
                                echo "<tr>";
                            } 
                            $i++;

                            echo "<td><img class='tours' src='" . $tours[6] . "' alt=''/><br>";
                            echo "<h4><b>Εκδρομικό γραφείο:</b> $tours[0]</h4>";
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
            ?>
        </div>
    </body>
</html>