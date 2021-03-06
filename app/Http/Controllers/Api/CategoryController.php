<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Image;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
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
            'category_name' => 'required',
        ]);

        if($request->photo){
            $position = strpos($request->photo , ';');
            $sub = substr($request->photo, 0 , $position);
            $ext = explode('/',$sub)[1];
            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'uploads/category_photos/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $category = new Category;
            $category->category_name = $request->category_name;
            $category->photo = $image_url;
            $category->save();
        }else {
            $category = new Category;
            $category->category_name = $request->category_name;
            $category->save();
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
        $category = DB::table('categories')->where('id',$id)->first();
        return response()->json($category);
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
        $data['category_name'] = $request->category_name;
        $image = $request->newphoto;

        if($image){
            $position = strpos($image , ';');
            $sub = substr($image, 0 , $position);
            $ext = explode('/',$sub)[1];
            $name = time().".".$ext;
            $img = Image::make($image)->resize(240,200);
            $upload_path = 'uploads/category_photos/';
            $image_url = $upload_path.$name;
            $success = $img->save($image_url);

            if($success) {
                $data['photo'] = $image_url;
                $img = DB::table('categories')->where('id',$id)->first();
                $img_path = $img->photo;  
                $done = unlink($img_path);
                $user = DB::table('categories')->where('id',$id)->update($data);
            }

        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('categories')->where('id',$id)->update($data);
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
        $category = DB::table('categories')->where('id',$id)->first();
        $photo = $category->photo;  
        if($photo){
            unlink($photo);
            DB::table('categories')->where('id',$id)->delete();
        }else {
            DB::table('categories')->where('id',$id)->delete();
        }
    }
}
