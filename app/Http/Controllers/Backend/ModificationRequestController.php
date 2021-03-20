<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Http\Controllers\Controller;
use App\Job;
use App\Level;
use App\ModifyItem;
use App\ModifyRequest;
use App\ModifyResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use Illuminate\Support\Facades\App;


class ModificationRequestController extends Controller
{
    /**
     * ModificationRequestController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth' , 'role:superAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function index()
    {
        return view('dashboard.reset_request.index');
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
     * @return int
     */
    public function store(Request $request)
    {
        $buttonsName = array(1 => 'father_first_name' , 2=>'father_middle_name' , 3=>'father_last_name',
            4=>'email' , 5=>'father_phone_number' , 6=>'father_picture' , 7=>'father_identify_card',
            8=>'other' , 9=>'first_name'  , 10=>'middle_name'  , 11=>'last_name' ,12=> 'email' , 13=> 'gender'  ,
            14=>  'religion' , 15=> 'date_of_birthday'  , 16=>  'level'  , 17=>'student_picture' , 18=>'birth_certificate' , 19=>'student_other');

        $user_id = $request->input('id');
        $job_id = User::find($user_id)->job_id;

//$user->student->parent->user->id
        $modifyRequest = new ModifyRequest();
        $modifyRequest->user_id = $user_id;
        $modifyRequest->job_id = $job_id;
        if($request->input('note')){
            $modifyRequest['note'] = $request->input('note');
        }
        $modifyRequest->save();

        for($i = 0; $i < count($request->input('inputs'));$i++) {

                if(array_search( $request->input('inputs')[$i] , $buttonsName) != -1) {
                    $modifyItem = new ModifyItem();
                    $modifyItem['modify_request_id'] = $modifyRequest->id;
                    //to be edited
                    $modifyItem['modify_type_name_id'] = array_search($request->input('inputs')[$i] , $buttonsName);
                    if(array_search($request->input('inputs')[$i] , $buttonsName) == 8){
                        if($request->input('other_note')){
                            $modifyItem['note'] = $request->input('other_note');
                        }
                    }
                    if(array_search($request->input('inputs')[$i] , $buttonsName) == 19){
                        if($request->input('other_note')){
                            $modifyItem['note'] = $request->input('other_note');
                        }
                    }
                    $modifyItem->save();
                }
        }

        $request['sender'] = Auth::user()->id;
        if(User::find($user_id)->job_id == 2){

            $request['receiver'] = User::find($user_id)->student->parent->user->id;
            $request['msg'] = 'Please Fill The Required Data in this Link for your son '. User::find($user_id)->name .' :'
                .'<br><a href="'.route('modificationResponses.show' , $modifyRequest->id).'">Open</a>';

        } else {
            $request['receiver'] = $user_id;
            $request['msg'] = 'Please Fill The Required Data in this Link :'
                .'<br><a href="'.route('modificationResponses.show' , $modifyRequest->id).'">Open</a>';
        }

        (new ChatController())->store($request);
       // App::call('ModificationResponseController')->show();

        return response('Done');

    }

    public function getAddEditRemoveColumnDataResetRequests()
    {

        $requests = ModifyRequest::orderBy('created_at', 'desc')->get();

        return Datatables::of($requests)
            ->addColumn('action', function ($request) {

                //IF THE REQUESTS DONT HAVE RESPOND SO PRINT TWO BUTTONS ( VIEW & DELETE)
                //IF IRS RESPONSED SO PRINT VIEW BUTTON

                if($request->approved == 0){

                    //EDIT TO SPECIFY THE NOTIFICATION ICON
                    $output = '<a href="'. route('modificationRequests.show' , $request->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> view</a>'
                        .'<a href="'. url('/modificationRequests/destroy' , $request->id) .'" class="btn btn-xs btn-dark" style="margin-left: 20px"><i class="glyphicon glyphicon-edit"></i> Cancel</a>'
                        .'<span class=" text-light" style="padding: 0 6px ;border-radius: 20px;background-color: red;margin: 20px">0</span>';

                    return $output;
                }


                if($request->approved == 1 ){
                    return '<a href="'. route('modificationRequests.show' , $request->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> view</a>'
                        .' <a href="'. url('acceptModificationRequest' , $request->id) .'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Accept</a>';
                }


                if($request->approved == 2 ){
                    return ' <p class="btn btn-xs btn-outline-success disabled" >Approved</p>';
                }


                if($request->approved == -1 ){
                    return ' <p class="btn btn-xs btn-outline-dark disabled">Cancelled</p>';
                }

            })
            ->addColumn('Modification Type', function ($request){
                //IF JOB ID == 1 PRINT PARENT
                if($request->job_id == 1){
                    return 'Parent Modification';
                }

                //IF JOB ID == 2 PRINT STUDENT
                if($request->job_id == 2){
                    return 'Student Modification';
                }

                //IF JOB ID == 3 PRINT TEACHER
                if($request->job_id == 3){
                    return 'Teacher Modification';
                }
            })
            ->addColumn('Name', function ($request){
                //PRINT NAME OF WANTED USER
                return $request->user->name;
            })
            ->addColumn('E-mail', function ($request){
                //PRINT EMAIL OF WANTED USER
                return $request->user->email;
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $items = ModifyItem::where('modify_request_id' , $id)->get();
        $request = ModifyRequest::find($id);
        $user = ModifyRequest::find($id)->user;
        $user_id =  $user->id;
        $job_id =  $user->job_id;

        $levels = Level::all();
        if($request->approved == 2 || $request->approved == -1){
            return abort(419);
        } else return view('dashboard.reset_request.show'  , compact('items' , 'user' , 'user_id' , 'job_id' , 'request' ,'levels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        //IF THE REQUEST HAS MORE ONE THEN DELETE ONLY THE ITEM
        $request_id = ModifyItem::find($id)->request->id;
        if(ModifyItem::where('modify_request_id' , $request_id)->count() <= 1){
            ModifyRequest::where('id',$request_id)->update(['approved' => -1]);
        }
        //ELSE APPROVE THE REQUEST WITH -1
        ModifyItem::where('id' , $id)->delete();

        return back()->with('status'  , 'Item Deleted Successfully !!');
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
        //Use it to accept the Modification Request
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $response = ModifyResponse::where('modify_request_id' , $id)->get();
        if($response->count() > 0){

            $elements  = DB::table('modify_response_items')
                ->where('modify_response_id' , ModifyResponse::where('modify_request_id' ,$id)->first()->id)
                ->get();

            foreach ($elements as $element){

                if (Storage::disk('public')->exists($element->value)){
                    Storage::disk('public')->delete($element->value);
                }
            }

            DB::table('modify_response_items')
                ->where('modify_response_id' , ModifyResponse::where('modify_request_id' ,$id)->first()->id)
                ->delete();

            ModifyResponse::where('modify_request_id' ,$id)->update(['approved' => 1]);

        }

        DB::table('modify_items')
            ->where('modify_request_id' , $id)
            ->delete();

        ModifyRequest::where('id',$id)->update(['approved' => -1]);

        return redirect()->route('modificationRequests.index')->with('status', 'Request Cancelled Successfully !!');

    }
}
