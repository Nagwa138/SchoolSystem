<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Friend;
use App\Http\Controllers\Controller;
use App\ModifyItem;
use App\ModifyRequest;
use App\User;
use Illuminate\Http\Request;
use App\Files;
use App\Stage;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class StudentJoinRequetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.student.join');
    }


    public function __construct()
    {
        $this->middleware(['auth' , 'role:superAdmin']);

    }


    public function getAddEditRemoveColumnData()
    {



        $students_requests = DB::table('users')
            ->where('activated' , 0)
            ->where('job_id' , 2)
            ->select(['id' ,'name' ,'email' ]);

        return Datatables::of($students_requests)
            ->addColumn('action', function ($students_request) {
                if(User::find($students_request->id)->student->parent->user->activated == 1){
                    return '<a href="'. route('studentRequests.show' , $students_request->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> view Request</a>';
                }
            })->editColumn('id',function ($students_request) {
                if(User::find($students_request->id)->student->parent->user->activated == 1){
                    return  'ID: ' . $students_request->id ;
                }
            })
            ->editColumn('name',function ($students_request) {
                if (User::find($students_request->id)->student->parent->user->activated == 1) {
                    return 'Name : '. $students_request->name ;
                }
            })
            ->editColumn('email',function ($students_request) {
                if (User::find($students_request->id)->student->parent->user->activated == 1) {
                    return  'E-mail : ' . $students_request->email ;
                }
            })
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {


            $files = Files::where('user_id', $id)->paginate();
            $user = User::findOrFail($id);
            $requests = ModifyRequest::where('user_id' , $id)->where('approved' , 0)->count();

        return view('dashboard.student.joinShow', compact('user', 'files' , 'requests'));

    }


    public function acceptStudent($id){


            $user = User::findOrFail($id);
            $password = substr($user->email, 0, strpos($user->email, '@')) . Str::random(5);
            User::where('id', $id)->update(['activated' => 1, 'password' => Hash::make($password)]);

            $msg = new Chat();
            $msg->sender = Auth::user()->id;
            $msg->receiver = $id;
            $msg->msg = 'Welcome Student your password is : (  ' . $password . '  )  And email is : ( ' . $user->email . ' )';
            $msg->save();
            $friendship = Friend::where(['user1' => Auth::user()->id, 'user2' => $id])->orWhere(['user2' => Auth::user()->id, 'user1' => $id])->count();
            if ($friendship == 0) {
                Friend::create([
                    'user1' => Auth::user()->id,
                    'user2' => $id,
                ]);
                Friend::create([
                    'user2' => Auth::user()->id,
                    'user1' => $id,
                ]);
            } else {
                Friend::where(['user1' => Auth::user()->id, 'user2' => $id])->orWhere(['user2' => Auth::user()->id, 'user1' => $id])->update(['updated_at' => $msg->created_at]);
            }

            return back()->with('status', 'Student Accepted Successfully !!');

    }

    public function cancelRequestAcceptStudent($id){
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $stages = Stage::all();
            $user = User::findOrFail($id);
            $files = Files::where('user_id', $id)->paginate();

            return view('dashboard.student.joinEdit', compact('user', 'stages', 'files'));

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


            User::where('id', $id)->update(['email' => $request->email]);
            Student::where('user_id', $id)->update($request->except(['_token', '_method', 'stage']));

            return redirect()->route('studentRequests.show', $id)->with('status', 'Student Data Updated !!');
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
        //
    }
}
