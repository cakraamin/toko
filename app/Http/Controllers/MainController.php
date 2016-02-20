<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Kami;
use App\Testimoni;
use App\Konfirmasi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        $data = Kami::all();
    	return view('front.testimoni',compact('data'));
    }

    public function simpan_testi(Request $request)
    {
        $this->validate($request, [
            'nama'              => 'required|max:100',
            'instansi'          => 'required|max:100',
            'teks_testimoni'    => 'required'
        ]);

        $input = $request->all();        
        
        if(Testimoni::create($input)){
            \Flash::success('Terima kaih');
        }else{
            \Flash::info('Maaf Gagal');
        }

        return redirect('testimoni');        
    }

    public function simpan_konfirm(Request $request)
    {
        $this->validate($request, [
            'nama'              => 'required|max:100',
            'email'             => 'required|max:100'
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['status'] = 0;

        if ($request->hasFile('image')) {
            $data['screen_shoot'] = $this->savePhoto($request->file('image'));
        }        
        
        if(Konfirmasi::create($data)){
            \Flash::success('Konfirmasi Berhasil');
        }else{
            \Flash::info('Konfirmasi Gagal');
        }
                
        return redirect('konfirmasi');
    }

    public function konfirmasi()
    {
        $data = Konfirmasi::all();
        return view('front.konfirmasi',compact('data'));
    }

    public function kami()
    {
        $kami = Kami::all()->first();
    	return view('front.kami',compact('kami'));
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/konfirmasi/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
