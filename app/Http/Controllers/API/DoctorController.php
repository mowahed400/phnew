<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function getDoctorsByAgent(Request $request){

            $agentId = $request->input('agent_id');

              if (!$agentId) {
                  return response()->json(['message' => 'Agent ID is required'], 400);
                  }

                $agent = Agent::find($agentId);

              if (!$agent) {
                  return response()->json(['message' => 'Agent not found'], 404);
                  }

                  $doctors = Doctor::where('agent_id', $agentId)->paginate(10);
                 return response()->json(['doctors' => $doctors, 'message' => 'Doctors retrieved successfully'], 200);
    }
    public function searchdoctor(Request $request){

        if(!Auth::check()){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $agentId=$request->input('agent_id');
        $searchQuery = $request->input('query');
        if(!$agentId)
        {
            return response()->json(['message'=>'THIS AGENT NOT FOUND'],404);
        }


        $doctors=Doctor::where('agent_id',$agentId)->where(function ($query)use($searchQuery){
                    $query->where('name', 'like', '%' . $searchQuery . '%');})->paginate(10);
        if ($doctors->isEmpty()) {
            return response()->json(['message' => 'No matching doctros found for the user'], 404);
        }
        return response()->json(['agents' => $doctors, 'message' => 'Matching agents retrieved successfully'], 200);

    }
}
