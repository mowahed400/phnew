<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Doctor;
use Illuminate\Http\Request;

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
}
