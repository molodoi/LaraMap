<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

use App\Mail\ContactCreated;

class ContactController extends Controller
{
    public function create(){
 		return view('contacts.create');   	
    }

    public function store(ContactRequest $request){
    	new ContactCreated($request->name, $request->email, $request->message, $request->city);
    }
}
