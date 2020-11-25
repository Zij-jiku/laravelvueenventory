<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Expense;
use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return response()->json($expenses);
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
            'expense_details' => 'required',
            'expense_date' => 'required',
            'amount' => 'required',
        ]);

        $expense = new Expense;
        $expense->expense_details = $request->expense_details;
        $expense->expense_date = $request->expense_date;
        $expense->amount = $request->amount;
        $expense->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = DB::table('expenses')->where('id',$id)->first();
        return response()->json($expense);
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
        $data['expense_details'] = $request->expense_details;
        $data['expense_date'] = $request->expense_date;
        $data['amount'] = $request->amount;
        $user = DB::table('expenses')->where('id',$id)->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = DB::table('expenses')->where('id',$id)->delete();

    }
}
