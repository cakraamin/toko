<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Ongkir;
use App\Http\Requests;
use App\Transaksi;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
   		$transaksi = Transaksi::all();
    	return view('admin.transaksi',compact('transaksi'));
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        return redirect('/admin/transaksi');
    }

    public function show($id)
    {
    	$transaksi = Transaksi::getTransaksi($id);
    	$tujuan = json_decode(Ongkir::getCityById($transaksi['tujuan']));
    	$tujuan = $tujuan->rajaongkir->results;
    	$tujuan = $tujuan->type." ".$tujuan->city_name." Provinsi ".$tujuan->province;    	

    	$data = array(
    		'barang'	=> $transaksi,
    		'tujuan'	=> $tujuan
    	);
    	return view('admin.show_transaksi',compact('data'));
    }
}
