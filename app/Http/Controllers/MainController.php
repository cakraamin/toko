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
use App\Transaksi;
use App\Download;
use App\Dtransaksi;
use App\Classes\Ongkir;
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
            'product'    => Product::limit(9)->offset(0)->get(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );

    	return view('front.home',compact('data'));
    }

    public function cart()
    {                  
        $data = array(
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );

    	return view('front.cart',compact('data'));
    }

    public function detail($id)
    {
        $data = array(
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'barang'     => Product::getDetail($id),
            'download'   => Download::limit(3)->offset(0)->get()
        );

        return view('front.detils',compact('data'));
    }

    public function hapus($id)
    {
        Cart::remove($id);
        \Flash::success('Hapus Transaksi Berhasil');

        return redirect('cart');      
    }

    public function pengiriman()
    {
        $kirim = array(
            'jne'       => 'JNE',
            'tiki'      => 'TIKI',
            'pos'       => 'POS Indonesia'
        );

        $data = array(
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'combo'      => $this->getCombo(),
            'jumlah'     => $this->getTotalBerat(),
            'pengiriman' => $kirim,
            'download'   => Download::limit(3)->offset(0)->get()
        );

        return view('front.pengiriman',compact('data'));
    }

    public function simpan_kirim(Request $request)
    {
        $this->validate($request, [
            'nama'          => 'required|max:200',
            'email'         => 'required|max:200',
            'telp'          => 'required|max:200',
            'alamat'        => 'required|max:200'
        ]);

        $kode = str_random(10);        

        $data['nama'] = $request->nama;
        $data['telp'] = $request->telp;
        $data['email'] = $request->email;
        $data['alamat'] = $request->alamat;
        $data['kode_transaksi'] = $kode;
        $data['tujuan'] = $request->kota;
        $data['via'] = $request->pengiriman;
        $data['total'] = Cart::total();
        $data['paket'] = $request->paket;
        $data['ongkir'] = $request->biaya;

        $transaksi = Transaksi::create($data);
        if($transaksi){        	
            foreach(Cart::content() as $d_transaksi){
                $nilai['id_transaksi'] = intval($transaksi->id_transaksi);
                $nilai['id_product'] = $d_transaksi->id;
                $nilai['qty'] = $d_transaksi->qty;
                $nilai['sub_total'] = $d_transaksi->subtotal;
                Dtransaksi::create($nilai);
                Cart::remove($d_transaksi->rowid);
            }        
            return redirect('result/'.intval($transaksi->id_transaksi));
        }else{
            \Flash::info('Maaf Gagal');
        }        
    }

    public function result($id)
    {
    	$getTransaksi = Product::getTransaksi($id);
    	$tujuan = json_decode(Ongkir::getCityById($getTransaksi['tujuan']));
    	$tujuan = $tujuan->rajaongkir->results;
    	$tujuan = $tujuan->type." ".$tujuan->city_name." Provinsi ".$tujuan->province;    	

    	$data = array(
            'brand'      => Brand::all(),
            'banner'     => Banner::all(),            
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get(),
            'barang'	 => $getTransaksi,
            'tujuan'	 => $tujuan,
            'id'		 => $id
        );

    	return view('front.result',compact('data'));
    }

    // public function pilihan($tujuan,$via,$jumlah)
    // {
    //     $nilai = "";
    //     $selek = $this->getSelek($tujuan,$via,$jumlah);
    //     foreach($selek as $key => $detail){
    //         $nilai = $nilai.'<input type="radio" name="paket" value="'.$detail["deskripsi"].'"> '.$detail["deskripsi"].' Rp '.number_format($detail["jumlah"], "2", ",", ".").' estimasi sampai tujuan '.$detail["waktu"].' hari<input type="text" name="'..'"/><br>';
    //     }

    //     echo $nilai;
    // }

    public function pilihan($tujuan,$via,$jumlah)
    {
    	return $this->getSelek($tujuan,$via,$jumlah);
    }

    private function getSelek($tujuan,$via,$jumlah)
    {
        $hasil = array();

        $ongkir = json_decode(Ongkir::getCost($tujuan,$jumlah,$via));        
        foreach($ongkir->rajaongkir->results as $detail){
            if(is_object($detail)){
                foreach($detail->costs as $key => $dt){
                    $cost = $dt->cost;
                    $hasil[$key] = array(
                        'deskripsi'=> $dt->description,
                        'jumlah'   => $cost['0']->value,
                        'waktu'    => $cost['0']->etd
                    );                
                }
            }
        }

        return $hasil;
    }

    public function testimoni()
    {
        $data = array(
            'form'       => Kami::all(),
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );

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
        $data = array(
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );

        return view('front.konfirmasi',compact('data'));
    }

    public function kami()
    {
        $data = array(
            'kami'       => Kami::all()->first(),
            'brand'      => Brand::all(),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );
        
    	return view('front.kami',compact('data'));
    }

    public function brand($id,$judul)
    {        
        $data = array(
            'id'        => $id,
            'judul'     => $judul,
            'brand'     => Brand::all(),
            // 'barang'    => Product::where('id_brand', $id)->orderBy('id_product', 'desc')->take(10)->get(),
            'barang'    => Product::where('id_brand', '=', $id)->paginate(15),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );
        return view('front.detail',compact('data'));
    }

    public function product()
    {        
        $data = array(            
            'brand'     => Brand::all(),
            'barang'    => Product::paginate(15),
            'cart'       => Cart::content(),
            'total'      => Cart::total(),
            'download'   => Download::limit(3)->offset(0)->get()
        );
        return view('front.product',compact('data'));
    }

    public function order($id)
    {
        $product = Product::find($id);
        Cart::add($id, $product->nama, 1, $product->harga,array('berat' => $product->berat));
        return redirect('cart');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/konfirmasi/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    protected function getCombo()
    {
        $hasil = array();

        $prop = json_decode(Ongkir::getProvinsi());        
        foreach($prop->rajaongkir->results as $propinsi)
        {
            //echo $propinsi->province_id." dan ".$propinsi->province."<br/>";
            $kota = json_decode(Ongkir::getCity($propinsi->province_id));
            $hasil["0"] = "Pilih Tujuan Pengiriman";
            foreach($kota->rajaongkir->results as $city)
            {
                $hasil[$city->city_id] = $city->city_name." , ".$propinsi->province;
            }            
        }

        return $hasil;
    }

    protected function getTotalBerat()
    {
        $jumlah = 0;

        $belanja = Cart::content();
        foreach($belanja as $detail)
        {
            $options = $detail->options;
            $jumlah = $jumlah + $options['berat'];
        }

        return $jumlah;
    }

    public function download($id)
    {
        $alamat = public_path()."/img/".$id;
        return response()->download($alamat);
        //return response()->download($alamat, "okelah.xls", 'Content-Type');
    }
}
