<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use Illuminate\Http\Request;
use DB;
use Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
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
            'name' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required',
            'salary' => 'required',
            'joining_date' => 'required',
            'address' => 'required',
            'nid' => 'required|unique:employees',
        ]);
        if($request->photo){
            $position = strpos($request->photo , ';');
            $sub = substr($request->photo, 0 , $position);
            $ext = explode('/',$sub)[1];
            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'uploads/employee_photos/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->salary = $request->salary;
            $employee->joining_date = $request->joining_date;
            $employee->address = $request->address;
            $employee->nid = $request->nid;
            $employee->photo = $image_url;
            $employee->save();
        }else {
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->salary = $request->salary;
            $employee->joining_date = $request->joining_date;
            $employee->address = $request->address;
            $employee->nid = $request->nid;
            $employee->save();
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
        $employee = DB::table('employees')->where('id',$id)->first();
        return response()->json($employee);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = DB::table('employees')->where('id',$id)->first();
        $photo = $employee->photo;  
        if($photo){
            unlink($photo);
            DB::table('employees')->where('id',$id)->delete();
        }else {
            DB::table('employees')->where('id',$id)->delete();
        }
        

    }
}
