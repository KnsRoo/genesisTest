<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Middleware\Token;
use App\Http\Middleware\Curl;

class ContactsController extends Controller
{
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

    	$url = $token->base_domain.'/api/v4/contacts';
        $auth = "Authorization: Bearer ".$token->access_token;

        $response = Curl::appjson($url)
        				->addHeader($auth)
        				->setBody($payload)
        				->fetch();

        $code = $response->code();
        $decoded = $response->json();

		if ($code == 401){
			return response()->json(['message' => 'Authorization error'], 401);
		} else if ($code == 400){
			$message = $decoded->detail;
			return response()->json(['message' => $message], 400);
		}
		$id = $decoded->_embedded->contacts[0]->id;

		return response()->json(['id' => $id]);
	}
}
