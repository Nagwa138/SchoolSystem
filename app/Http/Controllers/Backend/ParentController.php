<?php

namespace App\Http\Controllers\Backend;

use App\Files;
use App\Http\Controllers\Controller;
use App\Parents;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Storage;
use Validator;
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

        if($request->hasFile('father_picture'))
        {

            $path_father_picture = 'uploads/parents/' . $user->id .'/father_picture/' ;
            if (!file_exists($path_father_picture)) {
                mkdir($path_father_picture , 0777, true);
            }

            //Storage::disk('public_uploads')->delete('parents/' . $user->id .'/'. User::);
            $file_extention_father_picture = $request->file('father_picture')->getClientOriginalExtension();

            $father_picture = time() . "." .$file_extention_father_picture;
            $request->file('father_picture')->move($path_father_picture, $father_picture);

            $father_picture_insert = new Files();
            $father_picture_insert->user_id = $user->id;
            $father_picture_insert->filetype_id = 2;
            $father_picture_insert->file =$father_picture;
            $father_picture_insert->save();

        }

        if($request->hasFile('father_identify_card')) {

            $path_father_identify_card = 'uploads/parents/' . $user->id . '/father_identify_card/';
            if (!file_exists($path_father_identify_card)) {
                mkdir($path_father_identify_card, 0777, true);
            }

            //Storage::disk('public_uploads')->delete('parents/' . $user->id .'/'. User::);

            $file_extention_father_identify_card = $request->file('father_identify_card')->getClientOriginalExtension();
            $father_identify_card = time() . "." . $file_extention_father_identify_card;
            $request->file('father_identify_card')->move($path_father_identify_card, $father_identify_card);

            $father_identify_card_insert = new Files();
            $father_identify_card_insert->user_id = $user->id;
            $father_identify_card_insert->filetype_id = 1;
            $father_identify_card_insert->file = $father_identify_card;
            $father_identify_card_insert->save();

        } else {
            return 'no';
        }
/*
        if($request->hasFile('additional')) {

            $path_additional = 'uploads/parents/' . $user->id . '/additional/';
            if (!file_exists($path_additional)) {
                mkdir($path_additional, 0777, true);
            }

            //Storage::disk('public_uploads')->delete('parents/' . $user->id .'/'. User::);
            $file_extention_additional = $request->file('additional')->getClientOriginalExtension();
            $additional = time() . "." . $file_extention_additional;
            $request->file('additional')->move($path_additional, $additional);


            $additional_insert = new Files();
            $additional_insert->user_id = $user->id;
            $additional_insert->filetype_id = 4;
            $additional_insert->file = $additional;
            $additional_insert->save();

        }
*/

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

    public function putFiles(Request $request){

    }
}
