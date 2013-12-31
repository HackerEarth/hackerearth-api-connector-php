<?php
header('Access-Control-Allow-Origin: *');

/*
To call run or compile, you need to provide the source code, the language of your code, the client secret and input(if any).
For no inputs, just pass a blank argument :
run($secret,$code,$lang,"");

The return value of both the functions is an array which tells you about the result of your code!
go over to : http://developer.hackerearth.com/ for more info on the return values and the messages returned.
*/

function curl_it($url,$str)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_POST,4);
curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
return $response;
}

//call to this function to run your code with/without any input.
function run($client,$source,$lang,$input)
{
$run_url="http://api.hackerearth.com/code/run/";
$run_parameters="client_secret=".$client."&source=".$source."&lang=".$lang."&input=".$input;
$run_response=curl_it($run_url,$run_parameters);
$run_result=json_decode($run_response,true);
return $run_result;
}

// call to this function to compile your code
function compile($client,$source,$lang,$input)
{
$compile_url="http://api.hackerearth.com/code/compile/";
$compile_parameters="client_secret=".$client."&source=".$source."&lang=".$lang."&input=".$input;
$compile_response=curl_it($compile_url,$compile_parameters);
$compile_result=json_decode($compile_response,true);
return $compile_result;
}

?>
