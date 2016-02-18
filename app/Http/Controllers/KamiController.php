<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kami;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class KamiController extends Controller
{
    public function index()
    {
    	$kami = Kami::all();        
        return view('admin.create_kami',compact('kami'));
    }
}
