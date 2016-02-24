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
    	if(count($kami) > 0){
    		$data = Kami::all()->first();        
    		return view('admin.edit_kami',compact('data'));
    	}else{
    		return view('admin.create_kami',compact('kami'));
    	}        
    }

    public function create(Request $request)
    {
        $data['deskripsi'] = $request->deskripsi;

        if ($request->hasFile('image')) {
            $data['gambar_kami'] = $this->savePhoto($request->file('image'));
        }        
        
        if(Kami::create($data)){
            \Flash::success('Tentang Kami Berhasil Disimpan');
        }else{
            \Flash::info('Tentang Kami Gagal Disimpan');
        }
                
        return redirect('admin/kami');
    }

    public function update(Request $request,$id)
    {
    	$kami = Kami::findOrFail($id);        

        $data['deskripsi'] = $request->deskripsi;        

        if ($request->hasFile('image')) {
            $data['gambar_kami'] = $this->savePhoto($request->file('image'));
        }        

        if($kami->update($data)){
            \Flash::success('Tentang Kami Berhasil Diupdate');
        }else{
            \Flash::info('Tentang Kami Gagal Diupdate');
        }
                
        return redirect('admin/kami');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/gambar/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
