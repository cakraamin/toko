<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banner;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();        
        return view('admin.banner',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_banner');
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
            'judul_banner'  => 'required|max:200',
            'image'         => 'required|mimes:jpeg,bmp,png'
        ]);

        $data['judul_banner'] = $request->judul_banner;

        if ($request->hasFile('image')) {
            $data['gambar_banner'] = $this->savePhoto($request->file('image'));
        }        
        
        if(Banner::create($data)){
            \Flash::success('File Download Berhasil Disimpan');
        }else{
            \Flash::info('File Download Gagal Disimpan');
        }
                
        return redirect('admin/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        return view('admin.show_banner',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.edit_banner',compact('banner'));  
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
            'judul_banner'  => 'required|max:200',
            'image'         => 'mimes:jpeg,bmp,png'
        ]);

        $banner = Banner::findOrFail($id);        

        $data['judul_banner'] = $request->judul_banner;        

        if ($request->hasFile('image')) {
            $data['gambar_banner'] = $this->savePhoto($request->file('image'));
        }        

        if($banner->update($data)){
            \Flash::success('Banner Berhasil Diupdate');
        }else{
            \Flash::info('Banner Gagal Diupdate');
        }

        return redirect('admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        \Flash::success('Banner Berhasil Dihapus');
        return redirect('admin/banner');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/banner/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
