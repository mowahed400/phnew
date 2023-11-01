<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateOverviewRequest;
use App\Http\Requests\AdminPanel\UpdateOverviewRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OverviewRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Overview;

class OverviewController extends AppBaseController
{
    /** @var OverviewRepository $overviewRepository*/
    private $overviewRepository;

    public function __construct(OverviewRepository $overviewRepo)
    {
        $this->overviewRepository = $overviewRepo;
        $this->middleware('permission:View Overview|Add Overview|Edit Overview|Delete Overview', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Overview', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Overview', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Overview', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $overviews = Overview::all();
        return view('AdminPanel.overviews.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.overviews.create');
    }

    public function store(CreateOverviewRequest $request)
    {
        // Overview::create( $request->all() );
        $input       = $request->all();
        $overview    = $this->overviewRepository->create( $input );
        return redirect(route('overviews.index'))->with('success',__('lang.created'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        // return $id;
        $overview = Overview::findOrFail($id);
        return view('AdminPanel.overviews.edit' , get_defined_vars() );
    }

    public function update($id, UpdateOverviewRequest $request)
    {
        // $overview->update( $request->all() );
        $overview = Overview::findOrFail($id);
        $overview = $this->overviewRepository->update($request->all() , $id);
        return redirect(route('overviews.index'))->with('success',__('lang.created'));

    }

    public function destroy($id)
    {
        Overview::findOrFail($id)->delete();
        return redirect(route('overviews.index'))->with('warning',__('lang.created'));
    }
}
