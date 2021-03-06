<?php

namespace App\Http\Controllers\Backend;

use App\Files;
use App\Friend;
use App\Http\Controllers\Controller;
use App\ModifyItem;
use App\ModifyRequest;
use App\Parents;
use App\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;



class ParentJoinRequetsController extends Controller
{
    /**
     * ParentJoinRequetsController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth' , 'role:superAdmin']);

//       $user = User::findOrFail(1);
//
//       echo Auth::user();
//
////        if(!(auth()->user()->hasRole('superAdmin'))){
////            return abort(404);
////        }
///


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $this->middleware('role:superAdmin');

        return view('dashboard.parent.join');
    }


    public function getAddEditRemoveColumnData()
    {
        $this->middleware('role:superAdmin');

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
        $this->middleware('role:superAdmin');


//            $user = User::findOrFail($id);
//            $friendship = Friend::where(['user1' => 1, 'user2' => $user->id])->orWhere(['user2' => 1, 'user1' => $user->id])->count();
//            if ($friendship == 0) {
//                Friend::create([
//                    'user1' => 1,
//                    'user2' => $user->id,
//                ]);
//                Friend::create([
//                    'user2' => 1,
//                    'user1' => $user->id,
//                ]);
//            }
            User::where('id', $id)->update(['activated' => 1]);
            return back()->with('status', 'Parent Accepted Successfully !!');

    }

    public function cancelRequestAcceptParent($id){
        $this->middleware('role:superAdmin');

        $requests = DB::table('modify_requests')
            ->where('user_id' , $id)
            ->get();

        foreach ($requests as $request){
            ModifyItem::where('modify_request_id' , $request->id)->delete();
        }

        DB::table('modify_requests')
            ->where('user_id' , $id)
            ->update(['approved' => -1]);

        User::where('id', $id)->update(['activated' => 1]);
        return back()->with('status', 'Parent Accepted Successfully !!');
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
        $this->middleware('role:superAdmin');

        $user = User::findOrFail($id);
            $files = Files::where('user_id', $id)->paginate();
            $students = User::where('job_id', 2)->where('activated', 0)->paginate();
            $num = 0;
            $requests = ModifyRequest::where('user_id' , $id)->where('approved' , 0)->count();
            return view('dashboard.parent.joinShow', compact('user', 'files', 'students', 'num' , 'requests'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('role:superAdmin');

        return view('dashboard.parent.joinEdit', compact('id'));

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
