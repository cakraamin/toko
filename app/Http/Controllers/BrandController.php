<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        
        $imageName = $request->file('image')->getClientOriginalName();
        $path = public_path(). '/public/gambar/';
        $request->file('image')->move($path , $imageName);

        $brand = new Brand;
        $brand->nama_brand = $request->nama_brand;
        $brand->logo_brand = $imageName;
        
        if($brand->save()){
            $request->session()->flash('message', 'success|Sukses');
        }else{
            $request->session()->flash('message', 'info|Maaf Gagal');
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
        $brandUpdate = $request->all();
        $brand = Brand::find($id);
        $brand->update($brandUpdate);
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
        return redirect('admin/brand');
    }
}
