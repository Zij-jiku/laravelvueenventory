<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
                   ->join('categories' , 'products.category_id' , 'categories.id')
                   ->join('suppliers' , 'products.supplier_id' , 'suppliers.id')
                   ->select('categories.category_name' , 'suppliers.name' , 'products.*')
                   ->orderBy('products.id' , 'DESC')
                   ->get();
                   return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'root' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'supplier_id' => 'required',
            'buying_date' => 'required',
            'product_quantity' => 'required',
            'alert_quantity' => 'required',
        ]);

        if($request->photo){
            $position = strpos($request->photo , ';');
            $sub = substr($request->photo, 0 , $position);
            $ext = explode('/',$sub)[1];
            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'uploads/product_photos/';
            $image_url = $upload_path.$name;
            $img->save($image_url);
            $supplier = new Product;
            $supplier->product_name = $request->product_name;
            $supplier->product_code = $request->product_code;
            $supplier->root = $request->root;
            $supplier->buying_price = $request->buying_price;
            $supplier->selling_price = $request->selling_price;
            $supplier->category_id = $request->category_id;
            $supplier->supplier_id = $request->supplier_id;
            $supplier->buying_date = $request->buying_date;
            $supplier->product_quantity = $request->product_quantity;
            $supplier->alert_quantity = $request->alert_quantity;
            $supplier->photo = $image_url;
            $supplier->save();

        }else {
            $supplier = new Product;
            $supplier->product_name = $request->product_name;
            $supplier->product_code = $request->product_code;
            $supplier->root = $request->root;
            $supplier->buying_price = $request->buying_price;
            $supplier->selling_price = $request->selling_price;
            $supplier->category_id = $request->category_id;
            $supplier->supplier_id = $request->supplier_id;
            $supplier->buying_date = $request->buying_date;
            $supplier->product_quantity = $request->product_quantity;
            $supplier->alert_quantity = $request->alert_quantity;
            $supplier->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::table('products')->where('id',$id)->first();
        return response()->json($products);
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
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['root'] = $request->root;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['buying_date'] = $request->buying_date;
        $data['product_quantity'] = $request->product_quantity;
        $data['alert_quantity'] = $request->alert_quantity;
        $image = $request->newphoto;

        if($image){
            $position = strpos($image , ';');
            $sub = substr($image, 0 , $position);
            $ext = explode('/',$sub)[1];
            $name = time().".".$ext;
            $img = Image::make($image)->resize(240,200);
            $upload_path = 'uploads/product_photos/';
            $image_url = $upload_path.$name;
            $success = $img->save($image_url);

            if($success) {
                $data['photo'] = $image_url;
                $img = DB::table('products')->where('id',$id)->first();
                $img_path = $img->photo;  
                $done = unlink($img_path);
                $user = DB::table('products')->where('id',$id)->update($data);
            }

        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('products')->where('id',$id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        $photo = $product->photo;  
        if($photo){
            unlink($photo);
            DB::table('products')->where('id',$id)->delete();
        }else {
            DB::table('products')->where('id',$id)->delete();
        }
    }

    public function viewstock($id){
        $stock_view = DB::table('products')->where('id' , $id)->first();
        return response()->json($stock_view);
    }

    public function updatestock(Request $request,$id){
        $data = array();
        $data['product_quantity'] = $request->product_quantity;

        DB::table('products')->where('id' , $id)->update($data);
    }
}
