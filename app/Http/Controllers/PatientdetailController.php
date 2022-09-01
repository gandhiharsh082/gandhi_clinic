<?php

namespace App\Http\Controllers;

use App\Patientdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class PatientdetailController extends Controller
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
        //
    }
    
        public function pdf($id)
    {
        $data['p']=Patientdetail::findorfail($id);
        $data['page_title']='Patientdetail PDF';
         return view('pdf',$data);
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
            'patient_id'=>'required',
            'co'=>'required',
            'do'=>'required',
            'rx'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:20480'
            
            
        ]);
        
        $mm =Input::only('patient_id','co','do','rx','fee','image');
          
        if($request->hasFile('image'))
        {
            $photo= $request->image;            
            $photo->store('public/patient');
            $filename=  'patient/'.$photo->hashName();
            $mm['image']=$filename;
        }
     
        
       Patientdetail::create($mm);
        
       return response()->json(['success'=>true,'msg'=>'Created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patientdetail  $patientdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Patientdetail $patientdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patientdetail  $patientdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Patientdetail $patientdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patientdetail  $patientdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patientdetail $patientdetail)
    {
        
           $request->validate([    
            'patient_id'=>'required',
            'co'=>'required',
            'do'=>'required',
            'rx'=>'required',
             'image' => 'image|mimes:jpeg,png,jpg|max:20480'
        ]);
        
        $mm =Input::only('patient_id','co','do','rx','fee','image');
         
        if($request->hasFile('image'))
        {
            $photo= $request->image;            
            $photo->store('public/patient/');
            $filename=  'patient/'.$photo->hashName();
            $mm['image']=$filename;
        }
        
     
        
        $patientdetail->fill($mm)->save();
        
            return response()->json(['success'=>true,'msg'=>'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patientdetail  $patientdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patientdetail $patientdetail)
    {
        
        
        $patientdetail->delete();
        
            return response()->json(['success'=>true,'msg'=>'Deleted successfully']);
    }
       
    
}
