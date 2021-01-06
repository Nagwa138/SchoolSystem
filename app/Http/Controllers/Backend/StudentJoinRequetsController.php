<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Friend;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Files;
use App\Stage;
use App\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Auth;

class StudentJoinRequetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = Files::where('user_id' , $id)->paginate();
        $user = User::findOrFail($id);
        return view('dashboard.student.joinShow' , compact('user' , 'files'));
    }


    public function acceptStudent($id){

        $user = User::findOrFail($id);
        $password = substr($user->email, 0,strpos($user->email, '@')) . Str::random(5);
        User::where('id' , $id)->update(['activated'=>1 , 'password' =>Hash::make($password) ]);

        $msg = new Chat();
        $msg->sender = Auth::user()->id;
        $msg->receiver = $id;
        $msg->msg =  'Welcome Student your password is : (  ' . $password . '  )  And email is : ( ' . $user->email . ' )';
        $msg->save();
        $friendship = Friend::where(['user1' =>  Auth::user()->id , 'user2' => $id  ] )->orWhere(['user2' =>  Auth::user()->id, 'user1' => $id])->count();
        if($friendship == 0){
            Friend::create([
                'user1' =>  Auth::user()->id,
                'user2' => $id,
            ]);
            Friend::create([
                'user2' =>  Auth::user()->id,
                'user1' => $id,
            ]);
        } else {
            Friend::where(['user1' =>  Auth::user()->id , 'user2' => $id ] )->orWhere(['user2' =>  Auth::user()->id , 'user1' =>$id])->update(['updated_at' => $msg->created_at ]);
        }

        return back()->with('status' , 'Student Accepted Successfully !!');

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
        $files = Files::where('user_id' , $id)->paginate();

        return view('dashboard.student.joinEdit' , compact('user' , 'stages' , 'files'));
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
        User::where('id', $id)->update(['email' => $request->email]);
        Student::where('user_id' , $id)->update($request->except(['_token' , '_method' , 'stage']));

        return redirect()->route('studentRequests.show' , $id)->with('status' , 'Student Data Updated !!');
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
