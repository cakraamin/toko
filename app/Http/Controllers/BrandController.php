<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();        
        return view('admin.brand',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_brand');
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
            'nama_brand' => 'required|max:200',
        ]);    

        $data['nama_brand'] = $request->nama_brand;

        if ($request->hasFile('image')) {
            $data['logo_brand'] = $this->savePhoto($request->file('image'));
        }        
        
        if(Brand::create($data)){
            \Flash::success('Brand Berhasil Disimpan');
        }else{
            \Flash::info('Brand Gagal Disimpan');
        }
                
        return redirect('admin/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('admin.show_brand',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.edit_brand',compact('brand'));  
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
        //$brandUpdate = $request->all();       

        $brand = Brand::findOrFail($id);
        //$data = $request->only('name', 'model');

        $data['nama_brand'] = $request->nama_brand;

        if ($request->hasFile('image')) {
            $data['logo_brand'] = $this->savePhoto($request->file('image'));
        }        

        if($brand->update($data)){
            \Flash::success('Brand Berhasil Diupdate');
        }else{
            \Flash::info('Brand Gagal Diupdate');
        }

        return redirect('admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        \Flash::success('Brand Berhasil Dihapus');
        return redirect('admin/brand');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/logo/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
