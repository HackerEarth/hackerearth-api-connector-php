<h1>hackerearth-api-connector-php</h1>

<p>The file 'hackapi.php' connects with the hackerearth API. It consists of a class `HackApi` with the following functions you can call :</p>

<h3>set_client_secret($a)</h3>
<p>This function helps you set your client secret. Call this function with your client secret just after you create a new object of the class. Should be called once when you create the object for successful compilations and running of codes.</p>

<h3>init($language,$source_code,$input)</h3>
<p>This function should be called just before calling the compile or run functions. This initialises the variables for smooth compiling. "$language" should be either as the normal language name or as <a href="http://developer.hackerearth.com">hackerearth api</a> wants it to be. The source code should contain code in the language specified. You can leave input as blank. It doesnt affect the result of compilation but it is recommended to be passed if you are going to run the program on some input.</p>

<h3>compile()</h3>
<p>This function is to be called after init() has been called. This function compiles the code submitted. You can check the compiler message by accessing the variable as $obj->compile_status and check if the call to api was correct by the value of $obj->message</p>

<h3>run()</h3>
<p>This function is called to run the source code. On a successful call, you will get the results in a list of variables discussed later.
</p>

<h1>Variables After Successful run() call</h1>
The variables you can access to gather information about the code run after calling the function run() are:<br/>
1. `id` : The code id on hackerearth.<br/>
2. `memory_used` : The amount of memory used by the code.<br/>
3. `time_used` : The execution time of program.<br/>
4. `message` : Message returned by the API.<br/>
5. `compile_status` : Whether the compilation was successful or not.<br/>
6. `run_status` : Status of the execution of code.<br/>
7. `output` : The output of the code.<br/>
8. `output_html` : The output of the code in HTML format.<br/>
9. `signal` : SIGSEV or any other signal.<br/>
10. `run_status_detail` : More detail about the run status.<br/>
11. `array_curl` : The json returned from hackerearth api in array format. In case you want to directly access that.<br/>

You can access variables as $obj->memory_used , where $obj = new HackApi.
