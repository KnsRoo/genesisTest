<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Middleware\Token;
use App\Http\Middleware\Curl;

class CompanyController extends Controller
{
	/*
	* Типа тут идут другие методы...
	*/
    public function getCompanies(Request $req){
    	//todo
    }

    public function getCompany(Request $req){
    	//todo
    }

    /*
    * ...
    */

    public function addCompany(CompanyRequest $req){

    	$token = Token::get();

    	$payload = [$req->validated()];

    	$url = 'https://'.$token->base_domain.'/api/v4/companies';
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
		$id = $decoded->_embedded->companies[0]->id;

		return response()->json(['id' => $id]);
    }
}
