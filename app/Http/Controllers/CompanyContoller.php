<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyContoller extends Controller
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

    	$fields = $req->validated()
    }
}
