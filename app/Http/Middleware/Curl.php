<?php

namespace App\Http\Middleware;

class Curl{
	private $ch;
	private $out;
	private $code;
	private $header;

	public function __construct(String $url){
		$this->ch = curl_init($url);
		$this->header = [];
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		return $this;
	}

	public static function appjson(String $url){
		$ch = new Curl($url);
		$ch->addHeader("Content-type: application/json");
		return $ch;
	}

	public function addHeader(String $field){
		$this->header[] = $field;
		return $this;
	}

	public function setBody(Array $body){
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($body));
		return $this;
	}

	public function fetch(){
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->header);
		$this->out = curl_exec($this->ch);
		$this->code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		curl_close($this->ch);
		return $this;
	}

	public function get(){
		return $this->out;
	}

	public function json(){
		return json_decode($this->out);
	}

	public function code(){
		return $this->code;
	}



}