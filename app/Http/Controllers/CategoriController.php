<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
            'nama_categori' => 'required|max:200',
        ]);

        $imageTempName = $request->file('image')->getPathname();
        $imageName = $request->file('image')->getClientOriginalName();
        $path = base_path() . '/public/file/';
        $request->file('image')->move($path , $imageName);

        $categori = new Categori;
        $categori->nama_categori = $request->nama_categori;
        $categori->logo_categori = $imageName;
        
        if($down->save()){
            $request->session()->flash('message', 'success|Sukses');
        }else{
            $request->session()->flash('message', 'info|Maaf Gagal');
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
        $CategoriUpdate = $request->all();
        $categori = Categori::find($id);
        $categori->update($Categori);
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
        return redirect('admin/categori');
    }
}
