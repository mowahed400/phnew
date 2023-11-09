<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Doctor;
use EngMahmoudElgml\Super\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function getDoctorsByAgent(Request $request){
        $doctors = Doctor::query()->where(function ($query)use($request){
          if(isset($request['query']))
          $query->where('name', 'like', '%' . $request['query'] . '%');

          if(isset($request['agent_id']))
              $query->where('agent_id', $request['agent_id']);
        })->paginate(10);

        return Response::defaultResponse(true,200,[],'Doctors retrieved successfully',$doctors);

    }
}
