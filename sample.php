<?php
//include the connector file to call the functions and connect with the api.
require_once('hackapi.php');

/*
Fill in your client secret code. (To be obtained from http://developer.hackerearth.com )
You can take in the values of source code, language and input from yourself (Compile Time) or you can take user inputs in a HTML form and do a POST or GET request to this page.

For POST:
use $_POST['{element name in form}'];

For GET:
use $_GET['{element name in form}'];

Tip : If you are using $_GET or $_POST, please use the php function "stripslashes" to avoid compilation error. Not using the function will result in stray '/' in your code.

*/

$client=""; // Your client secret code.
$source_code=""; //the source code.
$lang=""; // the language of the source code. refer to http://developer.hackerearth.com to see how this variable should be passed.
$input=""; // the input values to run this code on. (Optional)

$compile_value = compile($client,$source_code,$lang,$input);

/*
calling the function compile to compile the source code.
The return value is an array which is the parsed json returned (See : http://developer.hackerearth.com )
You can check through the values and display appropriate error messages to the user.
the array is stored in $compile_value
*/

$run_value = run($client,$source_code,$lang,$input);

/*
calling the function run to run the source code on the inputs.
The return value is an array which is the parsed json returned (See : http://developer.hackerearth.com )
You can check through the values and display appropriate error messages to the user.
the array is stored in $run_value
*/

?>
