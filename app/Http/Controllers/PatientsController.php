<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use PDF;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::orderBy('created_at', 'desc')->paginate(10);
//         return view('patients.index')->with('patients', $patients);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('patients.index')->with('patients', $user->patients);
    }

    public function downloadPDF($id)
    {
        $patient = Patient::find($id);
        $pdf = PDF::loadView('patients.download', ['patient' => $patient])->setOptions(['defaultFont' => 'sans-serif']);


        return $pdf->download('patient.pdf');
        // $pdf = PDF::loadView('patients.show', compact('patient'));
        // return $pdf->download('patient.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'name' => 'required',
            'dateofbirth' => 'required',
            'gender' => 'required',
            'dayofcontrol' => 'required',
            'condition' => 'required',
            'description' => 'required',
        ]);

        //Store patient report
        $patient = new Patient;
        $patient->title = $request->input('title');
        $patient->name = $request->input('name');
        $patient->dateofbirth = $request->input('dateofbirth');
        $patient->gender = $request->input('gender');
        $patient->dayofcontrol = $request->input('dayofcontrol');
        $patient->condition = $request->input('condition');
        $patient->description = $request->input('description');
        $patient->user_id = auth()->user()->id;
        $patient->save();

        return redirect('/patients')->with('success','Patient Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient =  Patient::find($id);
        return view('patients.show')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient =  Patient::find($id);
        return view('patients.edit')->with('patient', $patient);
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
        $this->validate($request,[
            'title' => 'required',
            'name' => 'required',
            'dateofbirth' => 'required',
            'gender' => 'required',
            'dayofcontrol' => 'required',
            'condition' => 'required',
            'description' => 'required',
        ]);

        //Store patient report
        $patient = Patient::find($id);
        $patient->title = $request->input('title');
        $patient->name = $request->input('name');
        $patient->dateofbirth = $request->input('dateofbirth');
        $patient->gender = $request->input('gender');
        $patient->dayofcontrol = $request->input('dayofcontrol');
        $patient->condition = $request->input('condition');
        $patient->description = $request->input('description');
        $patient->save();

        return redirect('/patients')->with('success','Patient Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        return redirect('/patients')->with('success','Patient Form Removed');
    }
}
