<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionTypesController extends Controller
{
    public function typeQusetion(Request $request)
    {
        try {
            $questionTypes = QuestionType::all();

            if ($questionTypes->isEmpty()) {
                return response()->json(['message' => 'No question types found'], 404);
            }

            return response()->json(['question_types' => $questionTypes, 'message' => 'Question types retrieved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function question(Request $request)
    {
        try {
            $questionId = $request->input('id');
            $questions = Question::where('type_id', $questionId)->get();

            if ($questions->isEmpty()) {
                return response()->json(['message' => 'No questions found for the given type ID'], 404);
            }

            return response()->json(['questions' => $questions, 'message' => 'Questions retrieved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error occurred: ' . $e->getMessage()], 500);
        }
    }
}
