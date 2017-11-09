/* Επιλέγουμε ποιό από τα dropdown θα φαίνεται, ανάλογα σε ποιό έχει πατήσει ο χρήστης */
function rentFunction() {
    document.getElementById("rentDropdown").classList.toggle("show");
}

function infoFunction() {
    document.getElementById("infoDropdown").classList.toggle("show");
}

function reservationsFunction() {
    document.getElementById("reservationsDropdown").classList.toggle("show");
}

function searchFunction() {
    document.getElementById("searchDropdown").classList.toggle("show");
}

/* Κλείνει το dropdown του κεντρικού menu όταν ο χρήστης πατήσει κάπου έξω από αυτό */
window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var d = 0; d < dropdowns.length; d++) {
            var openDropdown = dropdowns[d];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};


/* Για την αναζήτηση ελέγχουμε αν ο χρήστης έχει συμπληρώσει τα πεδία που χρειάζεται 
function validateForm(){
    var value1 = document.getElementById('priceID').value;
    var value2 = document.getElementById('daysID').value;
    if( value1 !== "" || value2 !== "" ){
        return true;    
    }
    alert("Πρέπει να συμπληρώσετε τουλάχιστον ένα από τα δύο πεδία!");
    return false;
}*/