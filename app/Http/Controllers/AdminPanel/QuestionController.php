<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestionRequest;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Mockery\Exception;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $question=Question::with('questionType')->get();

        return view('AdminPanel.question.index',get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionType=QuestionType::all();
        return view('AdminPanel.doctors.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        try {
             Question::create($request->input());

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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::find($id);
        $questionType=QuestionType::all();
        return view('AdminPanel.question.edit', get_defined_vars());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateQuestionRequest $request, $id)
    {
        try{
            $quetion=Question::find($id);
            $quetion->update($request->input());
            return redirect()->route('question.index')->with('success', __('lang.updated'));

        }catch (\Exception $ex){
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
        $question=Question::find($id);
        $question->delete();
        return redirect()->back()->with('error_message', __('lang.deleted'));
    }
}
