<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Friend;

class ChatController extends Controller
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
        $msg = new Chat();
        $msg->sender = $request['sender'];
        $msg->receiver = $request['receiver'];
        $msg->msg = $request['msg'];
        $msg->save();
        $friendship = Friend::where(['user1' => $request['sender'] , 'user2' => $request['receiver']  ] )->orWhere(['user2' => $request['sender'] , 'user1' => $request['receiver']])->count();
        if($friendship == 0){
            Friend::create([
                'user1' => $request['sender'],
                'user2' => $request['receiver'],
            ]);
            Friend::create([
                'user2' => $request['sender'],
                'user1' => $request['receiver'],
            ]);
        } else {
            Friend::where(['user1' => $request['sender'] , 'user2' => $request['receiver']  ] )->orWhere(['user2' => $request['sender'] , 'user1' => $request['receiver']])->update(['updated_at' => $msg->created_at ]);
        }
        return  back();
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
        $friend = User::findOrFail($id);
        $msgs = Chat::where(['sender' => $id , 'receiver' => Auth::user()->id])->orWhere(['sender' => Auth::user()->id , 'receiver' => $id])->paginate();
        Chat::where(['sender' => Auth::user()->id , 'receiver' => $id])->update(['seen' => 1]);
        return view('dashboard.user.chatRoom' , compact('friend' , 'msgs'));
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
