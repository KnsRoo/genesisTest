<?php

namespace App\Http\Middleware;

class Token{
	private const CLIENT_ID = 29517391;

    public static function get(){

    	$ch = curl_init('https://test.gnzs.ru/oauth/get-token.php');

        $header = [
            "Content-Type: application/json",
            "X-Client-id: {self::CLIENT_ID}"
        ];

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$token = curl_exec($ch);
		curl_close($ch);

		$token = json_decode($token, true);

		return $token['access_token'];
    }
}