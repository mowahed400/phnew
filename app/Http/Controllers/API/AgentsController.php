<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use EngMahmoudElgml\Super\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentsController extends Controller
{
    public function agents(Request $request)
    {

        $id = auth()->id();
        if (!$id) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $agents=Agent::query()->where('user_id',$id)
            ->where(function ($query) use ($request) {
                if (isset($request['query']))
                $query->where('name', 'like', '%' . $request['query'] . '%');})
            ->paginate(10);

        return Response::defaultResponse(true,200,[],'Agents retrieved successfully',$agents);
    }

}
