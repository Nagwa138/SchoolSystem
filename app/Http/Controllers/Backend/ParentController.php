<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Parents;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.parent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.parent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'father_first_name' => ['required', 'string', 'max:255'],
            'father_middle_name' => ['required', 'string', 'max:255'],
            'father_last_name' => ['required', 'string', 'max:255'],
            'father_phone_number' => ['required', 'numeric', 'min:11', 'unique:parents'],
            'mother_phone_number' => [ 'numeric', 'min:11', 'unique:parents'],
            'number_of_children' => ['required', 'integer', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users' , 'unique:parents'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = new User();
        $user->name = $request->father_first_name . ' ' . $request->father_middle_name . ' ' .$request->father_last_name ;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->job_id = 1;

        $user->save();

        $parent = new Parents();
        $parent->user_id = $user->id;
        $parent->father_first_name = $request->father_first_name;
        $parent->father_middle_name = $request->father_middle_name;
        $parent->father_last_name  = $request->father_last_name ;
        $parent->mother_first_name = $request->mother_first_name;
        $parent->mother_middle_name = $request->mother_middle_name;
        $parent->mother_last_name  = $request->mother_last_name ;
        $parent->father_phone_number = $request->father_phone_number;
        $parent->mother_phone_number = $request->mother_phone_number;
        $parent->number_of_children = $request->number_of_children;
        $parent->father_national_id = $request->father_national_id;
        $parent->email = $request->email;

        $parent->save();

        Auth::loginUsingId($user->id);
        return redirect('home')->with('status',trans('messages.congrats'));
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
