<?php
if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['family']) && !empty($_POST['ern']) && !empty($_POST['address']) && !empty($_POST['education']) && !empty($_POST['profession'])) {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $family = $_POST['family'];
    $ern = $_POST['ern'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $profession = $_POST['profession'];
}
    echo 
	"<ul>"
	. "<li> First name -" . $firstname . "</li>"
	. "<li> Last name - " . $lastname . "</li>"
    . "<li> Family - " . $family . "</li>"
    . "<li> ERN - " . $ern . "</li>"
    . "<li> Address - " . $address . "</li>"
    . "<li> Education - " . $education . "</li>"
    . "<li> Profession - " . $profession . "</li>"
    . "</ul>";

if (empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['family']) && empty($_POST['ern']) && empty($_POST['address']) && empty($_POST['education']) && empty($_POST['profession'])) {
   echo "Fill out the form!";  
}  
?>
