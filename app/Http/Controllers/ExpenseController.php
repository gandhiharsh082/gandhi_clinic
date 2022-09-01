<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_title']= 'Expense';
         $data['expense']= Expense::all();
        return view('expense',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'description'=>'required',
            'amount'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:20480'
       ]);
        
        $mm =Input::only('date','description','amount');
          
        if($request->hasFile('image'))
        {
            $photo= $request->image;            
            $photo->store('public/Expenses/');
            $filename=  'Expenses/'.$photo->hashName();
            $mm['image']=$filename;
        }
     
        
       Expense::create($mm);
        
       return response()->json(['success'=>true,'msg'=>'Created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([            
            'description'=>'required',
            'amount'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:20480'
        ]);
        
           $mm =Input::only('date','description','amount');
        
        if($request->hasFile('image'))
        {
            $photo= $request->image;            
            $photo->store('public/Expenses/');
            $filename=  'Expenses/'.$photo->hashName();
            $mm['image']=$filename;
        }
      $expense->fill($mm)->save();
        
            return response()->json(['success'=>true,'msg'=>'Updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        
            return response()->json(['success'=>true,'msg'=>'Deleted successfully']);
    }
}
