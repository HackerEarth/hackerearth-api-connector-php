hackerearth-api-connector-php
=============================

The file 'hackapi.php' connects with the hackerearth API. It consists of two functions you can call :

1. `run`
2. `compile`

Parameters
----------

<h4>client</h4>
<p>This is your client secret code that you can obtain from <a href="http://developer.hackerearth.com">http://developer.hackerearth.com</a>. It is required for successful call.</p>

<h4>source</h4>
<p>This is the source code you are compiling or running. It is also required for a successful call. It should be noted that if you are using `$_GET` or `$_POST` methods, you should use the php function `stripslashes` to avoid stray '/' in the code.</p>

<h4>lang</h4>
<p>This is the language of your source code and is required for successful call. This should exactly match the value corresponding to the language options chosen as shown in <a href="http://developer.hackerearth.com">http://developer.hackerearth.com</a>. For eg, to compile or run C++ code, the language value should be CPP. You can get a complete list from the developer site on hackerearth.</p>

<h4>input</h4>
<p>This is an optional parameter. It is the input to be supplied to your code. In case you do not have any input to pass, leave the variable empty : `$input="";` and pass this value to the function call.</p>

<hr/>


SAMPLE CALLS
------------

<p>Go through the sample.php file to see more on how to connect and call the api. For queries related to the hackerearth api, check the website at <a href="http://developer.hackerearth.com">http://developer.hackerearth.com</a> and for queries regarding this api, contact at <a href="mailto:himanshu.jaju@gmail.com">himanshu.jaju@gmail.com</a></p>
