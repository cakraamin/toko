<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categori;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categori = Categori::all();        
        return view('admin.categori',compact('categori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_categori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|max:200',
            'image'         => 'required|mimes:jpeg,bmp,png'
        ]);

        $data['nama_kategori'] = $request->nama_kategori;

        if ($request->hasFile('image')) {
            $data['logo_kategori'] = $this->savePhoto($request->file('image'));
        }        
        
        if(Categori::create($data)){
            \Flash::success('Categori Berhasil Disimpan');
        }else{
            \Flash::info('Categori Gagal Disimpan');
        }            
                
        return redirect('admin/categori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categori = Categori::find($id);
        return view('admin.show_categori',compact('categori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = Categori::find($id);
        return view('admin.edit_categori',compact('categori')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|max:200',
            'image'         => 'mimes:jpeg,bmp,png'
        ]);

        $categori = Categori::findOrFail($id);
        //$data = $request->only('name', 'model');

        $data['nama_kategori'] = $request->nama_kategori;

        if ($request->hasFile('image')) {
            $data['logo_kategori'] = $this->savePhoto($request->file('image'));
        }        

        if($categori->update($data)){
            \Flash::success('Categori Berhasil Diupdate');
        }else{
            \Flash::info('Categori Gagal Diupdate');
        }

        return redirect('admin/categori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categori::find($id)->delete();
        \Flash::success('Categori Berhasil Dihapus');
        return redirect('admin/categori');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/logo/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
