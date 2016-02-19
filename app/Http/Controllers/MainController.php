<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kami;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;

class MainController extends Controller
{
    public function index()
    {
    	//Cart::add('192ao12', 'Product 1', 1, 9.99);
		//Cart::add('1239ad0', 'Product 2', 2, 5.95, array('size' => 'large'));
    	//echo "okelah kalo begitu";
    	//print_r(Cart::content());
    	return view('front.home');
    }

    public function cart()
    {
    	return view('front.cart');
    }

    public function testimoni()
    {
    	return view('front.testimoni');
    }

    public function kami()
    {
        $kami = Kami::all()->first();
    	return view('front.kami',compact('kami'));
    }
}
