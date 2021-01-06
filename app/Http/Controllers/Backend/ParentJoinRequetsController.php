<?php

namespace App\Http\Controllers\Backend;

use App\Files;
use App\Http\Controllers\Controller;
use App\Parents;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ParentJoinRequetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.parent.join');
    }


    public function getAddEditRemoveColumnData()
    {
        $parents_requests = DB::table('users')
            ->where('activated' , 0)
            ->where('job_id' , 1)
             ->select(['id' ,'name' ,'email' ]);

        return Datatables::of($parents_requests)
            ->addColumn('action', function ($parents_request) {
                return '<a href="'. route('parentRequests.show' , $parents_request->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> view Request</a>';
            })->editColumn('id', 'ID: {{$id}}')
                ->editColumn('name', 'Name : {{$name}}')
                ->editColumn('email', 'E-mail : {{$email}}')
            ->removeColumn('updated_at')
            ->removeColumn('created_at')
            ->make(true);
    }

    public function acceptParent($id){

        User::where('id' , $id)->update(['activated'=>1]);
        return back()->with('status' , 'Parent Accepted Successfully !!');

    }

    public function sendNoteForParent(){

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $files = Files::where('user_id', $id)->paginate();
        $students = User::where('job_id', 2)->where('activated' , 0)->paginate();
        $num = 0;
        return view('dashboard.parent.joinShow' , compact('user' , 'files' , 'students' , 'num') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.parent.joinEdit' , compact('id'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
