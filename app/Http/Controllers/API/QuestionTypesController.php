<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionType;
use EngMahmoudElgml\Super\Response;
use Illuminate\Http\Request;

class QuestionTypesController extends Controller
{
    public function typeQusetion(Request $request)
    {
        $questionTypes = QuestionType::all();
        return Response::defaultResponse(true,200,[],'List Of Question Types',$questionTypes);
    }

    public function question(Request $request)
    {
        $questions = Question::where('type_id',$request['type_id'])
            ->paginate(20);
        return Response::defaultResponse(true,200,[],'List Of Questions',$questions);
    }
}
