<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
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
        $agents=Agent::query()->where('user_id',$id)->paginate(10);
        if ($agents->isEmpty()) {
            return response()->json(['message' => 'No agents found for the user'], 404);
        }
            return response()->json(['agents' => $agents, 'message' => 'Agents retrieved successfully'], 200);

    }
    public function searchAgent(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $userId = auth()->id();
        $searchQuery = $request->input('query');

        $agents = Agent::where('user_id', $userId)
            ->where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');})->paginate(10);

        if ($agents->isEmpty()) {
            return response()->json(['message' => 'No matching agents found for the user'], 404);
        }

        return response()->json(['agents' => $agents, 'message' => 'Matching agents retrieved successfully'], 200);
    }

}
