<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $product = Product::all();        
        return view('admin.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_product');
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

        $imageTempName = $request->file('image')->getPathname();
        $imageName = $request->file('image')->getClientOriginalName();
        $path = base_path() . '/public/file/';
        $request->file('image')->move($path , $imageName);

        $down = new Download;
        $down->nama_download = $request->nama_download;
        $down->file_download = $imageName;
        
        if($down->save()){
            $request->session()->flash('message', 'success|Sukses');
        }else{
            $request->session()->flash('message', 'info|Maaf Gagal');
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
        $product = Product::find($id);
        return view('admin.show_product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit_product',compact('product')); 
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
        $productUpdate = $request->all();
        $product = Product::find($id);
        $product->update($productUpdate);
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('admin/product');
    }
}
