<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAgentRequest;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents=Agent::with('user')->get();

        return view('AdminPanel.Agent.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('AdminPanel.Agent.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAgentRequest $request)
    {
        try {
            Agent::create($request->input());

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
        $users=User::all();
        $agents=Agent::find($id);

        return view('AdminPanel.Agent.edit', get_defined_vars());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAgentRequest $request, $id)
    {
        try{
            $user = Agent::findOrFail($id);
            $user->update($request->input());
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
        Agent::findOrFail($id)->delete();
        return redirect()->back()->with('error_message', __('lang.deleted'));
    }
}
