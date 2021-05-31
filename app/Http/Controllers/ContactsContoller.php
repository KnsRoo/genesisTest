<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactsContoller extends Controller
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
    	
    	$fields = $req->validated()
    }
}
