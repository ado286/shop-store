<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.register-products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->all();

        if($request->file()){
            $photo_name = Carbon::now() . $request->file('file_name')->getClientOriginalName();
            $photo_id = Photo::create(['file' => $photo_name]);

            $destPath = 'images';
            $request->file('file_name')->move($destPath, $photo_name);
            $product['photo_id'] = $photo_id->id;
        }else{

            $product['photo_id'] = 0;

        }

        Product::create($product);

        $request->session()->flash('product_message', 'Your product is added successful');


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', ['product' => $product]);
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
        $product = Product::findOrFail($id)->update($request->all());
        $request->session()->flash('updated_mess', 'Your product is successful updated');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->photo){
            $productPath = public_path($product->photo->file);
            if(file_exists($productPath)){
                unlink($productPath);
            }
        }
        $product->delete();
        session()->flash('delete', 'Product is deleted.');

        return redirect()->back();
    }
    public function users(){
        $role = Role::pluck('name', 'id');
        $users = User::all();
        return view('admin.users.index', ['users'=>$users, 'roles'=>$role]);
    }
}
