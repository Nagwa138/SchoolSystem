<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\StagesDataTable;
use App\Http\Controllers\Controller;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Level;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StagesDataTable $dataTable)
    {
        //return $dataTable->render('dashboard.stage.index');
        return view('dashboard.stage.index');
    }

    public function getAddEditRemoveColumnData()
    {
        $stages = DB::table('stages')
            ->select(['id', 'name','created_at', 'updated_at']);

        return Datatables::of($stages)
            ->addColumn('action', function ($stage) {
                return '<a href="'. route('stages.edit' , $stage->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                    . '<a href="'. url('stages/destroy' , $stage->id) .'" class="btn btn-xs btn-dark" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('updated_at')
            ->removeColumn('created_at')
            ->make(true);
    }
    public function create()
    {
        return view('dashboard.stage.create');
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
            Stage::create(['name' => $request->name]);
            return redirect()->route('stages.index')->with('status', 'Stage Added Successfully');
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
        if($id) {
            $stage = Stage::findOrFail($id);
            return view('dashboard.stage.edit', compact('stage'));
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
            Stage::findOrFail($id)->update(['name' => $request->name]);
            return redirect()->route('stages.index')->with('status', 'Updated !!');
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


            if (Level::where('stage_id', $id)->count() > 0) {
                return 'Can not Delete';
            } else {
                Stage::findOrFail($id)->delete();
                return redirect()->back()->with('status', 'Stage Deleted Successfully !');
            }
        }
    }
}
