<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Brand;
use App\Categori;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $product = Product::coba();        
        return view('admin.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'brand'     => Brand::lists('nama_brand', 'id_brand'),
            'categori'  => Categori::lists('nama_kategori', 'id_kategori')
        );

        return view('admin.create_product',compact('data'));
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
            'nama'       => 'required|max:200',
            'harga'      => 'required|max:200',
            'keterangan' => 'required',
            'berat'      => 'required|max:10',
        ]);

        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['keterangan'] = $request->keterangan;
        $data['berat'] = $request->berat;
        $data['id_brand'] = $request->brand;
        $data['id_kategori'] = $request->categori;

        if ($request->hasFile('image')) {
            $data['gambar'] = $this->savePhoto($request->file('image'));
        }        
        
        if(Product::create($data)){
            \Flash::success('Product Berhasil Disimpan');
        }else{
            \Flash::info('Product Gagal Disimpan');
        }
                
        return redirect('admin/product');
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
        $data = array(
            'product'   => Product::find($id),
            'brand'     => Brand::lists('nama_brand', 'id_brand'),
            'categori'  => Categori::lists('nama_kategori', 'id_kategori')
        );

        return view('admin.edit_product',compact('data')); 
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
        $product = Product::findOrFail($id);        

        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['keterangan'] = $request->keterangan;
        $data['berat'] = $request->berat;
        $data['id_brand'] = $request->brand;
        $data['id_kategori'] = $request->categori;

        if ($request->hasFile('image')) {
            $data['gambar'] = $this->savePhoto($request->file('image'));
        }        

        if($product->update($data)){
            \Flash::success('Product Berhasil Diupdate');
        }else{
            \Flash::info('Product Gagal Diupdate');
        }

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
        \Flash::success('Product Berhasil Dihapus');
        return redirect('admin/product');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . '/upload/gambar/';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
