<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Curl;

class Token{
	private const CLIENT_ID = 29517391;

    public static function get(){

    	$response = Curl::appjson('https://test.gnzs.ru/oauth/get-token.php')
    				->addHeader("X-Client-id: {self::CLIENT_ID}")
    				->fetch()
    				->json();

		return $response;
    }
}