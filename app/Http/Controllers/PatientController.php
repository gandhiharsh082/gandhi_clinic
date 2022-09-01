<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Patientdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class PatientController extends Controller
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
        $data['page_title']= 'Patient List';
         $data['patient']= Patient::all();
        return view('patient',$data);
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
            'name'=>'required',
            'age'=>'required',
            'phone'=>'digits:10',
             'image' => 'image|mimes:jpeg,png,jpg|max:20480'
            
            
        ]);
        
        $mm =Input::only('name','age','gender','phone','address');
          
        if($request->hasFile('image'))
        {
            $photo= $request->image;            
            $photo->store('public/patient/');
            $filename=  'patient/'.$photo->hashName();
            $mm['image']=$filename;
        }
     
        
       Patient::create($mm);
        
       return response()->json(['success'=>true,'msg'=>'Created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $data['page_title']='Patient Detail';
        $data['patient']=$patient;
        return view('patientdetail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
           $request->validate([            
               'name'=>'required',
               'age'=>'required',
               'phone'=>'digits:10',
             'image' => 'image|mimes:jpeg,png,jpg|max:20480'
        ]);
        
        $mm =Input::only('name','age','gender','phone','address');
         
        if($request->hasFile('image'))
        {
            $photo= $request->image;            
            $photo->store('public/patient/');
            $filename=  'patient/'.$photo->hashName();
            $mm['image']=$filename;
        }
        
     
        
        $patient->fill($mm)->save();
        
            return response()->json(['success'=>true,'msg'=>'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        if($patient->patientdetail()->count()==0)
        {
        
        $patient->delete();
        
            return response()->json(['success'=>true,'msg'=>'Deleted successfully']);
        }
          return response()->json(['success'=>false,'msg'=>'Not able to Delete ']);
    }
}
