<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Kami;
use App\Testimoni;
use App\Konfirmasi;
use App\Categori;
use App\Brand;
use App\Product;
use App\Banner;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MainController extends Controller
{
    public function index()
    {    	
        $data = array(
            'brand'      => Brand::all(),
            'banner'     => Banner::all(),
            'product'    => Product::all()
        );

    	return view('front.home',compact('data'));
    }

    public function cart()
    {
        $data = array(
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total()
        );

    	return view('front.cart',compact('data'));
    }

    public function pengiriman()
    {
        $data = array(
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total()
        );

        return view('front.pengiriman',compact('data'));
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

    public function brand($id,$judul)
    {        
        $data = array(
            'id'        => $id,
            'judul'     => $judul,
            'brand'     => Brand::all(),
            'barang'    => Product::where('id_brand', $id)->orderBy('id_product', 'desc')->take(10)->get()
        );
        return view('front.detail',compact('data'));
    }

    public function product()
    {        
        $data = array(            
            'brand'     => Brand::all(),
            'barang'    => Product::all()
        );
        return view('front.product',compact('data'));
    }

    public function order($id)
    {
        $product = Product::find($id);
        Cart::add($id, $product->nama, 1, $product->harga);
        return redirect('cart');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/konfirmasi/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
