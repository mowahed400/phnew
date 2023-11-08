<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits=Visit::with('agent','user','doctor')->get();
//        return ($visits);
//        return response()->json(['visits' => $visits, 'message' => 'Agents retrieved successfully'], 200);

        return view('AdminPanel.visits.index',get_defined_vars());

    }






    public function update(Request $request, $id)
    {
        try {
            $visits = Visit::findOrFail($id);


            $visits->update($request->input());

            return redirect()->route('visits.index')->with('success', __('lang.updated'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('warning', __('lang.warning'));
        }
    }


    public function edit($id)
    {

//        $roles = Role::where('id', '!=', 1)->get();
        $users=User::all();
        $doctors=Doctor::all();
        $agents=Agent::all();
        $visits = Visit::findOrFail($id);
        return view('AdminPanel.visits.edit', get_defined_vars());
    }




    public function destroy($id)
    {
        $vists=Visit::findorfail($id);
        $vists->delete();
        return redirect()->back()->with('error_message', __('lang.deleted'));
    }
}
