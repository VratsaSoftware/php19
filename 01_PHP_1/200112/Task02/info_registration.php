<?php
if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["family"]) && !empty($_POST["ern"]) && !empty($_POST["address"]) && !empty($_POST["education"]) && !empty($_POST["profession"])) {
    
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $family = $_POST["family"];
    $ern = $_POST["ern"];
    $address = $_POST["address"];
    $education = $_POST["education"];
    $profession = $_POST["profession"];
}
    echo 
	"<ul>"
	. "<li> First name -" . $firstname["firstname"] . "</li>"
	. "<li> Last name - " . $lastname["lastname"] . "</li>"
    . "<li> Family - " . $_POST["family"] . "</li>"
    . "<li> ERN - " . $ern["ern"] . "</li>"
    . "<li> Address - " . $address["address"] . "</li>"
    . "<li> Education - " . $education["education"] . "</li>"
    . "<li> Profession - " . $profession["profession"] . "</li>"
    . "</ul>"

if (empty($_POST["firstname"]) && empty($_POST["lastname"]) && empty($_POST["family"]) && empty($_POST["ern"]) && empty($_POST["address"]) && empty($_POST["education"]) && empty($_POST["profession"])) {

     echo "Fill out the form!";
}   else {
    echo "I don`t know what happened!";
}

?>
