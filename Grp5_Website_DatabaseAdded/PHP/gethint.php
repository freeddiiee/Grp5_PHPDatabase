<?php
// Array with sample hobbies
$a[] = "Reading";
$a[] = "Traveling";
$a[] = "Painting";
$a[] = "Photography";
$a[] = "Gardening";
$a[] = "Cooking";
$a[] = "Baking";
$a[] = "Cycling";
$a[] = "Jogging";
$a[] = "Hiking";
$a[] = "Swimming";
$a[] = "Fishing";
$a[] = "Drawing";
$a[] = "Dancing";
$a[] = "Writing";
$a[] = "Meditation";
$a[] = "Gaming";
$a[] = "Basketball";
$a[] = "Woodworking";
$a[] = "Football";

// Get the query parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// Lookup all hobbies from the array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $hobby) {
        if (stristr($q, substr($hobby, 0, $len))) {
            if ($hint === "") {
                $hint = $hobby;
            } else {
                $hint .= ", $hobby";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;