<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home(Request $request){
        /*
        //Setter une valeur en session
        $request->session()->put('bla', 'blablabla');
        // Get session key retun value
        //dd($request->session()->get('bla'));
        //delete
        $request->session()->forget('bla');
        dd($request->session()->get('bla'));
        */
 		return view('frontend.pages.home');
    }

    public function about(){
 		return view('frontend.pages.about');
    }

}
