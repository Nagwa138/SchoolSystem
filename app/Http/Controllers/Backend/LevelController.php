<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Level;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.level.index');
    }

    public function getAddEditRemoveColumnData()
    {
        $levels = DB::table('levels')
            ->select(['id', 'name', 'stage_id','created_at', 'updated_at']);

        return Datatables::of($levels)
            ->addColumn('action', function ($level) {
                return Stage::where('id' , $level->stage_id)->first()->name
                    . '<a href="'. route('levels.edit' , $level->id) .'" class="btn btn-xs btn-primary" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                    . '<a href="'. url('levels/destroy' , $level->id) .'" class="btn btn-xs btn-dark" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> Remove</a>'
                . '<a href="'. route('levels.show' , $level->id) .'" class="btn btn-xs btn-success" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> view</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('updated_at')
            ->removeColumn('created_at')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::all();
        return view('dashboard.level.create' , compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request) {
            Level::create(['name' => $request->name, 'stage_id' => $request->stage_id]);
            return redirect()->route('levels.index')->with('status', 'Level Added Successfully');
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
        if($id) {
            $level = Level::findOrFail($id);
            return view('dashboard.level.show', compact('level'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id) {
            $level = Level::findOrFail($id);
            $stages = Stage::all();
            return view('dashboard.level.edit', compact('level', 'stages'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request) {
            Level::findOrFail($id)->update(['name' => $request->name, 'stage_id' => $request->stage_id]);
            return redirect()->route('levels.index')->with('status', 'Updated !!');
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
        if($id) {


            Level::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Level Deleted Successfully !');
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
