<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{

    public function __construct()
    {
        /*$this->middleware('permission:View User|Edit User', ['only' => ['index', 'store']]);
        $this->middleware('permission:Edit User', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Send Email', ['only' => ['sendEmail']]);*/
    }

    public function index()
    {
        $users = User::all();
        return view('AdminPanel.users.index',get_defined_vars());
    }

    public function create()
    {
        $roles = Role::where('id', '!=', 1)->get();
        return view('AdminPanel.users.create', get_defined_vars());
    }


    public function store(Request $request)
    {
        try {
             User::create($request->input());

            return redirect()->route('users.index')->with('success', __('lang.created'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('warning', __('lang.warning'));
        }
    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user->status = ($user->status == 1)? 2:1;
        $user->save();
        return redirect()->route('users.index')->with('success', __('lang.updated'));
    }


    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request['password'] = $request->password ?? $user->password;
            $user->update($request->input());

            return redirect()->route('users.index')->with('success', __('lang.updated'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('warning', __('lang.warning'));
        }
    }


    public function destroy($id)
    {
        if ($id != 1) {
            User::findOrFail($id)->delete();
            return redirect()->back()->with('error_message', __('lang.deleted'));
        } else {
            return redirect()->back()->with('warning', __('lang.warning'));
        }
    }

    public function sendEmail(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $user = User::findOrFail($request->user_id);
        Mail::to($user->email)->send( new \App\Mail\UserEmail($request->subject,$request->message));
        return redirect()->back()->with('success',__('lang.sended'));
    }
}
