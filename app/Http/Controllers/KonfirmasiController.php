<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Konfirmasi;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KonfirmasiController extends Controller
{
    public function index()
    {
    	$konfirmasi = Konfirmasi::all();
    	return view('admin.konfirmasi',compact('konfirmasi'));
    }

    public function show($id)
    {
    	$konfirmasi = Konfirmasi::findOrFail($id);
    	return view('admin.show_konfirmasi',compact('konfirmasi'));
    }

    public function destroy($id)
    {
        Konfirmasi::find($id)->delete();
        \Flash::success('Konfirmasi Berhasil Dihapus');
        return redirect('admin/konfirmasi');
    }
}
