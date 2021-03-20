<?php

namespace App\Http\Controllers\Backend;

use App\Files;
use App\Http\Controllers\Controller;
use App\Level;
use App\ModifyItem;
use App\ModifyRequest;
use App\ModifyResponse;
use App\ModifyResponseItem;
use App\ModifyTypeName;
use App\Parents;
use App\Stage;
use App\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\UploadedFile;

class ModificationResponseController extends Controller
{
    /**
     * ModificationResponseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @return void
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $request_id = $request->input('request_id');
        $response = new ModifyResponse();
        $response['user_id'] = ModifyRequest::find($request_id)->user->id ;
        $response['job_id'] = ModifyRequest::find($request_id)->user->job_id ;
        $response['modify_request_id'] = $request_id ;
        $response->save();

        $numbers = [];

        for($i = 1 ; $i <= 19 ; $i ++ ){
            array_push($numbers , $i);
        }

       $result = '';
        foreach ($numbers as $number){


            if($request[$number]){


                if(ModifyTypeName::find($number)->modify_type_id == 1){

                    ModifyResponseItem::create([
                        'modify_response_id' => $response->id,
                        'modify_type_name_id' => $number,
                        'value' => $request[$number],
                    ]);


                } else {

                    if ($request->hasFile($number)) {

                        $avatar = $request->file($number);

                        $path = 'uploads/modification/response/' . $response->id . '/'
                            . ModifyRequest::find($request_id)->user->id . '/' . $number ;

                        if (!Storage::exists($path)) {
                            Storage::disk('public')->makeDirectory($path);
                        }

                        $name = $avatar->store('' , 'public');

                        //TODO::DELETE FILE NAME

                        Storage::disk('public')->delete($name);

                        ModifyResponseItem::create([
                            'modify_response_id' => $response->id,
                            'modify_type_name_id' => $number,
                            'value' => $avatar->store($path , 'public'),
                            'pic' => $name,
                        ]);

                    }
                }
            }

        }

        ModifyRequest::find($request_id)->update(['approved' => 1]);

        return redirect('home')->with('status' , 'Response Sent Successfully !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user_id = ModifyRequest::find($id)->user_id;
        $request = ModifyRequest::findOrFail($id);

        $stages = Stage::all();
        if(User::find($user_id)->job_id == 2){
            if(Auth::user()->id != User::find($user_id)->student->parent->user->id){
                return abort(419);
            } else {
                if($request->approved == 0){
                    return view('dashboard.reset_respond.show' , compact('request' , 'stages'));
                } else  return abort(419);
            }
        } else {
            if(Auth::user()->id != $user_id){
                return abort(419);
            } else {
                if($request->approved == 0){
                    return view('dashboard.reset_respond.show' , compact('request' , 'stages'));
                } else  return abort(419);
            }
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


    public function acceptModificationRequest($id){
        //TODO::EDIT USER DATA IN TABLES

        $result = '';

            $request = ModifyRequest::find($id);
            ModifyItem::where('modify_request_id' ,$id)->delete();
            $response = $request->response;
            $user = User::find($request->user_id);
            $items = [];

            for($i = 1 ; $i <= 19; $i++){
                foreach ($response->items as $item){
                    if($item->modify_type_name_id == $i){
                        array_push($items , $i);
                    }
                }
            }

            $buttonsName = array(1 => 'father_first_name' , 2=>'father_middle_name' , 3=>'father_last_name',
                4=>'email' , 5=>'father_phone_number' , 6=>'father_picture' , 7=>'father_identify_card',
                8=>'other' , 9=>'first_name'  , 10=>'middle_name'  , 11=>'last_name' ,12=> 'email' , 13=> 'gender'  ,
                14=>  'religion' , 15=> 'date_of_birthday'  , 16=>  'level_id'  , 17=>'student_picture' , 18=>'birth_certificate' , 19=>'student_other');


            foreach ($items as $item){

                //Parent Text Data
                if($item >= 1  && $item <=5){

                    foreach ($response->items as $element){
                        if($element->modify_type_name_id == $item){

                            DB::table('parents')
                                ->where('user_id' , $user->id)
                                ->update([
                                    $buttonsName[$item] => $element->value,
                                ]);

                            if($item == 4){
                                DB::table('users')
                                    ->where('id' , $user->id)
                                    ->update([
                                        'email' => $element->value,
                                    ]);
                            }

                        }

                    }
                }

                //Student Text Data
                if($item >= 9  && $item <=16){

                    foreach ($response->items as $element){
                        if($element->modify_type_name_id == $item){

                            DB::table('students')
                                ->where('user_id' , $user->id)
                                ->update([
                                    $buttonsName[$item] => $element->value,
                                ]);

                            if($item == 12){
                                DB::table('users')
                                    ->where('id' , $user->id)
                                    ->update([
                                        'email' => $element->value,
                                    ]);
                            }

                        }

                    }
                }

                //Parent File Data
                if($item == 6 || $item == 7){

                    foreach ($response->items as $element){
                        if($element->modify_type_name_id == $item){

                            if($item == 6){
                                //Father pic as file type == 2
                                $pics = DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 2)
                                    ->get();

                                foreach ($pics as $pic){
                                    $pic_path = 'uploads/parents/' . $user->id . '/father_picture/' . $pic->file;
                                    if(file_exists($pic_path)) Storage::delete($pic_path);
                                }


                                DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 2)
                                    ->delete();


                                $old = $element->value;

                                $path = '/uploads/parents/' . $user->id . '/father_picture/' . $element->pic;

                                Storage::disk('public')->deleteDirectory('/uploads/parents/' . $user->id . '/father_picture/' );

                                Storage::disk('public')->move($old , $path);

                                Storage::delete($old);

                                $father_picture = new Files();
                                $father_picture->user_id = $user->id;
                                $father_picture->filetype_id = 2;
                                $father_picture->file = $path;
                                $father_picture->save();

                                $result .= 'Done';

                            }

                            if($item == 7){

                                //Father identify card as file type == 1
                                $pics = DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 1)
                                    ->get();

                                foreach ($pics as $pic){
                                    $pic_path = 'uploads/parents/' . $user->id . '/father_identify_card/' . $pic->file;
                                    if(file_exists($pic_path)) Storage::delete($pic_path);
                                }


                                DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 1)
                                    ->delete();


                                $old = $element->value;

                                $path = '/uploads/parents/' . $user->id . '/father_identify_card/' . $element->pic;

                                Storage::disk('public')->deleteDirectory('/uploads/parents/' . $user->id . '/father_identify_card/' );

                                Storage::disk('public')->move($old , $path);

                                Storage::delete($old);

                                $father_picture = new Files();
                                $father_picture->user_id = $user->id;
                                $father_picture->filetype_id = 1;
                                $father_picture->file = $path;
                                $father_picture->save();

                                $result .= 'Done';

                            }

                        }

                    }

                }

                //Student File Data

                if($item == 17 || $item == 18){
                    foreach ($response->items as $element){
                        if($element->modify_type_name_id == $item){

                            if($item == 17){
                                //Student pic as file type == 3
                                $pics = DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 3)
                                    ->get();

                                foreach ($pics as $pic){
                                    $pic_path = 'uploads/students/' . $user->id . '/student_picture/' . $pic->file;
                                    if(file_exists($pic_path)) Storage::delete($pic_path);
                                }


                                DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 3)
                                    ->delete();


                                $old = $element->value;

                                $path = 'uploads/students/' . $user->id . '/student_picture/'. $element->pic;

                                Storage::disk('public')->deleteDirectory('uploads/students/' . $user->id . '/student_picture/' );

                                Storage::disk('public')->move($old , $path);

                                Storage::delete($old);

                                $father_picture = new Files();
                                $father_picture->user_id = $user->id;
                                $father_picture->filetype_id = 3;
                                $father_picture->file = $path;
                                $father_picture->save();

                                $result .= 'Done Student';

                            }

                            if($item == 18){
                                //Student certificate as file type == 5
                                $pics = DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 5)
                                    ->get();

                                foreach ($pics as $pic){
                                    $pic_path = 'uploads/students/' . $user->id . '/birth_certificate/' . $pic->file;
                                    if(file_exists($pic_path)) Storage::delete($pic_path);
                                }


                                DB::table('files')
                                    ->where('user_id' , $user->id)
                                    ->where('filetype_id' , 5)
                                    ->delete();


                                $old = $element->value;

                                $path = 'uploads/students/' . $user->id . '/birth_certificate/'. $element->pic;

                                Storage::disk('public')->deleteDirectory('uploads/students/' . $user->id . '/birth_certificate/' );

                                Storage::disk('public')->move($old , $path);

                                Storage::delete($old);

                                $father_picture = new Files();
                                $father_picture->user_id = $user->id;
                                $father_picture->filetype_id = 5;
                                $father_picture->file = $path;
                                $father_picture->save();

                                $result .= 'Done Student';

                            }

                        }
                    }
                }
            }


        //TODO::DELETE RESPONSE & RESPONSE ITEMS
        DB::table('modify_items')
            ->where('modify_request_id' , $request->id)
            ->delete();
        //TODO::DELETE REQUEST ITEMS
        DB::table('modify_response_items')
            ->where('modify_response_id' , $response->id)
            ->delete();
        $response->update(['approved' => 1]);

        //TODO::UPDATE REQUEST APPROVAL TO BE 2
        $request->update(['approved' => 2]);

        return redirect()->route('modificationRequests.index')->with('status' , 'Success !!');

    }

    public function acceptModificationItem($id){

        //Accept and replace Data

        $responseItem = ModifyResponseItem::find($id);
        $response_id = $responseItem->modify_response_id;
        $response = ModifyResponse::find($response_id);
        $request_id = $responseItem->response->modify_request_id;
        $request = ModifyRequest::find($request_id);
        $requestItem = DB::table('modify_items')
            ->where('modify_request_id' , $request_id)
            ->where('modify_type_name_id' , $responseItem->modify_type_name_id)
            ->first();


        $buttonsName = array(1 => 'father_first_name' , 2=>'father_middle_name' , 3=>'father_last_name',
            4=>'email' , 5=>'father_phone_number' , 6=>'father_picture' , 7=>'father_identify_card',
            8=>'other' , 9=>'first_name'  , 10=>'middle_name'  , 11=>'last_name' ,12=> 'email' , 13=> 'gender'  ,
            14=>  'religion' , 15=> 'date_of_birthday'  , 16=>  'level_id'  , 17=>'student_picture' , 18=>'birth_certificate' , 19=>'student_other');


        $user_id = $request->user_id;

        if($responseItem->getTypeName->type->id == 2){


            if($responseItem->modify_type_name_id >= 6 &&  $responseItem->modify_type_name_id  <=8){
                if($responseItem->modify_type_name_id == 6){
                    //Father pic as file type == 2
                    $pics = DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 2)
                        ->get();

                    foreach ($pics as $pic){
                        $pic_path = 'uploads/parents/' . $user_id . '/father_picture/' . $pic->file;
                        if(file_exists($pic_path)) Storage::delete($pic_path);
                    }


                    DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 2)
                        ->delete();


                    $old = $responseItem->value;

                    $path = '/uploads/parents/' . $user_id . '/father_picture/' . $responseItem->pic;

                    Storage::disk('public')->deleteDirectory('/uploads/parents/' . $user_id . '/father_picture/' );

                    Storage::disk('public')->move($old , $path);

                    Storage::delete($old);

                    $father_picture = new Files();
                    $father_picture->user_id = $user_id;
                    $father_picture->filetype_id = 2;
                    $father_picture->file = $path;
                    $father_picture->save();
                }

                if($responseItem->modify_type_name_id == 7){

                    //Father identify card as file type == 1
                    $pics = DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 1)
                        ->get();

                    foreach ($pics as $pic){
                        $pic_path = 'uploads/parents/' . $user_id . '/father_identify_card/' . $pic->file;
                        if(file_exists($pic_path)) Storage::delete($pic_path);
                    }


                    DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 1)
                        ->delete();


                    $old = $responseItem->value;

                    $path = '/uploads/parents/' . $user_id . '/father_identify_card/' . $responseItem->pic;

                    Storage::disk('public')->deleteDirectory('/uploads/parents/' . $user_id . '/father_identify_card/' );

                    Storage::disk('public')->move($old , $path);

                    Storage::delete($old);

                    $father_picture = new Files();
                    $father_picture->user_id = $user_id;
                    $father_picture->filetype_id = 1;
                    $father_picture->file = $path;
                    $father_picture->save();

                }
            }

            if($responseItem->modify_type_name_id >= 17 &&  $responseItem->modify_type_name_id  <=19){


                if($responseItem->modify_type_name_id == 17){
                    //Student pic as file type == 3
                    $pics = DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 3)
                        ->get();

                    foreach ($pics as $pic){
                        $pic_path = 'uploads/students/' . $user_id . '/student_picture/' . $pic->file;
                        if(file_exists($pic_path)) Storage::delete($pic_path);
                    }


                    DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 3)
                        ->delete();


                    $old = $responseItem->value;

                    $path = 'uploads/students/' . $user_id . '/student_picture/'. $responseItem->pic;

                    Storage::disk('public')->deleteDirectory('uploads/students/' . $user_id . '/student_picture/' );

                    Storage::disk('public')->move($old , $path);

                    Storage::delete($old);

                    $father_picture = new Files();
                    $father_picture->user_id = $user_id;
                    $father_picture->filetype_id = 3;
                    $father_picture->file = $path;
                    $father_picture->save();

                }

                if($responseItem->modify_type_name_id == 18){
                    //Student certificate as file type == 5
                    $pics = DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 5)
                        ->get();

                    foreach ($pics as $pic){
                        $pic_path = 'uploads/students/' . $user_id . '/birth_certificate/' . $pic->file;
                        if(file_exists($pic_path)) Storage::delete($pic_path);
                    }


                    DB::table('files')
                        ->where('user_id' , $user_id)
                        ->where('filetype_id' , 5)
                        ->delete();


                    $old = $responseItem->value;

                    $path = 'uploads/students/' . $user_id . '/birth_certificate/'. $responseItem->pic;

                    Storage::disk('public')->deleteDirectory('uploads/students/' . $user_id . '/birth_certificate/' );

                    Storage::disk('public')->move($old , $path);

                    Storage::delete($old);

                    $father_picture = new Files();
                    $father_picture->user_id = $user_id;
                    $father_picture->filetype_id = 5;
                    $father_picture->file = $path;
                    $father_picture->save();

                }

            }


        } else {

            if($responseItem->modify_type_name_id >= 1 &&  $responseItem->modify_type_name_id  <=5){
                DB::table('parents')
                    ->where('user_id' , $user_id)
                    ->update([$buttonsName[$responseItem->modify_type_name_id] => $responseItem->value ]);
            }

            if($responseItem->modify_type_name_id >= 9 &&  $responseItem->modify_type_name_id  <=16){
                DB::table('students')
                    ->where('user_id' , $user_id)
                    ->update([$buttonsName[$responseItem->modify_type_name_id] => $responseItem->value ]);
            }

        }

        if(ModifyItem::where('modify_request_id' , $request_id)->count() <= 1){
                $request->update(['approved' => 2]);
        }

        DB::table('modify_items')
            ->where('modify_request_id' , $request_id)
            ->where('modify_type_name_id' , $responseItem->modify_type_name_id)
            ->delete();
        $responseItem->delete();

        if(ModifyItem::where('modify_request_id' , $request_id)->count() > 0 ){
            return back()->with('status'  , 'Item Accepted Successfully !!');
        }

        return redirect()->route('modificationRequests.index')->with('status'  , 'Item Accepted Successfully !!');

    }


    public function cancelModificationItem($id){

        $responseItem = ModifyResponseItem::find($id);
        $response_id = $responseItem->modify_response_id;
        $response = ModifyResponse::find($response_id);
        $request_id = $responseItem->response->modify_request_id;
        $request = ModifyRequest::find($request_id);

        if($responseItem->getTypeName->type->id == 2){

            $old = $responseItem->value;
            Storage::delete($old);

        }


        //Remove Request
        if(ModifyItem::where('modify_request_id' , $request_id)->count() <= 1){
            $request->update(['approved' => 2]);
        }

        //Remove Request item
        DB::table('modify_items')
            ->where('modify_request_id' , $request_id)
            ->where('modify_type_name_id' , $responseItem->modify_type_name_id)
            ->delete();

        //Remove Response Item
        $responseItem->delete();


        if(ModifyItem::where('modify_request_id' , $request_id)->count() > 0 ){
            return back()->with('status'  , 'Item Cancelled Successfully !!');
        }

        return redirect()->route('modificationRequests.index')->with('status'  , 'Item Cancelled Successfully !!');


    }

}
