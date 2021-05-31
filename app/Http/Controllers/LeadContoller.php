<?php

namespace App\Http\Controllers

use Illuminate\Http\Request;
use App\Http\Requests\LeadRequest;

class LeadContoller extends Controller
{
	/*
	* Типа тут идут другие методы...
	*/
    public function getLeads(Request $req){
    	//todo
    }

    public function getLead(Request $req){
    	//todo
    }

    /*
    * ...
    */

    public function addLead(LeadRequest $req){
    	
    	$fields = $req->validated()
    }
}
