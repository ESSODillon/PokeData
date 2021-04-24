<?php

/*
 * Author: Dillon Polley
 * Date: April 8th, 2021
 * File: config.php
 * Description: Set application settings
 * 
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application

// Uncomment links below respectively to get content to display
// Dillon's link
define("BASE_URL", "http://localhost:8080/I211_PHP/PokeData");
// Kam's link
// define("BASE_URL", "http://localhost/I211/PokeData");
