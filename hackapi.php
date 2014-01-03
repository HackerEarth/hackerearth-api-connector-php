<?php

/*
Author : Himanshu Jaju (http://facebook.com/himanshu.jaju)
API : http://developer.hackerearth.com
Date : 3rd January, 2014.

Free to Use, Modify and Share.

Send me your hacks related to this api at : himanshu.jaju@gmail.com.

If you make this even more awesome, please send a pull request on github!
*/

class HackApi
{
	private $language=""; // the language of your code
	private $source_code=""; // the source code
	private $input=""; // the input you give
	private $client_secret=""; // your secret client code
	
	private $curled=""; // this is the data we receive from hackerearth!
	private $parameters=""; // the parameterised version.
	
	private $compile_url = "http://api.hackerearth.com/code/compile/"; // end point of compilation
	private $run_url = "http://api.hackerearth.com/code/run/"; // end point of running the source code
	
	public $id; // code_id on hackerearth
	public $memory_used; // memory used by the code
	public $time_used; // time used to execute the code
	public $message; // message. if any missing arguments.
	public $compile_status; // compilation error or OK
	public $run_status; // run status of the code
	public $output; // output of the code
	public $output_html; // html format of the output
	public $array_curl; // the entire json converted to array
	public $signal; // signal returned after run
	public $run_status_detail; // run_status_detail
	
	private function curl_it($url,$p,$n)
	{
		/*
		$url -> the url to curl.
		$parameters -> list of parameters to post.
		$n -> count of parameters.
		*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_POST,$n);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$p);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$this->curled = json_decode($response,true);
	}
	
	public function set_client_secret($a)
	{
		$this->client_secret = $a;
	}
	
	public function init($lang,$code,$inp)
	{
		$id = "";
		$memory_used = "";
		$time_used = "";
		$message = "";
		$compile_status = "";
		$run_status = "";
		$array_curl = "";
		$output = "";
		$output_html = "";
		$signal = "";
		$run_status_detail = "";
		//all values have been reset to avoid any discrepancies.
		
		$this->input = $inp;
		$this->source_code=stripslashes($code); //removing stray '/'
		
		if($lang == "C++")
			$lang = "CPP";
		else if($lang == "C#")
			$lang = "CSHARP"; 
		else if($lang == "C++11")
			$lang = "CPP11";
		else
			$lang = strtoupper($lang);
		$this->language = $lang;
			
		// converting language to hackerearth friendly
		
		$this->parameters="client_secret=".$this->client_secret."&source=".$this->source_code."&lang=".$this->language."&input=".$this->input;
		//building the entire parameter list.
	}
	// Iniitiate the variables. First Step.
	
	public function compile()
	{
		$this->curl_it($this->compile_url,$this->parameters,4);
		$this->parse_data(1);
	}
	//call this function to compile the code
	
	public function run()
	{
		$this->curl_it($this->run_url,$this->parameters,4);
		$this->parse_data(2);
	}
	//call this function to run the code
	
	private function parse_data($check)
	{
		$this->array_curl = $this->curled;
		$this->message = $this->curled['message'];
		if($this->message == "OK")
		{
			$this->id = $this->curled['code_id'];
			$this->compile_status = $this->curled['compile_status'];
			if($check==2)
			{
				$this->curled = $this->curled['run_status'];
				
				$this->time_used = $this->curled['time_used'];
				$this->run_status = $this->curled['status'];
				$this->run_status_detail = $this->curled['status_detail'];
				$this->memory_used = $this->curled['memory_used'];
				$this->output = $this->curled['output'];
				$this->output_html = $this->curled['output_html'];
				$this->signal = $this->curled['signal'];
			}
		}
	}
	//final call. get details
}

?>
