<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Δρομολόγια</title>
	<link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/routes.css" rel="stylesheet" type="text/css">
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
                <form action='' method='post'>
                    <table style="margin-top: 30px;">
                        <tr style='border-bottom: 1px solid #ddd; margin-top: 30px;'>
                            <th><b>Mέσο μεταφοράς</b></th>
                            <th><b>Αναχώρησεις/Αφίξεις</b></th>
                        </tr>
                        <tr>
                            <td><input type="radio" name="transport" value="ship" checked> Πλοίο <br>
                            <input type="radio" name="transport" value="airplane"> Αεροπλάνο </td>
                            
                            <td><input type="radio" name="dep_arr" value="departure" checked> Αναχώρηση <br>
                            <input type="radio" name="dep_arr" value="arrival"> Άφιξη </td>
                            
                            <td><input type='submit' class='select_button' name='select_button' value='Συνέχεια'></td>
                        </tr>
                        
                    </table>
                </form>

                <?php
                    include 'includes/connection.php';

                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        $transport = mysqli_real_escape_string($con,$_POST['transport']);
                        $dep_arr = mysqli_real_escape_string($con,$_POST['dep_arr']);
                    }
                
                    echo "<div>";
                        if ($transport == 'ship'){
                            echo "<h3 style='margin-left: 35px;'>Δρομολόγια πλοίων</h3>";
                        }
                        else {
                            echo "<h3 style='margin-left: 35px;'>Δρομολόγια αεροπλάνων</h3>";
                        }
                        echo "<table style='background-image: none;'>";
                            echo    "<tr style='border-bottom: 1px solid #ddd;'>";
                            echo    "<td><b>Από</b></td>";
                            echo    "<td><b>Πρός</b></td>";
                            echo    "<td><b>Αναχώρηση - Άφιξη</b></td>";
                            echo    "<td><b>Ημερομηνία</b></td>";
                            echo    "<td><b>Τιμή (€)</b></td>";
                            echo    "<td><b>Εταιρία</b></td></tr>";

                            if ($transport == 'ship'){
                                if ($dep_arr == 'departure'){
                                    $result = mysqli_query($con, "SELECT * FROM routes WHERE Routes_from='Πειραιάς'");
                                }
                                else{
                                    $result = mysqli_query($con, "SELECT * FROM routes WHERE Routes_to='Πειραιάς'");
                                }
                            }
                            else{
                                if ($dep_arr == 'departure'){
                                    $result = mysqli_query($con, "SELECT * FROM routes WHERE Routes_from='Αθήνα'");
                                }
                                else{
                                    $result = mysqli_query($con, "SELECT * FROM routes WHERE Routes_to='Αθήνα'");
                                }
                            }

                            while($per = mysqli_fetch_array($result)){
                                echo    "<tr style='border-bottom: 1px solid #ddd;'>";
                                echo    "<td>$per[1]</td>";
                                echo    "<td>$per[2]</td>";
                                echo    "<td>$per[3]</td>";
                                echo    "<td>$per[4]</td>";
                                echo    "<td>$per[5]</td>";
                                echo    "<td>$per[6]</td></tr>";
                            }
                        echo "</table>";  
                    echo "</div>";     
                ?>
                
            </div>
        </div>
    </body>
</html>
