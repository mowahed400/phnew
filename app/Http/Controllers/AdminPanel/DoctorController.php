<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDoctorRequest;
use App\Models\Agent;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::with('agent')->get();

        return view('AdminPanel.Doctors.index',get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents=Agent::all();
        return view('AdminPanel.doctors.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDoctorRequest $request)
    {
        try {
            Doctor::create($request->input());

            return redirect()->back()->with('success', __('lang.created'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('warning', __('lang.warning'));
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

        $doctors=Doctor::find($id);
        $agents=Agent::all();
        return view('AdminPanel.doctors.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDoctorRequest $request, $id)
    {
        try{
        $doctors=Doctor::findorfail($id);
        $doctors->update($request->inpute());
        return redirect()->route('agent.index')->with('success', __('lang.updated'));
    }
    catch(\Exception $ex){
        return redirect()->back()->with('warning', __('lang.warning'));
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
        $doctors=Doctor::findorfail($id);
        $doctors->delete();
        return redirect()->back()->with('error_message', __('lang.deleted'));

    }
}
