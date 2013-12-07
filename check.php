<?php
require("src/CreditCardFraudDetection.php");

$ccfs = new CreditCardFraudDetection;
$h["license_key"] = "Jh3He0L8HGbV";

// Required fields
$h["i"] = $_POST["i"];             // set the client ip address
$h["city"] = $_POST["city"];             // set the billing city
$h["region"] = $_POST["region"];                 // set the billing state
$h["postal"] = $_POST["postal"];             // set the billing zip code
$h["country"] = $_POST["country"];               // set the billing country

// Recommended fields
$h["domain"] = $_POST["domain"];		// Email domain
$h["bin"] = $_POST["bin"];		// bank identification number
$h["shipAddr"] = $_POST["shipAddr"];        // Shipping Address
// CreditCardFraudDetection.php will take
// MD5 hash of e-mail address passed to emailMD5 if it detects '@' in the string
$h["emailMD5"] = $_POST["emailMD5"];

$ccfs->timeout = 10;


$ccfs->isSecure = 0;

$ccfs->input($h);

$ccfs->query();
$h = $ccfs->output();

$outputkeys = array_keys($h);
$numoutputkeys = count($h);
for ($i = 0; $i < $numoutputkeys; $i++) {
    $key = $outputkeys[$i];
    $value = $h[$key];
    print $key . " = " . $value . "\n";
    echo "<br>";
}
?>
