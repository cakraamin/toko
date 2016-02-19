<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Download;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $down = Download::all();        
        return view('admin.download',compact('down'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_download');
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
            'nama_download' => 'required|max:200',
        ]);        

        $data['nama_download'] = $request->nama_download;

        if ($request->hasFile('image')) {
            $data['file_download'] = $this->savePhoto($request->file('image'));
        }

        if(Download::create($data)){
            \Flash::success('Download Berhasil Disimpan');
        }else{
            \Flash::info('Download Gagal Disimpan');
        }        
                
        return redirect('admin/download');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $down = Download::find($id);
        return view('admin.show_down',compact('down'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $down = Download::find($id);
        return view('admin.edit_down',compact('down'));   
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
        $down = Download::findOrFail($id);        

        $data['nama_download'] = $request->nama_download;        

        if ($request->hasFile('image')) {
            $data['file_download'] = $this->savePhoto($request->file('image'));
        }        

        if($down->update($data)){
            \Flash::success('Download Berhasil Diupdate');
        }else{
            \Flash::info('Download Gagal Diupdate');
        }

        return redirect('admin/download');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Download::find($id)->delete();
        \Flash::success('File Download Berhasil Dihapus');
        return redirect('admin/download');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
