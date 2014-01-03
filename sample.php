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

*/

$client=""; // Your client secret code.
$code=""; //the source code.
$lang=""; // the language of the source code. eg C++ C++11 C C# Python
$input=""; // the input values to run this code on. (Optional)

$hack = new HackApi;
$hack->set_client_secret($client); //set your client secret id everytime a new object is created.
$hack->init($lang,$code,$input); // initialise your code
$hack->compile(); // compile it. to run : $hack->run();

echo $hack->compile_status; // print the compile status message

?>
