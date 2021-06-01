<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Middleware\Token;

class ContactsController extends Controller
{
	private const API_BASE_URL = "https://rmxtfurm45mw.amocrm.ru";
	/*
	* Типа тут идут другие методы...
	*/
    public function getContacts(Request $req){
    	//todo
    }

    public function getContact(Request $req){
    	//todo
    }

    /*
    * ...
    */

    public function addContact(ContactRequest $req){
    	
    	$token = Token::get();

    	$payload = [$req->validated()];

    	$ch = curl_init(self::API_BASE_URL.'/api/v4/contacts');

        $header = [
            "Content-Type: application/json",
            "Authorization: Bearer ".$token
        ];

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
		$out = curl_exec($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($code == 401){
			return response()->json(['message' => 'Authorization error'], 401);
		} else if ($code == 400){
			$decoded = json_decode($out);
			$message = $decoded->detail;
			return response()->json(['message' => $message], 400);
		}

		$decoded = json_decode($out);
		$id = $decoded->_embedded->contacts[0]->id;

		return response()->json(['id' => $id]);
	}
}