<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Friend;
class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friend::where('user1' , Auth::user()->id)->paginate();
        $users = User::all();
        $unread = Chat::where('seen' , 0)->where('receiver' ,  Auth::user()->id)->count();
        $msgs = Chat::where('seen' , 0)->where('receiver' ,  Auth::user()->id)->paginate();
        return view('dashboard.user.friendsList' , compact('friends' , 'users' , 'msgs' , 'unread') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::where('job_id' , 0 )->where('activated' , 1)->whereNotIn('id' , [Auth::user()->id])->paginate();
        $parents = User::where('job_id' , 1 )->where('activated' , 1)->whereNotIn('id' , [Auth::user()->id])->paginate();
        $students = User::where('job_id' , 2 )->where('activated' , 1)->whereNotIn('id' , [Auth::user()->id])->paginate();
        $employees = '';
        return view('dashboard.user.index' , compact('admins' , 'parents' , 'students' , 'employees'));
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
        //
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
