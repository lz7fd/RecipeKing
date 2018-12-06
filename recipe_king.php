<?php
require("callAPI.php");

$API_id = 'app_id=4003cf2f';
$API_key = 'app_key=2b7000bf9e6fd71245369e05bb742915';

$postdata = file_get_contents("php://input");  //save input from the recipeSearchController.js file
$request = json_decode($postdata); //decode the input
$ingredients = $request->ingredients; //store the user-specified ingredients
$query = implode(",",$ingredients);  // converts the array into a string
$limit = 100;  // How many recipes to display on the main page, default is 10

// Call to the API and get results
$get_data = callAPI('GET', "https://api.edamam.com/search?q=".$query."&to=".$limit."&".$API_id."&".$API_key, false);
echo $get_data;  // Echo the results of the query
$response = json_decode($get_data, true);  //JSON decode the response data from the API

?>
