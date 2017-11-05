<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormCreated;
use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function create(){
 		return view('frontend.contacts.create');
    }

    public function store(ContactRequest $request){

    	$message = ContactMessage::create($request->only('name','email','body'));

    	/*$message = new ContactMessage;
    	$message->name = $request->name;
    	$message->email = $request->email;
    	$message->body = $request->body;
    	$message->save();*/

    	Mail::to(config('laramap.admin_email_support'))
    		->send(new ContactFormCreated($message));

    	flashy('Nous vous répondrons dans les plus bref délais');

    	return redirect()->route('home');
    }
}
