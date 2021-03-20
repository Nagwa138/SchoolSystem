<?php

namespace App\Http\Controllers;

use App\Parents;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Auth;
use App\Student;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if(Auth::user()->activated == 1){
            return $this->home('status' ,  'Your are Active');
        } else {

            if(Auth::user()->activated == -1) {
                return $this->home('status', 'Your had been removed ');
            }

            if(Auth::user()->activated == 0){
                // IF HE IS PARENT HE MUST COMPLETE HIS CHILDREN APP

                //ELSE HE WILL RECEIVE A MSG
                if(Auth::user()->job_id != 1){
                    return $this->home('status', 'Please wait until our Admins Respond !');
                } else {

                    $number_of_children = Auth::user()->parent->number_of_children;
                    $students = Student::where('parent_id' , Auth::user()->parent->id)->count();

                    if($number_of_children > $students){
                        return redirect()->route('students.create');
                    } else {
                        return $this->home('status', 'Please wait until our Admins Respond !');
                    }
                }
            }
        }
    }


    public function home($session , $msg){
        session()->put($session , $msg);
        return view('home');
    }


    public function displayImage($url){

        $src = Storage::url($url);

        return '<img src="' . $src . '" width=200  height=200 >' ;
    }
}
